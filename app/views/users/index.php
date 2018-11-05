<h1>Elenco utenti</h1>


<?php if (isset($data['messaggio'])) : ?>

    <p><?= $data['messaggio'] ?></p>

<?php endif; ?>
<table class="table table-striped">
    <?php foreach ($data['utenti'] as $utente) : ?>
        <tr>
            <td class="nomeutente"><?= $utente ?></td>
            <td><a class="btn btn-warning anvedi" title="<?= $utente->id ?>" href='?url=users/vista/<?= $utente->id ?>'>vedi profilo</a></td>
        </tr>
    <?php endforeach; ?>
</table>

