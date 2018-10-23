<h1>Elenco Studenti</h1>

<p><a href="?url=students/insert" class="btn btn-primary">aggiungi</a></p>


<?php if (isset($data['messaggio'])) : ?>

    <p><?= $data['messaggio'] ?></p>

<?php endif; ?>

<?php foreach ($data['studenti'] as $studente) : ?>

    <h2><a href='?url=students/vista/<?= $studente->id ?>'><?= $studente->nome ?><?= $studente->cognome ?></a></h2>
    <h3><?= $studente ?></h3>

<?php endforeach; ?>