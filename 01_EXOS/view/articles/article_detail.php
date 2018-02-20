<h1>Articles</h1>

<p><?php $Controller->get_backUrl(); ?></p>

<?php 
if( isset( $datas['articles'] ) )
{
    ?>
        <article>
            <h2><a href="<?php echo SITE_URL; ?>/index.php?page=articles&action=show&id=<?php echo  $datas['articles'][ 'IdArticle' ]; ?>"><?php echo  $datas['articles'][ 'TitleArticle' ]; ?></a></h2>
            <p>
                <?php echo  nl2br($datas['articles'][ 'IntroArticle' ]); ?>
            </p>
            <p>
                <?php echo  nl2br($datas['articles'][ 'ContentArticle' ]); ?>
            </p>
        </article>
    <?php
}