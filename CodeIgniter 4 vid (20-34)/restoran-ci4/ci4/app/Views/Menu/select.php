<?= $this->extend('Template/admin') ?>

<?= $this->section('content') ?>

<?php 

    if (isset($_GET['page_page'])) {
        $page = $_GET['page_page'];
        $jumlah = 3;
        $no = ($jumlah * $page) - $jumlah + 1;
    }else {
        $no = 1;
    }

?>

<div class="row mt-2">

    <div class="col-4">
        <a class="btn btn-info" href="<?= base_url('/admin/menu/create')?>" role="button">Tambah Data</a>
    </div>
    <div class="col">
        <h2><?= $judul ?></h2>
    </div>

</div>

<div class="row">

    <div class="col-4">
        <form class="mt-2" action="<?= base_url('/admin/menu/read') ?>" method="get">
            <?= view_cell('\App\Controllers\Admin\Menu::option') ?>
        </form>
    </div>

</div>

<div class="row mt-2">
    <div class="col">
        <table class="table">
        <tr>
            <thead class="thead-dark text-center">
                <th>No</th>
                <th>Menu</th>
                <th>Gambar</th>
                <th>Harga</th>
                <th>Aksi</th>
            </thead>
        </tr>
        <?php $no ?>
        <tr>
        <?php foreach ($menu as $key => $value): ?>
            <td class="table-secondary text-center"><?=$no++?></td>
            <td><?= $value['menu'] ?></td>
            <td><img style="width:70px" src="<?= base_url('/upload/'.$value['gambar'].'') ?>"></td>
            <td><?= number_format($value['harga']) ?></td>
            <td class="text-center"><a class="btn btn-danger" href="<?= base_url()?>/admin/menu/delete/<?= $value['idmenu']?>" role="button"><img src="<?= base_url('/icon/trash.svg') ?>"></a>
            <a class="btn btn-warning" href="<?= base_url()?>/admin/menu/find/<?= $value['idmenu']?>" role="button"><img src="<?= base_url('/icon/pencil.svg') ?>"></a></td>
        </tr>
        <?php endforeach; ?>
        </table>
    
        <?= $pager->links('page', 'bootstrap')?>
    </div>
</div>

<?= $this->endSection() ?>