<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/bootstrap.min.css">

    <title>Data Pemesanan Kamar</title>
</head>

<body>
    <!-- As a heading -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Stella Maris</span>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-4">
            <div class="col-md-6">
                <h3>Data Pemesanan Kamar</h3>
                 <a href="<?= base_url('md_kelas_kamar/tambah/'); ?>" class="btn btn-primary mb-2">Tambah Data</a>
                <div class="table-responsive table-striped">
                    <table class="table">
                        <thead>
                            <?php $no = 1; ?>
                            <tr>
                            
                                <th scope="col">ID Pemesanan</th>
                                <th scope="col">ID Pelanggan</th>
                                <th scope="col">ID Kamar</th>
                                <th scope="col">Tgl Checkin</th>
                                <th scope="col">Tgl Checkout</th>
                                <th scope="col">Total Invoice</th>
      
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($row as $m) : ?>
                                <tr>
                                    <td scope="row"><?= $no++; ?></td>
                                    <td><?= $m->id_pemesanan;?></td>
                                    <td><?= $m->id_pelanggan; ?></td>
                                    <td><?= $m->id_kelas_kamar; ?></td>
                                    <td><?= $m->tanggal_checkin; ?></td>
                                    <td><?= $m->tanggal_checkout; ?></td>
                                    <td><?= $m->total_invoice; ?></td>
                                </tr>
                                
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="<?= base_url('assets') ?>/js/bootstrap.min.js"></script>
</body>

</html>
