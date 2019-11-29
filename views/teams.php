<?php
require('../controllers/ShowTeams.php');
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      $teamList = new ShowTeams();
      $teamList-> listTeams();
    ?>
  </body>
</html>
