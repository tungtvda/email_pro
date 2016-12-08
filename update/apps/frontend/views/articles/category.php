<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link http://www.CyberFision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license http://www.CyberFision.com/license/
 * @since 1.0
 */
 
?>

<div class="col-lg-12 list-articles">
    <h1 class="page-heading">
        <?php echo $category->name;?> <small><?php echo Yii::t('articles', 'All articles filled in under this category');?></small>
    </h1>
    <hr />

    <?php if (!empty($articles)) { foreach ($articles as $article) { ?>
    <div class="article">
        <div class="title"><?php echo CHtml::link($article->title, Yii::app()->createUrl('articles/view', array('slug' => $article->slug)), array('title' => $article->title)); ?></div>
        <div class="excerpt"><?php echo $article->getExcerpt(500); ?></div>
        <div class="categories pull-right">
        <?php 
        $this->widget('frontend.components.web.widgets.article.ArticleCategoriesWidget', array(
            'article'   => $article,
            'except'    => array($category->category_id),
        ));
        ?>
        </div>
        <div class="clearfix"><!-- --></div>
    </div>
    <?php } ?>
    <hr />
    <div class="pull-right">
    <?php $this->widget('CLinkPager', array(
        'pages'         => $pages,
        'htmlOptions'   => array('class' => 'pagination'),
        'header'        => false,
        'cssFile'       => false                
    )); ?>
    </div>
    <div class="clearfix"><!-- --></div>
    
    <?php } else { ?>
    <h4><?php echo Yii::t('articles', 'We\'re sorry, but this category doesn\'t have any published article yet!');?></h4>
    <?php } ?>
    
</div>