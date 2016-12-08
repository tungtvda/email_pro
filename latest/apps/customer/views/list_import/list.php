<?php defined('MW_PATH') || exit('No direct script access allowed');

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

/**
 * This hook gives a chance to prepend content or to replace the default view content with a custom content.
 * Please note that from inside the action callback you can access all the controller view
 * variables via {@CAttributeCollection $collection->controller->data}
 * In case the content is replaced, make sure to set {@CAttributeCollection $collection->renderContent} to false
 * in order to stop rendering the default content.
 * @since 1.3.3.1
 */
$hooks->doAction('before_view_file_content', $viewCollection = new CAttributeCollection(array(
    'controller'    => $this,
    'renderContent' => true,
)));

// and render if allowed
if ($viewCollection->renderContent) { ?>
    <div class="box box-primary">
        <div class="box-header">
            <div class="pull-left">
                <h3 class="box-title">
                    <span class="glyphicon glyphicon-import"></span> <?php echo $pageHeading;?>
                </h3>
            </div>
            <div class="pull-right">
                <?php echo CHtml::link(Yii::t('app', 'Cancel'), array('lists/overview', 'list_uid' => $list->list_uid), array('class' => 'btn btn-primary btn-xs', 'title' => Yii::t('app', 'Cancel')));?>
                <?php echo CHtml::link(Yii::t('app', 'Refresh'), array('list_import/index', 'list_uid' => $list->list_uid), array('class' => 'btn btn-primary btn-xs', 'title' => Yii::t('app', 'Refresh')));?>
            </div>
            <div class="clearfix"><!-- --></div>
        </div>
        <div class="box-body">

            <?php if (!empty($webEnabled)) { ?>
            <div class="col-lg-2 col-xs-6">
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3><?php echo Yii::t('list_import', 'CSV');?></h3>
                        <p><?php echo Yii::t('app', 'File (live import)');?></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios7-upload"></i>
                    </div>
                    <div class="small-box-footer">
                        <div class="pull-left">
                            &nbsp; <a href="#csv-upload-modal" data-toggle="modal" class="btn bg-orange btn-flat btn-xs btn-csv-import"><span class="glyphicon glyphicon-import"></span> <?php echo Yii::t('list_import', 'Select file to import');?></a>
                        </div>
                        <div class="clearfix"><!-- --></div>
                    </div>
                </div>
            </div>
            <?php } ?>

            <?php if (!empty($cliEnabled)) {?>
            <div class="col-lg-2 col-xs-6">
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3><?php echo Yii::t('list_import', 'CSV');?></h3>
                        <p><?php echo Yii::t('app', 'File (queue import)');?></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios7-upload"></i>
                    </div>
                    <div class="small-box-footer">
                        <div class="pull-left">
                            &nbsp; <a href="#csv-queue-upload-modal" data-toggle="modal" class="btn bg-orange btn-flat btn-xs btn-csv-import"><span class="glyphicon glyphicon-import"></span> <?php echo Yii::t('list_import', 'Select file to import');?></a>
                        </div>
                        <div class="clearfix"><!-- --></div>
                    </div>
                </div>
            </div>
            <?php } ?>

            <?php if (!empty($webEnabled)) { ?>
            <div class="col-lg-2 col-xs-6">
                <div class="small-box bg-purple">
                    <div class="inner">
                        <h3><?php echo Yii::t('list_import', 'Text');?></h3>
                        <p><?php echo Yii::t('app', 'File (live import)');?></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios7-upload"></i>
                    </div>
                    <div class="small-box-footer">
                        <div class="pull-left">
                            &nbsp; <a href="#text-upload-modal" data-toggle="modal" class="btn bg-purple btn-flat btn-xs btn-text-import"><span class="glyphicon glyphicon-import"></span> <?php echo Yii::t('list_import', 'Select file to import');?></a>
                        </div>
                        <div class="clearfix"><!-- --></div>
                    </div>
                </div>
            </div>
            <?php } ?>

            <?php if (!empty($cliEnabled)) {?>
            <div class="col-lg-2 col-xs-6">
                <div class="small-box bg-purple">
                    <div class="inner">
                        <h3><?php echo Yii::t('list_import', 'Text');?></h3>
                        <p><?php echo Yii::t('app', 'File (queue import)');?></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios7-upload"></i>
                    </div>
                    <div class="small-box-footer">
                        <div class="pull-left">
                            &nbsp; <a href="#text-queue-upload-modal" data-toggle="modal" class="btn bg-purple btn-flat btn-xs btn-text-import"><span class="glyphicon glyphicon-import"></span> <?php echo Yii::t('list_import', 'Select file to import');?></a>
                        </div>
                        <div class="clearfix"><!-- --></div>
                    </div>
                </div>
            </div>
            <?php } ?>

            <div class="col-lg-2 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo Yii::t('list_import', 'Database');?></h3>
                        <p><?php echo Yii::t('app', 'Sql import (live import)');?></p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios7-upload"></i>
                    </div>
                    <div class="small-box-footer">
                        <div class="pull-left">
                            &nbsp; <a href="#database-import-modal" data-toggle="modal" class="btn bg-red btn-flat btn-xs btn-database-import"><span class="glyphicon glyphicon-import"></span> <?php echo Yii::t('list_import', 'Enter details');?></a>
                        </div>
                        <div class="clearfix"><!-- --></div>
                    </div>
                </div>
            </div>
            <div class="clearfix"><!-- --></div>
        </div>
        <div class="box-footer"></div>
    </div>

    <?php if (!empty($webEnabled)) { ?>
    <div class="modal fade" id="csv-upload-modal" tabindex="-1" role="dialog" aria-labelledby="csv-upload-modal-label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title"><?php echo Yii::t('list_import', 'Import from CSV file');?></h4>
            </div>
            <div class="modal-body">
                 <div class="callout callout-info">
                    <?php
                    $text = 'Please note, we only accept valid CSV files that contain a header, that is the column names for the data to be imported.<br />
                     We also have a limit on the file size you are allowed to upload, that is {uploadLimit}.<br />
                     The import process might fail with some of the files, mainly because these are not correctly formatted or they contain invalid data.<br />
                     You should first do a test import(in a test list) and see if that goes as planned then do it for your actual list.<br />
                     <strong>Important</strong>: The CSV file column names will be used to create the list TAGS, if a tag does not exist, it will be created.<br />
                     You can also click <a href="{exampleArchiveHref}" target="_blank">here</a> to see a csv file example.';
                    echo Yii::t('list_import', StringHelper::normalizeTranslationString($text), array(
                        '{uploadLimit}'         => $maxUploadSize . 'MB',
                        '{exampleArchiveHref}'  => Yii::app()->apps->getAppUrl('customer', 'assets/files/example-csv-import.csv', false, true),
                    ));
                    ?>
                 </div>
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'action'        => array('list_import/csv', 'list_uid' => $list->list_uid),
                    'htmlOptions'   => array(
                        'id'        => 'upload-csv-form',
                        'enctype'   => 'multipart/form-data'
                    ),
                ));
                ?>
                <div class="form-group">
                    <?php echo $form->labelEx($importCsv, 'file');?>
                    <?php echo $form->fileField($importCsv, 'file', $importCsv->getHtmlOptions('file')); ?>
                    <?php echo $form->error($importCsv, 'file');?>
                </div>
                <?php $this->endWidget(); ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo Yii::t('app', 'Close');?></button>
              <button type="button" class="btn btn-primary btn-submit" data-loading-text="<?php echo Yii::t('app', 'Please wait, processing...');?>" onclick="$('#upload-csv-form').submit();"><?php echo Yii::t('list_import', 'Upload file')?></button>
            </div>
          </div>
        </div>
    </div>
    <?php } ?>

    <?php if (!empty($cliEnabled)) { ?>
    <div class="modal fade" id="csv-queue-upload-modal" tabindex="-1" role="dialog" aria-labelledby="csv-queue-upload-modal-label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title"><?php echo Yii::t('list_import', 'Import from CSV file');?></h4>
            </div>
            <div class="modal-body">
                 <div class="callout callout-info">
                    <?php
                    $text = 'Please note, we only accept valid CSV files that contain a header, that is the column names for the data to be imported.<br />
                     We also have a limit on the file size you are allowed to upload, that is {uploadLimit}.<br />
                     The import process might fail with some of the files, mainly because these are not correctly formatted or they contain invalid data.<br />
                     You should first do a test import(in a test list) and see if that goes as planned then do it for your actual list.<br />
                     <strong>Important</strong>: The CSV file column names will be used to create the list TAGS, if a tag does not exist, it will be created.<br />
                     You can also click <a href="{exampleArchiveHref}" target="_blank">here</a> to see a csv file example.';
                    echo Yii::t('list_import', StringHelper::normalizeTranslationString($text), array(
                        '{uploadLimit}'         => $maxUploadSize . 'MB',
                        '{exampleArchiveHref}'  => Yii::app()->apps->getAppUrl('customer', 'assets/files/example-csv-import.csv', false, true),
                    ));
                    ?>
                 </div>
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'action'        => array('list_import/csv_queue', 'list_uid' => $list->list_uid),
                    'htmlOptions'   => array(
                        'id'        => 'upload-csv-queue-form',
                        'enctype'   => 'multipart/form-data'
                    ),
                ));
                ?>
                <div class="form-group">
                    <?php echo $form->labelEx($importCsv, 'file');?>
                    <?php echo $form->fileField($importCsv, 'file', $importCsv->getHtmlOptions('file')); ?>
                    <?php echo $form->error($importCsv, 'file');?>
                </div>
                <?php $this->endWidget(); ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo Yii::t('app', 'Close');?></button>
              <button type="button" class="btn btn-primary btn-submit" data-loading-text="<?php echo Yii::t('app', 'Please wait, processing...');?>" onclick="$('#upload-csv-queue-form').submit();"><?php echo Yii::t('list_import', 'Upload file')?></button>
            </div>
          </div>
        </div>
    </div>
    <?php } ?>

    <?php if (!empty($webEnabled)) { ?>
    <div class="modal fade" id="text-upload-modal" tabindex="-1" role="dialog" aria-labelledby="text-upload-modal-label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title"><?php echo Yii::t('list_import', 'Import from text file');?></h4>
            </div>
            <div class="modal-body">
                 <div class="callout callout-info">
                    <?php
                    $text = '
                    Please note that you should list each email address on a separate line in your text file.<br />
                    You can also click <a href="{exampleArchiveHref}" target="_blank">here</a> to see a text file example.<br />
                    We also have a limit on the file size you are allowed to upload, that is {uploadLimit}.';
                    echo Yii::t('list_import', StringHelper::normalizeTranslationString($text), array(
                        '{uploadLimit}'         => $maxUploadSize . 'MB',
                        '{exampleArchiveHref}'  => Yii::app()->apps->getAppUrl('customer', 'assets/files/example-text-import.txt', false, true),
                    ));
                    ?>
                 </div>
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'action'        => array('list_import/text', 'list_uid' => $list->list_uid),
                    'htmlOptions'   => array(
                        'id'        => 'upload-text-form',
                        'enctype'   => 'multipart/form-data'
                    ),
                ));
                ?>
                <div class="form-group">
                    <?php echo $form->labelEx($importText, 'file');?>
                    <?php echo $form->fileField($importText, 'file', $importText->getHtmlOptions('file')); ?>
                    <?php echo $form->error($importText, 'file');?>
                </div>
                <?php $this->endWidget(); ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo Yii::t('app', 'Close');?></button>
              <button type="button" class="btn btn-primary btn-submit" data-loading-text="<?php echo Yii::t('app', 'Please wait, processing...');?>" onclick="$('#upload-text-form').submit();"><?php echo Yii::t('list_import', 'Upload file')?></button>
            </div>
          </div>
        </div>
    </div>
    <?php } ?>

    <?php if (!empty($cliEnabled)) { ?>
    <div class="modal fade" id="text-queue-upload-modal" tabindex="-1" role="dialog" aria-labelledby="text-queue-upload-modal-label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title"><?php echo Yii::t('list_import', 'Import from text file');?></h4>
            </div>
            <div class="modal-body">
                 <div class="callout callout-info">
                    <?php
                    $text = '
                    Please note that you should list each email address on a separate line in your text file.<br />
                    You can also click <a href="{exampleArchiveHref}" target="_blank">here</a> to see a text file example.<br />
                    We also have a limit on the file size you are allowed to upload, that is {uploadLimit}.';
                    echo Yii::t('list_import', StringHelper::normalizeTranslationString($text), array(
                        '{uploadLimit}'         => $maxUploadSize . 'MB',
                        '{exampleArchiveHref}'  => Yii::app()->apps->getAppUrl('customer', 'assets/files/example-text-import.txt', false, true),
                    ));
                    ?>
                 </div>
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'action'        => array('list_import/text_queue', 'list_uid' => $list->list_uid),
                    'htmlOptions'   => array(
                        'id'        => 'upload-text-queue-form',
                        'enctype'   => 'multipart/form-data'
                    ),
                ));
                ?>
                <div class="form-group">
                    <?php echo $form->labelEx($importText, 'file');?>
                    <?php echo $form->fileField($importText, 'file', $importText->getHtmlOptions('file')); ?>
                    <?php echo $form->error($importText, 'file');?>
                </div>
                <?php $this->endWidget(); ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo Yii::t('app', 'Close');?></button>
              <button type="button" class="btn btn-primary btn-submit" data-loading-text="<?php echo Yii::t('app', 'Please wait, processing...');?>" onclick="$('#upload-text-queue-form').submit();"><?php echo Yii::t('list_import', 'Upload file')?></button>
            </div>
          </div>
        </div>
    </div>
    <?php } ?>
    
    <div class="modal fade" id="database-import-modal" tabindex="-1" role="dialog" aria-labelledby="database-import-modal-label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title"><?php echo Yii::t('list_import', 'Import from external SQL database');?></h4>
            </div>
            <div class="modal-body">
                 <div class="callout callout-info">
                    <?php echo Yii::t('list_import', 'Please enter your credentials for the external database in order to start the import.');?>
                 </div>
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'action'        => array('list_import/database', 'list_uid' => $list->list_uid),
                    'htmlOptions'   => array(
                        'id'        => 'import-database-form',
                    ),
                ));
                ?>
                <div class="form-group col-lg-12">
                    <?php echo $form->labelEx($importDb, 'server_type');?>
                    <?php echo $form->dropDownList($importDb, 'server_type', $importDb->getServerTypes(), $importDb->getHtmlOptions('server_type')); ?>
                    <?php echo $form->error($importDb, 'server_type');?>
                </div>
                <div class="clearfix"><!-- --></div>
                <div class="form-group col-lg-6">
                    <?php echo $form->labelEx($importDb, 'hostname');?>
                    <?php echo $form->textField($importDb, 'hostname', $importDb->getHtmlOptions('hostname')); ?>
                    <?php echo $form->error($importDb, 'hostname');?>
                </div>
                <div class="form-group col-lg-6">
                    <?php echo $form->labelEx($importDb, 'port');?>
                    <?php echo $form->textField($importDb, 'port', $importDb->getHtmlOptions('port')); ?>
                    <?php echo $form->error($importDb, 'port');?>
                </div>
                <div class="clearfix"><!-- --></div>
                <div class="form-group col-lg-6">
                    <?php echo $form->labelEx($importDb, 'username');?>
                    <?php echo $form->textField($importDb, 'username', $importDb->getHtmlOptions('username')); ?>
                    <?php echo $form->error($importDb, 'username');?>
                </div>
                <div class="form-group col-lg-6">
                    <?php echo $form->labelEx($importDb, 'password');?>
                    <?php echo $form->textField($importDb, 'password', $importDb->getHtmlOptions('password')); ?>
                    <?php echo $form->error($importDb, 'password');?>
                </div>
                <div class="clearfix"><!-- --></div>
                <div class="form-group col-lg-6">
                    <?php echo $form->labelEx($importDb, 'database_name');?>
                    <?php echo $form->textField($importDb, 'database_name', $importDb->getHtmlOptions('database_name')); ?>
                    <?php echo $form->error($importDb, 'database_name');?>
                </div>
                <div class="form-group col-lg-6">
                    <?php echo $form->labelEx($importDb, 'table_name');?>
                    <?php echo $form->textField($importDb, 'table_name', $importDb->getHtmlOptions('table_name')); ?>
                    <?php echo $form->error($importDb, 'table_name');?>
                </div>
                <div class="clearfix"><!-- --></div>
                <div class="form-group col-lg-6">
                    <?php echo $form->labelEx($importDb, 'email_column');?>
                    <?php echo $form->textField($importDb, 'email_column', $importDb->getHtmlOptions('email_column')); ?>
                    <?php echo $form->error($importDb, 'email_column');?>
                </div>
                <div class="form-group col-lg-6">
                    <?php echo $form->labelEx($importDb, 'ignored_columns');?>
                    <?php echo $form->textField($importDb, 'ignored_columns', $importDb->getHtmlOptions('ignored_columns')); ?>
                    <?php echo $form->error($importDb, 'ignored_columns');?>
                </div>
                <div class="clearfix"><!-- --></div>
                <?php $this->endWidget(); ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo Yii::t('app', 'Close');?></button>
              <button type="button" class="btn btn-primary btn-submit" data-loading-text="<?php echo Yii::t('app', 'Please wait, processing...');?>" onclick="$('#import-database-form').submit();"><?php echo Yii::t('list_import', 'Connect and import')?></button>
            </div>
          </div>
        </div>
    </div>
<?php
}
/**
 * This hook gives a chance to append content after the view file default content.
 * Please note that from inside the action callback you can access all the controller view
 * variables via {@CAttributeCollection $collection->controller->data}
 * @since 1.3.3.1
 */
$hooks->doAction('after_view_file_content', new CAttributeCollection(array(
    'controller'        => $this,
    'renderedContent'   => $viewCollection->renderContent,
)));
