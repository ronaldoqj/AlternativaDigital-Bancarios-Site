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

    // Atribui valor para o buttom banco
    $('#filters .dropdown-menu .dropdown-item').on('click', function(){
        var selecionado = $(this).html();
        $('#filters .combo-box #btn-banco').html(selecionado);
    });

    
    // Home Player Audio
    function playerAudio()
    {
        $('.player__audio').click(function()
        {
            
            if ( $(this).children('audio').attr('rel') == 'stop' )
            {
                $(this).children('audio').attr('rel', 'play');
                $(this).children('audio')[0].play();
            }
            else
            {
                $(this).children('audio').attr('rel', 'stop');
                $(this).children('audio')[0].pause();
            }

        });
    }

    playerAudio();
});
