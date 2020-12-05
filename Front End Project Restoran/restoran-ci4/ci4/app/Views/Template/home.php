<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css')?>">
    <title>De Resto | Aplikasi Restoran</title>
</head>
<body>

<div class="container">

<div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar" href="<?= base_url() ?>">
                        <h2>De Resto</h2>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto ">
                            <?php if (!empty(session()->get('email')) && !empty(session()->get('pelanggan'))) { ?>
                                <li class="nav-item mt-2"><img class="mr-2" src="<?= base_url('/icon/person.svg')?>"><?= session()->get('email') ?> </li>

                                <li class="nav-item ml-1">
                                    <a class="btn btn-light"  href="<?= base_url('/front/Beli/index/') ?>"><img src="<?= base_url('/icon/bag.svg') ?>"></a>
                                </li>

                                <li class="nav-item ml-1"><a class="btn btn-light" href="<?= base_url('/front/HomePage/histori/') ?>"><img src="<?= base_url('/icon/history.svg') ?>"></a></li>

                                <li class="nav-item ml-1 mt-2">
                                    <a class="btn-sm btn-secondary" href="<?= base_url('/Login/logout/') ?>" class="btn btn-danger">Logout </a>
                                </li>

                            <?php } else { ?>
                                <li class="nav-item ml-2 mt-2">
                                    <a class="btn-sm btn-info" href="<?= base_url('/front/HomePage/create/') ?>" class="btn btn-danger">Daftar</a>
                                </li>

                                <li class="nav-item ml-2 mr-2 mt-2">
                                    <a class="btn-sm btn-info" href="<?= base_url('/Login') ?>" class="btn btn-danger">Login</a>
                                </li>
                            <?php } ?>

                        </ul>

                    </div>
                </nav>
            </div>
        </div>


    <div class="row mt-5">
        <div class="col-md-3 mr-3">
            <h3>Kategori</h3>
            <hr>
            <?php if(!empty($kategori)) { ?>
            <ul class="nav flex-column">
                <?php foreach($kategori as $key): ?>
                    
                    <li class="nav-item"><a class="nav-link" href="<?=base_url('/Front/HomePage/read/' . $key['idkategori'] .'')?>">
                    <?= $key['kategori']?></a></li>
                    
                <?php endforeach ?>
            </ul>
                <?php }?>
        </div>
        <div class="col-8 px-2">
            <?= $this->renderSection('content') ?></div>
        </div>

        <div class="footer">
            <div class="row mt-2">
                <div class="col">
                <p class="text-center">2020 - copyright@TAproperties</p>
                </div>
            </div>
        </div>
</div>



</body>
</html>