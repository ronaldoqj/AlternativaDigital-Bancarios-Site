
<template>
    <div class="noticias-list">
        
        <div class="row">
            <div class="col-12">
                <div class="box-btns-noticias">
                    <a href="/adm/noticias/cadastro">
                        <div class="box__buttons--access">
                            <img src="/_adm/assets/SVGs/icon-mais.svg" class="img-fluid" onload="SVGInject(this)" />
                            <p>nova noticia</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <form ref="formDelete" :action="actionForm" method="post">
            <input type="hidden" name="_token" :value="csrf">
            <input type="hidden" name="id" :value="id">
            <input type="hidden" name="action" :value="action">
        
            <v-expansion-panels
            v-model="panel"
            multiple
            flat
            >
                <v-expansion-panel>
                    <v-expansion-panel-header>
                        <div class="header--panel">
                            <div><btnIconText :params="paramsBtnIcons.btnIconTextDestaque"></btnIconText></div>
                            <div></div>
                        </div>
                    </v-expansion-panel-header>
                    <v-expansion-panel-content>
                    <div class="container-fluid content--panel">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2" v-for="item in noticias.destaques">
                                
                                <div class="box--noticia">
                                    <div class="imagem-noticia" :style="{ backgroundImage: `url(/${item.fileBannerDestaque_pathfile}/${item.fileBannerDestaque_namefile})` }"></div>
                                    <div class="buttons">
                                        <a :href="`/adm/noticias/edicao/${item.id}`"><img src="/_adm/assets/SVGs/editar.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                                        
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
                        </div>
                    </div>
                    </v-expansion-panel-content>
                </v-expansion-panel>

                <v-expansion-panel>
                    <v-expansion-panel-header>
                        <div class="header--panel">
                            <div><btnIconText :params="paramsBtnIcons.btnIconTextVideo"></btnIconText></div>
                            <div></div>
                        </div>
                    </v-expansion-panel-header>
                    <v-expansion-panel-content>
                    <div class="container-fluid content--panel">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2" v-for="item in noticias.comVideo">
                                <div class="box--noticia">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" :src="'https://www.youtube.com/embed/' + item.videoYoutube" allowfullscreen></iframe>
                                    </div>

                                    <div class="buttons">
                                        <a :href="`/adm/noticias/edicao/${item.id}`"><img src="/_adm/assets/SVGs/editar.svg" class="img-fluid" onload="SVGInject(this)" /></a>
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
                        </div>
                    </div>
                    </v-expansion-panel-content>
                </v-expansion-panel>

                <v-expansion-panel>
                    <v-expansion-panel-header>
                        <div class="header--panel">
                            <div><btnIconText :params="paramsBtnIcons.btnIconTextImagem"></btnIconText></div>
                            <div></div>
                        </div>
                    </v-expansion-panel-header>
                    <v-expansion-panel-content>
                    <div class="container-fluid content--panel">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2" v-for="item in noticias.comImagem">
                                
                                <div class="box--noticia">
                                    <div class="imagem-noticia" :style="{ backgroundImage: `url(/${item.fileImagemDestaque_pathfile}/${item.fileImagemDestaque_namefile})` }"></div>
                                    <div class="buttons">
                                        <a :href="`/adm/noticias/edicao/${item.id}`"><img src="/_adm/assets/SVGs/editar.svg" class="img-fluid" onload="SVGInject(this)" /></a>
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
                        </div>
                    </div>
                    </v-expansion-panel-content>
                </v-expansion-panel>

                <v-expansion-panel>
                    <v-expansion-panel-header>
                        <div class="header--panel">
                            <div><btnIconText :params="paramsBtnIcons.btnIconTextPodcast"></btnIconText></div>
                            <div></div>
                        </div>
                    </v-expansion-panel-header>
                    <v-expansion-panel-content>
                    <div class="container-fluid content--panel">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2" v-for="item in noticias.comPodcast">
                                
                                <div class="box--noticia">

                                    <audio controls>
                                        <source :src="`/${item.filePodcast_pathfile}/${item.filePodcast_namefile}`" type="audio/mpeg">
                                        Seu navegador de internet não suporta o elemento do tipo audio.
                                    </audio>

                                    <div class="buttons">
                                        <a :href="`/adm/noticias/edicao/${item.id}`"><img src="/_adm/assets/SVGs/editar.svg" class="img-fluid" onload="SVGInject(this)" /></a>
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
                        </div>
                    </div>
                    </v-expansion-panel-content>
                </v-expansion-panel>
                
                <v-expansion-panel>
                    <v-expansion-panel-header>
                        <div class="header--panel">
                            <div><btnIconText :params="paramsBtnIcons.btnIconTextTexto"></btnIconText></div>
                            <div></div>
                        </div>
                    </v-expansion-panel-header>
                    <v-expansion-panel-content>
                    <div class="container-fluid content--panel">
                        <div class="row">
                            
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2" v-for="item in noticias.simples">
                                
                                <div class="box--noticia noticia-simples">
                                    <div class="buttons">
                                        <a :href="`/adm/noticias/edicao/${item.id}`"><img src="/_adm/assets/SVGs/editar.svg" class="img-fluid" onload="SVGInject(this)" /></a>
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
                        </div>
                    </div>
                    </v-expansion-panel-content>
                </v-expansion-panel>


            </v-expansion-panels>
        </form>

    </div>
