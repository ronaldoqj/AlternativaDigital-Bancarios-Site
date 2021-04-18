
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
                                    <template v-if="item.active">
                                        <CardDashboard :params="item"></CardDashboard>
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
                                    <CardDashboard :params="item"></CardDashboard>
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
import CardDashboard from "./components/CardDashboard"

export default {
    props: [ 'perfil', 'csrf', 'configAdm' ],
    components: { CardDashboard },
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
                        active: true,
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
                        active: true,
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
                        active: true,
                        subItem: {
                            icon: '/_adm/assets/SVGs/Home/icon-plus.svg',
                            title: 'Novo Acordo',
                            link: '/adm/acordos-e-convencoes/cadastro',
                        }
                    },
                    /**
                     * Inicia como false
                     */
                    infoPortal: {
                        icon: '/_adm/assets/SVGs/Home/icon-social.svg',
                        title: 'Dados da Instituição',
                        link: '/adm/info-portal',
                        active: false,
                        subItem: {},
                    },
                    campanhas: {
                        icon: '/_adm/assets/SVGs/icon-campanhas.svg',
                        title: 'campanhas',
                        link: '/adm/campanhas',
                        active: false,
                        subItem: {},
                    },
                    institucional: {
                        icon: '/_adm/assets/SVGs/Home/icon-house.svg',
                        title: 'Texto Institucional',
                        link: '/adm/institucional',
                        active: true,
                        subItem: {}
                    },
                    meuSindicato: {
                        icon: '/_adm/assets/SVGs/Home/icon-sindicatos.svg',
                        title: 'Atualizar Instituição',
                        link: '/adm/sindicato-atualizar',
                        active: true,
                        subItem: {}
                    },
                    servicos: {
                        icon: '/_adm/assets/SVGs/icon-paginas.svg',
                        title: 'Serviços',
                        link: '/adm/servicos',
                        active: true,
                        subItem: {}
                    },
                    contatos: {
                        icon: '/_adm/assets/SVGs/icon-contatos.svg',
                        title: 'Contatos',
                        link: '/adm/contatos',
                        active: true,
                        subItem: {}
                    },
                },
                admFunctions: {
                    sindicatos: {
                        icon: '/_adm/assets/SVGs/Home/icon-sindicatos.svg',
                        title: 'Sindicatos',
                        link: '/adm/sindicatos',
                        active: true,
                        subItem: {},
                    },
                    meuBanco: {
                        icon: '/_adm/assets/SVGs/Home/icon-bank.svg',
                        title: 'Meu Banco',
                        link: '/adm/bancos',
                        active: true,
                        subItem: {},
                    },
                    entidades: {
                        icon: '/_adm/assets/SVGs/Home/icon-entidade.svg',
                        title: 'Entidades',
                        link: '/adm/entidades',
                        active: true,
                        subItem: {},
                    },
                    entidadesParceiras: {
                        icon: '/_adm/assets/SVGs/icon-entidades-parceiras.svg',
                        title: 'Entidades Parceiras',
                        link: '/adm/entidades-parceiras',
                        active: true,
                        subItem: {},
                    },
                    usuarios: {
                        icon: '/_adm/assets/SVGs/Home/icon-users.svg',
                        title: 'Usuários',
                        link: '/adm/usuarios',
                        active: true,
                        subItem: {},
                    },
                    meuPerfil: {
                        icon: '/_adm/assets/SVGs/Home/icon-perfil.svg',
                        title: 'Meu Perfil',
                        link: '#',
                        active: true,
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
    },
    methods: {
        checkActives() {
            let configAdm = JSON.parse(this.configAdm);
            
            if (configAdm.fetrafi)
            {
                /**
                 * Fetrafi
                 * Set objects not permiteds
                 */
                this.cards.portalContent.noticias.active = false;
                this.cards.portalContent.editais.active = false;
                this.cards.portalContent.acordosEConvencoes.active = false;
                this.cards.portalContent.servicos.active = false;
                this.cards.portalContent.meuSindicato.active = false;
                this.cards.portalContent.infoPortal.active = true;
            }
            else if (configAdm.entity == 0)
            {
                /**
                 * Portal
                 */
                
                this.cards.portalContent.institucional.active = false;
                this.cards.portalContent.infoPortal.active = true;
                this.cards.portalContent.campanhas.active = true;
                this.cards.portalContent.contatos.active = false;
                this.cards.portalContent.servicos.active = false;
                this.cards.portalContent.meuSindicato.active = false;
            }
            
            /**
             * Remove objects not permiteds
             */
            for (const item in this.cards.portalContent)
            {
                if (! this.cards.portalContent[item].active) {
                    delete this.cards.portalContent[item];
                }
            }
        }
    },
    mounted() {
        this.checkActives();
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
