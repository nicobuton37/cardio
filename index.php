<?php include "parts/header.php"; ?>
<?php include "bdd/pdo.php"; ?>
<?php include "control/function.php"; ?>

<?php
if(isset($_GET['id'])){
  $patient_id = $_GET['id'];
  $patient = $bdd->query("SELECT * FROM patient WHERE id='$patient_id'");
  $patient_datas = $patient->fetch();


  $doctor = $bdd->query("SELECT * FROM doctor");
  $doctor_datas = $doctor->fetch();

  $traitement = $bdd->query("SELECT * FROM traitement WHERE id=(SELECT traitment_id FROM patient WHERE id='$patient_id')");
  $traitement_datas = $traitement->fetch();

  $cha = $bdd->query("SELECT * FROM cha WHERE id=(SELECT cha_id FROM patient WHERE id='$patient_id')");
  $cha_datas = $cha->fetch();

  $has = $bdd->query("SELECT * FROM has WHERE id=(SELECT has_id FROM patient WHERE id='$patient_id')");
  $has_datas = $has->fetch();

  sendMailToStaff($_GET['id'], $doctor_datas['mail']);
}
if(isset($_GET['docid'])){
  sendMailToDoctor($_GET['id'], $_GET['docid'], $doctor_datas['mail_doc']);
}
?>
<div class="alert alert-success" role="alert" id="message_success" <?= isset($_GET['id']) ? "" : "hidden" ?>>
  Votre email a bien été envoyé à <?= isset($_GET['docid']) ? $doctor_datas['mail_doc'] : $doctor_datas['mail']; ?>
</div>
<div class="panel panel-default">
  <div class="panel-heading custom">
    Formulaire médecin
  </div>
