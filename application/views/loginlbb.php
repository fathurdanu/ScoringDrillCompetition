<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <title>HOME</title>
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark  " style="background-color: #17a158;">  
    <a class="navbar-brand" href="<?php echo site_url('juri/') ?>">
      <img class="td-retina-data" data-retina="http://dispora.slemankab.go.id/wp-content/uploads/2018/04/loggo-2.png" src="http://dispora.slemankab.go.id/wp-content/uploads/2018/04/loggo-2.png" alt="" width="127" height="42">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="<?php echo site_url('juri/login') ?>">Masuk<span class="sr-only"></span></a>
        </li>
      </ul>
    </div>
  </nav>
  
  <center>	
    <!-- <img style="margin-top: 75px" src="lbb.jpeg" width="400" height="300"> -->
    <center><h1 style="margin-top: 75px">Masuk</h1></center>
    <center><p>
      <?php 
        if ($this->session->userdata('pesan') != '') {
          echo $this->session->userdata('pesan');
          $sess = array('pesan' => '');
          $this->session->set_userdata($sess);
        }
      ?>
    </p></center>
    <form method="POST" action="<?php echo site_url('juri/cek_login') ?>">  
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <label for="inputUname" class="sr-only">Username</label>
        <input type="uname" id="inputEmail" class="form-control" placeholder="Username" name="username">
        <br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password">
        <button style="margin-top: 25px;" class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
      </form>
    </div>
  </center>
</body>