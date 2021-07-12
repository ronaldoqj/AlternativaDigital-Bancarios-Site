
<template>
    <div class="component-page-dashboard">
        <pages-menu-bar :btns-top-bar="btnsBarTop"></pages-menu-bar>

        <v-expansion-panels
        v-model="panel"
        multiple
        flat
        >
            <v-expansion-panel v-if="config.permissions.portal">
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
                                <div class="item-card" v-for="item of cards.portalContent" :key="item.var_name">
                                    <CardDashboard :params="item"></CardDashboard>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </v-expansion-panel-content>
            </v-expansion-panel>
            
            <v-expansion-panel v-if="config.permissions.fetrafiRs">
                <v-expansion-panel-header>
                    <div class="header--panel">
                        <div class="title">Conteúdo Fetrafi-RS</div>
                        <div></div>
                    </div>
                </v-expansion-panel-header>
                <v-expansion-panel-content>
                <div class="container-fluid content--panel">
                    <div class="row">
                        <div class="col-12">
                            <div class="box-cards">
                                <div class="item-card" v-for="item of cards.fetrafiRsContent" :key="item.var_name">
                                    <CardDashboard :params="item"></CardDashboard>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </v-expansion-panel-content>
            </v-expansion-panel>
            
            <v-expansion-panel v-if="config.permissions.syndicate">
                <v-expansion-panel-header>
                    <div class="header--panel">
                        <div class="title">Conteúdo Sindicato</div>
                        <div></div>
                    </div>
                </v-expansion-panel-header>
                <v-expansion-panel-content>
                <div class="container-fluid content--panel">
                    <div class="row">
                        <div class="col-12">
                            <div class="box-cards">
                                <div class="item-card" v-for="item of cards.syndicateContent" :key="item.var_name">
                                    <CardDashboard :params="item"></CardDashboard>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </v-expansion-panel-content>
            </v-expansion-panel>

            <!-- <v-expansion-panel v-if="perfil == 'master'"> -->
            <v-expansion-panel v-if="config.permissions.adm">
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
                                <div class="item-card" v-for="item of cards.admFunctions" :key="item.var_name">
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
    props: [ 'perfil', 'csrf', 'configAdm', 'permissions' ],
    components: { CardDashboard },
    data: () => {
        return {
            panel: [0, 1, 2, 3],
            config: {
                permissions: {
                    portal: false,
                    fetrafiRs: false,
                    syndicate: false,
                    adm: false
                }
            },
            btnsBarTop: {
                home: {
                    title: 'Home',
                    link: '/adm/',
                    icon: '/_adm/assets/SVGs/Home/icon-house.svg'
                }
            },

            cards: {
                portalContent: {
                    portal_noticias: {
                        icon: '/_adm/assets/SVGs/Home/icon-noticia.svg',
                        title: 'Notícias',
                        var_name: 'portal_noticias',
                        link: '/adm/noticias',
                        subItem: {
                            icon: '/_adm/assets/SVGs/Home/icon-plus.svg',
                            title: 'Nova Notícia',
                            link: '/adm/noticias/cadastro',
                        }
                    },
                    portal_editais: {
                        icon: '/_adm/assets/SVGs/Home/icon-pdf.svg',
                        title: 'Editais',
                        var_name: 'portal_editais',
                        link: '/adm/editais',
                        subItem: {
                            icon: '/_adm/assets/SVGs/Home/icon-plus.svg',
                            title: 'Novo Edital',
                            link: '/adm/editais/cadastro',
                        }
                    },
                    portal_acordosEConvencoes: {
                        icon: '/_adm/assets/SVGs/Home/icon-pdf.svg',
                        title: 'Acordos e Convenções',
                        var_name: 'portal_acordosEConvencoes',
                        link: '/adm/acordos-e-convencoes',
                        subItem: {
                            icon: '/_adm/assets/SVGs/Home/icon-plus.svg',
                            title: 'Novo Acordo',
                            link: '/adm/acordos-e-convencoes/cadastro',
                        }
                    },
                    portal_dadosDaInstituicao: {
                        icon: '/_adm/assets/SVGs/Home/icon-social.svg',
                        title: 'Dados da Instituição',
                        var_name: 'portal_dadosDaInstituicao',
                        link: '/adm/info-portal',
                        subItem: {},
                    },
                    portal_campanhas: {
                        icon: '/_adm/assets/SVGs/icon-campanhas.svg',
                        title: 'Campanhas',
                        var_name: 'portal_campanhas',
                        link: '/adm/campanhas',
                        subItem: {},
                    }
                },
                fetrafiRsContent: {
                    fetrafiRs_dadosDaInstituicao: {
                        icon: '/_adm/assets/SVGs/Home/icon-social.svg',
                        title: 'Dados da Instituição',
                        var_name: 'fetrafiRs_dadosDaInstituicao',
                        link: '/adm/info-portal',
                        subItem: {},
                    },
                    fetrafiRs_textoInstitucional: {
                        icon: '/_adm/assets/SVGs/Home/icon-house.svg',
                        title: 'Texto Institucional',
                        var_name: 'fetrafiRs_textoInstitucional',
                        link: '/adm/institucional',
                        subItem: {}
                    },
                    fetrafiRs_contato: {
                        icon: '/_adm/assets/SVGs/icon-contatos.svg',
                        title: 'Contato',
                        var_name: 'fetrafiRs_contato',
                        link: '/adm/contatos',
                        subItem: {}
                    }
                },
                syndicateContent: {
                    syndicate_noticias: {
                        icon: '/_adm/assets/SVGs/Home/icon-noticia.svg',
                        title: 'Notícias',
                        var_name: 'syndicate_noticias',
                        link: '/adm/noticias',
                        subItem: {
                            icon: '/_adm/assets/SVGs/Home/icon-plus.svg',
                            title: 'Nova Notícia',
                            link: '/adm/noticias/cadastro',
                        }
                    },
                    syndicate_editais: {
                        icon: '/_adm/assets/SVGs/Home/icon-pdf.svg',
                        title: 'Editais',
                        var_name: 'syndicate_editais',
                        link: '/adm/editais',
                        subItem: {
                            icon: '/_adm/assets/SVGs/Home/icon-plus.svg',
                            title: 'Novo Edital',
                            link: '/adm/editais/cadastro',
                        }
                    },
                    syndicate_acordosEConvencoes: {
                        icon: '/_adm/assets/SVGs/Home/icon-pdf.svg',
                        title: 'Acordos e Convenções',
                        var_name: 'syndicate_acordosEConvencoes',
                        link: '/adm/acordos-e-convencoes',
                        subItem: {
                            icon: '/_adm/assets/SVGs/Home/icon-plus.svg',
                            title: 'Novo Acordo',
                            link: '/adm/acordos-e-convencoes/cadastro',
                        }
                    },
                    syndicate_textoInstitucional: {
                        icon: '/_adm/assets/SVGs/Home/icon-house.svg',
                        title: 'Texto Institucional',
                        var_name: 'syndicate_textoInstitucional',
                        link: '/adm/institucional',
                        subItem: {}
                    },
                    syndicate_atualizarInstituicao: {
                        icon: '/_adm/assets/SVGs/Home/icon-sindicatos.svg',
                        title: 'Atualizar Instituição',
                        var_name: 'syndicate_atualizarInstituicao',
                        link: '/adm/sindicato-atualizar',
                        subItem: {}
                    },
                    syndicate_servicos: {
                        icon: '/_adm/assets/SVGs/icon-paginas.svg',
                        title: 'Serviços',
                        var_name: 'syndicate_servicos',
                        link: '/adm/servicos',
                        subItem: {}
                    },
                    syndicate_contato: {
                        icon: '/_adm/assets/SVGs/icon-contatos.svg',
                        title: 'Contato',
                        var_name: 'syndicate_contato',
                        link: '/adm/contatos',
                        subItem: {}
                    }
                },
                admFunctions: {
                    adm_sindicatos: {
                        icon: '/_adm/assets/SVGs/Home/icon-sindicatos.svg',
                        title: 'Sindicatos',
                        var_name: 'adm_sindicatos',
                        link: '/adm/sindicatos',
                        subItem: {},
                    },
                    adm_meuBanco: {
                        icon: '/_adm/assets/SVGs/Home/icon-bank.svg',
                        title: 'Meu Banco',
                        var_name: 'adm_meuBanco',
                        link: '/adm/bancos',
                        subItem: {},
                    },
                    adm_entidades: {
                        icon: '/_adm/assets/SVGs/Home/icon-entidade.svg',
                        title: 'Entidades',
                        var_name: 'adm_entidades',
                        link: '/adm/entidades',
                        subItem: {},
                    },
                    adm_entidadesParceiras: {
                        icon: '/_adm/assets/SVGs/icon-entidades-parceiras.svg',
                        title: 'Entidades Parceiras',
                        var_name: 'adm_entidadesParceiras',
                        link: '/adm/entidades-parceiras',
                        subItem: {},
                    },
                    adm_categoriasConvenios: {
                        icon: '/_adm/assets/SVGs/Home/icon-categorias.svg',
                        title: 'Categorias Convênios',
                        var_name: 'adm_categoriasConvenios',
                        link: '/adm/categorias-convenios',
                        subItem: {},
                    },
                    adm_usuarios: {
                        icon: '/_adm/assets/SVGs/Home/icon-users.svg',
                        title: 'Usuários',
                        var_name: 'adm_usuarios',
                        link: '/adm/usuarios',
                        subItem: {},
                    },
                    adm_meuPerfil: {
                        icon: '/_adm/assets/SVGs/Home/icon-perfil.svg',
                        title: 'Meu Perfil',
                        var_name: 'adm_meuPerfil',
                        link: '#',
                        subItem: {},
                    }
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
        checkPermissions(permissions)
        {
            let configAdm = JSON.parse(this.configAdm);

            if (configAdm.fetrafi)
            {
                /** somente fetrafiRS */
                this.config.permissions.fetrafiRs = true;
                this.filterFetrafiRsContentsPermissions(permissions);
            }
            else if (configAdm.entity == 0)
            {
                /** Somente Portal */
                this.config.permissions.portal = true;
                this.filterPortalContentsPermissions(permissions);
            }
            else
            {
                /** Somente Sindicato */
                this.config.permissions.syndicate = true;
                this.filterSyndicateContentsPermission(configAdm.entity, permissions);
            }

            /** Functions ADM */
            if (permissions.assigned.adm.length) {
                this.config.permissions.adm = true;
                this.filterPermissionToAdmFuncitons(permissions);
            }
        },

        filterFetrafiRsContentsPermissions(permissions) {
            let newPermissions = {};
            permissions.assigned.fetrafiRs.forEach(element => {
                let namePermission = this.findPermission(element.permission_id, permissions).var_name;
                newPermissions[namePermission] = this.cards.fetrafiRsContent[namePermission];
            });
            this.cards.fetrafiRsContent = newPermissions;
        },
        filterPortalContentsPermissions(permissions) {
            let newPermissions = {};
            permissions.assigned.portal.forEach(element => {
                let namePermission = this.findPermission(element.permission_id, permissions).var_name;
                newPermissions[namePermission] = this.cards.portalContent[namePermission];
            });
            this.cards.portalContent = newPermissions;
        },
        filterSyndicateContentsPermission(id, permissions) {
            /** Contente */
            let newPermissions = {};
            permissions.assigned.syndicates[id].forEach(element => {
                let namePermission = this.findPermission(element.permission_id, permissions).var_name;
                newPermissions[namePermission] = this.cards.syndicateContent[namePermission];
            });
            this.cards.syndicateContent = newPermissions;
        },
        filterPermissionToAdmFuncitons(permissions) {
            /** ADM Functions */
            let newPermissions = {};
            permissions.assigned.adm.forEach(element => {
                let namePermission = this.findPermission(element.permission_id, permissions).var_name;
                newPermissions[namePermission] = this.cards.admFunctions[namePermission];
            });
           this.cards.admFunctions = newPermissions;
        },

        findPermission(id, permissions) {
            permissions = permissions.names;
            let permissionName = permissions.filter( element => element.id == id );

            if (permissionName.length) {
                permissionName = permissionName[0];
            } else {
                permissionName = [];
            }

            return permissionName;
        },

        assignMasterPermission(permissions)
        {
            let configAdm = JSON.parse(this.configAdm);

            if (configAdm.fetrafi) {
                /** somente fetrafiRS */
                this.config.permissions.fetrafiRs = true;
            } else if (configAdm.entity == 0) {
                /** Somente Portal */
                this.config.permissions.portal = true;
            } else {
                /** Somente Sindicato */
                this.config.permissions.syndicate = true;
            }

            this.config.permissions.adm = true;
        }
    },
    created()
    {
        if (this.perfil != 'master') {
            this.checkPermissions(JSON.parse(this.permissions));
        } else {
            this.assignMasterPermission(JSON.parse(this.permissions));
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
