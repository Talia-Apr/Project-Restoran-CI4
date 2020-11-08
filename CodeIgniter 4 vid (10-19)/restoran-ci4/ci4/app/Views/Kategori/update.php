<?= $this->extend('Template/admin') ?>

<?= $this->section('content') ?>

<h1>Update Data</h1>

<form action="<?= base_url() ?>/admin/kategori/update" method="post">
    Kategori : <input type="text" name="kategori" value="<?=$kategori['kategori']?>" required>
    <br><br>
    Keterangan : <input type="text" name="keterangan" value="<?=$kategori['keterangan']?>" required>
    <br>
    <input type="hidden" name="idkategori" value="<?=$kategori['idkategori']?>">
    <input type="submit" name="simpan" value="Simpan">
</form>

<?= $this->endSection() ?>