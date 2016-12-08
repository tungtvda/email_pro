<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.2
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
                    <span class="glyphicon glyphicon-map-marker"></span> <?php echo Yii::t('ip_location', 'Ip location services');?>
                </h3>
            </div>
            <div class="pull-right">
                <?php echo HtmlHelper::accessLink(Yii::t('app', 'Refresh'), array('ip_location_services/index'), array('class' => 'btn btn-primary btn-xs', 'title' => Yii::t('app', 'Refresh')));?>
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
                    'id'                => $model->modelName . '-grid',
                    'dataProvider'      => $model->getDataProvider(),
                    'filter'            => null,
                    'filterPosition'    => 'body',
                    'filterCssClass'    => 'grid-filter-cell',
                    'itemsCssClass'     => 'table table-bordered table-hover table-striped',
                    'selectableRows'    => 0,
                    'enableSorting'     => false,
                    'cssFile'           => false,
                    'pager'             => false,
                    'columns' => $hooks->applyFilters('grid_view_columns', array(
                        array(
                            'name'  => Yii::t('ip_location', 'Name'),
                            'value' => '$data["name"]',
                            'type'  => 'raw',
                        ),
                        array(
                            'name'  => Yii::t('ip_location', 'Description'),
                            'value' => '$data["description"]',
                        ),
                        array(
                            'name'  => Yii::t('ip_location', 'Status'),
                            'value' => '$data["status"]',
                        ),
                        array(
                            'name'  => Yii::t('ip_location', 'Sort order'),
                            'value' => '$data["sort_order"]',
                        ),
                        array(
                            'class'     => 'CButtonColumn',
                            'header'    => Yii::t('app', 'Options'),
                            'buttons'   => array(
                                'page' => array(
                                    'label'     => '<i class="glyphicon glyphicon-eye-open"></i>', 
                                    'url'       => '$data["page_url"]',
                                    'imageUrl'  => null,
                                    'options'   => array('title' => Yii::t('ip_location', 'Service detail page'), 'class'=>'btn btn-xs'),
                                    'visible'   => '!empty($data["page_url"])',
                                ),  
                            ),
                            'htmlOptions' => array(
                                'style' => 'width:50px;',
                            ),
                            'template' => '{page}'
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
    <div class="callout callout-info">
        <?php echo Yii::t('ip_location', 'Ip location services are used to collect location data(country, zone, city) when subscribers open the email campaigns or when they click on a trackable url, etc.');?>
        <br />   
        <?php echo Yii::t('ip_location', 'This data is then used in campaign reports to show you the exact location where the email campaign has been opened or the location from where the subscriber clicked a link from within the campaign.');?>  
        <br />   
        <?php echo Yii::t('ip_location', 'Please note, data accuracy will vary between the services. You should test the service website before enable.');?>        
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