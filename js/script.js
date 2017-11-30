$(document).ready(function() {
  console.log("ready");
  var scoreCha = 0;
  var scoreHas = 0;


  $("input[name='cha[]']:checked").each(function() {
    if(this.value == 'insu_cardiaque' || this.value == 'hta' || this.value == 'diabete' || this.value == 'vasculaire' || this.value == 'age_tranche' || this.value == 'femme'){
      scoreCha += 1;
    }else if(this.value == 'age' || this.value == 'atcd'){
      scoreCha += 2;
    }else{
      scoscoreChare += 0;
    }

  });

  $("#totalCha").html(scoreCha);

  $("input[name='has[]']:checked").each(function() {
    if(this.value == 'hta_has' || this.value == 'insu_renale' || this.value == 'ait_avc' || this.value == 'saignement' || this.value == 'age_has' || this.value == 'alcool'){
      scoreHas += 1;
    }else if(this.value == 'insu_hepatique' || this.value == 'inr' || this.value == 'ains'){
      scoreHas += 2;
    }else{
      scoreHas += 0;
    }

  });
  $("#totalHas").html(scoreHas);
});
