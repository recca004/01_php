<h1>Articles</h1>
<<<<<<< HEAD
<a href="<?php echo SITE_URL; ?>/articles/show">Ajouter un article</a>
=======
<a href="<?php echo SITE_URL; ?>/index.php?page=articles&action=show">Ajouter un article</a>
>>>>>>> atelier2
<?php 
if( isset( $datas[ 'articles' ] ) )
{
    while( $row = $datas[ 'articles' ]->fetch_array() )
    {
    ?>
        <article>
            <h2><a href="<?php echo SITE_URL; ?>/articles/detail/<?php echo $row[ 'IdArticle' ]; ?>"><?php echo $row[ 'TitleArticle' ]; ?></a></h2>
            <p>
                <?php echo $row[ 'IntroArticle' ]; ?>
            </p>
            <p>
                <a href="<?php echo SITE_URL; ?>/articles/del/<?php echo $row[ 'IdArticle' ]; ?>">DEL article |</a></br>
                 <a href="<?php echo SITE_URL; ?>/articles/show/<?php echo $row[ 'IdArticle' ]; ?>"> Update article</a></br>
                
            </p>
        </article>
    <?php
    }
}