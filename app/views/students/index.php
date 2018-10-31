<h1>Elenco Studenti</h1>

<p><a href="?url=students/insert" class="btn btn-primary">aggiungi</a></p>


<?php if (isset($data['messaggio'])) : ?>

    <p><?= $data['messaggio'] ?></p>

<?php endif; ?>
<table class="table table-striped">
    <?php foreach ($data['studenti'] as $studente) : ?>
        <tr>
        <td><a href='?url=students/vista/<?= $studente->id ?>'><?= $studente->nome ?><?= $studente->cognome ?></a></td>
        <td class="nomeStudente"><?= $studente ?></td>
        <td><button class="btn btn-warning anvedi" title="<?= $studente->id ?>">vedi</button></td>
        </tr>
    <?php endforeach; ?>
</table>

