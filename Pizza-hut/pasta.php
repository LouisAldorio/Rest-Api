<?php

$data = file_get_contents('data/pizza.json');
$menu = json_decode($data,true);
$menu = $menu["menu"];

?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Pizza Hut</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="img/logo.png" alt="" width="120"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="latihan1.php">Home </a>
                <a class="nav-item nav-link active" href="pizza.php">Pizza </a>
                <a class="nav-item nav-link active" href="pasta.php">pasta </a>
                <a class="nav-item nav-link active" href="nasi.php">nasi</a>
                <a class="nav-item nav-link active" href="minuman.php">minuman </a>
            </div>
        </div>
    </div>
</nav>


<div class="container">
    <h1>Pizza</h1>
    <div class="row">
        <?php foreach ($menu as $pilihan): ?>
            <?php if($pilihan["kategori"] == "pasta"): ?>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img src="img/pizza/<?php echo $pilihan["gambar"] ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $pilihan["nama"] ?></h5>
                            <p class="card-text"><?php echo $pilihan["deskripsi"] ?></p>
                            <h5 class="card-title">Rp. <?php echo $pilihan["harga"] ?></h5>
                            <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
