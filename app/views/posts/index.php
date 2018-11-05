<h1>Elenco post</h1>



<?php if (isset($data['messaggio'])) : ?>

    <p><?= $data['messaggio'] ?></p>

<?php endif; ?>
<table class="table table-striped">
    <?php foreach ($data['posts'] as $post) : ?>
        <tr>
            <td class="nomepost"><?= $post ?></td>
            <td><a  class="btn btn-primary anvedi" title="<?= $post->id ?>" href='?url=posts/vista/<?= $post->id ?>'>leggi tutto</a></td>
        </tr>
    <?php endforeach; ?>
</table>

