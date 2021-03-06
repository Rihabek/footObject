<?php $extend = 'public/index.php'; ?>
<?php $title = "Fiche entraîneur : " . $coach->getName(); ?>
<?php $description = "Retrouvez la fiche d'un entraîneur entraîneur."; ?>
<style>
  .photo-logo{
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .photo{
    width: auto;
    height: auto;
  }
  .logo{
    width: 75%;
    height: 75%;
  }
</style>
<div class="container jumbotron">
  <div class="row">
    <div class="col-lg-12 col-md-10 text-center">
      <h3><?php echo $coach->getName(); ?></h3>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-lg-12 col-md-10">
      <div class="photo-logo text-center">
        <a href="./teams/<?php echo $coach->getTId(); ?>"><img class='logo' src="<?php echo $coach->getTLogo(); ?>" alt="Logo <?php echo $coach->getTName(); ?>"></a>
        <img class="photo" src="<?php echo $coach->getPhoto(); ?>" alt="Photo <?php echo $coach->getName(); ?>">
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-lg-12 col-md-10 text-center">
      Nationalité : <?php echo $coach->getNationality(); ?>
      <br>
      Date de naissance : <?php echo $coach->getBirthdayDate()->format('d/m/Y'); ?>
      <br>
      Lieu de naissance : <?php echo $coach->getBirthdayPlace(); ?>
      <br>
      Informations supplémentaires : <a href="<?php echo $coach->getLink(); ?>"><?php echo $coach->getLink(); ?></a>
    </div>
  </div>
</div>
