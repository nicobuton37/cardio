<?php include "parts/header.php"; ?>
<?php include "bdd/pdo.php"; ?>
<?php include "control/function.php"; ?>
<?php

?>
<?php
if (isset($_POST['post_close'])) {
  switchPostClose($_POST['post_close']);
}
if (isset($_POST['eto_imp']) && isset($_POST['ett_imp']) && isset($_POST['scanner']) && isset($_POST['cs_neuro']) && isset($_POST['cs_cardio'])) {
  postImpAction($_POST['eto_imp'], $_POST['ett_imp'], $_POST['scanner'], $_POST['cs_neuro'], $_POST['cs_cardio']);
}
if(isset($_POST['staff_date']) && isset($_POST['close']) && isset($_POST['examen']) && isset($_POST['post_op'])) {
  staffAction($_POST['staff_date'], $_POST['close'], $_POST['examen'], $_POST['post_op']);
}

$req_patient = $bdd->query("SELECT id FROM patient");
$response_patient = $req_patient->fetch();
$req_doctor = $bdd->query("SELECT * FROM doctor");
$response_doctor = $req_doctor->fetch();

if(isset($_POST['pdf'])){
  var_dump("prout");
}



?>
<form class="form-group" action="index.php?id=<?= $response_patient['id'] . '&amp;docid=' . $response_doctor['id']; ?>" method="post">
  <div class="panel panel-warning center">
    <div class="panel-heading">
      Vous désirez transmettre la fiche à l'adresse :
    </div>
    <div class="panel-body">
      <input type="text" name="mail" value="<?= $response_doctor['mail']; ?>" class="form-control confirm">
      <div class="form-group">
        <input type="submit" value="Confirmer" class="btn btn-success btn_center">
      </div>
    </div>

  </div>



</form>
<?php
if(isset($_POST['mail'])){
  sendMail($_POST['mail']);
}
?>
