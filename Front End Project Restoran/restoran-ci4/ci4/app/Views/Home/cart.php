<?= $this->extend('Template/home') ?>

<?= $this->section('content') ?>

<div class="row mt-2">
    <div class="col">
        <table class="table">
        <tr>
            <thead class="thead-dark text-center">
                <th>Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Hapus</th>
            </thead>
        </tr>

        <?php foreach ($menu as $key => $value) : ?>
            <?php foreach ($value as $k => $v) : ?>
        <tr>
                <td class="text-center"><?= $v['menu'] ?></td>
                <td class="text-center"><?= $v['harga'] ?></td>
                <td class="text-center"><a class="btn-sm btn-success" href="<?= base_url('/front/beli/tambah/'.$v['idmenu']) ?>"><img class="mb-1" src="<?= base_url('/icon/plus.svg') ?>"></a>&nbsp;
                &nbsp;<?= $jumlah[$key] ?>&nbsp;&nbsp;<a class="btn-sm btn-warning" href="<?= base_url('/front/beli/kurang/'.$v['idmenu']) ?>"><img class="mb-1" src="<?= base_url('/icon/min.svg') ?>"></a></td>
                <td class="text-center"><?= $jumlah[$key] * $v['harga'] ?></td>
                <td class="text-center"><a class="btn btn-danger" href="<?= base_url('/front/beli/hapus/'.$v['idmenu']) ?>" role="button"><img src="<?= base_url('/icon/trash.svg') ?>"></a></td>
                <?php $total=$total+($jumlah[$key] * $v['harga']);?>
        </tr>
            <?php endforeach ?>
        <?php endforeach ?>
        <tr>
            <td class="table-secondary" colspan="3"><h4>Total Belanja Anda : </h4></td>
            <td class="table-secondary text-center" colspan="2"><h4><?= $total ?></h4></td>
        </tr>
        </table>
        <?php if ($total>0) :?>
            <a href="<?=base_url('/front/beli/checkout/'.$total) ?>" role="button" class="btn btn-info">CHECKOUT</a>        
        <?php endif?>
    </div>
</div>

<?= $this->endSection() ?>
