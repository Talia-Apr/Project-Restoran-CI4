<?= $this->extend('Template/admin') ?>

<?= $this->section('content') ?>

<h1>Insert Data</h1>

<form action="<?= base_url() ?>/admin/kategori/insert" method="post">
    Kategori : <input type="text" name="kategori" required>
    <br><br>
    Keterangan : <input type="text" name="keterangan" required>
    <br>
    <input type="submit" name="simpan" value="Simpan">
    <br>
    <h6 class="ml-5"><?php echo session()->getFlashdata('info') ?></h6>
</form>

<?= $this->endSection() ?>