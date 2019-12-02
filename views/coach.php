<?php $extend = 'public/index.php'; ?>
<?php $title = "Fiche entraîneur"; ?>
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
      <h3><?php echo $coach['name']; ?></h3>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-lg-12 col-md-10">
      <div class="photo-logo text-center">
        <a href="./?path=teams&id=<?php echo $coach['tId']; ?>"><img class='logo' src="<?php echo $coach['tLogo']; ?>" alt="Logo <?php echo $coach['tName']; ?>"></a>
        <img class="photo" src="<?php echo $coach['photo']; ?>" alt="Photo <?php echo $coach['name']; ?>">
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-lg-12 col-md-10 text-center">
      Nationalité : <?php echo $coach['nationality']; ?>
      <br>
      Date de naissance : <?php echo (new DateTime($coach['birthday_date']))->format('d/m/Y'); ?>
      <br>
      Lieu de naissance : <?php echo $coach['birthday_place']; ?>
      <br>
      Informations supplémentaires : <a href="<?php echo $coach['link']; ?>"><?php echo $coach['link']; ?></a>
    </div>
  </div>
</div>
