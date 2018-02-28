<h1>Contact</h1>

<form action="<?php echo SITE_URL; ?>/contact/send" method="post">
    
    <label for="TitleArticle">
        <input class="<?php if ( isset($datas['error']['email'] ) ){ echo 'form-' . $datas['error']['email']; } ?>" type="text" name="email" id="email" value="<?php if ( isset( $datas['contact']['email'] ) ) { echo $datas['contact']['email']; } ?>" placeholder="Email" />
    </label>
    
    <label for="IntroArticle">
        <textarea class="<?php if ( isset($datas['error']['message'] ) ){ echo 'form-' . $datas['error']['message']; } ?>" id="IntroArticle" name="message" placeholder="Message"><?php if ( isset( $datas['contact']['message'] ) ) { echo $datas['contact']['message']; } ?></textarea>
    </label>
    
    <button class="btn">Envoyer</button>
    
</form>