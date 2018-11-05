<h1>Elenco post</h1>

<p><a href="?url=posts/insert" class="btn btn-primary">aggiungi</a></p>


<?php if (isset($data['messaggio'])) : ?>

    <p><?= $data['messaggio'] ?></p>

<?php endif; ?>
<table class="table table-striped">
    <?php foreach ($data['posts'] as $post) : ?>
        <tr>
        <td><a href='?url=posts/vista/<?= $post->id ?>'><?= $post->id ?><?= $post->titolo ?></a></td>
        <td class="nomepost"><?= $post ?></td>
        <td><button class="btn btn-warning anvedi" title="<?= $post->id ?>">vedi</button></td>
        </tr>
    <?php endforeach; ?>
</table>

