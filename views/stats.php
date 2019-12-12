<?php $extend = 'public/index.php'; ?>
<?php $title = "Les statistiques de ligue 1" ?>
<?php $description = "Retrouvez les statistiques."; ?>
<style>

</style>

<div class="container">
  <div class="row">
    <?php foreach ($stats as $value): ?>
      <div class="col-lg-12">
         <?php $sum=0 ; $sum = $sum + $value->getScoreHome(); echo $sum;?>
      </div>
    <?php endforeach; ?>
  </div>
</div>
