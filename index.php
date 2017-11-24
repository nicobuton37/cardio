<?php include "parts/header.php"; ?>

<!-- titre -->
<div class="page-header">
  <h1>Fiche de liaison Fermeture auricule gauche</h1>
</div>
<!-- titre -->

<!-- Formulaire médecin -->
<form id="doctor" action="index.php" method="post">
  <div class="row form-group">

    <!-- panel patient -->
    <div class="col-sm-4">
      <div class="panel panel-info">
        <div class="panel-heading">
          Patient
        </div>
        <div class="panel-body">
          <label for="firstname">Nom :</label>
          <input type="text" name="firstname" class="form-control">

          <label for="name">Prénom :</label>
          <input type="text" name="name" class="form-control">

          <label for="birthday">Date de naissance :</label>
          <input type="text" name="birthday" class="form-control" placeholder="jj/mm/aaaa">
        </div>
      </div>
    </div>
    <!-- panel patient -->

    <!-- panel médecin -->
    <div class="col-sm-8">
      <div class="panel panel-info">
        <div class="panel-heading">
          Médecins
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-6">
              <label for="firstname_doc">Nom :</label>
              <input type="text" name="firstname_doc" class="form-control">
              <label for="name_doc">Prénom :</label>
              <input type="text" name="name_doc" class="form-control">
              <label for="mail_doc">Email :</label>
              <input type="text" name="mail_doc" class="form-control">
            </div>
            <div class="col-sm-6">
              <label for="specialite">Spécialité :</label>
              <input type="text" name="specialite" class="form-control">
              <label for="cardio">Cardiologue référent :</label>
              <input type="text" name="cardio" class="form-control">
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
        <div class="panel-heading">
          Traitement actuel
        </div>
        <div class="panel-body">
          <ul class="list-group">
            <li class="list-group-item">Aspirine<input type="checkbox" class="right" name="aspirine"></li>
            <li class="list-group-item">Thienopyridine<input type="checkbox" class="right" name="thieno"></li>
            <li class="list-group-item">AVK<input type="checkbox" class="right" name="avk"></li>
            <li class="list-group-item">NACO<input type="checkbox" class="right" name="naco"></li>
            <li class="list-group-item">Aucun<input type="checkbox" class="right" name="aucun"></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="panel panel-info">
        <div class="panel-heading">
          Score
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-6">
              <ul class="list-group">
                <li class="list-group-item">Insuffisance cardiaque<input class="right" type="checkbox" name="insu_cardiaque"></li>
                <li class="list-group-item">HTA<input class="right" type="checkbox" name="hta"></li>
                <li class="list-group-item">Age >= 76 ans<input class="right" type="checkbox" name="age"></li>
                <li class="list-group-item">Diabète<input class="right" type="checkbox" name="diabete"></li>
                <li class="list-group-item">ATCD AIT ou AVC<input class="right" type="checkbox" name="atcd"></li>
                <li class="list-group-item">Vascular Disease<input class="right" type="checkbox" name="vasculaire"></li>
                <li class="list-group-item">Age 65-74 ans<input class="right" type="checkbox" name="age_tranche"></li>
                <li class="list-group-item">Sexe féminin<input class="right" type="checkbox" name="femme"></li>
                <li class="list-group-item">//</li>
                <li class="list-group-item">Total :<p class="right">10</p></li>
              </ul>
            </div>
            <div class="col-sm-6">
              <ul class="list-group">
                <li class="list-group-item">HTA<input class="right" type="checkbox" name="hta_has"></li>
                <li class="list-group-item">Insuffisance hépatique<input class="right" type="checkbox" name="insu_hepatique"></li>
                <li class="list-group-item">Insufisance rénale<input class="right" type="checkbox" name="insu_renale"></li>
                <li class="list-group-item">ATCD AIT ou AVC<input class="right" type="checkbox" name="ait"></li>
                <li class="list-group-item">Saignement<input class="right" type="checkbox" name="saignement"></li>
                <li class="list-group-item">INR labile<input class="right" type="checkbox" name="inr"></li>
                <li class="list-group-item">Age >= 65 ans<input class="right" type="checkbox" name="age_has"></li>
                <li class="list-group-item">Alcool<input class="right" type="checkbox" name="alcool"></li>
                <li class="list-group-item">Ains<input class="right" type="checkbox" name="ains"></li>
                <li class="list-group-item">Total :<p class="right">15</p></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="panel panel-info">
      <div class="panel-heading">
        Détails supplémentaires
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-6">
            Contre Indication à l'ETO <input type="checkbox" name="contre_eto" class="right">
          </div>
          <div class="col-sm-6">
            filtre cave <input type="checkbox" name="filtre_cave" class="right">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="neuro_hemo">Précisions sur l'histoire neurologique et hémorrogique :</label>
    <textarea name="neuro_hemo" rows="8" cols="80" class="form-control"></textarea>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <input type="text" name="email" class="form-control" placeholder="Email du destinataire">
      </div>
    </div>
    <div class="col-sm-6">
      <input type="submit" class="btn btn-success staff_button" value="Envoyer au staff">
    </div>
  </div>
