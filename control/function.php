<?php
include "request.php";

function switchTraitement($traitement)
{
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

  // echo('aspirine => '. $aspirine . "</br>" .
  //       'thieno => ' . $thieno . '</br>' .
  //       'avk => ' . $avk . "</br>" .
  //       'naco => ' . $naco . "</br>" .
  //       'aucun => ' . $aucun . "</br>" .
  //       'contre_eto => ' . $contre_eto . "</br>" .
  //       'filtre_cave => ' . $filtre_cave);

  traitmentAction($aspirine, $thieno, $avk, $naco, $aucun, $contre_eto, $filtre_cave);
}

function switchCha($cha)
{
  $score = 0;
  $insu_cardiaque = 0;
  $hta = 0;
  $age = 0;
  $diabete = 0;
  $atcd = 0;
  $vasculaire = 0;
  $age_tranche = 0;
  $femme = 0;

  global $bdd;
  foreach ($cha as $key => $value) {

    switch ($value) {
      case 'insu_cardiaque':
        $insu_cardiaque = 1;
        $score += 1;
        break;
      case 'hta':
        $hta = 1;
        $score += 1;
        break;
      case 'age':
        $age = 1;
        $score += 2;
        break;
      case 'diabete':
        $diabete = 1;
        $score += 1;
        break;
      case 'atcd':
        $atcd = 1;
        $score += 2;
        break;
      case 'vasculaire':
        $vasculaire = 1;
        $score += 1;
        break;
      case 'age_tranche':
        $age_tranche = 1;
        $score += 1;
        break;
      case 'femme':
        $femme = 1;
        $score += 1;
        break;
      default :

        break;
    }

  }
  // echo('insu_cardiaque => '. $insu_cardiaque . "</br>" .
  //       'hta => ' . $hta . '</br>' .
  //       'age => ' . $age . "</br>" .
  //       'diabete => ' . $diabete . "</br>" .
  //       'atcd => ' . $atcd . "</br>" .
  //       'vasculaire => ' . $vasculaire . "</br>" .
  //       'age_tranche => ' . $age_tranche . "</br>" .
  //       'femme => ' . $femme);
  chaAction($insu_cardiaque, $hta, $age, $diabete, $atcd, $vasculaire, $age_tranche, $femme);
}

function switchHas($has)
{
  $hta_has = 0;
  $insu_hepatique = 0;
  $insu_renale = 0;
  $ait_avc = 0;
  $saignement = 0;
  $inr = 0;
  $age_has = 0;
  $alcool = 0;
  $ains = 0;

  foreach ($has as $key => $value) {
    switch ($value) {
      case 'hta_has':
        $hta_has = 1;
        break;
      case 'insu_hepatique':
        $insu_hepatique = 1;
        break;
      case 'insu_renale':
        $insu_renale = 1;
        break;
      case 'ait':
        $ait_avc = 1;
        break;
      case 'saignement':
        $saignement = 1;
        break;
      case 'inr':
        $inr = 1;
        break;
      case 'age_has':
        $age_has = 1;
        break;
      case 'alcool':
        $alcool = 1;
        break;
      case 'ains':
        $ains = 1;
        break;
      default :

        break;
    }
  }
  // echo('hta_has => '. $hta_has . "</br>" .
  //       'insu_hepatique => ' . $insu_hepatique . '</br>' .
  //       'insu_renale => ' . $insu_renale . "</br>" .
  //       'ait_avc => ' . $ait_avc . "</br>" .
  //       'saignement => ' . $saignement . "</br>" .
  //       'inr => ' . $inr . "</br>" .
  //       'age_has => ' . $age_has . "</br>" .
  //       'alcool => ' . $alcool . "</br>" .
  //       'ains => ' . $ains);

  hasAction($hta_has, $insu_hepatique, $insu_renale, $ait_avc, $saignement, $inr, $age_has, $alcool, $ains);
}


function switchPostClose($post_close)
{
  $anesthesie = 0;
  $eto_close = 0;
  $tdm_coeur = 0;
  $tdm_cerebral = 0;
  $geriatrique = 0;

  foreach ($post_close as $key => $value) {
    switch ($value) {
      case 'anesthesie':
        $anesthesie = 1;
        break;
      case 'eto_close':
        $eto_close = 1;
        break;
      case 'tdm_coeur':
        $tdm_coeur = 1;
        break;
      case 'tdm_cerebral':
        $tdm_cerebral = 1;
        break;
      case 'geriatrique':
        $geriatrique = 1;
        break;

      default:

        break;
    }
  }
  postCloseAction($anesthesie, $eto_close, $tdm_coeur, $tdm_cerebral, $geriatrique);
}

function sendMailToStaff($id, $mail)
{
  $to = $mail;

  $subject = "Fiche de liaison fermeture auriculaire gauche";

  $message = "
              <html>
                <head>
                <title>Fiche de liaison fermeture auriculaire gauche</title>
                </head>
                <body>
                  <p>Cliquez sur le lien pour accéder à la fiche afin de remplir votre partie du formulaire.</p>
                  <p><a href='http://www.le-zeste.com/FLFAG/cardio/index.php?id=$id'>Fiche de liaison</a></p>
                </body>
              </html>";


  $headers = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

  mail($to, $subject, $message, $headers);
}

function sendMailToDoctor($id, $docid, $mail)
{
  $to = $mail;

  $subject = "Fiche de liaison fermeture auriculaire gauche";

  $message = "<html>
                <head>
                <title>Fiche de liaison fermeture auriculaire gauche</title>
                </head>
                <body>
                  <p>Cliquez sur le lien pour accéder à la fiche afin de remplir votre partie du formulaire.</p>
                  <p><a href='http://www.le-zeste.com/FLFAG/cardio/index.php?id=$id&docid=$docid'>Accéder à la fiche</a></p>
                </body>
              </html>";


  $headers = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

  mail($to, $subject, $message, $headers);
}
