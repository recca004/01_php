<h1>Articles</h1>

<p>
    <a href="<?php echo SITE_URL; ?>">&lt; Retour aux articles</a>
</p>

<?php 
if( isset( $datas ) )
{
    ?>
        <article>
            <h2><a href="<?php echo SITE_URL; ?>/index.php?page=articles&action=show&id=<?php echo  $datas[ 'IdArticle' ]; ?>"><?php echo  $datas[ 'TitleArticle' ]; ?></a></h2>
            <p>
                <?php echo  $datas[ 'IntroArticle' ]; ?>
            </p>
            <p>
                <?php echo  $datas[ 'ContentArticle' ]; ?>
            </p>
        </article>
    <?php
}