<h1>Articles</h1>

<p><?php $Controller->get_backUrl(); ?></p>

<?php 
if( isset( $datas ) )
{
    ?>
        <article>
            <h2><a href="<?php echo SITE_URL; ?>/index.php?page=articles&action=show&id=<?php echo  $datas[ 'IdArticle' ]; ?>"><?php echo  $datas[ 'TitleArticle' ]; ?></a></h2>
            <p>
                <?php echo  nl2br($datas[ 'IntroArticle' ]); ?>
            </p>
            <p>
                <?php echo  nl2br($datas[ 'ContentArticle' ]); ?>
            </p>
        </article>
    <?php
}