<?= $this->extend('Template/home') ?>

<?= $this->section('content') ?>

<div class="row mt-2 ml-3">
    <div class="col">

    <?php if (!empty($kategori)){ ?>
            <?php foreach($kategori as $key): ?>
                <?php if($id == $key['idkategori']) { ?>
                    <h2>Daftar Menu <?= $key['kategori']?></h2>
                <?php } ?>
            <?php endforeach ?>
        <?php } ?>

        <?php if (!empty($menu)){ ?>
            <?php foreach($menu as $key): ?>
                <div class="card ml-2" style="width: 13rem; float:left; margin:10px;">
                    <img style="height:150px" src="<?= base_url('upload/'. $key['gambar'])?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $key['menu'] ?></h5>
                        <p class="card-text">Rp.<?= number_format($key['harga']) ?></p>
                        <a class="btn btn-info" href="<?= base_url('/front/beli/index/'.$key['idmenu'].'')?>" role="button">Beli</a>
                    </div>
                </div>
            <?php endforeach ?>
        <?php } ?>
        <div style="clear:both;" class="ml-2">
            <?= $pager->links('page', 'bootstrap')?>
        </div>
    </div>
</div>

        

<?= $this->endSection() ?>