<?= $this->extend('Template/admin') ?>

<?= $this->section('content') ?>

<a class="btn btn-info" href="<?= base_url('/admin/kategori/create')?>" role="button">Tambah Data</a>

<h1><?= $judul; ?></h1>

<table class="table">

    <tr>
        <thead class="thead-dark text-center">
            <th>No</th>
            <th>Kategori</th>
            <th>Keterangan</th>
            <th>Hapus</th>
            <th>Ubah</th>
        </thead>
    </tr>
    <?php $no=1 ?>
    <tr>
    <?php foreach ($kategori as $key => $value): ?>
        <td class="table-secondary text-center"><?=$no++?></td>
        <td><?= $value['kategori'] ?></td>
        <td><?= $value['keterangan']?></td>
        <td class="text-center"><a class="btn btn-danger" href="<?= base_url()?>/admin/kategori/delete/<?= $value['idkategori']?>" role="button">Hapus</a></td>
        <td class="text-center"><a class="btn btn-warning" href="<?= base_url()?>/admin/kategori/find/<?= $value['idkategori']?>" role="button">Ubah</a></td>
    
    </tr>

    <?php endforeach; ?>

</table>

<?= $pager->links('group1', 'bootstrap')?>

<?= $this->endSection() ?>