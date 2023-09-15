<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link href="../component/navbar.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <title>Document</title>
  </head>
  <body>
    <header>
        <nav>
          <div class="logo">
            <img src="../component/logo.png" alt="logo" />
            <p>KeuanganKu</p>
          </div>
          <ul class="navItems">
            <li><a href="../app/home.php">Home</a></li>
            <li><a href="../app/about.php">About</a></li>
            <li><a href="../app/laporan.php">Feature</a></li>
            <li><a href="../app/contact.php">Contact</a></li>
          </ul>
          <div class="useratas">
            <img src="../component/profil.png" alt="profile" />
            <a href="../app/profil.php"><?php 
            session_start();
            echo "{$_SESSION['username']}"?></a>
          </div>
        </nav>
    </header>
    <hr>
  </body>
</html>

