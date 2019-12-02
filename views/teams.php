<?php $extend = 'public/index.php'; ?>
<?php $title = "Liste des 20 équipes"; ?>
<?php $description = "Retrouvez la liste des 20 équipes de Ligue 1."; ?>
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
  <table class="table table-hover">
    <?php foreach ($teams as $team): ?>
      <tr>
        <td scope="col"><img src="<?php echo $team->getLogo(); ?>" alt="Logo de <?php echo $team->getShortName(); ?>"></td>
        <td scope="col"><h5 class='title'> <a href="./teams/<?php echo $team->getId(); ?>"><?php echo $team->getName(); ?></a> </h5></td>
      </tr>
    <?php endforeach; ?>
  </table>
  </div>
