<?= $this->extend('Template/home') ?>

<?= $this->section('content') ?>

<h3>Histori Pembelian</h3>
<hr>
    <table class="table table-bordered w-55">
        <thead class="thead-dark text-center">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1?>
        <?php foreach($vorder as $key => $value): ?>
            <tr>
                <td class="text-center"><?php echo $no++ ?></td>
                <td class="text-center"><?php echo $value['tglorder'] ?></td>            
                <td class="text-center"><?php echo $value['total'] ?></td>            
                <td class="text-center"><a href="<?= base_url('/front/homepage/detail/'.$value['idorder'].'') ?>"><img src="<?= base_url('/icon/detail.svg')?>"></a></td>            
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>

<?= $this->endSection() ?>