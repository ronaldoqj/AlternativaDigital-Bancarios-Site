
<template>
    <div id="component__usuarios">
        
        <pages-menu-bar :btns-top-bar="makeBtnsBarTop()"></pages-menu-bar>
        <form ref="formDelete" action="/adm/usuario/deletar" method="post">
            <input type="hidden" name="_token" :value="csrf" />
            <input type="hidden" name="id" :value="config.id" />
        </form>
                
        <div class="container-fluid content--panel">
            <div class="row">

                <template v-if="this.list.length">    
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2" v-for="item in list" :key="item.id">

                        <div class="box--noticia noticia-simples">
                            <v-row>
                                <v-col>
                                    <v-responsive :aspect-ratio="4/4" class="box-image" :style="{backgroundImage: `url(${item.urlImage})`}">
                                    </v-responsive>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col class="buttons">
                                    <a :href="`/adm/usuario/edicao/${item.id}`">
                                        <img src="/_adm/assets/SVGs/editar.svg" class="img-fluid" onload="SVGInject(this)" />
                                    </a>
                                    
                                    <v-menu :close-on-content-click="true" :nudge-width="150" offset-x>
                                        <template v-slot:activator="{ on, attrs }">
                                            <a v-bind="attrs" v-on="on"  @click="clickedIconDelete(item.id)"><img src="/_adm/assets/SVGs/excluir.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                                        </template>
                                        
                                        <v-card>
                                            <v-list-item> <v-list-item-title>Deseja excluir o registro?</v-list-item-title> </v-list-item>
                                            <v-btn x-small class="ma-2" text @click="menu = false">Cancelar</v-btn>
                                            <v-btn small tile color="error" class="ma-2" outlined @click="deleteUser()">
                                                Excluir <v-icon right dark> mdi-delete </v-icon>
                                            </v-btn>
                                        </v-card>
                                    </v-menu>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col class="content">
                                    <p> {{item.name}} </p>
                                </v-col>
                            </v-row>
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
    </div>
</template>  

<script>
export default {
    data: () => {
        return {
            config: {
                defaultImage: '/_adm/assets/profile-default.jpg',
                id: null
            },
            // inputs Hidden

            list: [],
        }
    },
    components: {  },
    props: [ 'csrf', 'page', 'actionForm', 'propList' ],
    methods: {
        makeBtnsBarTop() {
            const btnsBarTop = {
                home: {
                    title: 'Home',
                    link: '/adm/',
                    icon: '/_adm/assets/SVGs/Home/icon-house.svg'
                },
                dashboard: {
                    title: 'Dashboard',
                    link: '/adm/dashboard',
                    icon: '/_adm/assets/SVGs/icon-dashboard.svg'
                },
                cadastro: {
                    title: 'Novo Usuário',
                    link: '/adm/usuarios/cadastro',
                    icon: '/_adm/assets/SVGs/icon-mais.svg'
                }
            }

            return btnsBarTop;
        },
        clickedIconDelete(id) {
            this.config.id = id;
        },
        deleteUser()
        {
            this.$refs.formDelete.submit();
        },
        insertImageElement(users) {
            users = users.map( element => {
                if ( _.isNil(element.image_pathfile) != '' || _.isNil(element.image_namefile != '') ) {
                    element.urlImage = this.config.defaultImage;
                } else {
                    element.urlImage = `/${element.image_pathfile}/${element.image_namefile}`;
                }

                return element;
            });

            return users;
        }
    },
    created()
    {
        this.list = this.insertImageElement(JSON.parse(this.propList));
        console.log('list', this.list);
    }
}
</script>

<style lang="scss">
@import '~/../resources/_adm/sass/_vars.scss';

#component__usuarios
{
    .box-image {
        background-size: cover;
        background-position: center;
        border-radius: 50%;
        max-width: 130px;
        margin: 0 auto;
    }
    .buttons {
        margin-top: -50px !important;
        display: flex;
        justify-content: center;
    }

    .content {
        margin: 0 !important;
        p {
            text-align: center;
        }
    }

    .content--panel
    {
        padding-left: 30px;

        .box--noticia
        {
            position: relative;
            border-bottom: solid 1px $grey-light;

            .buttons
            {
                display: flex;
                justify-content: center;
                margin: -43px 0 0;
                position: absolute;
                width: 100%;

                .container--buttons {
                    margin-bottom: -30px;
                    text-align: center;
                }

                .icon-file {
                    text-align: center;
                    margin: 0;
                    span { font-size: 3em; }
                }

                a
                {
                    font-size: 0.9em;
                    color: $blue-strong;

                    svg
                    {
                        width: 65px;
                        height: 65px;
                        margin: 0 3px;
                        cursor: pointer;
    
                        circle { transition: ease 0.4s; }
                    }

                    &:first-child
                    {    
                        &:hover svg {
                            circle { fill: $blue-strong; }
                        }
                    }

                    &:last-child
                    {
                        &:hover svg {
                            circle { fill: $red-strong; }
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
