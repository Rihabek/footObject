<?php $extend = 'public/index.php'; ?>
<?php $title = "Les statistiques de ligue 1" ?>
<?php $description = "Retrouvez les statistiques."; ?>
<style>

</style>

<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 >Statistiques par journée </h1>
    </div>
  </div>
    <?php foreach ($stats as $stat): ?>
      <div class="stats mt-5">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2>Statistiques journée <?php echo $stat->getDay(); ?></h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 text-center">
            Buts marqués à domicile : <?php echo $stat->getSScoreHome() ?>
          </div>
          <div class="col-lg-6 text-center">
            Buts marqués à l'extérieur : <?php echo $stat->getSScoreAway() ?>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="graph" id="graph">

            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
</div>
