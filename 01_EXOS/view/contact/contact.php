<h1>Contact</h1>

<form action="<?php echo SITE_URL; ?>/index.php?page=contact&action=send" method="post">
    
    <?php $Controller->generateFormField( 'email', 'text', 'Adresse E-mail' ); ?>
    <?php $Controller->generateFormField( 'message', 'textarea', 'Votre message' ); ?>
    
    <button class="btn">Envoyer</button>
    
</form>