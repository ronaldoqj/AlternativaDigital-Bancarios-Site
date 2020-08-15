
<template>
    <div class="component-page-home">
        
        




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
                            
                            teste col 12
                            
                        </div>
                    </div>
                </div>
                </v-expansion-panel-content>
            </v-expansion-panel>

            <v-expansion-panel>
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
                            teste col 12
                        </div>
                    </div>
                </div>
                </v-expansion-panel-content>
            </v-expansion-panel>

        </v-expansion-panels>

    
    </div>
</template>  

<script>
export default {
    data: () => {
        return {

        }
    },
    components: {  },
    props: [ 'csrf' ],
    methods: {
        
        
    },
    created()
    {
        
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
            font-size: 2.5em;
            color: $blue-strong;
            font-weight: bold;
            line-height: 1.1em;
            white-space: nowrap;
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
        padding-left: 30px;

        .box--noticia
        {
            position: relative;
            border-bottom: solid 1px $grey-light;

            .imagem-noticia {
                width: 100%;
                height: 100px;
                background-size: cover;
                background-position: center;
            }

            audio {
                width: 100%;
                margin: 0px 0 20px;
            }

            .buttons
            {
                display: flex;
                justify-content: center;
                margin: -43px 0 0;
                position: absolute;
                width: 100%;
                a
                {
                    svg
                    {
                        width: 65px;
                        height: 65px;
                        margin: 0 3px;
                        cursor: pointer;
    
                        circle {
                            transition: ease 0.4s;
                        }
                    }

                    &:first-child
                    {    
                        &:hover svg {
                            circle {
                                fill: $blue-strong;
                            }
                        }
                    }

                    &:last-child
                    {
                        &:hover svg {
                            circle {
                                fill: $red-strong;
                            }
                        }
                    }
                }
            }

            .content {
                color: #125488;
                line-height: 1.2em;
                font-size: 0.9em;
                margin-top: 15px;
            }

            &.noticia-simples
            {
                .buttons {
                    margin: 0;
                    position: relative;
                    margin-top: 20px;
                }
                
            }

        }
        
    }

}
</style>
