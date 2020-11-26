<?= $this->extend('Template/admin') ?>

<?= $this->section('content') ?>

<div class="col">
<?php 
    if (!empty(session()->getFlashdata('info'))) {
        echo '<div class="alert alert-danger" role="alert">';
        $error = session()->getFlashdata('info');
        foreach ($error as $key => $value) {
            echo $key."=>".$value;
            echo '<br>';
        }
        echo '</div>';
    }
    ?>
</div>

<div class="col">
    <h2><?= $judul?></h2>
</div>


<div class="col-6">
    <form action="<?= base_url('/admin/user/ubah') ?>" method="post">
        <div class="form-group">
            <input type="hidden" value="<?= $user['iduser']?>" name="iduser" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" value="<?=  $user['email']?>" name="email" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Posisi">Posisi</label>
            <select class="form-control" name="level" id="iduser">
                <?php foreach ($level as $key): ?>
                    <option <?php if ($user['level']==$key) {
                        echo "selected";
                    }?> value="<?= $key ?>"><?= $key ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <input class="btn btn-info" type="submit" name="simpan" value="Simpan">
        </div>
    </form>
</div>

<?= $this->endSection() ?>