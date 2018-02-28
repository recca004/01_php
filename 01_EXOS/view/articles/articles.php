<h1>Articles</h1>


    <a class="button" href="<?php echo SITE_URL; ?>/articles/show">

        <i class="material-icons">add</i> Ajouter un article

    </a>

<?php 
if( isset( $datas['articles'] ) )
{
    foreach( $datas['articles'] as $row )
    {
    ?>

        <article>
            <div class="article_action">
                <a href="<?php echo SITE_URL; ?>/articles/delete/<?php echo $row[ 'IdArticle' ]; ?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer l\'article:\n- <?php echo $row[ 'TitleArticle' ]; ?>\n\nAttention, cette action ne pourra pas être annulée.')"><i class="material-icons">delete</i></a> 
                <a href="<?php echo SITE_URL; ?>/articles/show/<?php echo $row['IdArticle']; ?>"><i class="material-icons">edit</i></a>
            </div>
            <h2>
                <a href="<?php echo SITE_URL; ?>/articles/detail/<?php echo $row[ 'IdArticle' ]; ?>"><?php echo $row[ 'TitleArticle' ]; ?></a>
            </h2>
            <p>
                <?php echo nl2br($row[ 'IntroArticle' ]); ?>
            </p>
        </article>

    <?php
    }
}