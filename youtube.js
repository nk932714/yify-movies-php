/* Popup YouTubePlayer */

$(document).ready(function(){

  /* display video player */
 // $(document).on('click', '#a', function (e) { //this will run without classname but divname is mendatory*/
  $('#pageContent a.youtube').on('click',function(e){

    e.preventDefault();

    /* get video url */
    var u = $(this).attr('href');
    
    /* display video or go to youtube depending on window size
     this is an attempt to load videos on mobile devices in the youtube app */
    if($(window).width() > 800){

      /* get video id */
      var i = u.substring(u.search('=')+1,u.length);
      var v = u.substring(u.search('list=')+1,u.length);
      
      /* build player */ /*if url contains search link then it will perform below query. else directly load the link*/
      if ( u.indexOf('&list') !== -1 ){
          var n = u.substring(u.search('&list=')+6,u.length); /* get searched item name */
          $('#mPlayer DIV').html('<iframe width="560" height="315" src="https://www.youtube.com/embed/?listType=search&list='+ n +'&autoplay=1" frameborder="0" allowfullscreen></iframe>');
      }
      else {
      $('#mPlayer DIV').html('<iframe width="560" height="315" src="https://www.youtube.com/embed/' + i + '" frameborder="0" allowfullscreen></iframe>');
     }
      /* display player */
      $('#mPlayer').fadeIn(500);

    }else{
      window.location.href = u;
    }
  }); /* end of display player */

  /* hide video player */
  $('#mPlayer').on('click',function(e){

    /* hide player */
    $('#mPlayer').fadeOut(500);

    /* destroy player */
    $('#mPlayer DIV').empty();

  }); /* end of hide player */
});
