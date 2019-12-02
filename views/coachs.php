<?php $extend = 'public/index.php'; ?>
<?php $title = "Liste des entraîneurs"; ?>
<?php $description = "Retrouvez la liste des 20 des entraîneurs de Ligue 1."; ?>

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
            <td><img src="<?php echo $coach->getPhoto(); ?>" alt="Photo de <?php echo $coach->getName(); ?>"></td>
            <td><a href="./coachs/<?php echo $coach->getId(); ?>"><?php echo $coach->getName(); ?></a></td>
            <td><?php echo $coach->getNationality(); ?></td>
            <td><?php echo $coach->getBirthdayDate()->format('d/m/Y'); ?></td>
            <td><?php echo $coach->getBirthdayPlace(); ?></td>
            <td><a href="./teams/<?php echo $coach->getTId(); ?>"><?php echo $coach->getTName(); ?></a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