</template>  

<script>


import btnIconText from "../../components/btn_icon-text/BtnIconText.vue"
export default {
    data: () => {
        return {

            // inputs Hidden
            id: '',
            action: '',

            // controle dos acordeões
            panel: [0, 1, 2, 3, 4],
            

            size: {
                height: '250px',
                backgroundImage: 'url(/files/noticias/be6e7ee47196117d743e38015197ecdf924d2ec4bc0fbff5d69ec24b67b828c2-20200707_183027-777950.jpg)'
            },

            paramsBtnIcons:
            {
                btnIconTextDestaque: {
                    type: 'noticia-destaque',
                    text: 'Notícia Destaque',
                    icon: '/_adm/assets/SVGs/noticia-imagem.svg',
                    selected: true
                },
                btnIconTextVideo: {
                    type: 'noticia-video',
                    text: 'Notícia Com Video',
                    icon: '/_adm/assets/SVGs/noticia-video.svg',
                    selected: true
                },
                btnIconTextImagem: {
                    type: 'noticia-imagem',
                    text: 'Notícia Com Imagem',
                    icon: '/_adm/assets/SVGs/noticia-imagem.svg',
                    selected: true
                },
                btnIconTextPodcast: {
                    type: 'noticia-podcast',
                    text: 'Notícia Com Podcast',
                    icon: '/_adm/assets/SVGs/noticia-podcast.svg',
                    selected: true
                },
                btnIconTextTexto: {
                    type: 'noticia-simples',
                    text: 'Notícia Simples',
                    icon: '/_adm/assets/SVGs/noticia-texto.svg',
                    selected: true
                }
            },

            noticias: {
                destaques: null,
                comImagem: null,
                comPodcast: null,
                comVideo: null,
                simples: null
            }
        }
    },
    components: { btnIconText },
    props: [ 'csrf', 'actionForm', 'propNoticias' ],
    methods: {
        
        clickExcluir(item)
        {
            this.id = item.id;
            this.modal.action = 'excluir';
        },
        formExcluirEnviar() {
            this.$refs.formDelete.submit();
        }
    },
    created()
    {
        this.noticias.destaques = JSON.parse(JSON.parse(this.propNoticias).noticiaDestaque);
        this.noticias.comImagem = JSON.parse(JSON.parse(this.propNoticias).noticiaComImagem);
        this.noticias.comPodcast = JSON.parse(JSON.parse(this.propNoticias).noticiaComPodcast);
        this.noticias.comVideo = JSON.parse(JSON.parse(this.propNoticias).noticiaComVideo);
        this.noticias.simples = JSON.parse(JSON.parse(this.propNoticias).noticiaSimples);
    }
}

</script>


<style lang="scss">
@import '~/../resources/_adm/sass/_vars.scss';
.noticias-list
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
                    transform: rotate(36mu0deg);

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
