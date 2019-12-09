
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
        Club : <a href="./teams/<?php echo $players->getTId(); ?>"> <b><?php echo $players->getTName(); ?></b> </a>
        <br>
        Nationalité : <b><?php echo $players->getNationality(); ?></b>
        <br>
        Date de naissance : <b><?php echo $players->getBirthdayDate()->format('d/m/Y'); ?></b>
        <br>
        Lieu de naissance : <b><?php echo $players->getBirthdayPlace(); ?></b>
        <br>
        Taille : <b><?php echo $players->getSize(); ?></b>
        <br>
        Poids : <b><?php echo $players->getWeight(); ?> kg</b>
        <br>
        Poste : <b><?php if ($players->getPoste() != null) {
          echo $players->getPoste();
        } ?></b>
        <br>
        Numéro de maillot : <b><?php echo $players->getNumberPlayer(); ?></b>
        <br>
        Informations supplémentaires : <b><a href="<?php echo $players->getLink(); ?>"><?php echo $players->getLink(); ?></a></b>
      </div>
    </div>
  </div>
