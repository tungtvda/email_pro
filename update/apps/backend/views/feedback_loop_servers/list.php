<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
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
                    <span class="glyphicon glyphicon-transfer"></span> <?php echo Yii::t('servers', 'Feedback loop servers');?>
                </h3>
            </div>
            <div class="pull-right">
                <?php echo HtmlHelper::accessLink(Yii::t('app', 'Create new'), array('feedback_loop_servers/create'), array('class' => 'btn btn-primary btn-xs', 'title' => Yii::t('app', 'Create new')));?>
                <?php echo HtmlHelper::accessLink(Yii::t('app', 'Refresh'), array('feedback_loop_servers/index'), array('class' => 'btn btn-primary btn-xs', 'title' => Yii::t('app', 'Refresh')));?>
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
                'controller'  => $this,
                'renderGrid'  => true,
            )));
            
            // and render if allowed
            if ($collection->renderGrid) {
                // since 1.3.5.4
                if (AccessHelper::hasRouteAccess('feedback_loop_servers/bulk_action')) { 
                    $this->widget('common.components.web.widgets.GridViewBulkAction', array(
                        'model'      => $server,
                        'formAction' => $this->createUrl('feedback_loop_servers/bulk_action'),
                    ));
                }
                $this->widget('zii.widgets.grid.CGridView', $hooks->applyFilters('grid_view_properties', array(
                    'ajaxUrl'           => $this->createUrl($this->route),
                    'id'                => $server->modelName.'-grid',
                    'dataProvider'      => $server->search(),
                    'filter'            => $server,
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
                            'class'               => 'CCheckBoxColumn',
                            'name'                => 'server_id',
                            'selectableRows'      => 100,  
                            'checkBoxHtmlOptions' => array('name' => 'bulk_item[]'),
                            'visible'             => AccessHelper::hasRouteAccess('feedback_loop_servers/bulk_action'),
                        ),
                        array(
                            'name'  => 'customer_id',
                            'value' => '!empty($data->customer) ? $data->customer->getFullName() : Yii::t("app", "System")',
                            'filter'=> CHtml::activeTextField($server, 'customer_id'),
                        ),
                        array(
                            'name'  => 'hostname',
                            'value' => 'CHtml::link($data->hostname, Yii::app()->createUrl("feedback_loop_servers/update", array("id" => $data->server_id)))',
                            'type'  => 'raw',
                        ),
                        array(
                            'name'  => 'username',
                            'value' => '$data->username',
                        ),
                        array(
                            'name'  => 'service',
                            'value' => '$data->serviceName',
                            'filter'=> $server->getServicesArray(),
                        ),
                        
                        array(
                            'name'  => 'port',
                            'value' => '$data->port',
                        ),
                        array(
                            'name'  => 'protocol',
                            'value' => '$data->protocolName',
                            'filter'=> $server->getProtocolsArray(),
                        ),
                        array(
                            'name'  => 'status',
                            'value' => 'ucfirst(Yii::t("app", $data->status))',
                            'filter'=> $server->getStatusesList(),
                        ),
                        array(
                            'class'     => 'CButtonColumn',
                            'header'    => Yii::t('app', 'Options'),
                            'footer'    => $server->paginationOptions->getGridFooterPagination(),
                            'buttons'   => array(
                                'update' => array(
                                    'label'     => ' &nbsp; <span class="glyphicon glyphicon-pencil"></span> &nbsp;', 
                                    'url'       => 'Yii::app()->createUrl("feedback_loop_servers/update", array("id" => $data->server_id))',
                                    'imageUrl'  => null,
                                    'options'   => array('title' => Yii::t('app', 'Update'), 'class' => ''),
                                    'visible'   => 'AccessHelper::hasRouteAccess("feedback_loop_servers/update")',
                                ),
                                'copy'=> array(
                                    'label'     => ' &nbsp; <span class="glyphicon glyphicon-subtitles"></span> &nbsp;', 
                                    'url'       => 'Yii::app()->createUrl("feedback_loop_servers/copy", array("id" => $data->server_id))',
                                    'imageUrl'  => null,
                                    'options'   => array('title' => Yii::t('app', 'Copy'), 'class' => 'copy-server'),
                                    'visible'   => 'AccessHelper::hasRouteAccess("feedback_loop_servers/copy")',
                                ),
                                'enable'=> array(
                                    'label'     => ' &nbsp; <span class="glyphicon glyphicon-open"></span> &nbsp;', 
                                    'url'       => 'Yii::app()->createUrl("feedback_loop_servers/enable", array("id" => $data->server_id))',
                                    'imageUrl'  => null,
                                    'options'   => array('title' => Yii::t('app', 'Enable'), 'class' => 'enable-server'),
                                    'visible'   => 'AccessHelper::hasRouteAccess("feedback_loop_servers/enable") && $data->getIsDisabled()',
                                ),
                                'disable'=> array(
                                    'label'     => ' &nbsp; <span class="glyphicon glyphicon-save"></span> &nbsp;', 
                                    'url'       => 'Yii::app()->createUrl("feedback_loop_servers/disable", array("id" => $data->server_id))',
                                    'imageUrl'  => null,
                                    'options'   => array('title' => Yii::t('app', 'Disable'), 'class' => 'disable-server'),
                                    'visible'   => 'AccessHelper::hasRouteAccess("feedback_loop_servers/disable") && $data->getIsActive()',
                                ),
                                'delete' => array(
                                    'label'     => ' &nbsp; <span class="glyphicon glyphicon-remove-circle"></span> &nbsp; ', 
                                    'url'       => 'Yii::app()->createUrl("feedback_loop_servers/delete", array("id" => $data->server_id))',
                                    'imageUrl'  => null,
                                    'options'   => array('title' => Yii::t('app', 'Delete'), 'class' => 'delete'),
                                    'visible'   => 'AccessHelper::hasRouteAccess("feedback_loop_servers/delete")',
                                ),    
                            ),
                            'htmlOptions' => array(
                                'style' => 'width:120px;',
                            ),
                            'template' => '{update} {copy} {enable} {disable} {delete}'
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
                'controller'  => $this,
                'renderedGrid'=> $collection->renderGrid,
            )));
            ?>
            <div class="clearfix"><!-- --></div>
            </div>    
        </div>
    </div>
    <div class="callout callout-info">
        <?php 
        $text = 'Please note, when adding a feedback loop server make sure the email address is used only for reading feedback email but nothing more.<br />
        This is important since the script that checks the bounced emails needs to read all the emails from the account you specify and beside it can be time and memory consuming, it will also delete all the emails from the email account.';
        echo Yii::t('servers', StringHelper::normalizeTranslationString($text));
        ?>
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