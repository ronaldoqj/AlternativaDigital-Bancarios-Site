<template>
    <div id="component-template-sidebarmenu">
        <div class="logo">
            <img src="/_adm/assets/SVGs/logo-bancarios.svg" class="img-fluid" onload="SVGInject(this)" />
        </div>
        <div class="menus">
            
            <div class="title-sections"> Conteúdo Portal </div>

            <div class="box-menus">
                <a href="/adm/noticias/cadastro"><img src="/_adm/assets/SVGs/icon-menu-noticias.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                <a href="#"><img src="/_adm/assets/SVGs/icon-menu-editais.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                <a href="#"><img src="/_adm/assets/SVGs/icon-menu-acordos-e-convencoes.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                <a href="#"><img src="/_adm/assets/SVGs/icon-menu-meu-banco.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                <a href="#"><img src="/_adm/assets/SVGs/icon-menu-meu-sindicato.svg" class="img-fluid" onload="SVGInject(this)" /></a>
            </div>

            <div class="title-sections"> Funções ADM </div>

            <div class="box-menus">
                <a href="#"><img src="/_adm/assets/SVGs/icon-menu-sindicatos.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                <a href="#"><img src="/_adm/assets/SVGs/icon-menu-contatos.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                <a href="#"><img src="/_adm/assets/SVGs/icon-menu-redes-sociais.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                <a href="#"><img src="/_adm/assets/SVGs/icon-menu-usuarios.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                <a href="#" class="last-item"><img src="/_adm/assets/SVGs/icon-menu-perfil.svg" class="img-fluid" onload="SVGInject(this)" /></a>
            </div>

            <div class="box-menus logo-magia-studio-version">
                <div></div>
                <a href="#"><img src="/_adm/assets/SVGs/logo-alternativadigital-mais-versao-do-projeto.svg" class="img-fluid" onload="SVGInject(this)" /></a>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            
        }
    }
</script>

<style lang="scss">
@import '~/../resources/_adm/sass/_vars.scss';

#component-template-sidebarmenu
{
    .logo {
        display: flex;
        justify-content: center;
        text-align: center;
        height: 100px;
    }


    .title-sections
    {
        color: #53A6D8;
        text-transform: uppercase;
        font-size: 0.7em;
        padding: 5px;
        line-height: 1.3em;
        margin: 25px 0 5px;

        &:first-child {
            margin-top: 5px;
        }
    }

    .box-menus
    {
        text-align: center;

        a {
            display: block;
            padding: 8px 0;

            svg
            {
                path, tspan {
                    transition: ease 0.4s;
                }

                &:hover
                {
                    path, tspan {
                        fill: #53A6D8;
                    }
                    
                }
            }

            &.last-item {
                margin-bottom: 80px;
            }
        }

        &.logo-magia-studio-version {
            div {
                height: 1px;
                margin: 5px;
                background: #125488;
            }

            position: fixed;
            bottom: 0px;
            width: $menu-sidebar-width;
        }
    }
    
}

</style>