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
  <nav class="nav nav-tabs mt-5">
    <?php foreach ($stats as $key => $stat ): ?>
      <a class="nav-item nav-link <?= $key === 0 ? 'active' : '' ?>" href="#m<?php echo $stat->getDay(); ?>" data-toggle="tab">Statistique journée <?php echo $stat->getDay(); ?></a>
    <?php endforeach; ?>
  </nav>
  <div class="tab-content">
    <?php foreach ($stats as $key => $stat): ?>
      <div class="tab-pane <?= $key === 0 ? 'active show' : '' ?> mt-3" id="m<?php echo $stat->getDay(); ?>">
        <div class="row">
          <div class="col-lg-12">
            <table class="table">
              <thead>
                <tr>
                  <th>Nombre de matchs joués</th>
                  <th>Buts marqués à domicile</th>
                  <th>Buts marqués à l'extérieur</th>

                </tr>
              </thead>
              <tbody>
                <tr>
                  <td id="nbMatch"><?php echo $stat->getNbMatch(); ?></td>
                  <td id="goalHome"><?php echo $stat->getSScoreHome(); ?></td>
                  <td id="goalAway"><?php echo $stat->getSScoreAway(); ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <canvas id="graph<?php echo $stat->getDay(); ?>" width="500" height="500"></canvas>
          </div>
        </div>

      </div>
    <?php endforeach; ?>
  </div>
</div>
