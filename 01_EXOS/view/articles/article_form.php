<h1>Articles</h1>

<p><?php echo $datas['backUrl']; ?></p>

<form action="<?php echo $datas['formUrl']; ?>" method="post">

    <label for="TitleArticle">
        <input class="<?php if ( isset($datas['error']['TitleArticle'] ) ){ echo 'form-' . $datas['error']['TitleArticle']; } ?>" type="text" name="TitleArticle" id="TitleArticle" value="<?php if ( isset( $datas['articles']['TitleArticle'] ) ) { echo $datas['articles']['TitleArticle']; } ?>" placeholder="Titre de l'article" />
    </label>
    
    <label for="IntroArticle">
        <textarea class="<?php if ( isset($datas['error']['IntroArticle'] ) ){ echo 'form-' . $datas['error']['IntroArticle']; } ?>" id="IntroArticle" name="IntroArticle" placeholder="Introduction de l'article"><?php if ( isset( $datas['articles']['IntroArticle'] ) ) { echo $datas['articles']['IntroArticle']; } ?></textarea>
    </label>
    
    <label for="ContentArticle">
        <textarea class="<?php if ( isset($datas['error']['ContentArticle'] ) ){ echo 'form-' . $datas['error']['ContentArticle']; } ?>" id="ContentArticle" name="ContentArticle" placeholder="Contenu principal de l'article"><?php if ( isset( $datas['articles']['ContentArticle'] ) ) { echo $datas['articles']['ContentArticle']; } ?></textarea>
    </label>
    
    <button class="btn">Envoyer</button>
    
</form>
