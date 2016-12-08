<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 *
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.3.5.9
 */

?>
<?php foreach ($messages as $message) { ?>
<li>
    <a href="<?php echo $this->createUrl('messages/view', array('message_uid' => $message->message_uid));?>">
        <h4>
            <small><i class="fa fa-clock-o"></i> <?php echo $message->dateAdded;?></small>
            <div class="clearfix"><!-- --></div>
            <span><?php echo $message->shortTitle;?></span>
        </h4>
        <p><?php echo wordwrap($message->getShortMessage(90), 45, '<br />', true);?></p>
    </a>
</li>
<?php } ?>
