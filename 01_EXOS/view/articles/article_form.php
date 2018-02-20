<?php 
if ( isset( $datas['article'])
        )


{
    $formAction = 'update';
    
    $row = $datas['article']->fetch_array();
$datas['TitleArticle']=$row['TitleArticle'];
       $datas['IntroArticle']=$row['IntroArticle'];
               $datas['ContentArticle']=$row['ContentArticle'];
    $datas['IdArticle']=$row['IdArticle'];
    
}
 else {
$formAction = 'insert'; 
$datas['IdArticle']='';
}

?>


<h1>Articles</h1>

<form action="<?php $Controller->_get_formUrl(); ?>" method="post">
    <label for="TitleArticle">
        <?php echo ( isset( $datas[ 'error' ][ 'titleempty' ] ) ) ? '<span class="alert">Aucun titre n\'a été indiqué.</span><br />' : ''; ?>
        <input type="text" name="TitleArticle" id="TitleArticle" value="<?php echo ( isset( $datas['TitleArticle'] ) ) ? $datas['TitleArticle'] : ''; ?>" placeholder="Titre de l'article" />
    </label>
    
    <label for="IntroArticle">
        <?php echo ( isset( $datas[ 'error' ][ 'introempty' ] ) ) ? '<span class="alert">Aucune introduction n\'a été indiquée.</span><br />' : ''; ?>
        <textarea id="IntroArticle" name="IntroArticle" placeholder="Introduction de l'article"><?php echo ( isset( $datas['IntroArticle'] ) ) ? $datas['IntroArticle'] : ''; ?></textarea>
    </label>
    
    <label for="ContentArticle">
        <?php echo ( isset( $datas[ 'error' ][ 'contentempty' ] ) ) ? '<span class="alert">Aucun contenu n\'a été indiqué.</span><br />' : ''; ?>
        <textarea id="ContentArticle" name="ContentArticle" placeholder="Contenu principal de l'article"><?php echo ( isset( $datas['ContentArticle'] ) ) ? $datas['ContentArticle'] : ''; ?></textarea>
    </label>
    
    <button class="btn">Envoyer</button>
    
</form>