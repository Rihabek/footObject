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
  <table class="table table-hover">
    <?php foreach ($teams as $team): ?>
      <tr>
        <td scope="col"><img src="<?php echo $team['logo']; ?>" alt="Logo de <?php echo $team['short_name']; ?>"></td>
        <td scope="col"><h5 class='title'> <a href="./?id=<?php echo $team['id']; ?>"><?php echo $team['name']; ?></a> </h5></td>
      </tr>
    <?php endforeach; ?>
  </table>
  </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include('public/index.php'); ?>
