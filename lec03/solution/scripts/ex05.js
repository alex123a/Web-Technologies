$(document).ready(function () {
  fillAlbums();
});

function fillAlbums(){
  $.get( "http://localhost:8000", function( data ) {
    if(data.length == 0){
      $("#albums").append($("<p>No albums found :(</p>"));
      return;
    }

    let li = $('<ul></ul>').appendTo("#albums")
    for(album of data) {
      let ul = $('<li></li>').appendTo(li);
      ul.text(album['name']);
    }
  }, 'json');
}