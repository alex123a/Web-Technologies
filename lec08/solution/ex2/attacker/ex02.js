$(document).ready(function () {
  removeTrackEvent();
  addTrackEvent();
});

function addTrackEvent() {
  $(".add").on('click', function() {
    let track = $(".track").first().clone();
    track.children("input").val('');
    track.appendTo(".inputs");

    toggleRemoveButton();
  });
}

function removeTrackEvent() {
  $(".tracks").on('click', '.remove', function () {
    $(this).parent().remove();
    toggleRemoveButton();
  });
}

function toggleRemoveButton(){
  if($('.track').length > 1)
    $('.track button').prop("disabled",false);
  else
    $('.track button').prop("disabled",true);
}