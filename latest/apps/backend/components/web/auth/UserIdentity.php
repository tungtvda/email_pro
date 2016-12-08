<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * UserIdentity
 *
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.0
 */

class UserIdentity extends BaseUserIdentity
{

    public function authenticate()
    {
        $user = User::model()->findByAttributes(array(
            'email'     => $this->email,
            'status'    => User::STATUS_ACTIVE,
        ));

        if (empty($user) || !Yii::app()->passwordHasher->check($this->password, $user->password)) {
            $this->errorCode = Yii::t('users', 'Invalid login credentials.');
            return !$this->errorCode;
        }

        $this->setId($user->user_id);
        $this->setAutoLoginToken($user);

        $this->errorCode = self::ERROR_NONE;
        return !$this->errorCode;
    }

    public function setAutoLoginToken(User $user)
    {
        $token = sha1(uniqid(rand(0, time()), true));
        $this->setState('__user_auto_login_token', $token);

        UserAutoLoginToken::model()->deleteAllByAttributes(array(
            'user_id' => (int)$user->user_id,
        ));

        $autologinToken             = new UserAutoLoginToken();
        $autologinToken->user_id    = (int)$user->user_id;
        $autologinToken->token      = $token;
        $autologinToken->save();

        return $this;
    }

}
