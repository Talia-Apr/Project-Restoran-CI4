<?= $this->extend('Template/home') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-7">

        <div class="col">
            <?php
            if (!empty($info)) {
                echo '<div class="alert alert-danger" role="alert">';
                echo $info;
                echo '</div>';
                }
            ?>
        </div>

        <span>
        <h3>Login Pelanggan</h3>
        </span>
        <hr>
        <form action="<?= base_url('/login') ?>" method="post">

            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" name="email" required class="form-control">
            </div>

            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" name="password" required class="form-control">
            </div>

            <div class="form-group">
                <input class="btn btn-info" type="submit" name="login" value="Login">
            </div>
            
        </form>
    </div>
</div>

<?= $this->endSection() ?>