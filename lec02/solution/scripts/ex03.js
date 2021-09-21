$(document).ready(function () {
  validateSubmit();
});

function validateSubmit() {
  $("form").on('submit', function (e) {
    let formValid = {valid:true};
    let input = $('input[name=name]');
    if(!input.val())
      alertNonValid(input, formValid);

    input = $('input[name=year]');
    if(!(input.val() && Number(input.val()) < 2023))
      alertNonValid(input,formValid);

    if(!$('input[name=type]:checked').length)
      alertNonValid($('input[name=type]').first(), formValid);

    validateTracks(formValid);

    if(!formValid.valid)
      alert('The form has unvalid values');

    return formValid.valid;
  }); 
}

function validateTracks(formValid) {
  $('input[name=track]').each(function(index, value) {
    let input = $(this);
    if(!input.val())
      alertNonValid(input, formValid);
  });
}


function alertNonValid(input, formValid) {
  formValid.valid = false;
}
