<h1>Articles</h1>

<p><?php $Controller->get_backUrl(); ?></p>

<form action="<?php $Controller->get_formUrl(); ?>" method="post">
    
    <?php
    $Controller->generateFormField( 'TitleArticle', 'text', 'Titre de l\'article' );
    $Controller->generateFormField( 'IntroArticle', 'textarea', 'Introduction de l\'article' );
    $Controller->generateFormField( 'ContentArticle', 'textarea', 'Contenu principal de l\'article' );
    ?>
    
    <button class="btn">Envoyer</button>
    
</form>
