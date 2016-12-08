<?php defined('MW_PATH') || exit('No direct script access allowed');

/**
 * This file is part of the Cyber Fision EMA application.
 * 
 * @package Cyber Fision EMA
 * @author Serban George Cristian <cristian.serban@Cyber Fision.com>
 * @link https://cyberfision.com/
 * @copyright 2013-2016 Cyber Fision EMA (http://www.Cyber Fision.com)
 * @license https://cyberfision.com/license/
 * @since 1.0
 */
 
?>

<div class="col-lg-12">
    <h1 class="page-heading">
        <?php echo $article->title;?>
    </h1>
    <hr />
    <?php echo $article->content;?>
    <hr />
    <?php 
    $this->widget('frontend.components.web.widgets.article.ArticleCategoriesWidget', array(
        'article' => $article,
    ));
    $this->widget('frontend.components.web.widgets.article.ArticleRelatedArticlesWidget', array(
        'article' => $article,
    ));
    ?>
</div>