<div class="panel-body">
  <!-- Formulaire médecin -->
  <form id="doctor" action="toStaff.php" method="post">
    <div class="row form-group">

      <!-- panel patient -->
      <div class="col-sm-4">
        <div class="panel panel-info">
          <div class="panel-heading custom">
            Patient
          </div>
          <div class="panel-body">
            <label for="firstname">Nom :</label>
            <input type="text" name="firstname" class="form-control" value="<?= isset($_GET['id']) ? $patient_datas['firstname'] : ''; ?>" <?= isset($_GET['id']) ? 'disabled' : ''; ?>>
            <label for="name">Prénom :</label>
            <input type="text" name="name" class="form-control" value="<?= isset($_GET['id']) ? $patient_datas['name'] : ''; ?>" <?= isset($_GET['id']) ? 'disabled' : ''; ?>>
            <label for="birthday">Date de naissance :</label>
            <input type="date" name="birthday" class="form-control" id="datepicker" value="<?= isset($_GET['id']) ? $patient_datas['birthday'] : ''; ?>" <?= isset($_GET['id']) ? 'disabled' : ''; ?>>
          </div>
        </div>
      </div>
      <!-- panel patient -->

      <!-- panel médecin -->
      <div class="col-sm-8">
        <div class="panel panel-info">
          <div class="panel-heading custom">
            Médecins
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-6">
                <label for="firstname_doc">Nom :</label>
                <input type="text" name="firstname_doc" class="form-control"  value="<?= isset($_GET['id']) ? $doctor_datas['firstname_doc'] : ''; ?>" <?= isset($_GET['id']) ? 'disabled' : ''; ?>>
                <label for="name_doc">Prénom :</label>
                <input type="text" name="name_doc" class="form-control"  value="<?= isset($_GET['id']) ? $doctor_datas['name_doc'] : ''; ?>" <?= isset($_GET['id']) ? 'disabled' : ''; ?>>
                <label for="mail_doc">Email :</label>
                <input type="text" name="mail_doc" class="form-control" value="<?= isset($_GET['id']) ? $doctor_datas['mail_doc'] : ''; ?>" <?= isset($_GET['id']) ? 'disabled' : ''; ?>>
              </div>
              <div class="col-sm-6">
                <label for="specialite">Spécialité :</label>
                <input type="text" name="specialite" class="form-control" value="<?= isset($_GET['id']) ? $doctor_datas['specialite'] : ''; ?>" <?= isset($_GET['id']) ? 'disabled' : ''; ?>>
                <label for="cardio">Cardiologue référent :</label>
                <input type="text" name="cardio" class="form-control" placeholder="Nom et Prénom" value="<?= isset($_GET['id']) ? $doctor_datas['cardio'] : ''; ?>" <?= isset($_GET['id']) ? 'disabled' : ''; ?>>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- panel médecin -->
    </div>
    <!-- panel traitement -->
    <div class="row form-group">
      <div class="col-sm-4">
        <div class="panel panel-info">
          <div class="panel-heading custom">
            Traitement actuel
          </div>
          <div class="panel-body">
            <ul class="list-group">
              <li class="list-group-item">Aspirine<input type="checkbox" class="right" value="aspirine" name="traitement[]" <?= isset($_GET['id']) && $traitement_datas['aspirine'] === '1' ? "checked='checked'" : '' ;?>></li>
              <li class="list-group-item">Thienopyridine<input type="checkbox" class="right" value="thieno" name="traitement[]"x<?= isset($_GET['id']) && $traitement_datas['thieno'] === '1' ? "checked='checked'" : "" ;?>></li>
              <li class="list-group-item">AVK<input type="checkbox" class="right" value="avk" name="traitement[]" <?= isset($_GET['id']) && $traitement_datas['avk'] === '1' ? "checked='checked'" : "" ;?>></li>
              <li class="list-group-item">NACO<input type="checkbox" class="right" value="naco" name="traitement[]" <?= isset($_GET['id']) && $traitement_datas['naco'] === '1' ? "checked='checked'" : "" ;?>></li>
              <li class="list-group-item">Aucun<input type="checkbox" class="right" value="aucun" name="traitement[]" <?= isset($_GET['id']) && $traitement_datas['aucun'] === '1' ? "checked='checked'" : "" ;?>></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-sm-8">
        <div class="panel panel-info">
          <div class="panel-heading custom">
            Score
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-6">
                <ul class="list-group" id="ulCha">
                  <li class="list-group-item title">Score de risque CHA²DSVASc</li>
                  <li class="list-group-item" overflow="auto" value="1"  id="sum"><div class="row">
                    <div class="col-md-7">
                  Insuffisance cardiaque
                    </div>
                    <div class="col-md-3 second">
                      1
                    </div>
                    <div class="col-md-2 third">
                      <input id="cha[]" data-value="1" class="right" type="checkbox" value="insu_cardiaque" name="cha[]" <?= isset($_GET['id']) && $cha_datas['insu_cardiaque'] === '1' ? "checked='checked'" : ""; ?>>
                    </div>
                  </div></li>
                  <li class="list-group-item" overflow="auto" value="1"  id="sum">
                    <div class="row">
                      <div class="col-md-7">
                        HTA
                      </div>
                      <div class="col-md-3 second">
                        1
                      </div>
                      <div class="col-md-2 third">
                        <input id="cha[]" class="right" data-value="1" type="checkbox" value="hta" name="cha[]" <?= isset($_GET['id']) && $cha_datas['hta'] === '1' ? "checked='checked'" : ""; ?>>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item" value="2"  id="sum">
                    <div class="row">
                      <div class="col-md-7">
                        Age >= 75 ans
                      </div>
                      <div class="col-md-3 second">
                        2
                      </div>
                      <div class="col-md-2 third">
                        <input data-value="2" id="cha[]" class="right" type="checkbox" value="age" name="cha[]" <?= isset($_GET['id']) && $cha_datas['age'] === '1' ? "checked='checked'" : ""; ?>>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item" value="1"  id="sum">
                    <div class="row">
                      <div class="col-md-7">
                        Diabète
                      </div>
                      <div class="col-md-3 second">
                        1
                      </div>
                      <div class="col-md-2 third">
                        <input data-value="1" id="cha[]" class="right" type="checkbox" value="diabete" name="cha[]" <?= isset($_GET['id']) && $cha_datas['diabete'] === '1' ? "checked='checked'" : ""; ?>>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item" value="2"  id="sum">
                  <div class="row">
                    <div class="col-md-7">
                      ATCD AIT ou AVC
                    </div>
                    <div class="col-md-3 second">
                      2
                    </div>
                    <div class="col-md-2 third">
                      <input  data-value="2" id="cha[]" class="right" type="checkbox" value="atcd" name="cha[]" <?= isset($_GET['id']) && $cha_datas['atcd'] === '1' ? "checked='checked'" : ""; ?>>
                    </div>
                  </div></li>
                  <li class="list-group-item" value="1"  id="sum">
                    <div class="row">
                      <div class="col-md-7">
                        Maladie vasculaire
                      </div>
                      <div class="col-md-3 second">
                        1
                      </div>
                      <div class="col-md-2 third">
                        <input data-value="1" id="cha[]" class="right" type="checkbox" value="vasculaire" name="cha[]" <?= isset($_GET['id']) && $cha_datas['vasculaire'] === '1' ? "checked='checked'" : ""; ?>>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item" value="1"  id="sum">
                    <div class="row">
                      <div class="col-md-7">
                        Age 65-74 ans
                      </div>
                      <div class="col-md-3 second">
                        1
                      </div>
                      <div class="col-md-2 third">
                        <input data-value="1" id="cha[]" class="right" type="checkbox" value="age_tranche" name="cha[]" <?= isset($_GET['id']) && $cha_datas['age_tranche'] === '1' ? "checked='checked'" : ""; ?>>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item" value="1"  id="sum">
                    <div class="row">
                      <div class="col-md-7">
                        Sexe féminin
                      </div>
                      <div class="col-md-3 second">
                        1
                      </div>
                      <div class="col-md-2 third">
                        <input data-value="1" id="cha[]" class="right" type="checkbox" value="femme" name="cha[]" <?= isset($_GET['id']) && $cha_datas['femme'] === '1' ? "checked='checked'" : ""; ?>>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">//</li>
                  <li class="list-group-item">Total :<p class="right" id="totalCha"></p></li>
                </ul>
              </div>
              <div class="col-sm-6">
                <ul class="list-group">
                  <li class="list-group-item title">Score de risque HASBLED</li>
                  <li class="list-group-item" value="1"  id="sum">
                    <div class="row">
                      <div class="col-md-7">
                        HTA
                      </div>
                      <div class="col-md-3 second">
                        1
                      </div>
                      <div class="col-md-2 third">
                        <input data-value="1" id="has[]" class="right" type="checkbox" id="hta_has" value="hta_has" name="has[]" <?= isset($_GET['id']) && $has_datas['hta_has'] === '1' ? "checked='checked'" : ""; ?>>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item" value="2"  id="sum">
                    <div class="row">
                      <div class="col-md-7">
                        Insuffisance hépatique
                      </div>
                      <div class="col-md-3 second">
                        2
                      </div>
                      <div class="col-md-2 third">
                        <input data-value="2" id="has[]" class="right" type="checkbox" id="insu_hepatique" value="insu_hepatique" name="has[]" <?= isset($_GET['id']) && $has_datas['insu_hepatique'] === '1' ? "checked='checked'" : ""; ?>>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item" value="1"  id="sum">
                    <div class="row">
                      <div class="col-md-7">
                        Insufisance rénale
                      </div>
                      <div class="col-md-3 second">
                        1
                      </div>
                      <div class="col-md-2 third">
                        <input data-value="1" id="has[]" class="right" type="checkbox" id="insu_renale" value="insu_renale" name="has[]" <?= isset($_GET['id']) && $has_datas['insu_renale'] === '1' ? "checked='checked'" : ""; ?>>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item" value="1" id="sum">
                    <div class="row">
                      <div class="col-md-7">
                        ATCD AIT ou AVC
                      </div>
                      <div class="col-md-3 second">
                        1
                      </div>
                      <div class="col-md-2 third">
                        <input data-value="1" id="has[]" class="right" type="checkbox" id="ait_avc" value="ait_avc" name="has[]" <?= isset($_GET['id']) && $has_datas['ait_avc'] === '1' ? "checked='checked'" : ""; ?>>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item" value="1"  id="sum">
                    <div class="row">
                      <div class="col-md-7">
                        Saignement
                      </div>
                      <div class="col-md-3 second">
                        1
                      </div>
                      <div class="col-md-2">
                        <input data-value="1" id="has[]" class="right" type="checkbox" id="saignement" value="saignement" name="has[]" <?= isset($_GET['id']) && $has_datas['saignement'] === '1' ? "checked='checked'" : ""; ?>>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item" value="2"  id="sum">
                    <div class="row">
                      <div class="col-md-7">
                        INR labile
                      </div>
                      <div class="col-md-3 second">
                        2
                      </div>
                      <div class="col-md-2 third">
                        <input data-value="2" id="has[]" class="right" type="checkbox" id="inr" value="inr" name="has[]" <?= isset($_GET['id']) && $has_datas['inr'] === '1' ? "checked='checked'" : ""; ?>>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item" value="1"  id="sum">
                    <div class="row">
                      <div class="col-md-7">
                        Age >= 65 ans
                      </div>
                      <div class="col-md-3 second">
                        1
                      </div>
                      <div class="col-md-2 third">
                        <input data-value="1" id="has[]" class="right" type="checkbox" id="age_has" value="age_has" name="has[]" <?= isset($_GET['id']) && $has_datas['age_has'] === '1' ? "checked='checked'" : ""; ?>>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item" value="1"  id="sum">
                    <div class="row">
                      <div class="col-md-7">
                        Alcool
                      </div>
                      <div class="col-md-3 second">
                        1
                      </div>
                      <div class="col-md-2 third">
                        <input data-value="1" id="has[]" class="right" type="checkbox" id="alcool" value="alcool" name="has[]" <?= isset($_GET['id']) && $has_datas['alcool'] === '1' ? "checked='checked'" : ""; ?>>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item" value="2"  id="sum">
                    <div class="row">
                      <div class="col-md-7">
                        AINS
                      </div>
                      <div class="col-md-3 second">
                        2
                      </div>
                      <div class="col-md-2 third">
                        <input data-value="2" id="has[]" class="right" type="checkbox" id="ains" value="ains" name="has[]" <?= isset($_GET['id']) && $has_datas['ains'] === '1' ? "checked='checked'" : ""; ?>>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">Total :<p class="right" id="totalHas"></p></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="panel panel-info">
        <div class="panel-heading custom">
          Détails supplémentaires
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-6">
              Contre Indication à l'ETO <input type="checkbox" value="contre_eto" class="right" name="traitement[]" <?= isset($_GET['id']) && $traitement_datas['contre_eto'] === '1' ? "checked='checked'" : "" ;?>>
            </div>
            <div class="col-sm-6">
              filtre cave <input type="checkbox" value="filtre_cave" class="right" name="traitement[]" <?= isset($_GET['id']) && $traitement_datas['filtre_cave'] === '1' ? "checked='checked'" : "" ;?>>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="neuro_hemo">Précisions sur l'histoire neurologique et hémorrogique :</label>
      <textarea name="neuro_hemo" rows="8" cols="80" class="form-control" <?= isset($_GET['id']) ? "disabled" : '' ?>><?= isset($_GET['id']) ? $patient_datas['neuro_hemo'] : ''; ?></textarea>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <input type="text" name="mail" class="form-control" placeholder="Email du destinataire" value="<?= isset($_GET['id']) ? $doctor_datas['mail'] : ""; ?>" <?= isset($_GET['id']) ? 'disabled' : ''; ?>>
        </div>
      </div>
      <div class="col-sm-6">
        <?php
        if(!isset($_GET['id'])){
          echo "<input type='submit' class='btn btn-success staff_button right' value='Envoyer au staff'>";
        }
        ?>
      </div>
    </div>






  </form>
  <!-- Formulaire médecin -->
  </div>
