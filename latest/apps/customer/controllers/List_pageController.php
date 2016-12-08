<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * List_pageController
 *
 * Handles the actions for list pages related tasks
 *
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.0
 */

class List_pageController extends Controller
{
    /**
     * Handle the update action for a page type
     */
    public function actionIndex($list_uid, $type)
    {
        $list = $this->loadListModel($list_uid);

        $pageType = ListPageType::model()->findBySlug($type);
        if (empty($pageType)) {
            throw new CHttpException(404, Yii::t('app', 'This form type has been disabled!'));
        }

        $request = Yii::app()->request;
        $hooks   = Yii::app()->hooks;
        $notify  = Yii::app()->notify;

        $page = ListPage::model()->findByAttributes(array(
            'list_id' => $list->list_id,
            'type_id' => $pageType->type_id
        ));

        if (empty($page)) {
            $page = new ListPage();
            $page->list_id = $list->list_id;
            $page->type_id = $pageType->type_id;
        }

        if (empty($page->content)) {
            $page->content = $pageType->content;
        }

        $tags = $pageType->getAvailableTags(null, $list->list_id);

        if ($request->isPostRequest && ($attributes = (array)$request->getPost($page->modelName, array()))) {
            if (isset(Yii::app()->params['POST'][$page->modelName]['content'])) {
                $rawContent = Yii::app()->params['POST'][$page->modelName]['content'];
                if ($pageType->full_html === ListPage::TEXT_YES) {
                    $parser = new EmailTemplateParser();
                    // since 1.3.5.9 do not inline css anymore
                    // $parser->inlineCss = true;
                    $page->content = $parser->setContent($rawContent)->getContent();
                } else {
                    $page->content = Yii::app()->ioFilter->purify($rawContent);
                }
            }

            if ($page->save()) {
                $notify->addSuccess(Yii::t('app', 'Your form has been successfully saved!'));
            } else {
                $notify->addError(Yii::t('app', 'Your form contains errors, please correct them and try again.'));
            }

            Yii::app()->hooks->doAction('controller_action_save_data', $collection = new CAttributeCollection(array(
                'controller'=> $this,
                'success'   => $notify->hasSuccess,
                'list'      => $list,
                'page'      => $page,
                'pageType'  => $pageType
            )));

            if ($collection->success) {
                $this->redirect(array($this->route, 'list_uid' => $list->list_uid, 'type' => $pageType->slug));
            }
        }

        $this->data->list = $list;
        $this->data->pageType = $pageType;
        $page->fieldDecorator->onHtmlOptionsSetup = array($this, '_addEditorOptions');

        $this->setData(array(
            'pageMetaTitle'     => $this->data->pageMetaTitle . ' | ' . Yii::t('lists', 'Your mail list {formName}', array('{formName}' => CHtml::encode($pageType->name))),
            'pageHeading'       => Yii::t('lists', 'Mail list {formName}', array('{formName}' => CHtml::encode($pageType->name))),
            'pageBreadcrumbs'   => array(
                Yii::t('lists', 'Lists') => $this->createUrl('lists/index'),
                $list->name => $this->createUrl('lists/overview', array('list_uid' => $list->list_uid)),
                $pageType->name
            )
        ));

        $pageTypes = ListPageType::model()->findAll();

        $this->render($pageType->slug, compact('list', 'page', 'pageType', 'pageTypes', 'tags'));
    }

    /**
     * Callback method to setup the editor
     */
    public function _addEditorOptions(CEvent $event)
    {
        if (!in_array($event->params['attribute'], array('content'))) {
            return;
        }

        $options = array();
        if ($event->params['htmlOptions']->contains('wysiwyg_editor_options')) {
            $options = (array)$event->params['htmlOptions']->itemAt('wysiwyg_editor_options');
        }
        $options['id'] = CHtml::activeId($event->sender->owner, $event->params['attribute']);

        if ($event->params['attribute'] == 'content' && $this->data->pageType->full_html === ListPage::TEXT_YES) {
            $options['fullPage'] = true;
            $options['allowedContent'] = true;
            $options['height'] = 500;
        }

        $event->params['htmlOptions']->add('wysiwyg_editor_options', $options);
    }

    /**
     * Helper method to load the list AR model
     */
    public function loadListModel($list_uid)
    {
        $model = Lists::model()->findByAttributes(array(
            'list_uid'      => $list_uid,
            'customer_id'   => (int)Yii::app()->customer->getId(),
        ));

        if ($model === null) {
            throw new CHttpException(404, Yii::t('app', 'The requested page does not exist.'));
        }

        return $model;
    }
}
