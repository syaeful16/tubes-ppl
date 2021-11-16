<?php
    $conn = mysqli_connect("localhost", "root", "", "starbook");

    $kodeBuku = "";
    $namaBuku = "";
    $penerbitBuku = "";
    $hargaBuku = "";
    $kategoriBuku = "";
    $sukses = "";
    $gagal = "";

    if(isset($_POST['tambah'])) {
        $kodeBuku = $_POST['kodeb'];
        $namaBuku = $_POST['nama'];
        $penerbitBuku = $_POST['penerbit'];
        $hargaBuku = $_POST['harga'];
        $kategoriBuku = $_POST['kategori'];
    }

    if($kodeBuku && $namaBuku && $penerbitBuku && $hargaBuku && $kategoriBuku) {
        $sql1 = "INSERT INTO tambahbuku(kodeBuku, namaBuku, penerbit, harga, kategori) values ('$kodeBuku', '$namaBuku', '$penerbitBuku', '$hargaBuku', '$kategoriBuku')";
        $q1 = mysqli_query($conn, $sql1);

        if ($q1){
            $sukses = "berhasil memasukkan data";
        } else {
            $gagal = "Gagal Memasukkan data";
        }
    } else {
        $gagal = "Silahkan isi semua data";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>

    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/form.css">

    <!-- Font Awehsome -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container ps-5 pe-5">
            <a class="navbar-brand" href="#">
                <img src="img/icon.png" alt="" width="30" height="24" class="d-inline-block align-text-top"> Star Book
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i></a>
                <a class="nav-link" href="#"><i class="fas fa-cog"></i></a>
                <a class="nav-link" href="addBook.php"><i class="fas fa-plus"></i></a>
            </div>
        </div>
    </nav>
    <div class="container d-flex justify-content-center align-items-center">
        <form class="pt-5 mt-5" action="" method="POST">
            <h2>Tambah Buku</h2>
            <?php if ($gagal) { ?>
                <div class="alert alert-danger" role="alert">
                <?php echo $gagal ?>
                </div>
            <?php } ?>

            <?php if ($sukses) { ?>
                <div class="alert alert-info" role="alert">
                <?php echo $sukses ?>
                </div>
            <?php } ?>
            <div class="mb-3">
                <label for="kodeBuku" class="form-label">Kode Buku</label>
                <input type="text" class="form-control" id="kodeBuku" name="kodeb" value="<?php echo $kodeBuku ?>">
            </div>
            <div class="mb-3">
                <label for="namaBuku" class="form-label">Nama Buku</label>
                <input type="text" class="form-control" id="namaBuku" name="nama" value="<?php echo $namaBuku ?>">
            </div>
            <div class="mb-3">
                <label for="penerbitBuku" class="form-label">Penerbit Buku</label>
                <input type="text" class="form-control" id="penerbitBuku" name="penerbit" value="<?php echo $penerbitBuku ?>">
            </div>
            <label for="hargaBuku" class="form-label">Harga Buku</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Rp</span>
                <input type="text" class="form-control" id="hargaBuku" name="harga" value="<?php echo $hargaBuku ?>">
            </div>
            <div class="mb-3">
                <label for="kategoriBuku" class="form-label">Kategori Buku</label>
                <select class="form-select" name="kategori" id="kategoriBuku" idaria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="novel" <?php if($kategoriBuku == "novel")?>>Novel</option>
                    <option value="komik" <?php if($kategoriBuku == "komik")?>>komik</option>
                    <option value="dongeng" <?php if($kategoriBuku == "dongeng")?>>dongeng</option>
                </select>
            </div>
            <button type="submit" name="tambah" class="btn btn-primary mt-5">Submit</button>
        </form>
    </div>

    <script src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>