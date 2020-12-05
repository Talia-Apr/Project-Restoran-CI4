<?= $this->extend('Template/home') ?>

<?= $this->section('content') ?>

<div class="col">
    <?php
    if (!empty(session()->getFlashdata('info'))) {
        echo '<div class="alert alert-danger" role="alert">';
        $error = session()->getFlashdata('info');
        foreach ($error as $key => $value) {
            echo $key . '->' . $value;
            echo '<br>';
        }
        echo '</div>';
    }
    ?>
</div>



<div class="row mt-2">
    <div class="col">
        <div class="form-group w-75">

        <h3>Daftar Pelanggan</h3>

            <form action="<?= base_url('/front/homepage/daftar')?>" method="post">

                <div class="form-group">
                    <label for="">Nama Pelanggan</label>
                    <input type="text" name="pelanggan" required placeholder="Isi Pelanggan" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" required placeholder="Isi Alamat" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Nomor Telepon</label>
                    <input type="text" name="telp" required placeholder="Isi Nomor Telepon" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" required placeholder="Email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" required placeholder="Password" class="form-control">
                </div>

                <div class="form-group">
                    <label for="">Konfirmasi</label>
                    <input type="password" name="konfirmasi" required placeholder="Konfirmasi" class="form-control">
                </div>
                
                <div>
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>