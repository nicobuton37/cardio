<?php include "bdd/pdo.php"; ?>

<?php
function patientId($firstname, $name, $birthday, $neuro_hemo)
{
  var_dump($firstname, $name, $birthday);
  global $bdd;
  // $request = $bdd->prepare("INSERT INTO patient(firstname, name, birthday, neuro_hemo)
  //                       VALUES(:firstname, :name, :birthday, :neuro_hemo)");
  //
  // $request->execute(array(
  //   'firstname' => $firstname,
  //   'name'      => $name,
  //   'birthday'  => $birthday,
  //   'neuro_hemo'=> $neuro_hemo
  // ));
  //
  // echo "Le patient a été créé !";
}

function traitmentAction($aspirine, $thieno, $avk, $naco, $aucun, $contre_eto, $filtre_cave)
{
  global $bdd;

  // $request = $bdd->prepare("INSERT INTO traitement(aspirine, thieno, avk, naco, aucun, contre_eto, filtre_cave)
  //                           VALUES(:aspirine, :thieno, :avk, :naco, :aucun, :contre_eto, :filtre_cave)");
  // $request->execute(array(
  //   'aspirine'   => $aspirine,
  //   'thieno'     => $thieno,
  //   'avk'        => $avk,
  //   'naco'       => $naco,
  //   'aucun'      => $aucun,
  //   'contre_eto' => $contre_eto,
  //   'filtre_cave'=> $filtre_cave
  // ));

}

function chaAction($insu_cardiaque, $hta, $age, $diabete, $atcd, $vasculaire, $age_tranche, $femme)
{
  global $bdd;

  // $request = $bdd->prepare("INSERT INTO cha(insu_cardiaque, hta, age, diabete, atcd, vasculaire, age_tranche, femme)
  //                           VALUES(:insu_cardiaque, :hta, :age, :diabete, :atcd, :vasculaire, :age_tranche, :femme)");
  //
  // $request->execute(array(
  //   'insu_cardiaque' => $insu_cardiaque,
  //   'hta'            => $hta,
  //   'age'            => $age,
  //   'diabete'        => $diabete,
  //   'atcd'           => $atcd,
  //   'vasculaire'     => $vasculaire,
  //   'age_tranche'    => $age_tranche,
  //   'femme'          => $femme
  // ));
}

function hasAction($hta_has, $insu_hepatique, $insu_renale, $ait_avc, $saignement, $inr, $age_has, $alcool, $ains)
{
  global $bdd;

  // $request = $bdd->prepare("INSERT INTO has(hta_has, insu_hepatique, insu_renale, ait_avc, saignement, inr, age_has, alcool, ains)
  //                           VALUES(:hta_has, :insu_hepatique, :insu_renale, :ait_avc, :saignement, :inr, :age_has, :alcool, :ains)");
  //
  // $request->execute(array(
  //   'hta_has'        => $hta_has,
  //   'insu_hepatique' => $insu_hepatique,
  //   'insu_renale'    => $insu_renale,
  //   'ait_avc'        => $ait_avc,
  //   'saignement'     => $saignement,
  //   'inr'            => $inr,
  //   'age_has'        => $age_has,
  //   'alcool'         => $alcool,
  //   'ains'           => $ains
  // ));
}

function doctor($firstname_doc, $name_doc, $mail_doc, $specialite, $cardio)
{
  global $bdd;

  $request = $bdd->prepare();
}

function sendMail($mail)
{
  var_dump($mail);
}
