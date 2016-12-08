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

<div class="col-lg-12 related-articles">
    <h4><?php echo Yii::t('articles', 'Related articles');?></h4>
    <?php foreach ($columns as $index => $articles) { ?>
    <div class="column <?php echo $this->columnsCssClass;?>">
        <?php foreach ($articles as $article) { ?>
            <div class="article">
                <div class="title"><?php echo CHtml::link(StringHelper::truncateLength($article->title, 30), Yii::app()->createUrl('articles/view', array('slug' => $article->slug)), array('title' => $article->title)); ?></div>
                <div class="excerpt"><?php echo $article->getExcerpt((int)$this->excerptLength); ?></div>
            </div>
        <?php } ?>    
    </div>
    <?php } ?>
</div>