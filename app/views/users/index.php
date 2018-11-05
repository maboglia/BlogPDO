<h1>Elenco utenti</h1>

<p><a href="?url=users/insert" class="btn btn-primary">aggiungi</a></p>


<?php if (isset($data['messaggio'])) : ?>

    <p><?= $data['messaggio'] ?></p>

<?php endif; ?>
<table class="table table-striped">
    <?php foreach ($data['utenti'] as $utente) : ?>
        <tr>
        <td><a href='?url=users/vista/<?= $utente->id ?>'><?= $utente->nome ?><?= $utente->cognome ?></a></td>
        <td class="nomeutente"><?= $utente ?></td>
        <td><button class="btn btn-warning anvedi" title="<?= $utente->id ?>">vedi</button></td>
        </tr>
    <?php endforeach; ?>
</table>

