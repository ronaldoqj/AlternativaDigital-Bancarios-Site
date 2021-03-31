
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

                <!-- Noticia destaque -->
                <v-expansion-panel>
                    <v-expansion-panel-header>
                        <div class="header--panel">
                            <div><BtnIconText :params="paramsBtnIcons.btnIconTextDestaque"></BtnIconText></div>
                            <div></div>
                        </div>
                    </v-expansion-panel-header>
                    <v-expansion-panel-content>
                        <v-overlay absolute :value="controlNoticiasPaginate.destaques.overlay">
                            <v-progress-circular
                                indeterminate
                                size="64"
                            ></v-progress-circular>
                        </v-overlay>
                        <div class="container-fluid content--panel">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2" v-for="item in noticias.destaques" :key="item.id">
                                    <CardNews type="card-banner" :data="item" @clickedDelete="deleteCard"></CardNews>
                                </div> 
                            </div>
                            
                        </div>
                        <v-row justify="center">
                            <v-container class="max-width">
                                <v-pagination
                                    v-model="controlNoticiasPaginate.destaques.page"
                                    class="my-4"
                                    :length="controlNoticiasPaginate.destaques.totalOfPages"
                                ></v-pagination>
                            </v-container>
                        </v-row>
                    </v-expansion-panel-content>
                </v-expansion-panel>

                <!-- Noticia com Video -->
                <v-expansion-panel>
                    <v-expansion-panel-header>
                        <div class="header--panel">
                            <div><BtnIconText :params="paramsBtnIcons.btnIconTextVideo"></BtnIconText></div>
                            <div></div>
                        </div>
                    </v-expansion-panel-header>
                    <v-expansion-panel-content>
                        <v-overlay absolute :value="controlNoticiasPaginate.comVideo.overlay">
                            <v-progress-circular
                                indeterminate
                                size="64"
                            ></v-progress-circular>
                        </v-overlay>
                        <div class="container-fluid content--panel">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2" v-for="item in noticias.comVideo" :key="item.id">
                                    <CardNews type="card-video" :data="item" @clickedDelete="deleteCard"></CardNews>
                                </div>
                            </div>
                        </div>
                        <v-row justify="center">
                            <v-container class="max-width">
                                <v-pagination
                                    v-model="controlNoticiasPaginate.comVideo.page"
                                    class="my-4"
                                    :length="controlNoticiasPaginate.comVideo.totalOfPages"
                                ></v-pagination>
                            </v-container>
                        </v-row>
                    </v-expansion-panel-content>
                </v-expansion-panel>

                <!-- Noticia com Imagem -->
                <v-expansion-panel>
                    <v-expansion-panel-header>
                        <div class="header--panel">
                            <div><BtnIconText :params="paramsBtnIcons.btnIconTextImagem"></BtnIconText></div>
                            <div></div>
                        </div>
                    </v-expansion-panel-header>
                    <v-expansion-panel-content>
                        <v-overlay absolute :value="controlNoticiasPaginate.comImagem.overlay">
                            <v-progress-circular
                                indeterminate
                                size="64"
                            ></v-progress-circular>
                        </v-overlay>
                        <div class="container-fluid content--panel">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2" v-for="item in noticias.comImagem" :key="item.id">
                                    <CardNews type="card-image" :data="item" @clickedDelete="deleteCard"></CardNews>
                                </div>
                            </div>
                        </div>
                        <v-row justify="center">
                            <v-container class="max-width">
                                <v-pagination
                                    v-model="controlNoticiasPaginate.comImagem.page"
                                    class="my-4"
                                    :length="controlNoticiasPaginate.comImagem.totalOfPages"
                                ></v-pagination>
                            </v-container>
                        </v-row>
                    </v-expansion-panel-content>
                </v-expansion-panel>

                <!-- Nocia Podcast -->
                <v-expansion-panel>
                    <v-expansion-panel-header>
                        <div class="header--panel">
                            <div><BtnIconText :params="paramsBtnIcons.btnIconTextPodcast"></BtnIconText></div>
                            <div></div>
                        </div>
                    </v-expansion-panel-header>
                    <v-expansion-panel-content>
                        <v-overlay absolute :value="controlNoticiasPaginate.comPodcast.overlay">
                            <v-progress-circular
                                indeterminate
                                size="64"
                            ></v-progress-circular>
                        </v-overlay>
                        <div class="container-fluid content--panel">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2" v-for="item in noticias.comPodcast" :key="item.id">
                                    <CardNews type="card-file" :data="item" @clickedDelete="deleteCard"></CardNews>
                                </div>
                            </div>
                        </div>
                        <v-row justify="center">
                            <v-container class="max-width">
                                <v-pagination
                                    v-model="controlNoticiasPaginate.comPodcast.page"
                                    class="my-4"
                                    :length="controlNoticiasPaginate.comPodcast.totalOfPages"
                                ></v-pagination>
                            </v-container>
                        </v-row>
                    </v-expansion-panel-content>
                </v-expansion-panel>
                
                <!-- Noticia Simples -->
                <v-expansion-panel>
                    <v-expansion-panel-header>
                        <div class="header--panel">
                            <div><BtnIconText :params="paramsBtnIcons.btnIconTextTexto"></BtnIconText></div>
                            <div></div>
                        </div>
                    </v-expansion-panel-header>
                    <v-expansion-panel-content>
                        <v-overlay absolute :value="controlNoticiasPaginate.simples.overlay">
                            <v-progress-circular
                                indeterminate
                                size="64"
                            ></v-progress-circular>
                        </v-overlay>
                        <div class="container-fluid content--panel">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2" v-for="item in noticias.simples" :key="item.id">
                                    <CardNews type="card-text" :data="item" @clickedDelete="deleteCard"></CardNews>
                                </div>
                            </div>
                        </div>
                        <v-row justify="center">
                            <v-container class="max-width">
                                <v-pagination
                                    v-model="controlNoticiasPaginate.simples.page"
                                    class="my-4"
                                    :length="controlNoticiasPaginate.simples.totalOfPages"
                                ></v-pagination>
                            </v-container>
                        </v-row>
                    </v-expansion-panel-content>
                </v-expansion-panel>

            </v-expansion-panels>
        </form>
    </div>
