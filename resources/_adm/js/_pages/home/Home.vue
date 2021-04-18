<template>
    <div class="component-page-home">
        <v-container class="grey lighten-5 mt-10">
            <v-row>
                <v-col cols="12" md="6">
                    <CardHome :params="cards.entities.portal" />
                </v-col>
                <v-col cols="12" md="6">
                    <CardHome :params="cards.entities.fetrafirs" />
                </v-col>
            </v-row>
        </v-container>

        <v-container v-if="perfil == 'master'" class="mt-5">
            <v-row><v-col> <h2>Sindicatos</h2> </v-col></v-row>
        </v-container>

        <v-container v-if="perfil == 'master'" class="grey lighten-5">
            <v-row>
                <v-col v-for="sindicate in cards.entities.sindicates" :key="sindicate.id">
                    <!-- Sindicatos -->
                    <CardHome :params="sindicate"></CardHome>
                </v-col>
            </v-row>
        </v-container>
    </div>    
</template>

<script>
import CardHome from "./components/CardHome"
export default {
    components: {CardHome},
    props: [ 'perfil', 'csrf', 'listSindicates', 'listPortal' ],
    data: () => {
        return {
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
                    sindicates: []
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
            JSON.parse(this.listSindicates).forEach(element => {
                const sindicate = {
                    id: element.id,
                    banner: `/${element.banner_pathfile}/${element.banner_namefile}`,
                    logo: `/${element.logo_pathfile}/${element.logo_namefile}`,
                    link: `/adm/dashboard/${element.id}`,
                    title: element.name
                }

                this.cards.entities.sindicates.push(sindicate);
            });
        }
    },
    created() {
        this.setPortal();
        this.setFetrafiRs();
        this.setSindicates();

        console.log(JSON.parse(this.listPortal));
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
