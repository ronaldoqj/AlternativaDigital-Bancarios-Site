<template>
    <div class="component-page-home">
        <v-container class="grey lighten-5 mt-10" v-if="config.permissions.portal || config.permissions.fetrafiRs">
            <v-row>
                <v-col cols="12" :md="config.permissions.portal === false || config.permissions.fetrafiRs === false ? 12 : 6" v-if="config.permissions.portal">
                    <CardHome :params="cards.entities.portal" />
                </v-col>
                <v-col cols="12" :md="config.permissions.portal === false || config.permissions.fetrafiRs === false ? 12 : 6" v-if="config.permissions.fetrafiRs">
                    <CardHome :params="cards.entities.fetrafirs" />
                </v-col>
            </v-row>
        </v-container>

        <template v-if="config.permissions.syndicates">
            <v-container class="mt-5">
                <v-row><v-col> <h2>Sindicatos</h2> </v-col></v-row>
            </v-container>

            <v-container class="grey lighten-5">
                <v-row>
                    <v-col v-for="sindicate in cards.entities.syndicates" :key="sindicate.id">
                        <!-- Sindicatos -->
                        <CardHome :params="sindicate"></CardHome>
                    </v-col>
                </v-row>
            </v-container>
        </template>
    </div>    
</template>

<script>
import CardHome from "./components/CardHome"
export default {
    components: {CardHome},
    props: [ 'perfil', 'csrf', 'listSyndicates', 'listPortal', 'permissions' ],
    data: () => {
        return {
            config: {
                permissions: {
                    portal: true,
                    fetrafiRs: true,
                    syndicates: true
                }
            },
            cards: {
                entities: {
                    portal: {
                        banner: null,
                        logo: null,
                        title: 'Portal',
                        link: '/adm/dashboard/0',
                        style: { backgroundColor: '#125488' }
                    },
                    fetrafirs: {
                        banner: null,
                        logo: null,
                        title: 'Fetrafi-RS',
                        link: '/adm/dashboard/0/RS',
                        style: null
                    },
                    syndicates: []
                }
            }
        }
    },
    methods: {
        setPortal() {
            const portal = JSON.parse(this.listPortal)[0];
            this.cards.entities.portal.logo = `/${portal.logo_pathfile}/${portal.logo_namefile}`;
        },
        setFetrafiRs() {
            const fetrafiRs = JSON.parse(this.listPortal)[1];
            this.cards.entities.fetrafirs.banner = `/${fetrafiRs.banner_pathfile}/${fetrafiRs.banner_namefile}`;
            this.cards.entities.fetrafirs.logo = `/${fetrafiRs.logo_pathfile}/${fetrafiRs.logo_namefile}`;
        },
        setSindicates() {
            JSON.parse(this.listSyndicates).forEach(element => {
                const syndicate = {
                    id: element.id,
                    banner: `/${element.banner_pathfile}/${element.banner_namefile}`,
                    logo: `/${element.logo_pathfile}/${element.logo_namefile}`,
                    link: `/adm/dashboard/${element.id}`,
                    title: element.name
                }

                this.cards.entities.syndicates.push(syndicate);
            });
        },
        checkPermissions(permissions)
        {
            let syndicatesKeys = Object.keys(permissions.assigned.syndicates);
            syndicatesKeys = syndicatesKeys.map( element => Number(element) );

            this.config.permissions.portal = permissions.assigned.portal.length > 0;
            this.config.permissions.fetrafiRs = permissions.assigned.fetrafiRs.length > 0;
            this.config.permissions.syndicates = syndicatesKeys.length > 0;

            /** filtra só para os syndicatos permitidos */
            this.cards.entities.syndicates = this.cards.entities.syndicates.filter( element => {
                                                 return  syndicatesKeys.indexOf(element.id) >= 0;
                                             });
        }
    },
    created() {
        this.setPortal();
        this.setFetrafiRs();
        this.setSindicates();

        if (this.perfil != 'master') {
            this.checkPermissions(JSON.parse(this.permissions));
        }
    }
}
</script>

<style lang="scss">
@import '~/../resources/_adm/sass/_vars.scss';
.component-page-home
{
    h2 {
        color: #125488;
        font-size: 2em;
        padding: 10px;
        line-height: 1.1em;
        border-bottom: 1px solid #125488;
        margin-bottom: 0;
    }
}
</style>
