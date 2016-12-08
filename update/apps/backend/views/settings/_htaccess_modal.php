<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.0
 */
 
?>
<div>
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title"><?php echo Yii::t('settings', 'Htaccess contents')?></h4>
    </div>
    <div class="modal-body">
        <div class="modal-message"></div>
        <?php echo CHtml::textArea('htaccess', $this->getHtaccessContent(), array('rows' => 10, 'id' => 'htaccess', 'class' => 'form-control'));?>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo Yii::t('app', 'Close');?></button>
      <button type="button" class="btn btn-primary btn-submit btn-write-htaccess" data-remote="<?php echo $this->createUrl('settings/write_htaccess');?>" data-loading-text="<?php echo Yii::t('app', 'Please wait, processing...');?>"><?php echo Yii::t('settings', 'Write htaccess');?></button>
    </div>
</div>