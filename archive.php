<?php include "parts/header.php"; ?>
<?php include "bdd/pdo.php"; ?>
<?php include "control/function.php"; ?>


<form class="form-group" action="index.php" method="post">
  <div class="panel panel-danger center">
    <div class="panel-heading">
      Attention !
    </div>
    <div class="panel-body">
      <div class="form-group">
        <label for="destruct">Voulez vous archiver et détruire les données enregistrées ?</label>
        <input type="submit" value="Confirmer" class="btn btn-warning btn_center" name="destruct">
      </div>
    </div>

  </div>



</form>

<?php


?>
