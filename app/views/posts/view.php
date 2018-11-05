
<?php foreach ($data['posts'] as $utente) : ?>

    <h2><?= $utente->titolo ?></h2>
    <h3><?= $utente->sottotitolo ?></h3>
    <p><?= $utente->testo ?></p>
    
<?php endforeach; ?>