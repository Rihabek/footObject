
<?php $extend = 'public/index.php'; ?>
<?php $title = "Liste joueur"; ?>
<?php $description = "Retrouvez la ficeh d'un joueur"; ?>


<style>

</style>

  <div class="container jumbotron">
    <div class="row">
      <div class="col-lg-12 col-md-10 text-center">
        <h3><?php echo $players['name']; ?></h3>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-10">
        <div class="photo-logo text-center">
          <img class="photo" src="<?php echo $players['photo']; ?>" alt="Photo <?php echo $players['name']; ?>">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-10 mt-5">
        Club : <a href="./?id=<?php echo $players['tId']; ?>"><?php echo $players['tName'] ?></a>
        <br>
        Nationalité : <?php echo $players['nationality']; ?>
        <br>
        Date de naissance : <?php echo (new DateTime($players['birthday_date']))->format('d/m/Y'); ?>
        <br>
        Lieu de naissance : <?php echo $players['birthday_place']; ?>
        <br>
        Taille : <?php echo $players['size']; ?>
        <br>
        Poids : <?php echo $players['weight']; ?> kg
        <br>
        Informations supplémentaires : <a href="<?php echo $player['link']; ?>"><?php echo $players['link']; ?></a>
      </div>
    </div>
  </div>
