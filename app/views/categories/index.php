<h1>Elenco categorie</h1>



<?php if (isset($data['messaggio'])) : ?>

    <p><?= $data['messaggio'] ?></p>

<?php endif; ?>
<table class="table table-striped">
    <?php foreach ($data['categorie'] as $cat) : ?>
        <tr>
        <td class="nomecat"><?= $cat ?></td>
        <td><button class="btn btn-danger anvedi" title="<?= $cat->id ?>">elimina</button></td>
        </tr>
    <?php endforeach; ?>
</table>

