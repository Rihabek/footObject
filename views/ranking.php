<?php $extend = 'public/index.php'; ?>
<?php $title = "Classement ligue 1"?>
<?php $description = "Retrouvez le classement de ligue 1"; ?>

<style>
  .team {
    width: 40rem;
  }
  .team span {
    margin-right: 3rem;
  }
</style>

<div class="container">
  <div class="row">
    <table class="table  table-borderless">
    <tbody>
      <tr>
        <th class="team"></th>
        <td>Pts</td>
        <td>J.</td>
        <td>G.</td>
        <td>N.</td>
        <td>P.</td>
        <td>p.</td>
        <td>c.</td>
        <td>+/-</td>
      </tr>
      <?php foreach ($ranks as $rank): ?>
        <tr>
          <td class="team"> <span class="text-muted"><?php echo $rank->p ?></span> <b><?php echo $rank->short_name;?></b></td>
          <th><?php echo $rank->pts; ?></th>
          <td><?php echo $rank->gp; ?></td>
          <td><?php echo $rank->w; ?></td>
          <td><?php echo $rank->d; ?></td>
          <td><?php echo $rank->l; ?></td>
          <td><?php echo $rank->gf; ?></td>
          <td><?php echo $rank->ga ;?></td>
          <td><?php echo $rank->gd; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  </div>
</div>
