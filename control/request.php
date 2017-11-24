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

function traitmentAction($traitement)
{

  global $bdd;

  $aspirine = 0;
  $thieno = 0;
  $avk = 0;
  $naco = 0;
  $aucun = 0;
  $contre_eto = 0;
  $filtre_cave = 0;


  foreach ($traitement as $key => $value) {
    switch ($value) {
      case 'aspirine':
        $aspirine = 1;
        break;
      case 'thieno':
        $thieno = 1;
        break;
      case 'avk':
        $avk = 1;
        break;
      case 'naco':
        $naco = 1;
        break;
      case 'aucun':
        $aucun = 1;
        break;
      case 'contre_eto':
        $contre_eto = 1;
        break;
      case 'filtre_cave':
        $filtre_cave = 1;
        break;
      default :

        break;
    }
  }

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

function scoreCha($cha)
{
  foreach ($cha as $key => $value) {
    var_dump($value);
  }
}

function scoreHas($has)
{
  foreach ($has as $key => $value) {
    var_dump($value);
  }
}

function doctor($firstname_doc, $name_doc, $mail_doc, $specialite, $cardio)
{
  var_dump($firstname_doc, $name_doc, $mail_doc, $specialite, $cardio);
}

function sendMail($mail)
{
  var_dump($mail);
}
