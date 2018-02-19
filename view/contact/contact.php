<h1>Contact</h1>

<form action="<?php echo SITE_URL; ?>/index.php?page=contact&action=send" method="post">
    <label for="email">
        <?php echo ( isset( $datas[ 'error' ][ 'emailempty' ] ) ) ? '<span class="alert">Aucune adresse n\'a été indiquée</span><br />' : ''; ?>
        <?php echo ( isset( $datas[ 'error' ][ 'emailformat' ] ) ) ? '<span class="alert">Le format de l\'adresse n\'est pas conforme.</span><br />' : ''; ?>
        <input type="text" name="email" id="email" value="<?php echo ( isset( $datas['email'] ) ) ? $datas['email'] : ''; ?>" placeholder="Adresse E-mail" />
    </label>
    
    <label for="message">
        <?php echo ( isset( $datas[ 'error' ][ 'messageempty' ] ) ) ? '<span class="alert">Aucune message n\'a été indiqué.</span><br />' : ''; ?>
        <textarea id="message" name="message" placeholder="Votre message"><?php echo ( isset( $datas['message'] ) ) ? $datas['message'] : ''; ?></textarea>
    </label>
    
    <button class="btn">Envoyer</button>
    
</form>