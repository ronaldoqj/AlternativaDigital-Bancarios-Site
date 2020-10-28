
<template>
    <div class="acordos-e-convencoes-list">
        
        <div class="row">
            <div class="col-12">
                <div class="box-btns-noticias">
                    <a :href="actionForm + '/cadastro'">
                        <div class="box__buttons--access">
                            <img src="/_adm/assets/SVGs/icon-mais.svg" class="img-fluid" onload="SVGInject(this)" />
                            <p>novo usuário</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <form ref="formDelete" :action="actionForm + '/delete'" method="post">
            <input type="hidden" name="_token" :value="csrf">
            <input type="hidden" name="id" :value="id">
            <input type="hidden" name="action" :value="action">
                
            <div class="container-fluid content--panel">
                <div class="row">

                    <template v-if="this.list.length">    
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2" v-for="item in list">
                            
                            <div class="box--noticia noticia-simples">
                                <div class="buttons">
                                    <a :href="`${actionForm}/edicao/${item.id}`"><img src="/_adm/assets/SVGs/editar.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                                    <v-menu :close-on-content-click="true" :nudge-width="150" offset-x>
                                        <template v-slot:activator="{ on, attrs }">
                                            <a @click="clickExcluir(item)" v-bind="attrs" v-on="on"><img src="/_adm/assets/SVGs/excluir.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                                        </template>
                                        
                                        <v-card>
                                            <v-list-item> <v-list-item-title>Deseja excluir o registro?</v-list-item-title> </v-list-item>
                                            
                                            <v-btn x-small class="ma-2" text @click="menu = false">Cancelar</v-btn>
                                            <v-btn small class="ma-2" tile outlined color="error" @click="formExcluirEnviar()">
                                                <v-icon left>delete_outline</v-icon> Excluir
                                            </v-btn>
                                        </v-card>
                                    </v-menu>
                                </div>
                                <div class="content">
                                    <p>
                                        {{item.titulo}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </template>

                    <template v-else>
                        <div class="col-12">
                            <div class="box--noticia">
                                <div class="content">
                                    <p> Não foram encontrados registros. </p>
                                </div>
                            </div>
                        </div>
                    </template>

                </div>
            </div>

        </form>
    
    </div>
</template>  

<script>
export default {
    data: () => {
        return {

            // inputs Hidden
            id: '',
            action: '',

            size: {
                height: '250px',
                backgroundImage: 'url(/files/noticias/be6e7ee47196117d743e38015197ecdf924d2ec4bc0fbff5d69ec24b67b828c2-20200707_183027-777950.jpg)'
            },

            list: null,
        }
    },
    components: {  },
    props: [ 'csrf', 'page', 'actionForm', 'propList' ],
    methods: {
        
        clickExcluir(item)
        {
            this.id = item.id;
        },
        formExcluirEnviar() {
            this.$refs.formDelete.submit();
        }
    },
    created()
    {
        //this.list = JSON.parse(JSON.parse(this.propList).list);
        this.list = [];
    }
}

</script>


<style lang="scss">
@import '~/../resources/_adm/sass/_vars.scss';
.acordos-e-convencoes-list
{

    .box-btns-noticias {
        margin: 10px 0;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        border: solid 1px $grey;
        padding: 10px 40px;
        border-radius: 40px;
        background-color: $blue;

        a
        {
            .box__buttons--access
            {
                text-align: center;
                svg {
                    transition: $transition-normal;
                }
    
                p {
                    font-size: 0.7em;
                    color: $grey;
                    margin: 0;
                    transition: $transition-normal;
                }
            }

            &:hover
            {
                svg {
                    //transform: rotateY(180deg);
                    transform: rotate(360deg);

                    circle {
                        fill: $blue-light;
                    }
                }

                p {
                    color: $blue-light;
                }
            }
        }

    }

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
