<h1>Elenco Studenti</h1>

<?php if (isset($data['messaggio'])) : ?>

    <p><?= $data['messaggio'] ?></p>

<?php endif; ?>

<?php foreach ($data['studenti'] as $studente) : ?>

    <h2><a href='./vista/<?= $studente->id ?>'><?= $studente->nome ?><?= $studente->cognome ?></a></h2>
    <h3><?= $studente ?></h3>

<?php endforeach; ?>