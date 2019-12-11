<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <title><?php echo isset($title) ? $title : "Championnat de France de Football"; ?></title>
    <meta name="description" content="<?php echo isset($description) ? $description : "Découvrez toutes les dernières informations, résultats et classements de la première division du championnat de France de football."; ?>" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta name="Author" content="Tony Blard">
    <base href="/footObject/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/style.css">
  </head>
  <body class="">
    <header class="masthead  mb-5">
      <nav class="navbar navbar-expand-lg navbar-light ">
        <img src="https://d18lkz4dllo6v2.cloudfront.net/cumulus_uploads/entry/2018-08-22/6XPgDHX.png?w=660" alt="">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item <?php if ($_SERVER['PHP_SELF'] == "/footObject/index.php/teams" ) {echo " active";} ?>">
              <a class="nav-link" href="./teams">Listes des équipes</a>
            </li>
            <li class="nav-item <?php if ($_SERVER['PHP_SELF'] == "/footObject/index.php/coachs" ) {echo " active";} ?>">
              <a class="nav-link" href="./coachs">Listes des coachs</a>
            </li>
            <li class="nav-item <?php if ($_SERVER['PHP_SELF'] == "/footObject/index.php/ranking" ) {echo " active";} ?>">
              <a class="nav-link" href="./ranking">Classement</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <?php echo $content ?>

    <footer class="page-footer">
      <div class="footer-copyright text-center py-3">
        © 2019 Copyright: Tony Blard
      </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>
