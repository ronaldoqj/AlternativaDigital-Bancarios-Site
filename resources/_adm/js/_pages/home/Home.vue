
<template>
    <div class="component-page-home">
        <div class="container-fluid content--panel">
            <div class="row">
                <div class="col-12">

                    <div class="box-cards">
                        <!-- Portal -->
                        <div class="item-card" v-if="perfil == 'master'">
                            <CardHome :params="cards.entities.portal"></CardHome>
                        </div>
                        <!-- Sindicatos -->
                        <div class="item-card" v-for="sindicate in sindicates" :key="sindicate.id">
                            <CardHome @click="clickCard(sindicate.id)" :params="{link:'/adm/dashboard/'+sindicate.id, title: sindicate.name, icon:'/_adm/assets/SVGs/Home/icon-sindicatos.svg', subItem:{}}"></CardHome>
                        </div>
                    </div>

                </div>
            </div>
        </div>    
    </div>
</template>  

<script>
import CardHome from "./components/CardHome"
export default {
    components: {CardHome},
    props: [ 'perfil', 'csrf', 'listSindicates' ],
    data: () => {
        return {
            panel: [0, 1],
            cards: {
                entities: {
                    portal:{
                        icon: '/_adm/assets/SVGs/Home/icon-house.svg',
                        title: 'Portal',
                        link: '/adm/dashboard/0',
                        subItem: {}
                    }
                }
            }
        }
    },
    computed: {
        sindicates() {
            return JSON.parse(this.listSindicates);
        }
    }
}
</script>

<style lang="scss">
@import '~/../resources/_adm/sass/_vars.scss';
.component-page-home
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
            &:first-child {
                 margin-right: 8px;
            }

            &:last-child
            {
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

            .item-card {
                padding: 10px;
            }
        }
    }

}
</style>
