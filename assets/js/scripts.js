$('#chat_list_btn').click(function() {
  $( "#slide" ).toggle( "left" );
});

//responsive menubar
$(document).mouseup(function(e) 
{
  var container = $("#myRmenubar");
  var not_container = $('#mymenubarbtn');

  // if the target of the click isn't the container nor a descendant of the container
  if (!not_container.is(e.target) && not_container.has(e.target).length === 0){
    container.hide();
    return ;
  }
  if (!container.is(e.target) && container.has(e.target).length === 0){
    container.toggle();
  }  
});


//change email to
function changeReplayemail() {
    console.log("hello");
    var x = document.getElementById("change_toEmail_toggle");
    if (x.style.display === "none") {
      x.style.display = "block";
    }
}

$(document).mouseup(function (e)
{
    var container = $("#change_toEmail_toggle");
    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        $("#change_toEmail_toggle").hide();
    }
});


//responsive menubar
$(document).mouseup(function(e) 
{
  var container_view = $("#view_settings_toggle");
  var not_container_view = $('#view_edit_delete_btn');
  // if the target of the click isn't the container nor a descendant of the container
  if (!not_container_view.is(e.target) && not_container_view.has(e.target).length === 0){
    container_view.hide();
    return ;
  }
  if (!container_view.is(e.target) && container_view.has(e.target).length === 0){
    container_view.toggle();
  }

});

//dashboard chart 
//console.log ( document.getElementById('myChart') );

if ( document.getElementById('myChart') != null ) {
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'pie',

      // The data for our dataset
      data: {
          labels: ["January", "February", "March", "April", "May", "June", "July"],
          datasets: [{
              label: "My First dataset",
              backgroundColor: [
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(255, 159, 64, 0.8)'
              ],
              borderColor: 'rgb(255,255,255)',
              data: [0, 10, 5, 2, 20, 30, 45],
          }]
      },

      // Configuration options go here
      options: {}
  });
}

//dashboard chart 
if ( document.getElementById('chartViewport') != null )  { 
  var ctxx = document.getElementById('chartViewport').getContext('2d');
  var stackedLine = new Chart(ctxx, {
      type: 'line',
      data: {
          datasets: [{
              label: 'Scatter Dataset',
              data: [{
                  x: 3,
                  y: 0
              }, {
                  x: 0,
                  y: .5
              },{
                  x: 0,
                  y: 1
              },{
                  x: 0,
                  y: 1.5
              },{
                  x: 3,
                  y: 2
              }]
          }]
      }
  });
}

//start chat box script
(function($) {
    $(document).ready(function() {
        var $chatbox = $('.chatbox'),
            $chatboxTitle = $('.chatbox__title'),
            $chatboxTitleClose = $('.chatbox__title__close'),
            $chatboxCredentials = $('.chatbox__credentials');
        $chatboxTitle.on('click', function() {
            $chatbox.toggleClass('chatbox--tray');
        });
        $chatboxTitleClose.on('click', function(e) {
            e.stopPropagation();
            $chatbox.addClass('chatbox--closed');
        });
        $chatbox.on('transitionend', function() {
            if ($chatbox.hasClass('chatbox--closed')) $chatbox.remove();
        });
        $chatboxCredentials.on('submit', function(e) {
            e.preventDefault();
            $chatbox.removeClass('chatbox--empty');
        });
    });
})(jQuery);
//end chat box script


// multiple input 
$('#input-tags').selectize({
  persist: false,
  createOnBlur: true,
  create: true
});