
<template>
    <div class="component-page-dashboard">
        <pages-menu-bar :btns-top-bar="btnsBarTop"></pages-menu-bar>

        <v-expansion-panels
        v-model="panel"
        multiple
        flat
        >
            <v-expansion-panel>
                <v-expansion-panel-header>
                    <div class="header--panel">
                        <div class="title">Conteúdo Portal</div>
                        <div></div>
                    </div>
                </v-expansion-panel-header>
                <v-expansion-panel-content>
                <div class="container-fluid content--panel">
                    <div class="row">
                        <div class="col-12">
                            <div class="box-cards">
                                <div class="item-card" v-for="item of cards.portalContent" :key="item.title">
                                    <template v-if="perfil != 'master'">
                                        <template v-if="item.title != 'Meu Sindicato'">  
                                            <CardHome :params="item"></CardHome>
                                        </template>
                                    </template>
                                    <template v-else>
                                        <CardHome :params="item"></CardHome>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </v-expansion-panel-content>
            </v-expansion-panel>

            <v-expansion-panel v-if="perfil == 'master'">
                <v-expansion-panel-header>
                    <div class="header--panel">
                        <div class="title">Funções ADM</div>
                        <div></div>
                    </div>
                </v-expansion-panel-header>
                <v-expansion-panel-content>
                <div class="container-fluid content--panel">
                    <div class="row">
                        <div class="col-12">
                            <div class="box-cards">
                                <div class="item-card" v-for="item of cards.admFunctions" :key="item.title">
                                    <CardHome :params="item"></CardHome>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </v-expansion-panel-content>
            </v-expansion-panel>

        </v-expansion-panels>
    </div>
</template>  

<script>
import CardHome from "./components/CardHome"

export default {
    props: [ 'perfil', 'csrf' ],
    components: { CardHome },
    data: () => {
        return {
            panel: [0, 1],

            btnsBarTop: {
                home: {
                    title: 'Home',
                    link: '/adm/',
                    icon: '/_adm/assets/SVGs/Home/icon-house.svg'
                }
            },

            cards: {
                portalContent: {
                    noticias: {
                        icon: '/_adm/assets/SVGs/Home/icon-noticia.svg',
                        title: 'Notícias',
                        link: '/adm/noticias',
                        subItem: {
                            icon: '/_adm/assets/SVGs/Home/icon-plus.svg',
                            title: 'Nova Notícia',
                            link: '/adm/noticias/cadastro',
                        }
                    },
                    editais: {
                        icon: '/_adm/assets/SVGs/Home/icon-pdf.svg',
                        title: 'Editais',
                        link: '/adm/editais',
                        subItem: {
                            icon: '/_adm/assets/SVGs/Home/icon-plus.svg',
                            title: 'Novo Edital',
                            link: '/adm/editais/cadastro',
                        }
                    },
                    acordosEConvencoes: {
                        icon: '/_adm/assets/SVGs/Home/icon-pdf.svg',
                        title: 'Acordos e Convenções',
                        link: '/adm/acordos-e-convencoes',
                        subItem: {
                            icon: '/_adm/assets/SVGs/Home/icon-plus.svg',
                            title: 'Novo Acordo',
                            link: '/adm/acordos-e-convencoes/cadastro',
                        }
                    },
                    meuSindicato: {
                        icon: '/_adm/assets/SVGs/Home/icon-house.svg',
                        title: 'Meu Sindicato',
                        link: '/adm/o-sindicato',
                        subItem: {}
                    },
                    servicos: {
                        icon: '/_adm/assets/SVGs/icon-paginas.svg',
                        title: 'Serviços',
                        link: '/adm/servicos',
                        subItem: {}
                    },
                    contatos: {
                        icon: '/_adm/assets/SVGs/icon-contatos.svg',
                        title: 'Contatos',
                        link: '/adm/contatos',
                        subItem: {}
                    },
                },
                admFunctions: {
                    sindicatos: {
                        icon: '/_adm/assets/SVGs/Home/icon-sindicatos.svg',
                        title: 'Sindicatos',
                        link: '/adm/sindicatos',
                        subItem: {},
                    },
                    meuBanco: {
                        icon: '/_adm/assets/SVGs/Home/icon-bank.svg',
                        title: 'Meu Banco',
                        link: '/adm/bancos',
                        subItem: {},
                    },
                    entidades: {
                        icon: '/_adm/assets/SVGs/Home/icon-entidade.svg',
                        title: 'Entidades',
                        link: '/adm/entidades',
                        subItem: {},
                    },
                    entidadesParceiras: {
                        icon: '/_adm/assets/SVGs/icon-entidades-parceiras.svg',
                        title: 'Entidades Parceiras',
                        link: '/adm/entidades-parceiras',
                        subItem: {},
                    },
                    redesSociais: {
                        icon: '/_adm/assets/SVGs/Home/icon-social.svg',
                        title: 'Redes Sociais',
                        link: '#',
                        subItem: {},
                    },
                    usuariso: {
                        icon: '/_adm/assets/SVGs/Home/icon-users.svg',
                        title: 'Usuários',
                        link: '#',
                        subItem: {},
                    },
                    meuPerfil: {
                        icon: '/_adm/assets/SVGs/Home/icon-perfil.svg',
                        title: 'Meu Perfil',
                        link: '#',
                        subItem: {},
                    },
                }
            }
        }
    },
    computed: {
        btnHome() {
            
            btn.title = 'Home';
            btn.link = '/adm/';
            btn.icon = '/_adm/assets/SVGs/Home/icon-house.svg';
            return btn;
        }
    }
}
</script>

<style lang="scss">
@import '~/../resources/_adm/sass/_vars.scss';
.component-page-dashboard
{
    .v-expansion-panel-header
    {
        padding: 0;
        outline: none;

        .v-icon {
            font-size: 3rem;
            color: #125488 !important;
        }
    }

    .header--panel
    {
        display: flex;
        justify-content: space-between;
        align-items: center;
        order: 2;
        
        .title {
            font-size: 2.5em !important;
            color: $blue;
            font-weight: bold;
            line-height: 1.1em;
            white-space: pre;
        }

        > div
        {
            &:first-child { margin-right: 8px; }
            &:last-child {
                background-color: #E0E1E3;
                height: 2px;
                width: 100%;
            }
        }   
    }

    .content--panel
    {
        .box-cards
        {
            display: flex;
            justify-content: flex-start;
            flex-wrap: wrap;

            .item-card { padding: 10px; }
        }
    }

}
</style>
