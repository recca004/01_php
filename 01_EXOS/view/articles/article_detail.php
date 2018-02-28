<h1>Articles</h1>

<p><?php echo $datas['backUrl']; ?></p>

<?php 
if( isset( $datas['articles'] ) )
{
    ?>

        <article>
            <div class="article_action">
                <a href="<?php echo SITE_URL; ?>/articles/delete/<?php echo $datas['articles'][ 'IdArticle' ]; ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer l\'article:\n<?php echo $datas['articles'][ 'TitleArticle' ]; ?>')"><i class="material-icons">delete</i></a> 
                <a href="<?php echo SITE_URL; ?>/articles/show/<?php echo $datas['articles']['IdArticle']; ?>"><i class="material-icons">edit</i></a>
            </div>
            <h2>
                <?php echo  $datas['articles'][ 'TitleArticle' ]; ?>
            </h2>
            <p>
                <?php echo  nl2br($datas['articles'][ 'IntroArticle' ]); ?>
            </p>
            <p>
                <?php echo  nl2br($datas['articles'][ 'ContentArticle' ]); ?>
            </p>
        </article>

    <?php
}