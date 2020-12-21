<template>
    <div id="component-template-sidebarmenu">
        <a href="/adm">
            <div class="logo">
                <img src="/_adm/assets/SVGs/logo-bancarios.svg" class="img-fluid" onload="SVGInject(this)" />
            </div>
        </a>
        <div class="menus">
            
            <div class="title-sections"> Conteúdo Portal </div>

            <div class="box-menus">
                <a href="/adm/campanhas"><img src="/_adm/assets/SVGs/icon-campanhas.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                <a href="/adm/noticias"><img src="/_adm/assets/SVGs/icon-menu-noticias.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                <a href="/adm/editais"><img src="/_adm/assets/SVGs/icon-menu-editais.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                <a href="/adm/acordos-e-convencoes"><img src="/_adm/assets/SVGs/icon-menu-acordos-e-convencoes.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                <a href="/adm/entidades-parceiras"><img src="/_adm/assets/SVGs/icon-entidades-parceiras.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                
                <template v-if="perfil == 'master'">
                    <a href="#"><img src="/_adm/assets/SVGs/icon-menu-meu-sindicato.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                </template>
            </div>
            
            <template v-if="perfil == 'master'">
                <div class="title-sections"> Funções ADM </div>

                <div class="box-menus">
                    <a href="/adm/sindicatos"><img src="/_adm/assets/SVGs/icon-menu-sindicatos.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                    <a href="#"><img src="/_adm/assets/SVGs/icon-menu-contatos.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                    <a href="/adm/bancos"><img src="/_adm/assets/SVGs/icon-menu-meu-banco.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                    <a href="/adm/entidades"><img src="/_adm/assets/SVGs/icon-entidades.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                    <a href="#"><img src="/_adm/assets/SVGs/icon-menu-redes-sociais.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                    <!-- <a href="/adm/usuarios"><img src="/_adm/assets/SVGs/icon-menu-usuarios.svg" class="img-fluid" onload="SVGInject(this)" /></a> -->
                    <a href="#"><img src="/_adm/assets/SVGs/icon-menu-usuarios.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                    <a href="#" class="last-item"><img src="/_adm/assets/SVGs/icon-menu-perfil.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                    <!-- <a href="#"><img src="/_adm/assets/SVGs/icon-fetrafi-rs.svg" class="img-fluid" onload="SVGInject(this)" /></a> -->
                </div>

                <div class="box-menus logo-magia-studio-version">
                    <div></div>
                    <a href="#"><img src="/_adm/assets/SVGs/logo-alternativadigital-mais-versao-do-projeto.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                </div>
            </template>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            
        },
        props: [ 'perfil' ]
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