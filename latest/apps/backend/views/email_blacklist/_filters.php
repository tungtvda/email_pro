<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 *
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.3.6.3
 */
?>


<?php $form = $this->beginWidget('CActiveForm', array(
    'id'          => 'filters-form',
    'method'      => 'get',
    'action'      => $this->createUrl($this->route),
    'htmlOptions' => array(
        'style'        => 'display:' . ($filter->hasSetFilters ? 'block' : 'none'),
        'data-confirm' => Yii::t('email_blacklist', 'Are you sure you want to run this action?')
    ),
));?>
    <hr />
    <div class="box box-primary">
        <div class="box-header">
            <div class="pull-left">
                <h3 class="box-title"><span class="glyphicon glyphicon-filter"><!-- --></span> <?php echo Yii::t('email_blacklist', 'Filters');?></h3>
            </div>
            <div class="clearfix"><!-- --></div>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-hover table-striped">
                <tr>
                    <td>
                        <div class="form-group">
                            <?php echo $form->labelEx($filter, 'email');?>
                            <?php echo $form->textField($filter, 'email', $filter->getHtmlOptions('email', array('name' => 'email'))); ?>
                            <?php echo $form->error($filter, 'email');?>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <?php echo $form->labelEx($filter, 'reason');?>
                            <?php echo $form->textField($filter, 'reason', $filter->getHtmlOptions('reason', array('name' => 'reason'))); ?>
                            <?php echo $form->error($filter, 'reason');?>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <?php echo $form->labelEx($filter, 'date_start');?>
                            <?php
                            $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                'model'     => $filter,
                                'attribute' => 'date_start',
                                'language'  => $filter->getDatePickerLanguage(),
                                'cssFile'   => null,
                                'options'   => array(
                                    'showAnim'      => 'fold',
                                    'dateFormat'    => $filter->getDatePickerFormat(),
                                ),
                                'htmlOptions'=>$filter->getHtmlOptions('date_start', array('name' => 'date_start')),
                            ));
                            ?>
                            <?php echo $form->error($filter, 'date_start');?>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <?php echo $form->labelEx($filter, 'date_end');?>
                            <?php
                            $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                'model'     => $filter,
                                'attribute' => 'date_end',
                                'language'  => $filter->getDatePickerLanguage(),
                                'cssFile'   => null,
                                'options'   => array(
                                    'showAnim'      => 'fold',
                                    'dateFormat'    => $filter->getDatePickerFormat(),
                                ),
                                'htmlOptions'=>$filter->getHtmlOptions('date_end', array('name' => 'date_end')),
                            ));
                            ?>
                            <?php echo $form->error($filter, 'date_end');?>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <?php echo $form->labelEx($filter, 'action');?>
                            <?php echo $form->dropDownList($filter, 'action', $filter->getActionsList(), $filter->getHtmlOptions('action', array('name' => 'action'))); ?>
                            <?php echo $form->error($filter, 'action');?>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="box-footer">
            <div class="pull-right">
                <?php echo CHtml::submitButton(Yii::t('email_blacklist', 'Submit'), array('name' => '', 'class' => 'btn btn-primary'));?>
            </div>
            <div class="clearfix"><!-- --></div>
        </div>
    </div>
<?php $this->endWidget(); ?>