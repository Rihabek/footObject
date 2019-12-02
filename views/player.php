
<?php $extend = 'public/index.php'; ?>
<?php $title = "Fiche joueur : " . $players->getName();?>
<?php $description = "Retrouvez la fiche d'un joueur"; ?>


<style>

</style>

  <div class="container jumbotron">
    <div class="row">
      <div class="col-lg-12 col-md-10 text-center">
        <h3><?php echo $players->getName(); ?></h3>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-10">
        <div class="photo-logo text-center">
          <img class="photo" src="<?php echo $players->getPhoto(); ?>" alt="Photo <?php echo $players->getName(); ?>">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-10 mt-5">
        Club : <a href="./?id=<?php echo $players->getTId(); ?>"><?php echo $players->getTName(); ?></a>
        <br>
        Nationalité : <?php echo $players->getNationality(); ?>
        <br>
        Date de naissance : <?php echo $players->getBirthdayDate()->format('d/m/Y'); ?>
        <br>
        Lieu de naissance : <?php echo $players->getBirthdayPlace(); ?>
        <br>
        Taille : <?php echo $players->getSize(); ?>
        <br>
        Poids : <?php echo $players->getWeight(); ?> kg
        <br>
        Informations supplémentaires : <a href="<?php echo $players->getLink(); ?>"><?php echo $players->getLink(); ?></a>
      </div>
    </div>
  </div>
