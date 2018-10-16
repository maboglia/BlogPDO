<h1>Dettaglio Studenti</h1>

<p><a href="../" class="btn btn-primary">elenco</a></p>

<?php foreach ($data['studenti'] as $studente) : ?>

    <h2><?= $studente->nome ?><?= $studente->cognome ?></h2>
    <h3><?= $studente ?></h3>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis natus atque minima obcaecati molestiae maiores eius consequuntur assumenda cumque sint velit, suscipit inventore, necessitatibus ducimus mollitia. Fuga deserunt vel itaque.</p>

<?php endforeach; ?>