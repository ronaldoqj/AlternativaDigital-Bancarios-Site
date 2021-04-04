$(document).ready(function ()
{
    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

    $('#dismiss, .overlay').on('click', function () {
        $('#sidebar').removeClass('active');
        $('.overlay').removeClass('active');
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').addClass('active');
        $('.overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });

    /* Menu2 */
    $('#expand__menu2').on('click', function () {
        $('#top-of-site').toggleClass('showMenu2');
    });


    // Clique do buttom banco
    // Ao abrir e fechar também controla o sub-menu
    $('#filters .combo-box #btn-banco').on('click', function() {
        var clickComboBox = !$('#filters .combo-box').hasClass( "show" );
        if (clickComboBox) {
            $('#top-of-site').addClass('showMenu2');
        } else {
            $('#top-of-site').removeClass('showMenu2');
        }
    });

    $('#expand__menu--sindicato').on('click', function () {
        $('#menu-sindicato').toggleClass('show');
    });
    
    $('#expand__menu--fetrafi-rs').on('click', function () {
        $('#menu-fetrafi-rs').toggleClass('show');
    });

    // Atribui valor para o buttom banco
    $('#filters .dropdown-menu .dropdown-item').on('click', function(){
        var selecionado = $(this).html();
        $('#filters .combo-box #btn-banco').html(selecionado);
    });

    $('.btn-menos').click(function(){
        var rel = $(this).attr('rel');
        aumentaDiminui('diminui', rel);
    });

    $('.btn-mais').click(function(){
        var rel = $(this).attr('rel');
        aumentaDiminui('aumenta', rel);
    });


    playerAudio();
    eventSocialNetworks();
    eventsAlerts();
});

function eventsAlerts() {
    $('.close-alert-sucess-comum').click(function(){
        $('.alert-sucess-comum').hide('fast');
    });
}

function aumentaDiminui (aumentaDiminui, classOrDiv)
{
    var valor = 1;
    var obj = $(classOrDiv).css('font-size');

    if(aumentaDiminui == 'aumenta') {
        $(classOrDiv).css('font-size', parseFloat(obj) + valor );
    }
    if(aumentaDiminui == 'diminui') {
        $(classOrDiv).css('font-size', parseFloat(obj) - valor );
    }
}

// Home Player Audio
function playerAudio()
{
    $('.player__audio').click(function()
    {
        
        if ( $(this).attr('rel') != 'play' )
        {
            $(this).attr('rel', 'play');
            $(this).children('audio')[0].play();
        }
        else
        {
            $(this).attr('rel', 'stop');
            $(this).children('audio')[0].pause();
        }

    });
}

function eventSocialNetworks()
{
      $('.btSocialNetwork').click(function()
      {
          var url = $(this).attr('href');
          var title = $(this).attr('title');

          switch( $(this).attr('title') )
          {
              case 'Facebook':
                  var w = 630;
                  var h = 360;
                  var left = screen.width/2 - 630/2;
                  var top = screen.height/2 - 360/2;
  
                  window.open('http://www.facebook.com/sharer.php?u='+url, 'Compartilhar no facebook', 'toolbar=no, location=no, directories=no, status=no, ' + 'menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width='+w+ ', height=' + h + ', top=' + top + ', left=' + left);
                  break;
              case 'Twitter':
                  var ulrSN = "https://twitter.com/intent/tweet?text="+url;
                  window.open(ulrSN,'ADverso', 'toolbar=0, status=0, width=650, height=450');
                  break;
              case 'Whatsapp':
                  // code block
                  break;
          }
  
          return false;
      });
  
      $('.modal-close').click(function(){
          instanceAlert.close();
      });
  }
