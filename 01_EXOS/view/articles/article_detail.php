<h1>Articles</h1>
</br>
<p>
    <a href="<?php echo SITE_URL; ?>">&lt; Retour aux articles</a>
</p>

<?php 
if( isset( $datas[ 'article' ] ) )
{
    $row = $datas[ 'article' ]->fetch_array();
    ?>
        <article>
            <h2><a href="<?php echo SITE_URL; ?>/index.php?page=articles&action=details&id=<?php echo $row[ 'IdArticle' ]; ?>"><?php echo $row[ 'TitleArticle' ]; ?></a></h2>
            <p>
                
                <?php echo $row[ 'IntroArticle' ]; ?>
            </p>
            <p>
                <?php echo $row[ 'ContentArticle' ]; ?>
            </p>
            <a href="<?php echo SITE_URL; ?>/index.php?page=articles&action=del&id=<?php $row[ 'IdArticle' ]; ?>">DEL article</a> 
  <a href="<?php echo SITE_URL; ?>/index.php?page=articles&action=update&id=<?php echo $row[ 'IdArticle' ]; ?>">show article</a>
        </article>
    <?php
}