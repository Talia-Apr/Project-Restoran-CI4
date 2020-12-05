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

<div class="row">
    <div class="col">
        <h2><?= $judul ?></h2>
    </div>
</div>

<div class="row">
    <div class="col-10">
        <form action="<?= base_url('/admin/orderdetail/cari') ?>" method="post">
            <div class="form-group col-6 float-left">
                <label for="Awal">Awal</label>
                <input type="date" name="awal" required class="form-control">
            </div>
            <div class="form-group col-6 float-left">
                <label for="Sampai">Sampai</label>
                <input type="date" name="sampai" required class="form-control">
            </div>
            <div class="form-group ml-3">
                <input class="btn btn-info" type="submit" name="cari" value="Cari">
            </div>
        </form>
    </div>
</div>

<div class="row mt-2">
    <div class="col">
        <table class="table">
        <tr>
            <thead class="thead-dark text-center">
                <th>No</th>
                <th>Tanggal Order</th>
                <th>Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </thead>
        </tr>
        <?php $no ?>
        <tr>
        <?php foreach ($orderdetail as $key => $value): ?>
            <td class="table-secondary text-center"><?=$no++?></td>
            <td class="text-center"><?= $value['tglorder'] ?></td>
            <td class="text-center"><?= $value['menu'] ?></td>
            <td class="text-center"><?= $value['harga']?></td>
            <td class="text-center"><?= $value['jumlah']?></td>
            <td class="text-center"><?= $value['jumlah'] * $value['harga'] ?></td>
        </tr>
        <?php endforeach; ?>
        </table>
    
        <?= $pager->links('page', 'bootstrap')?>
    </div>
</div>

<?= $this->endSection() ?>