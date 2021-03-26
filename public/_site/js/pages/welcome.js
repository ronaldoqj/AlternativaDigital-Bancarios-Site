function init(page)
{
    page++;
    var _token = $('meta[name="csrf-token"]').attr('content');
    var _route = $('meta[name="route-pagination"]').attr('content');

    var request = $.ajax({
        headers: {
            'X-CSRF-TOKEN': _token
        },
        url: _route,
        method: "POST",
        cache: false,
        dataType: 'json',
        data: {
            page : page
        }
    });
    
    request.done(function( news )
    {    
        if (news.items.length)
        {
            setNews(news);
            init(page);
        }
        else
        {
            $('.lds-ellipsis').hide('slow', function(){
                $('.loading').hide();
            });
        }
    });
    
    request.fail(function( jqXHR, textStatus )
    {
        console.log( "Request failed jqXHR: " + jqXHR );
        console.log( "Request failed textStatus: " + textStatus );
    });
}

function getHtmlNews(news)
{
    var html = '<div class="container __separador"><div class="row"><div class="col"><div></div></div></div></div>';

    switch (news.tipoDaNoticia) {
        case 'noticia-destaque':
            html += `<a href="${news.extraLink}">`;
            html += `    <div class="row COMPONENTE__news--with--image">`;
            html += `        <div class="col-12 col-lg-5 __news--left">`;
            html += `            <div style='background-image: url("/${$news.fileImagemDestaque_pathfile}/${news.fileImagemDestaque_namefile}"); height: 250px'></div>`;
            html += `            <div style='background-image: url("/${news.fileImagemDestaque_pathfile}/${news.fileImagemDestaque_namefile}"); height: 250px'></div>`;
            html += `        </div>`;
            html += `        <div class="col-12 col-lg-7 __news--right">`;
            html += `            <div class="__text--1">${news.cartola} | ${news.extraData} <span></span></div>`;
            html += `            <div class="__text--2">${news.titulo}</div>`;
            html += `            <div class="__text--3">${news.linhaDeApoio}</div>`;
            html += `        </div>`;
            html += `    </div>`;
            html += `</a>`;
            break;
        case 'noticia-video':
            html += `<a href="${news.extraLink}">`;
            html += `   <div class="row COMPONENTE__news--with--video">`;
            html += `       <div class="col-12 col-lg-5 __news--left">`;
            html += `           <iframe width="100%" height="252" src="https://www.youtube.com/embed/${news.videoYoutube}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
            html += `       </div>`;
            html += `       <div class="col-12 col-lg-7 __news--right">`;
            html += `           <div class="__text--1">${news.cartola} | ${news.extraData} <span></span></div>`;
            html += `           <div class="__text--2">${news.titulo}</div>`;
            html += `           <div class="__text--3">${news.linhaDeApoio}</div>`;
            html += `       </div>`;
            html += `   </div>`;
            html += `</a>`;
            break;
        case 'noticia-imagem':
            html += `<a href="${news.extraLink}">`;
            html += `   <div class="row COMPONENTE__news--with--image">`;
            html += `       <div class="col-12 col-lg-5 __news--left">`;
            html += `           <div style='background-image: url("/${news.fileImagemDestaque_pathfile}/${news.fileImagemDestaque_namefile}"); height: 250px'></div>`;
            html += `       </div>`;
            html += `       <div class="col-12 col-lg-7 __news--right">`;
            html += `           <div class="__text--1">${news.cartola} | ${news.extraData} <span></span></div>`;
            html += `           <div class="__text--2">${news.titulo}</div>`;
            html += `           <div class="__text--3">${news.linhaDeApoio}</div>`;
            html += `       </div>`;
            html += `   </div>`;
            html += `</a>`;
            break;
        case 'noticia-podcast':
            html += `<div class="row COMPONENTE__news--with--audio">`;
            html += `   <div class="col-12 __news--right">`;
            html += `       <a href="${news.extraLink}">`;
            html += `           <div class="__text--1">${news.cartola} | ${news.extraData} <span></span></div>`;
            html += `           <div class="__text--2">${news.titulo}</div>`;
            html += `       </a>`;
            html += `       <div class="player__audio">`;
            html += `           <div class="__espectro--audio d-flex align-items-center" rel="stop">`;
            html += `               <div class="control__play-Pause"></div>`;
            html += `           </div>`;
            html += `           <audio controls >`;
            html += `               <source src="/${news.filePodcast_pathfile}/${news.filePodcast_namefile}" type="${news.filePodcast_mimetype}">`;
            html += `               Seu navegador de internet não suporta o elemento do tipo audio.`;
            html += `           </audio>`;
            html += `       </div>`;
            html += `       <a href="${news.extraLink}">`;
            html += `           <div class="__text--3">${news.linhaDeApoio }</div>`;
            html += `       </a>`;
            html += `   </div>`;
            html += `</div>`;
            break;
        case 'noticia-simples':
            html += `<a href="${news.extraLink}">`;
            html += `   <div class="row COMPONENTE__news--with--only-text">`;
            html += `       <div class="col-12 __news--right">`;
            html += `           <div class="__text--1">${news.cartola} | ${news.extraData} <span></span></div>`;
            html += `           <div class="__text--2">${news.titulo}</div>`;
            html += `           <div class="__text--3">${news.linhaDeApoio}</div>`;
            html += `       </div>`;
            html += `   </div>`;
            html += `</a>`;
            break;
        default:
            console.log(`Tipo da notícia não encontrado`);
    }
    
    return html;
}

function setNews(news)
{
    let htmlNews = '';
    for (let i=0; i < news.items.length; i++)
    {
        htmlNews = getHtmlNews(news.items[i]);
        $('#news').append(htmlNews);
    }
}

$(document).ready(function ()
{
    init(1);
});