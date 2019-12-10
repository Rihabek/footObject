<?php $extend = 'public/index.php'; ?>
<?php $title = "Fiche équipe : " . $team->getShortName() ; ?>
<?php $description = "Retrouvez la fiche d'une équipe."; ?>

<style>
  .collapsible {
    background-color: #777;
    color: white;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
  }

  button .active, .collapsible:hover {
    background-color: #555;
  }

  .content {
    padding: 0 18px;
    display: none;
    overflow: hidden;
    background-color: #f1f1f1;
  }
  td a {
    color: black;
  }

</style>
<div class="container jumbotron">
  <div class="row">
    <div class="col-lg-12 col-md-10 text-center">
      <h3><?php echo $team->getShortName(); ?></h3>
      <img src="<?php echo $team->getLogo(); ?>" alt="">
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-lg-12 col-md-10">
      <button type="button" class="collapsible">Informations</button>
      <div class="content mt-3">
        Nom : <b><?php echo $team->getName(); ?></b>
        <br>
        Fondé en : <?php echo $team->getFundationDate()->format('Y'); ?>
        <br>
        Entraîneur : <a href="./coachs/<?php echo $coach->getId(); ?>"><?php echo $coach->getName(); ?></a>
        <br>
        Président : <?php echo $team->getPresident(); ?>
        <br>
        Site web : <?php echo $team->getWebsite(); ?>
        <br>
        Adresse : <?php echo $team->getAdress(); ?>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-lg-12 col-md-10">
      <button type="button" class="collapsible">Effectifs</button>
      <div class="content mt-3">
        <table class="table">
          <thead>
            <tr class="text-center">
              <th>Nom</th>
              <th>Nationalité</th>
              <th>Date de naissance</th>
              <th>Poste</th>
              <th>Numéro</th>
            </tr>
          </thead>
         <tbody>
           <?php foreach ($players as $player): ?>
             <tr class="text-center">
               <td><a href="./player/<?php echo $player->getId();?>"><?php echo $player->getName(); ?></a></td>
               <td><?php echo $player->getNationality();?></td>
               <td><?php echo $player->getBirthdayDate()->format('d/m/Y'); ?></td>
               <td><?php echo $player->getPoste(); ?></td>
               <td><?php echo $player->getNumberPlayer(); ?></td>
             </tr>
           <?php endforeach; ?>
         </tbody>
       </table>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-lg-12 col-md-10">
      <button type="button" class="collapsible">Stade</button>
      <div class="content mt-3">
        Nom : <?php echo $stadium->getName(); ?>
        <br>
        Adresse : <?php echo $stadium->getAdress(); ?>
        <br>
        Tel : <?php echo $stadium->getTel(); ?>
        <br>
        Capacité : <?php echo $stadium->getCapacity(); ?>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-lg-12 col-md-10">
      <button type="button" class="collapsible">Match</button>
      <div class="content mt-3">
        <table class="table text-center">
          <th scope="row" colspan="4">Résultats saison 2019-2020</th>
          <?php foreach ($matchs as $match): ?>
            <tr>
             <td>Journée <?php echo $match->getDay(); ?></td>
             <td class="match"> <a href="teams/<?php echo $match->getIdTeamHome() ?>"><?php echo $match->getThShortName(); ?></a> </td>
             <td class="<?= $match->isWinner($team) ? 'text-success font-weight-bold' : '' ?> <?= $match->isLoser($team) ? 'text-danger' : '' ?>"><?php echo $match->getScoreHome(); ?>-<?php echo $match->getScoreAway(); ?></td>
             <td class="match"> <a href="teams/<?php echo $match->getIdTeamAway() ?>"><?php echo $match->getTaShortName(); ?></a> </td>
           </tr>
          <?php endforeach; ?>
        </table>
        <table class="table text-center">
          <th scope="row" colspan="3">Match à venir</th>
          <?php foreach ($nextMatchs as $nextMatch): ?>
            <tr>
             <td>Journée <?php echo $nextMatch->getDay(); ?></td>
             <td><?php echo $nextMatch->getThShortName(); ?> <?php echo $nextMatch->getScoreHome(); ?> - <?php echo $nextMatch->getScoreAway(); ?>  <?php echo $nextMatch->getTaShortName(); ?> </td>
             <td> <?php echo $nextMatch->getDate(); ?></td>
           </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>
  <!-- Compositon équipe
  <div class="row mt-4">
    <div class="col-lg-12 col-md-10">
      <button type="button" class="collapsible">Composition</button>
      <div class="content mt-3 compo">
        <div class="p1"></div>
        <div class="p2"></div>
        <div class="p3"></div>
        <div class="p4"></div>
        <div class="p5"></div>
        <div class="p6"></div>
        <div class="p7"></div>
        <div class="p8"></div>
        <div class="p9"></div>
        <div class="p10"></div>
        <div class="p11"></div>

        <img class="img-fluid w-100" src="./public/img/stade.png" alt="">
      </div>
    </div>
  </div> -->
</div>
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>
