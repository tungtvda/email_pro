<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * ArticleCategoriesWidget
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.0
 */
 
class ArticleCategoriesWidget extends CWidget
{
    public $article;
    
    public $except = array();
    
    public function run()
    {
        if (empty($this->article->activeCategories)) {
            return;
        }
        
        $categories = array();
        foreach ($this->article->categories as $category) {
            if (in_array($category->category_id, (array)$this->except)) {
                continue;
            }
            $url = Yii::app()->createUrl('articles/category', array('slug' => $category->slug));
            $categories[] = CHtml::link($category->name, $url, array('title' => $category->name));
        }
        
        if (empty($categories)) {
            return;
        }
        
        $this->render('categories', compact('categories'));
    }
}