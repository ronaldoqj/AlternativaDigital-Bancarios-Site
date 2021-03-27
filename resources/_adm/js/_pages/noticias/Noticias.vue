
<template>
    <div class="noticias-list">
        <pages-menu-bar :btns-top-bar="makeBtnsBarTop()"></pages-menu-bar>

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
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2" v-for="item in noticias.destaques" :key="item.id">
                                
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
                                                <v-btn small tile color="error" class="ma-2 white--text" outlined @click="formExcluirEnviar()">
                                                    Excluir <v-icon right dark> mdi-delete </v-icon>
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
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2" v-for="item in noticias.comVideo" :key="item.id">
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
                                                <v-btn small tile color="error" class="ma-2 white--text" outlined @click="formExcluirEnviar()">
                                                    Excluir <v-icon right dark> mdi-delete </v-icon>
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
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2" v-for="item in noticias.comImagem" :key="item.id">
                                
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
                                                <v-btn small tile color="error" class="ma-2 white--text" outlined @click="formExcluirEnviar()">
                                                    Excluir <v-icon right dark> mdi-delete </v-icon>
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
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2" v-for="item in noticias.comPodcast" :key="item.id">
                                
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
                                                <v-btn small tile color="error" class="ma-2 white--text" outlined @click="formExcluirEnviar()">
                                                    Excluir <v-icon right dark> mdi-delete </v-icon>
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
                            
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2" v-for="item in noticias.simples" :key="item.id">
                                
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
                                                <v-btn small tile color="error" class="ma-2 white--text" outlined @click="formExcluirEnviar()">
                                                    Excluir <v-icon right dark> mdi-delete </v-icon>
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
            this.action = 'excluir';
        },
        formExcluirEnviar() {
            this.$refs.formDelete.submit();
        },

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
                    title: 'Nova Notícia',
                    link: '/adm/noticias/cadastro',
                    icon: '/_adm/assets/SVGs/icon-mais.svg'
                }
            }

            return btnsBarTop;
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
