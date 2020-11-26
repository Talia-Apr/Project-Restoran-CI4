<?= $this->extend('Template/admin') ?>

<?= $this->section('content') ?>

<?php 

    if (isset($_GET['page_page'])) {
        $page = $_GET['page_page'];
        $jumlah = 2;
        $no = ($jumlah * $page) - $jumlah + 1;
    }else {
        $no = 1;
    }

?>

<div class="row">

    <div class="col-4">
        <a class="btn btn-info" href="<?= base_url('/admin/user/create')?>" role="button">Tambah Data</a>
    </div>
    <div class="col">
        <h2><?= $judul ?></h2>
    </div>

</div>

<div class="row mt-2">
    <div class="col">
        <table class="table">
        <tr>
            <thead class="thead-dark text-center">
                <th>No</th>
                <th>User</th>
                <th>Email</th>
                <th>Posisi</th>
                <th>Status</th>
                <th>Aksi</th>
            </thead>
        </tr>
        <?php $no ?>
        <tr>
        <?php foreach ($user as $key => $value): ?>
            <td class="table-secondary text-center"><?=$no++?></td>
            <td class="text-center"><?= $value['user'] ?></td>
            <td class="text-center"><?= $value['email']?></td>
            <td class="text-center"><?= $value['level']?></td>
            <td class="text-center">
                <?php 
                if ($value['aktif']==1) {
                    $aktif = '<a class="btn btn-success" role="button" href="'.base_url("/admin/user/update/")."/". $value["iduser"]."/".$value["aktif"].'">Aktif</a>';
                } else {
                    $aktif = '<a class="btn btn-secondary" role="button" href="'.base_url("/admin/user/update/")."/". $value["iduser"]."/".$value["aktif"].'">Banned</a>';
                }
                ?>
            <?= $aktif?>
            </td>
            <td class="text-center"><a class="btn btn-danger" href="<?= base_url()?>/admin/user/delete/<?= $value['iduser']?>" role="button"><img src="<?= base_url('/icon/trash.svg') ?>"></a>
            <a class="btn btn-warning" href="<?= base_url()?>/admin/user/find/<?= $value['iduser']?>" role="button"><img src="<?= base_url('/icon/pencil.svg') ?>"></a></td>
        </tr>
        <?php endforeach; ?>
        </table>
    
        <?= $pager->links('page', 'bootstrap')?>
    </div>
</div>

<?= $this->endSection() ?>