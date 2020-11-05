<?= $this->extend('Template/admin') ?>

<?= $this->section('content') ?>

<h1><?= $judul; ?></h1>

    <?php foreach ($kategori as $key => $value): ?>
    <h2><?= $value['kategori']  ?></h2>
    <?php endforeach; ?>

    <?= $kategori[0]['kategori'] ?>

<?= $this->endSection() ?>