</form>
<!-- Formulaire médecin -->
<!-- Formulaire staff -->
<div class="panel panel-info">
  <div class="panel-heading">
    Décision du staf
  </div>
  <form id="staff" action="index.php" method="post">
    <div class="panel-body">

      <!-- date et fermeture -->
      <div class="row form-group">
        <div class="col-sm-6">
          <label for="staff_date">Date du staff :</label>
          <input type="date" name="staff_date">
        </div>
        <div class="col-sm-6">
          <label for="close">Eligible à la fermeture :</label>
          <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-warning">
              <input type="radio" name="close" value="oui" autocomplete="off">OUI
            </label>
            <label class="btn btn-warning">
              <input type="radio" name="close" value="non" autocomplete="off">NON
            </label>
          </div>
        </div>
      </div>
      <!-- date et fermeture -->

      <!-- Avis staff -->
      <div class="row form-group">
        <div class="col-sm-6">
          <label for="examen">Examens / Avis conditionnant la décision :</label>
          <textarea name="examen" rows="8" cols="80" class="form-control"></textarea>
        </div>
        <div class="col-sm-6">
          <label for="post_op">Gestion prévisible et durée du traitement AAP / AVK en post-op :</label>
          <textarea name="post_op" rows="8" cols="80" class="form-control"></textarea>
        </div>
      </div>
      <!-- Avis staff -->

      <!-- Exam avant fermeture et suivi post implantation -->
      <div class="row form-group">
        <div class="col-sm-6">
          <div class="panel panel-info">
            <div class="panel-heading">
              Examens à programmer avant fermeture
            </div>
            <div class="panel-body">
              <ul class="list-group">
                <li class="list-group-item">Cs anesthésie<input type="checkbox" name="anesthesie" class="right"></li>
                <li class="list-group-item">ETO<input type="checkbox" name="eto_close" class="right"></li>
                <li class="list-group-item">TDM coeur<input type="checkbox" name="tdm_coeur" class="right"></li>
                <li class="list-group-item">TDM cérébral / IRM<input type="checkbox" name="tdm_cerebral" class="right"></li>
                <li class="list-group-item">Avis gériatrique<input type="checkbox" name="geriatrique" class="right"></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="panel panel-info">
            <div class="panel-heading">
              Suivi post implantation
            </div>
            <div class="panel-body">
              <ul class="list-group">
                <li class="list-group-item">
                  ETO :
                  <div class="btn-group right"  data-toggle="buttons">
                    <label class="btn btn-warning">
                      <input type="radio" name="eto_imp" value="1 mois" autocomplete="off">1 mois
                    </label>
                    <label class="btn btn-warning">
                      <input type="radio" name="eto_imp" value="3 mois" autocomplete="off">3 mois
                    </label>
                  </div>
                </li>
                <li class="list-group-item">ETT :
                  <div class="btn-group right"  data-toggle="buttons">
                    <label class="btn btn-warning">
                      <input type="radio" name="ett_imp" value="1 mois" autocomplete="off">1 mois
                    </label>
                    <label class="btn btn-warning">
                      <input type="radio" name="ett_imp" value="3 mois" autocomplete="off">3 mois
                    </label>
                  </div>
                </li>
                <li class="list-group-item">Scanner cardiaque :
                  <div class="btn-group right"  data-toggle="buttons">
                    <label class="btn btn-warning">
                      <input type="radio" name="scanner" value="1 mois" autocomplete="off">1 mois
                    </label>
                    <label class="btn btn-warning">
                      <input type="radio" name="scanner" value="3 mois" autocomplete="off">3 mois
                    </label>
                  </div>
                </li>
                <li class="list-group-item">Cs neuro :
                  <div class="btn-group right"  data-toggle="buttons">
                    <label class="btn btn-warning">
                      <input type="radio" name="cs_neuro" value="1 mois" autocomplete="off">1 mois
                    </label>
                    <label class="btn btn-warning">
                      <input type="radio" name="cs_neuro" value="3 mois" autocomplete="off">3 mois
                    </label>
                  </div>
                </li>
                <li class="list-group-item">Cs cardio :
                  <div class="btn-group right"  data-toggle="buttons">
                    <label class="btn btn-warning">
                      <input type="radio" name="cs_cardio" value="1 mois" autocomplete="off">1 mois
                    </label>
                    <label class="btn btn-warning">
                      <input type="radio" name="cs_cardio" value="3 mois" autocomplete="off">3 mois
                    </label>
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
    <input type="submit" class="btn btn-success" value="Envoyer">
  </div>


</form>

<!-- Formulaire staff -->
<?php include "parts/footer.php"; ?>
