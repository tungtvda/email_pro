<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.3.4.6
 */

/**
 * This hook gives a chance to prepend content or to replace the default view content with a custom content.
 * Please note that from inside the action callback you can access all the controller view
 * variables via {@CAttributeCollection $collection->controller->data}
 * In case the content is replaced, make sure to set {@CAttributeCollection $collection->renderContent} to false 
 * in order to stop rendering the default content.
 * @since 1.3.3.1
 */
$hooks->doAction('views_before_content', $viewCollection = new CAttributeCollection(array(
    'controller'    => $this,
    'renderContent' => true,
)));

// and render if allowed
if ($viewCollection->renderContent) { ?>
    <div class="box box-primary">
        <div class="box-header">
    		<div class="pull-left">
                <h3 class="box-title"><i class="fa fa-envelope"></i> <?php echo $pageHeading;?></h3>
            </div>
    		<div class="pull-right">
    			<?php echo HtmlHelper::accessLink(Yii::t('app', 'Refresh'), array('transactional_emails/index'), array('class' => 'btn btn-primary btn-xs', 'title' => Yii::t('app', 'Refresh')));?>
    		</div>
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
            $hooks->doAction('views_before_grid', $collection = new CAttributeCollection(array(
                'controller'   => $this,
                'renderGrid'   => true,
            )));
            
            // and render if allowed
            if ($collection->renderGrid) {
                $this->widget('zii.widgets.grid.CGridView', $hooks->applyFilters('views_grid_properties', array(
                    'ajaxUrl'           => $this->createUrl($this->route),
                    'id'                => $email->modelName.'-grid',
                    'dataProvider'      => $email->search(),
                    'filter'            => $email,
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
                    'columns' => $hooks->applyFilters('views_grid_columns', array(
                        array(
                            'name'  => 'to_email',
                            'value' => '$data->to_email',
                        ),
                        array(
                            'name'  => 'to_name',
                            'value' => '$data->to_name',
                        ),
                        
                        array(
                            'name'  => 'reply_to_email',
                            'value' => '$data->reply_to_email',
                        ),
                        array(
                            'name'  => 'reply_to_name',
                            'value' => '$data->reply_to_name',
                        ),
                        array(
                            'name'  => 'from_email',
                            'value' => '$data->from_email',
                        ),
                        array(
                            'name'  => 'from_name',
                            'value' => '$data->from_name',
                        ),
                        array(
                            'name'  => 'subject',
                            'value' => '$data->subject',
                        ),
                        array(
                            'name'  => 'status',
                            'value' => '$data->statusName',
                            'filter'=> $email->getStatusesList(),
                        ),
                        array(
                            'name'  => 'send_at',
                            'value' => '$data->sendAt',
                            'filter'=> false,
                        ),
                        array(
                            'class'     => 'CButtonColumn',
                            'header'    => Yii::t('app', 'Options'),
                            'footer'    => $email->paginationOptions->getGridFooterPagination(),
                            'buttons'   => array(
                                'resend' => array(
                                    'label'     => ' &nbsp; <span class="glyphicon glyphicon-play-circle"></span> &nbsp; ', 
                                    'url'       => 'Yii::app()->createUrl("transactional_emails/resend", array("id" => $data->email_id))',
                                    'imageUrl'  => null,
                                    'options'   => array('title' => Yii::t('app', 'Resend')),
                                    'visible'   => '$data->status == TransactionalEmail::STATUS_SENT && AccessHelper::hasRouteAccess("transactional_emails/resend")',
                                ),
                                'preview' => array(
                                    'label'     => ' &nbsp; <span class="glyphicon glyphicon-eye-open"></span> &nbsp; ', 
                                    'url'       => 'Yii::app()->createUrl("transactional_emails/preview", array("id" => $data->email_id))',
                                    'imageUrl'  => null,
                                    'options'   => array('title' => Yii::t('app', 'Preview'), 'class' => 'preview-transactional-email', 'target' => '_blank'),
                                    'visible'   => 'AccessHelper::hasRouteAccess("transactional_emails/preview")',
                                ),
                                'delete' => array(
                                    'label'     => ' &nbsp; <span class="glyphicon glyphicon-remove-circle"></span> &nbsp; ', 
                                    'url'       => 'Yii::app()->createUrl("transactional_emails/delete", array("id" => $data->email_id))',
                                    'imageUrl'  => null,
                                    'options'   => array('title' => Yii::t('app', 'Delete'), 'class' => 'delete'),
                                    'visible'   => 'AccessHelper::hasRouteAccess("transactional_emails/delete")',
                                ),    
                            ),
                            'htmlOptions' => array(
                                'style' => 'width:100px;',
                            ),
                            'template' => '{resend} {preview} {delete}'
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
            $hooks->doAction('views_after_grid', new CAttributeCollection(array(
                'controller'   => $this,
                'renderedGrid' => $collection->renderGrid,
            )));
            ?>
            </div>   
            <div class="clearfix"><!-- --></div> 
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
$hooks->doAction('views_after_content', new CAttributeCollection(array(
    'controller'        => $this,
    'renderedContent'   => $viewCollection->renderContent,
)));