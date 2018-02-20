<h1>Articles</h1>
<p>
    <a href="<?php echo SITE_URL; ?>">&lt; Retour aux articles</a>
</p>

<?php 
if( isset( $datas[ 'article' ] ) )
{
    $row = $datas[ 'article' ]->fetch_array();
    ?>
        <article>
            <h2><a href="<?php echo SITE_URL; ?>/index.php?page=articles&action=details&id=<?php echo $row[ 'IdArticle' ]; ?>"><?php echo $row[ 'TitleArticle' ]; ?></a> </h2>
            <p>
                <?php echo $row[ 'IntroArticle' ]; ?>
            </p>
            <p>
                <?php echo $row[ 'ContentArticle' ]; ?>
            </p>
                        <p>
            <a href="<?php echo SITE_URL; ?>/index.php?page=articles&action=del&id=<?php echo $row[ 'IdArticle' ]; ?>"><i class="fas fa-trash-alt" style="color:#910E1F"> Effacer</i></a>
            <a href="<?php echo SITE_URL; ?>/index.php?page=articles&action=show&id=<?php echo $row[ 'IdArticle' ]; ?>"><i class="fas fa-th-list" style="color:#677E52"> Edit</i></a> 
                
            </p>

        </article>
    <?php
}