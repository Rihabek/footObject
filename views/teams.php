<?php $title = 'Liste des équipes' ?>
<?php ob_start(); ?>
<style>
  .team .image {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .team .image img {
    height: 100%;
    width: 100%;
  }
</style>
<div class="container">
  <?php foreach ($teams as $team): ?>
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="jumbotron">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="image">
                <img src="<?php echo $team['logo']; ?>" alt="Logo de <?php echo $team['short_name']; ?>">
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <h5 class='title'> <a href="./?id=<?php echo $team['id']; ?>"><?php echo $team['name']; ?></a> </h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include('public/index.php'); ?>
