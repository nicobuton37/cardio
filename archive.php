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
if(isset($_POST['destruct'])) {


  $delete_staf = $bdd->exec("DELETE FROM staf");
  $delete_post_close = $bdd->exec("DELETE FROM post_close");
  $delete_post_imp = $bdd->exec("DELETE FROM post_imp");
  $delete_doctor = $bdd->exec("DELETE FROM doctor");
  $delete_patient = $bdd->exec("DELETE FROM patient");
  $delete_traitement = $bdd->exec("DELETE FROM traitement");
  $delete_cha = $bdd->exec("DELETE FROM cha");
  $delete_has = $bdd->exec("DELETE FROM has");

}

?>
