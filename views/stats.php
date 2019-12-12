<?php $extend = 'public/index.php'; ?>
<?php $title = "Les statistiques de ligue 1" ?>
<?php $description = "Retrouvez les statistiques."; ?>
<style>

</style>

<div class="container">
  <div class="row">
    <?php var_dump($stats); ?>
    <?php foreach ($stats as $value): ?>
      <div class="col-lg-12">
        Pour cette <?php echo $value->getDay(); ?>
      </div>
    <?php endforeach; ?>
  </div>
</div>
