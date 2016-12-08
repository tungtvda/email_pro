<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.3.3.1
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
                    <span class="glyphicon glyphicon-credit-card"></span> <?php echo $pageHeading;?>
                </h3>
            </div>
            <div class="pull-right">
                <?php echo HtmlHelper::accessLink(Yii::t('app', 'Create new'), array('orders/create'), array('class' => 'btn btn-primary btn-xs', 'title' => Yii::t('app', 'Create new')));?>
                <?php echo HtmlHelper::accessLink(Yii::t('app', 'Refresh'), array('orders/index'), array('class' => 'btn btn-primary btn-xs', 'title' => Yii::t('app', 'Refresh')));?>
            </div>
            <div class="clearfix"><!-- --></div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
            <?php 
            /**
             * This hook gives a chance to prepend content or to replace the default grid view content with a custom content.
             * Please note that from inside the action callback you can access all the controller view
             * variables via {@CAttributeCollection $collection->controller->data}
             * In case the content is replaced, make sure to set {@CAttributeCollection $collection->renderGrid} to false 
             * in order to stop rendering the default content.
             * @since 1.3.3.1
             */
            $hooks->doAction('before_grid_view', $collection = new CAttributeCollection(array(
                'controller'    => $this,
                'renderGrid'    => true,
            )));
            
            // and render if allowed
            if ($collection->renderGrid) {
                $this->widget('zii.widgets.grid.CGridView', $hooks->applyFilters('grid_view_properties', array(
                    'ajaxUrl'           => $this->createUrl($this->route),
                    'id'                => $order->modelName.'-grid',
                    'dataProvider'      => $order->search(),
                    'filter'            => $order,
                    'filterPosition'    => 'body',
                    'filterCssClass'    => 'grid-filter-cell',
                    'itemsCssClass'     => 'table table-bordered table-hover table-striped',
                    'selectableRows'    => 0,
                    'enableSorting'     => false,
                    'cssFile'           => false,
                    'pagerCssClass'     => 'pagination pull-right',
                    'pager'             => array(
                        'class'         => 'CLinkPager',
                        'cssFile'       => false,
                        'header'        => false,
                        'htmlOptions'   => array('class' => 'pagination')
                    ),
                    'columns' => $hooks->applyFilters('grid_view_columns', array(
                        array(
                            'name'  => 'order_uid',
                            'value' => 'CHtml::link($data->uid, Yii::app()->createUrl("orders/update", array("id" => $data->order_id)))',
                            'type'  => 'raw',
                        ),
                        array(
                            'name'  => 'customer_id',
                            'value' => 'CHtml::link($data->customer->getFullName(), Yii::app()->createUrl("customers/update", array("id" => $data->customer_id)))',
                            'type'  => 'raw',
                        ),
                        array(
                            'name'  => 'plan_id',
                            'value' => 'CHtml::link($data->plan->name, Yii::app()->createUrl("price_plans/update", array("id" => $data->plan_id)))',
                            'type'  => 'raw',
                        ),
                        array(
                            'name'  => 'promo_code_id',
                            'value' => '!empty($data->promo_code_id) ? CHtml::link($data->promoCode->code, Yii::app()->createUrl("promo_codes/update", array("id" => $data->promo_code_id))) : "-"',
                            'type'  => 'raw',
                        ),
                        array(
                            'name'  => 'subtotal',
                            'value' => '$data->formattedSubtotal',
                        ),
                        array(
                            'name'  => 'tax_id',
                            'value' => '!empty($data->tax_id) ? $data->tax->name : "---"',
                        ),
                        array(
                            'name'  => 'tax_percent',
                            'value' => '$data->formattedTaxPercent',
                        ),
                        array(
                            'name'  => 'tax_value',
                            'value' => '$data->formattedTaxValue',
                        ),
                        array(
                            'name'  => 'discount',
                            'value' => '$data->formattedDiscount',
                        ),
                        array(
                            'name'  => 'total',
                            'value' => '$data->formattedTotal',
                        ),
                        array(
                            'name'  => 'status',
                            'value' => '$data->getStatusName()',
                            'filter'=> $order->getStatusesList(),
                        ),
                        array(
                            'name'  => 'date_added',
                            'value' => '$data->dateAdded',
                            'filter'=> false,
                        ),
                        array(
                            'class'     => 'CButtonColumn',
                            'header'    => Yii::t('app', 'Options'),
                            'footer'    => $order->paginationOptions->getGridFooterPagination(),
                            'buttons'   => array(
                                'view' => array(
                                    'label'     => ' &nbsp; <span class="glyphicon glyphicon-eye-open"></span> &nbsp;', 
                                    'url'       => 'Yii::app()->createUrl("orders/view", array("id" => $data->order_id))',
                                    'imageUrl'  => null,
                                    'options'   => array('title' => Yii::t('app', 'View'), 'class' => ''),
                                    'visible'   => 'AccessHelper::hasRouteAccess("orders/view")',
                                ),
                                'update' => array(
                                    'label'     => ' &nbsp; <span class="glyphicon glyphicon-pencil"></span> &nbsp;', 
                                    'url'       => 'Yii::app()->createUrl("orders/update", array("id" => $data->order_id))',
                                    'imageUrl'  => null,
                                    'options'   => array('title' => Yii::t('app', 'Update'), 'class' => ''),
                                    'visible'   => 'AccessHelper::hasRouteAccess("orders/update")',
                                ),
                                'delete' => array(
                                    'label'     => ' &nbsp; <span class="glyphicon glyphicon-remove-circle"></span> &nbsp; ', 
                                    'url'       => 'Yii::app()->createUrl("orders/delete", array("id" => $data->order_id))',
                                    'imageUrl'  => null,
                                    'options'   => array('title' => Yii::t('app', 'Delete'), 'class' => 'delete'),
                                    'visible'   => 'AccessHelper::hasRouteAccess("orders/delete")',
                                ),    
                            ),
                            'htmlOptions' => array(
                                'style' => 'width:100px;',
                            ),
                            'template' => '{view} {update} {delete}'
                        ),
                    ), $this),
                ), $this));  
            }
            /**
             * This hook gives a chance to append content after the grid view content.
             * Please note that from inside the action callback you can access all the controller view
             * variables via {@CAttributeCollection $collection->controller->data}
             * @since 1.3.3.1
             */
            $hooks->doAction('after_grid_view', new CAttributeCollection(array(
                'controller'    => $this,
                'renderedGrid'  => $collection->renderGrid,
            )));
            ?>
            <div class="clearfix"><!-- --></div>
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