<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * FilterVarHelper
 *
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.3.5.9
 */

class FilterVarHelper
{
    /**
     * FilterVarHelper::filter()
     *
     * @param string $variable
     * @param int $filters
     * @return bool
     */
    public static function filter($variable, $filter = FILTER_DEFAULT, $options = array())
    {
        return filter_var($variable, $filter, $options);
    }

    /**
     * FilterVarHelper::email()
     *
     * @param string $email
     * @return bool
     */
    public static function email($email)
    {
        static $validator;
        if ($validator === null) {
            $validator = new CEmailValidator();
        }
        return $validator->validateValue($email);
    }

    /**
     * FilterVarHelper::url()
     *
     * @param string $url
     * @return bool
     */
    public static function url($url)
    {
        return self::filter($url, FILTER_VALIDATE_URL);
    }

    /**
     * FilterVarHelper::ip()
     *
     * @param string $ip
     * @return bool
     */
    public static function ip($ip)
    {
        return self::filter($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_IPV6 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE);
    }
}
