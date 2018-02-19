<h1>Articles</h1>
<a href="<?php echo SITE_URL; ?>/index.php?page=articles&action=show">Ajouter un article</a>
<?php 
if( isset( $datas[ 'articles' ] ) )
{
    while( $row = $datas[ 'articles' ]->fetch_array() )
    {
    ?>
        <article>
            <h2><a href="<?php echo SITE_URL; ?>/index.php?page=articles&action=detail&id=<?php echo $row[ 'IdArticle' ]; ?>"><?php echo $row[ 'TitleArticle' ]; ?></a></h2>
            <p>
                <?php echo $row[ 'IntroArticle' ]; ?>
            </p>
            <p>
                <a href="<?php echo SITE_URL; ?>/index.php?page=articles&action=del&id=<?php echo $row[ 'IdArticle' ]; ?>">DEL article |</a></br>
                 <a href="<?php echo SITE_URL; ?>/index.php?page=articles&action=show&id=<?php echo $row[ 'IdArticle' ]; ?>"> Update article</a></br>
                
            </p>
        </article>
    <?php
    }
}