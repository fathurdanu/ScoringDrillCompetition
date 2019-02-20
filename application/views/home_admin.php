
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <title>HOME</title>

  <style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }

  }
</style>
<!-- Custom styles for this template -->

</head>

<body>
  <nav class="navbar navbar-expand-md fixed-top " style="background-color: #17a158;">  
    <a class="navbar-brand" href="<?php echo site_url('admin/') ?>"><img class="td-retina-data" data-retina="http://dispora.slemankab.go.id/wp-content/uploads/2018/04/loggo-2.png" src="http://dispora.slemankab.go.id/wp-content/uploads/2018/04/loggo-2.png" alt="" width="127" height="42"></a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link text-light" href="<?php echo site_url('admin/keluar') ?>">Keluar<span class="sr-only"></span></a>
      </li>
    </ul>
  </nav>

  <main role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-3">Halaman Admin</h1>
        <p style="font-size: 30px">Lomba Baris-Berbaris</p>

      </div>
    </div>


    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Edit Tim</h2>
          <p> Diskualifikasi peserta lomba </p>
          <p><a class="btn btn-primary" href="<?php echo site_url('admin/edit_tim') ?>" role="button">Edit &raquo;</a></p>
        </div>

        <div class="col-md-4">
          <h2>Edit Juri</h2>
          <p>Buat atau hapus akun juri</p>
          <p><a class="btn btn-danger" href="<?php echo site_url('admin/edit_juri') ?>" role="button">Edit &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Reset Semua Data</h2>
          <p>Menghapus data pada database</p>
          <p><a class="btn btn-primary" href="<?php echo site_url('admin/reset_all') ?>" role="button" onClick="return confirm('Anda yakin ingin mereset semua data LBB?');">Reset &raquo;</a></p>
        </div>
        

      </div>

      <hr>

    </div> <!-- /container -->

  </main>
  <center>
    <footer class="page-footer font-small blue pt-4">
      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">© 2018 Copyright:
      </div>
      <!-- Copyright -->
    </footer>
  </center>
</body>
</html>
