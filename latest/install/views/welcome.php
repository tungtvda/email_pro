<?php defined('MW_INSTALLER_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.0
 */
 
?>
<div class="callout callout-info">
    Hi, <br />
    Thank you for purchasing Cyber Fision EMA.<br />
    Let's start installing the application on your server by entering your license info. <br /> 
    The license info is required in order to create a support account for you automatically!           
</div>

<form method="post">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Welcome - Please enter your license info</h3>
        </div>
        <div class="box-body">
            <div class="col-lg-12">
                <div class="form-group col-lg-6">
                    <label class="required">First name <span class="required">*</span></label>
                    <input placeholder="Your first name" class="form-control has-help-text<?php echo $context->getError('first_name') ? ' error':'';?>" name="first_name" type="text" value="<?php echo getPost('first_name', '');?>"/>
                    <?php if ($error = $context->getError('first_name')) { ?>
                    <div class="errorMessage" style="display: block;"><?php echo $error;?></div>
                    <?php } ?>
                </div>
                <div class="form-group col-lg-6">
                    <label class="required">Last name <span class="required">*</span></label>
                    <input placeholder="Your last name" class="form-control has-help-text<?php echo $context->getError('last_name') ? ' error':'';?>" name="last_name" type="text" value="<?php echo getPost('last_name', '');?>"/>
                    <?php if ($error = $context->getError('last_name')) { ?>
                    <div class="errorMessage" style="display: block;"><?php echo $error;?></div>
                    <?php } ?>
                </div>
                <div class="clearfix"><!-- --></div>   
                <div class="form-group col-lg-6">
                    <label class="required">Email <span class="required">*</span></label>
                    <input placeholder="Market place registered email" class="form-control has-help-text<?php echo $context->getError('email') ? ' error':'';?>" name="email" type="text" value="<?php echo getPost('email', '');?>"/>
                    <?php if ($error = $context->getError('email')) { ?>
                    <div class="errorMessage" style="display: block;"><?php echo $error;?></div>
                    <?php } ?>
                </div>
                <div class="form-group col-lg-6">
                    <label class="required">I bought the license from: <span class="required">*</span></label>
                    <select class="form-control has-help-text<?php echo $context->getError('market_place') ? ' error':'';?>" name="market_place">
                    <?php foreach ($marketPlaces as $marketPlace => $marketPlaceName) { ?>
                    <option value="<?php echo $marketPlace?>"<?php echo getPost('market_place', '') == $marketPlace ? ' selected="selected"':'';?>><?php echo $marketPlaceName;?></option>
                    <?php } ?>
                    </select>
                    <?php if ($error = $context->getError('market_place')) { ?>
                    <div class="errorMessage" style="display: block;"><?php echo $error;?></div>
                    <?php } ?>
                </div>
                <div class="clearfix"><!-- --></div>   
                <div class="form-group col-lg-6">
                    <label class="required">Purchase code <span class="required">*</span></label>
                    <input placeholder="Your purchase code" class="form-control has-help-text<?php echo $context->getError('purchase_code') ? ' error':'';?>" name="purchase_code" type="text" value="<?php echo getPost('purchase_code', '');?>"/>
                    <?php if ($error = $context->getError('purchase_code')) { ?>
                    <div class="errorMessage" style="display: block;"><?php echo $error;?></div>
                    <?php } ?>
                </div>
            </div>
            <div class="clearfix"><!-- --></div>      
        </div>
        <div class="box-footer">
            <div class="pull-right">
                <button class="btn btn-default btn-submit" data-loading-text="Please wait, processing..." value="1" name="next">Next</button>
            </div>
            <div class="clearfix"><!-- --></div>        
        </div>
    </div>
</form>