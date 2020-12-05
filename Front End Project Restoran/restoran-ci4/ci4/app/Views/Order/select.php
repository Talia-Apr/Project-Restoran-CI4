<?= $this->extend('Template/admin') ?>

<?= $this->section('content') ?>

<div class="row">

    <div class="col">
        <h3><?= $judul ?></h3>
    </div>

</div>

<?php 

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        $jumlah = 2;
        $no = ($jumlah * $page) - $jumlah + 1;
    }else {
        $no = 1;
    }

?>

<div class="row">

    <div class="col">
        <table class="table">
            <tr>
                <thead class="thead-dark text-center">
                    <th>No</th>
                    <th>ID Order</th>
                    <th>Pelanggan</th>
                    <th>Tanggal Order</th>
                    <th>Total</th>
                    <th>Bayar</th>
                    <th>Kembali</th>
                    <th>Status</th>
                </thead>
            </tr>
            <tr>
            <?php foreach ($order as $value): ?>
                <td class="table-secondary text-center"><?=$no++?></td>
                <td class="text-center"><?= $value['idorder'] ?></td>
                <td class="text-center"><?= $value['pelanggan']?></td>
                <td class="text-center"><?= $value['tglorder']?></td>
                <td class="text-center"><?= $value['total']?></td>
                <td class="text-center"><?= $value['bayar']?></td>
                <td class="text-center"><?= $value['kembali']?></td>
                <?php 
                    if ($value['status']==1) {
                        $status = "<a class='btn btn-secondary' role='button'>LUNAS</a>";
                    } else {
                        $status = "<a class='btn btn-primary' role='button' href='".base_url("/admin/order/find")."/".$value['idorder']."'>BAYAR</a>";
                    }
                    
                ?>
                <td class="text-center"><?= $status ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

    <?= $pager->makeLinks(1, $perPage, $total, 'bootstrap')?>

    </div>

</div>

<?= $this->endSection() ?>