</div>

<?php
$req = $bdd->query("SELECT id FROM patient");
$response = $req->fetch();
getPatientId($response['id']);

if(isset($_GET['id']) && isset($_GET['docid'])){
  $staff = $bdd->query("SELECT * FROM staf");
  $staff_datas = $staff->fetch();

  $post_close = $bdd->query("SELECT * FROM post_close");
  $post_close_datas = $post_close->fetch();

  $post_imp = $bdd->query("SELECT * FROM post_imp");
  $post_imp_datas = $post_imp->fetch();
}
?>

<!-- Formulaire staff -->
<div class="panel panel-default" id="panel_staff"  <?= !isset($_GET['id']) ? 'hidden' : ''; ?>>
  <div class="panel-heading custom">
    Formulaire Staff
  </div>
<div class="panel-body">
  <div class="panel panel-info">
    <div class="panel-heading custom">
      Décision du staf
    </div>
    <form id="staff" action="toDoctor.php?id=<?= $_GET['id']; ?>" method="post">
      <div class="panel-body">

        <!-- date et fermeture -->
        <div class="row form-group">
          <div class="col-sm-6">
            <label for="staff_date">Date du staff :</label>
            <input type="date" id="datepicker" name="staff_date" value="<?= isset($_GET['docid']) ? $staff_datas['staff_date'] : ''; ?>" <?= isset($_GET['docid']) ? 'disabled' : ''; ?>>
          </div>
          <div class="col-sm-6">
            <label for="close">Eligible à la fermeture :</label>
            <div class="btn-group" data-toggle="buttons">
                <input type="radio" name="close" value="oui" <?= isset($_GET['docid']) && $staff_datas['close'] === 'oui' ? "checked='checked'" : ""; ?>> OUI
                <input type="radio" name="close" value="non" <?= isset($_GET['docid']) && $staff_datas['close'] === 'non' ? "checked='checked'" : ""; ?>> NON
            </div>
          </div>
        </div>
        <!-- date et fermeture -->

        <!-- Avis staff -->
        <div class="row form-group">
          <div class="col-sm-6">
            <label for="examen">Examens / Avis conditionnant la décision :</label>
            <textarea name="examen" rows="8" cols="80" class="form-control" <?= isset($_GET['docid']) ? "disabled" : ""; ?>><?= isset($_GET['docid']) ? $staff_datas['examen'] : ""; ?></textarea>
          </div>
          <div class="col-sm-6">
            <label for="post_op">Gestion prévisible et durée du traitement AAP / AVK en post-op :</label>
            <textarea name="post_op" rows="8" cols="80" class="form-control" <?= isset($_GET['docid']) ? "disabled" : ""; ?>><?= isset($_GET['docid']) ? $staff_datas['post_op'] : "";?></textarea>
          </div>
        </div>
        <!-- Avis staff -->

        <!-- Exam avant fermeture et suivi post implantation -->
        <div class="row form-group">
          <div class="col-sm-6">
            <div class="panel panel-info">
              <div class="panel-heading custom">
                Examens à programmer avant fermeture
              </div>
              <div class="panel-body">
                <ul class="list-group">
                  <li class="list-group-item">Cs anesthésie<input type="checkbox" value="anesthesie" name="post_close[]" class="right" <?= isset($_GET['docid']) && $post_close_datas['anesthesie'] === '1' ? "checked='checked'" : ""; ?>></li>
                  <li class="list-group-item">ETO<input type="checkbox" value="eto_close" class="right" name="post_close[]" <?= isset($_GET['docid']) && $post_close_datas['eto_close'] === "1" ? "checked='checked'" : ""; ?>></li>
                  <li class="list-group-item">TDM coeur<input type="checkbox" value="tdm_coeur" class="right" name="post_close[]" <?= isset($_GET['docid']) && $post_close_datas['tdm_coeur'] === "1" ? "checked='checked'" : ""; ?>></li>
                  <li class="list-group-item">TDM cérébral / IRM<input type="checkbox" value="tdm_cerebral" class="right" name="post_close[]" <?= isset($_GET['docid']) && $post_close_datas['tdm_cerebral'] === "1" ? "checked='checked'" : ""; ?>></li>
                  <li class="list-group-item">Avis gériatrique<input type="checkbox" value="geriatrique" class="right" name="post_close[]" <?= isset($_GET['docid']) && $post_close_datas['geriatrique'] === "1" ? "checked='checked'" : ""; ?>></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="panel panel-info">
              <div class="panel-heading custom">
                Suivi post implantation
              </div>
              <div class="panel-body">
                <ul class="list-group">
                  <li class="list-group-item">
                    ETO
                    <div class="btn-group right"  data-toggle="buttons">
                        <input type="radio" name="eto_imp" value="1 mois" autocomplete="off" <?= isset($_GET['docid']) && $post_imp_datas['eto_imp'] === '1 mois' ? "checked='checked'" : ""; ?>> 1 mois
                        <input type="radio" name="eto_imp" value="3 mois" autocomplete="off" <?= isset($_GET['docid']) && $post_imp_datas['eto_imp'] === '3 mois' ? "checked='checked'" : ""; ?>> 3 mois
                    </div>
                  </li>
                  <li class="list-group-item">ETT
                    <div class="btn-group right"  data-toggle="buttons">
                        <input type="radio" name="ett_imp" value="1 mois" autocomplete="off"<?= isset($_GET['docid']) && $post_imp_datas['ett_imp'] === '1 mois' ? "checked='checked'" : ""; ?>> 1 mois
                        <input type="radio" name="ett_imp" value="3 mois" autocomplete="off" <?= isset($_GET['docid']) && $post_imp_datas['ett_imp'] === '3 mois' ? "checked='checked'" : ""; ?>> 3 mois
                    </div>
                  </li>
                  <li class="list-group-item">Scanner cardiaque
                    <div class="btn-group right"  data-toggle="buttons">
                        <input type="radio" name="scanner" value="1 mois" autocomplete="off" <?= isset($_GET['docid']) && $post_imp_datas['scanner'] === '1 mois' ? "checked='checked'" : ""; ?>> 1 mois
                        <input type="radio" name="scanner" value="3 mois" autocomplete="off" <?= isset($_GET['docid']) && $post_imp_datas['scanner'] === '3 mois' ? "checked='checked'" : ""; ?>> 3 mois
                    </div>
                  </li>
                  <li class="list-group-item">Cs neuro
                    <div class="btn-group right"  data-toggle="buttons">
                        <input type="radio" name="cs_neuro" value="1 mois" autocomplete="off" <?= isset($_GET['docid']) && $post_imp_datas['cs_neuro'] === '1 mois' ? "checked='checked'" : ""; ?>> 1 mois
                        <input type="radio" name="cs_neuro" value="3 mois" autocomplete="off" <?= isset($_GET['docid']) && $post_imp_datas['cs_neuro'] === '3 mois' ? "checked='checked'" : ""; ?>> 3 mois
                    </div>
                  </li>
                  <li class="list-group-item">Cs cardio
                    <div class="btn-group right"  data-toggle="buttons">
                        <input type="radio" name="cs_cardio" value="1 mois" autocomplete="off" <?= isset($_GET['docid']) && $post_imp_datas['cs_cardio'] === '1 mois' ? "checked='checked'" : ""; ?>> 1 mois
                        <input type="radio" name="cs_cardio" value="3 mois" autocomplete="off" <?= isset($_GET['docid']) && $post_imp_datas['cs_cardio'] === '3 mois' ? "checked='checked'" : ""; ?>> 3 mois
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- Exam avant fermeture et suivi post implantation -->

      </div>
    </div>
    <div class="form-group">
      <?php
      if(!isset($_GET['docid'])){
        echo "<input type='submit' class='btn btn-success right' value='Envoyer'>";
      }

      ?>
    </div>
  </form>
</div>
</div>

<?php
if(isset($_GET['id']) && isset($_GET['docid'])){
  echo "<form action='archive.php' method='post'>
  <div class='panel panel-warning'>
          <div class='panel-heading custom'>Supprimer les informations patient</div>
          <div class='panel-body'>
            <input type='submit' class='btn btn-success' value='supprimer'>
          </div>
        </div>
        </form>";
}

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

<!-- Formulaire staff -->
<?php include "parts/footer.php"; ?>
