<?php include "parts/header.php"; ?>
<?php include "bdd/pdo.php"; ?>
<?php include "control/function.php"; ?>

<?php

if(isset($_POST['has'])){
  switchHas($_POST['has']);
}
if(isset($_POST['traitement'])){
  switchTraitement($_POST['traitement']);
}
if(isset($_POST['cha'])){
  switchCha($_POST['cha']);
}
if(isset($_POST['firstname_doc']) && isset($_POST['name_doc']) && isset($_POST['mail_doc']) && isset($_POST['specialite']) && isset($_POST['cardio']) && isset($_POST['mail'])){
  doctorAction($_POST['firstname_doc'], $_POST['name_doc'], $_POST['mail'], $_POST['mail_doc'], $_POST['specialite'], $_POST['cardio']);
}
if(isset($_POST['firstname']) && isset($_POST['name']) && $_POST['birthday'] && isset($_POST['neuro_hemo'])) {
  patientAction($_POST['firstname'], $_POST['name'], $_POST['birthday'], $_POST['neuro_hemo']);
}
$patient = $bdd->query("SELECT id FROM patient");
$patient_datas = $patient->fetch();
$patient_id = $patient_datas['id'];
var_dump($patient_id);

$req_doctor = $bdd->query("SELECT mail_doc FROM doctor");
$response_doctor = $req_doctor->fetch();
?>
<form class="form-group" action="index.php?id=<?= $patient_id; ?>" method="post">
  <div class="panel panel-warning center">
    <div class="panel-heading">
      Vous désirez transmettre la fiche à l'adresse :
    </div>
    <div class="panel-body">
      <input type="text" name="mail" value="<?= $response_doctor['mail_doc']; ?>" class="form-control confirm">
      <div class="form-group">
        <input type="submit" value="Confirmer" class="btn btn-success btn_center">
      </div>
    </div>

  </div>



</form>
<?php
if(isset($response_doctor['mail_doc'])){
  sendMail($response_doctor['mail_doc']);
}
?>
