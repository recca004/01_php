<h1>Articles</h1>
<a href="<?php echo SITE_URL; ?>/index.php?page=articles&action=show"><i class="fas fa-plus-square"> Ajouter un article</i></a>
<?php 
if( isset( $datas[ 'articles' ] ) )
{
    while( $row = $datas[ 'articles' ]->fetch_array() )
    {
    ?>
        <article>
            <div class="container">
                <h2><a href="<?php echo SITE_URL; ?>/index.php?page=articles&action=detail&id=<?php echo $row[ 'IdArticle' ]; ?>"><?php echo $row[ 'TitleArticle' ]; ?></a></h2>


                <p>
                    <?php echo $row[ 'IntroArticle' ]; ?>
                </p>
                <p>
                <a href="<?php echo SITE_URL; ?>/index.php?page=articles&action=del&id=<?php echo $row[ 'IdArticle' ]; ?>"><i class="fas fa-trash-alt" style="color:#910E1F"> Effacer</i></a>
                <a href="<?php echo SITE_URL; ?>/index.php?page=articles&action=show&id=<?php echo $row[ 'IdArticle' ]; ?>"><i class="fas fa-th-list" style="color:##8FCF3C"><span> Edit</span></i></a> 

                </p>
            </div>
        </article>
    <?php
    }
}