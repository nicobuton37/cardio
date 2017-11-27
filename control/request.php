<?php include "bdd/pdo.php"; ?>

<?php
function patientAction($firstname, $name, $birthday, $neuro_hemo)
{

  global $bdd;

  $traitment = $bdd->query("SELECT id FROM traitement");
  $response_traitment = $traitment->fetch();
  $traitment_id = $response_traitment['id'];

  $cha = $bdd->query("SELECT id FROM cha");
  $response_cha = $cha->fetch();
  $cha_id = $response_cha['id'];

  $has = $bdd->query("SELECT id FROM has");
  $response_has = $has->fetch();
  $has_id = $response_has['id'];

  $request = $bdd->prepare("INSERT INTO patient(firstname, name, birthday, neuro_hemo, traitment_id, cha_id, has_id)
                        VALUES(:firstname, :name, :birthday, :neuro_hemo, :traitment_id, :cha_id, :has_id)");

  $request->execute(array(
    'firstname'    => $firstname,
    'name'         => $name,
    'birthday'     => $birthday,
    'neuro_hemo'   => $neuro_hemo,
    'traitment_id' => $traitment_id,
    'cha_id'       => $cha_id,
    'has_id'       => $has_id
  ));



  echo "Le patient a été créé !";
}

function traitmentAction($aspirine, $thieno, $avk, $naco, $aucun, $contre_eto, $filtre_cave)
{
  global $bdd;

  $request = $bdd->prepare("INSERT INTO traitement(aspirine, thieno, avk, naco, aucun, contre_eto, filtre_cave)
                            VALUES(:aspirine, :thieno, :avk, :naco, :aucun, :contre_eto, :filtre_cave)");
  $request->execute(array(
    'aspirine'   => $aspirine,
    'thieno'     => $thieno,
    'avk'        => $avk,
    'naco'       => $naco,
    'aucun'      => $aucun,
    'contre_eto' => $contre_eto,
    'filtre_cave'=> $filtre_cave
  ));

}

function chaAction($insu_cardiaque, $hta, $age, $diabete, $atcd, $vasculaire, $age_tranche, $femme)
{
  global $bdd;

  $request = $bdd->prepare("INSERT INTO cha(insu_cardiaque, hta, age, diabete, atcd, vasculaire, age_tranche, femme)
                            VALUES(:insu_cardiaque, :hta, :age, :diabete, :atcd, :vasculaire, :age_tranche, :femme)");

  $request->execute(array(
    'insu_cardiaque' => $insu_cardiaque,
    'hta'            => $hta,
    'age'            => $age,
    'diabete'        => $diabete,
    'atcd'           => $atcd,
    'vasculaire'     => $vasculaire,
    'age_tranche'    => $age_tranche,
    'femme'          => $femme
  ));
}

function hasAction($hta_has, $insu_hepatique, $insu_renale, $ait_avc, $saignement, $inr, $age_has, $alcool, $ains)
{
  global $bdd;

  $request = $bdd->prepare("INSERT INTO has(hta_has, insu_hepatique, insu_renale, ait_avc, saignement, inr, age_has, alcool, ains)
                            VALUES(:hta_has, :insu_hepatique, :insu_renale, :ait_avc, :saignement, :inr, :age_has, :alcool, :ains)");

  $request->execute(array(
    'hta_has'        => $hta_has,
    'insu_hepatique' => $insu_hepatique,
    'insu_renale'    => $insu_renale,
    'ait_avc'        => $ait_avc,
    'saignement'     => $saignement,
    'inr'            => $inr,
    'age_has'        => $age_has,
    'alcool'         => $alcool,
    'ains'           => $ains
  ));
}

function doctorAction($firstname_doc, $name_doc, $mail, $mail_doc, $specialite, $cardio)
{
  global $bdd;

  $request = $bdd->prepare("INSERT INTO doctor(firstname_doc, name_doc, mail, mail_doc, specialite, cardio)
                            VALUES(:firstname_doc, :name_doc, :mail, :mail_doc, :specialite, :cardio)");

  $request->execute(array(
    'firstname_doc' => $firstname_doc,
    'name_doc'      => $name_doc,
    'mail'          => $mail,
    'mail_doc'      => $mail_doc,
    'specialite'    => $specialite,
    'cardio'        => $cardio
  ));

}

function sendMail($mail)
{
  // var_dump($mail);
}

function getPatientId($patient_id)
{
  global $bdd;

  $request = $bdd->exec("UPDATE doctor SET patient_id=" . $patient_id);


}

function postCloseAction($anesthesie, $eto_close, $tdm_coeur, $tdm_cerebral, $geriatrique)
{
  global $bdd;

  $request = $bdd->prepare("INSERT INTO post_close(anesthesie, eto_close, tdm_coeur, tdm_cerebral, geriatrique)
                            VALUES(:anesthesie, :eto_close, :tdm_coeur, :tdm_cerebral, :geriatrique)");

  $request->execute(array(
    'anesthesie'   => $anesthesie,
    'eto_close'    => $eto_close,
    'tdm_coeur'    => $tdm_coeur,
    'tdm_cerebral' => $tdm_cerebral,
    'geriatrique'  => $geriatrique
  ));
}

function postImpAction($eto_imp, $ett_imp, $scanner, $cs_neuro, $cs_cardio)
{
  global $bdd;

  $request = $bdd->prepare("INSERT INTO post_imp(eto_imp, ett_imp, scanner, cs_neuro, cs_cardio)
                            VALUES(:eto_imp, :ett_imp, :scanner, :cs_neuro, :cs_cardio)");

  $request->execute(array(
    'eto_imp'  => $eto_imp,
    'ett_imp'  => $ett_imp,
    'scanner'  => $scanner,
    'cs_neuro' => $cs_neuro,
    'cs_cardio'=> $cs_cardio
  ));
}

function staffAction($staff_date, $close, $examen, $post_op)
{
  global $bdd;

  $patient = $bdd->query("SELECT id FROM patient");
  $response_patient = $patient->fetch();
  $patient_id = $response_patient['id'];

  $post_close = $bdd->query("SELECT id FROM post_close");
  $response_post_close = $post_close->fetch();
  $post_close_id = $response_post_close['id'];

  $post_imp = $bdd->query("SELECT id FROM post_imp");
  $response_post_imp = $post_imp->fetch();
  $post_imp_id = $response_post_imp['id'];

  $request = $bdd->prepare("INSERT INTO staf(staff_date, close, examen, post_op, patient_id, post_close_id, post_imp_id)
                            VALUES(:staff_date, :close, :examen, :post_op, :patient_id, :post_close_id, :post_imp_id)");

  $request->execute(array(
    'staff_date'    => $staff_date,
    'close'         => $close,
    'examen'        => $examen,
    'post_op'       => $post_op,
    'patient_id'    => $patient_id,
    'post_close_id' => $post_close_id,
    'post_imp_id'   => $post_imp_id
  ));
}

function scoreHas()
{
  $score = 0;
  global $bdd;

  $request = $bdd->query("SELECT * FROM has");
  $datas = $request->fetch();
  var_dump($datas);
  // foreach ($datas as $key => $value) {
  //   switch ($value) {
  //     case 'hta_has':
  //       $score += 1;
  //       break;
  //     case 'insu_hepatique':
  //       $score += 2;
  //       break;
  //     case 'insu_renale':
  //       $score += 1;
  //       break;
  //     case 'ait':
  //       $score += 1;
  //       break;
  //     case 'saignement':
  //       $score += 1;
  //       break;
  //     case 'inr':
  //       $score += 2;
  //       break;
  //     case 'age_has':
  //       $score += 1;
  //       break;
  //     case 'alcool':
  //       $score += 1;
  //       break;
  //     case 'ains':
  //       $score += 2;
  //       break;
  //     default :
  //
  //       break;
  //   }
  // }
  echo $score;
}

function scoreCha()
{
  $score = 0;
  global $bdd;

  $request = $bdd->query("SELECT * FROM cha");
  $datas = $request->fetch();
  // var_dump($datas);
  foreach ($datas as $value) {
    echo $value . "<br>";
  }
  // if($datas['insu_cardiaque'] == "1" || $datas['hta'] == "1" || $datas['diabete'] == "1" || $datas['vasculaire'] == "1" || $datas['age_tranche'] == "1" || $datas['femme'] == "1"){
  //   $score += 1;
  // }else if($datas['age'] == "1" || $datas['atcd'] == "1"){
  //   $score += 2;
  // }else{
  //   $score += 0;
  // }
  // echo $score;
}
