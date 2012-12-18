<?php $titre = 'Mes News' ?>

<?php ob_start() ?>
<?php foreach ($news as $new): ?>
    <article>
        <header>
            <h1 class="titreNews"><?= $new['NEWS_TITRE'] ?></h1>
            <time><?= $new['NEWS_DATE'] ?></time>
        </header>
        <p><?= $new['NEWS_CONTENU'] ?></p>
        <footer class="categorie">Catégorie : <?= $new['CAT_NOM'] ?></footer>
    </article>
    <hr />
<?php endforeach; ?>
<?php $contenu = ob_get_clean() ?>

<?php include 'gabarit.php' ?>