</template>  

<script>
import BtnIconText from "../../components/btn_icon-text/BtnIconText.vue"
import CardNews from "../../components/widget/CardNewsComponent.vue"
import { PaginationCardPost } from "../../_services/ServiceCardNews"

export default {
    components: { BtnIconText, CardNews },
    props: [ 'csrf', 'actionForm', 'urlCurrentPage' ],
    data: () => {
        return {
            // inputs Hidden
            id: '',
            action: '',

            // controle dos acordeões
            //panel: [0, 1, 2, 3, 4],
            panel: [0],
            
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
            },

            controlNoticiasPaginate: {
                destaques: {
                    page: null,
                    totalOfPages: null,
                    overlay: false
                },
                comImagem: {
                    page: null,
                    totalOfPages: null,
                    overlay: false
                },
                comPodcast: {
                    page: null,
                    totalOfPages: null,
                    overlay: false
                },
                comVideo: {
                    page: null,
                    totalOfPages: null,
                    overlay: false
                },
                simples: {
                    page: null,
                    totalOfPages: null,
                    overlay: false
                }
            },

            settingPagination: {
                url: '',
                csrf: '',
                page: 1,
                typeOfNews: ''
            }
        }
    },
    methods: {
        deleteCard(item)
        {
            this.id = item.id;
            this.action = 'excluir';
            this.$refs.formDelete.submit();
        },
        makeBtnsBarTop()
        {
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
        },
        pagination(payload)
        {
            PaginationCardPost(payload)
            .then(response => {
                this.setNews(response);
            })
            .catch(error => {
                console.log('Erro in the call of new page', error);
            })
            .finally(() => {
                //console.log('finally');
            });
        },
        setNews(response)
        {
            switch (response.data.extraParam.typeOfNews)
            {
                case 'noticia-destaque':
                    this.noticias.destaques = response.data.items;
                    this.controlNoticiasPaginate.destaques.page = response.data.page;
                    this.controlNoticiasPaginate.destaques.totalOfPages = response.data.totalPages;
                    this.controlNoticiasPaginate.destaques.overlay = false;
                    break;

                case 'noticia-imagem':
                    this.noticias.comImagem = response.data.items;
                    this.controlNoticiasPaginate.comImagem.page = response.data.page;
                    this.controlNoticiasPaginate.comImagem.totalOfPages = response.data.totalPages;
                    this.controlNoticiasPaginate.comImagem.overlay = false;
                    break;
            
                case 'noticia-podcast':
                    this.noticias.comPodcast = response.data.items;
                    this.controlNoticiasPaginate.comPodcast.page = response.data.page;
                    this.controlNoticiasPaginate.comPodcast.totalOfPages = response.data.totalPages;
                    this.controlNoticiasPaginate.comPodcast.overlay = false;
                    break;
            
                case 'noticia-video':
                    this.noticias.comVideo = response.data.items;
                    this.controlNoticiasPaginate.comVideo.page = response.data.page;
                    this.controlNoticiasPaginate.comVideo.totalOfPages = response.data.totalPages;
                    this.controlNoticiasPaginate.comVideo.overlay = false;
                    break;
            
                case 'noticia-simples':
                    this.noticias.simples = response.data.items;
                    this.controlNoticiasPaginate.simples.page = response.data.page;
                    this.controlNoticiasPaginate.simples.totalOfPages = response.data.totalPages;
                    this.controlNoticiasPaginate.simples.overlay = false;
                    break;
            }
        }
    },
    computed: {
        pageDestaques() {
            return this.controlNoticiasPaginate.destaques.page;
        },
        pageImages: function() {
            return this.controlNoticiasPaginate.comImagem.page;
        },
        pagePodcasts: function() {
            return this.controlNoticiasPaginate.comPodcast.page;
        },
        pageVideos: function() {
            return this.controlNoticiasPaginate.comVideo.page;
        },
        pageSimpes: function() {
            return this.controlNoticiasPaginate.simples.page;
        }
    },
    watch: {
        pageDestaques: function (newValue, oldValue) {
            const payloadDestaque = _.cloneDeep(this.settingPagination);
            payloadDestaque.typeOfNews = 'noticia-destaque';
            payloadDestaque.page = newValue;

            this.controlNoticiasPaginate.destaques.overlay = true;
            this.pagination(payloadDestaque);
        },
        pageImages: function (newValue, oldValue) {
            const payloadImage = _.cloneDeep(this.settingPagination);
            payloadImage.typeOfNews = 'noticia-imagem';
            payloadImage.page = newValue;

            this.controlNoticiasPaginate.comImagem.overlay = true;
            this.pagination(payloadImage);
        },
        pagePodcasts: function (newValue, oldValue) {
            const payloadPodcast = _.cloneDeep(this.settingPagination);
            payloadPodcast.typeOfNews = 'noticia-podcast';
            payloadPodcast.page = newValue;

            this.controlNoticiasPaginate.comPodcast.overlay = true;
            this.pagination(payloadPodcast);
        },
        pageVideos: function (newValue, oldValue) {
            const payloadVideo = _.cloneDeep(this.settingPagination);
            payloadVideo.typeOfNews = 'noticia-video';
            payloadVideo.page = newValue;

            this.controlNoticiasPaginate.comVideo.overlay = true;
            this.pagination(payloadVideo);
        },
        pageSimpes: function (newValue, oldValue) {
            const payloadSimples = _.cloneDeep(this.settingPagination);
            payloadSimples.typeOfNews = 'noticia-simples';
            payloadSimples.page = newValue;

            this.controlNoticiasPaginate.simples.overlay = true;
            this.pagination(payloadSimples);
        }
    },
    mounted()
    {
        /** Config comun parameters for responses */
        this.settingPagination.url = this.urlCurrentPage;
        this.settingPagination.csrf = this.csrf;
        this.settingPagination.itemsPerPage = 12;
        
        /** Call the first pages */
        this.controlNoticiasPaginate.destaques.page = 1;
        this.controlNoticiasPaginate.comVideo.page = 1;
        this.controlNoticiasPaginate.comImagem.page = 1;
        this.controlNoticiasPaginate.comPodcast.page = 1;
        this.controlNoticiasPaginate.simples.page = 1;
    }
}
</script>
