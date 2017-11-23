<?php include "parts/header.php"; ?>

      <!-- titre -->
      <div class="page-header">
        <h1>Fiche de liaison Fermeture auricule gauche</h1>
      </div>
      <!-- titre -->

      <!-- Formulaire médecin -->
      <form id="doctor" action="index.html" method="post">
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
<?php include "parts/footer.php"; ?>
