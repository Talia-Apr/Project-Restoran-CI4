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
    <h2>INSERT USER</h2>
</div>


<div class="col-6">
    <form action="<?= base_url('/admin/user/insert') ?>" method="post">
        <div class="form-group">
            <label for="user">User</label>
            <input type="text" name="user" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" name="email" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" name="password" required class="form-control">
        </div>
        <div class="form-group">
            <label for="Posisi">Posisi</label>
            <select class="form-control" name="level" id="iduser">
                <?php foreach ($level as $key): ?>
                    <option value="<?= $key ?>"><?= $key ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <input class="btn btn-info" type="submit" name="simpan" value="Simpan">
        </div>
    </form>
</div>

<?= $this->endSection() ?>