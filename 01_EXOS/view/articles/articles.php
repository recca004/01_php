<h1>Articles</h1>

<a href="<?php echo SITE_URL; ?>/index.php?page=articles&action=show">Ajouter un article</a>

<?php 
if( isset( $datas ) )
{
    foreach( $datas as $row )
    {
    ?>
        <article>
            <a href="<?php echo SITE_URL; ?>/index.php?page=articles&action=delete&id=<?php echo $row[ 'IdArticle' ]; ?>">Supprimer</a>
            <h2>
                <a href="<?php echo SITE_URL; ?>/index.php?page=articles&action=detail&id=<?php echo $row[ 'IdArticle' ]; ?>"><?php echo $row[ 'TitleArticle' ]; ?></a>
            </h2>
            <p>
                <?php echo $row[ 'IntroArticle' ]; ?>
            </p>
        </article>
    <?php
    }
}