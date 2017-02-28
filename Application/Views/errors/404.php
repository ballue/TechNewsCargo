<?php 
    $params = $this->getParams();
?>

<div class="page-404">
        <h1>404</h1>
    <p>Erreur, <?= $params['erreur']; ?></p>
    <a href="<?= SITE_URL; ?>/public/" class="my-btn btn-go-home">RETOURNER VERS L'ACCUEIL</a>
</div>