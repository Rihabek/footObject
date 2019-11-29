<?php $title = "Liste des entraîneurs" ?>
<?php ob_start(); ?>
<style>
  .coachs .image {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .coachs .image img {
    height: 100%;
    width: 100%;
  }
  a{

  }
</style>
<div class="container">
  <div class="row">
    <table class="table table-striped table-secondary">
      <tbody>
        <thead>
    <tr>
      <th scope="col">Photo</th>
      <th scope="col">Nom</th>
      <th scope="col">Nationalité</th>
      <th scope="col">Date de naissance</th>
      <th scope="col">Lieu de naissance</th>
      <th scope="col">Équipe</th>
    </tr>
  </thead>
        <?php foreach ($coachs as $coach): ?>
          <tr>
            <td><img src="<?php echo $coach['photo']; ?>" alt="Photo de <?php echo $coach['name']; ?>"></td>
            <td><a href="./?path=coachs&id=<?php echo $coach['id']; ?>"><?php echo $coach['name'] ?></a></td>
            <td><?php echo $coach['nationality'] ?></td>
            <td><?php echo (new DateTime($coach['birthday_date']))->format('d/m/Y') ?></td>
            <td><?php echo $coach['birthday_place'] ?></td>
            <td><a href="./?id=<?php echo $coach['tId']; ?>"><?php echo $coach['tName']; ?></a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('public/index.php'); ?>
