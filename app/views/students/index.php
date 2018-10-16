<h1>Elenco Studenti</h1>

<p><a href="./insert" class="btn btn-primary">aggiungi</a></p>


<?php if (isset($data['messaggio'])) : ?>

    <p><?= $data['messaggio'] ?></p>

<?php endif; ?>

<?php foreach ($data['studenti'] as $studente) : ?>

    <h2><a href='../students/vista/<?= $studente->id ?>'><?= $studente->nome ?><?= $studente->cognome ?></a></h2>
    <h3><?= $studente ?></h3>

<?php endforeach; ?>