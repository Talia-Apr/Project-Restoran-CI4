<?= $this->extend('Template/home') ?>

<?= $this->section('content') ?>

<h3>Detail Pembelian</h3>
<hr>
    <table class="table table-bordered w-55">
        <thead class="thead-dark text-center">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1?>
        <?php foreach($detail as $key => $value): ?>
        <?php var_dump($value) ?>
            <tr>
                <td class="text-center"><?= $no++?></td>            
                <td class="text-center"><?php echo $value['tglorder'] ?></td>            
                <td class="text-center"><?php echo $value['menu'] ?></td>            
                <td class="text-center"><?php echo $value['harga'] ?></td>            
                <td class="text-center"><?php echo $value['jumlah'] ?></td>            
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>

<?= $this->endSection() ?>