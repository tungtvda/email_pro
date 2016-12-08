<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 *
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.3.6.2
 */
?>


<?php echo CHtml::form($this->createUrl($this->route, array('list_uid' => $list->list_uid)), 'get', array(
    'id'    => 'campaigns-filters-form',
    'style' => 'display:' . (!empty($getFilterSet) ? 'block' : 'none') . ';',
));?>
<hr />
<div class="box box-primary">
    <div class="box-header">
        <div class="pull-left">
            <h3 class="box-title"><span class="glyphicon glyphicon-filter"><!-- --></span> <?php echo Yii::t('list_subscribers', 'Campaigns filters');?></h3>
        </div>
        <div class="pull-right">
            <?php echo CHtml::submitButton(Yii::t('list_subscribers', 'Set filters'), array('name' => 'submit', 'class' => 'btn btn-primary btn-xs'));?>
            <?php echo CHtml::link(Yii::t('list_subscribers', 'Reset filters'), array('list_subscribers/index', 'list_uid' => $list->list_uid), array('class' => 'btn btn-primary btn-xs', 'title' => Yii::t('list_subscribers', 'Reset filters')));?>
        </div>
        <div class="clearfix"><!-- --></div>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <td>
                    <label><?php echo Yii::t('list_subscribers', 'Show only subscribers that');?>:</label>
                    <?php echo CHtml::dropDownList('filter[campaigns][action]', $getFilter['campaigns']['action'], CMap::mergeArray(array('' => ''), $subscriber->getCampaignFilterActions()), array('class' => 'form-control'));?>
                </td>
                <td>
                    <label><?php echo Yii::t('list_subscribers', 'This campaign');?>:</label>
                    <?php echo CHtml::dropDownList('filter[campaigns][campaign]', $getFilter['campaigns']['campaign'], CMap::mergeArray(array('' => ''), $listCampaigns), array('class' => 'form-control'));?>
                </td>
                <td style="width:280px">
                    <label><?php echo Yii::t('list_subscribers', 'In the last');?>:</label>
                    <div class="input-group">
                        <?php echo CHtml::textField('filter[campaigns][atuc]', $getFilter['campaigns']['atuc'], array('class' => 'form-control', 'type' => 'number', 'placeholder' => 2));?>
                        <span class="input-group-addon">
                            <?php echo CHtml::dropDownList('filter[campaigns][atu]', $getFilter['campaigns']['atu'], $subscriber->getFilterTimeUnits(), array('class' => 'xform-control'));?>
                        </span>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
<?php echo CHtml::endForm();?>