<template>
    <div class="card-news-component box--noticia" :class="type === 'card-text' ? 'noticia-simples' : ''">

        <!-- Header of Card Banner -->
        <template v-if="type === 'card-banner'">
            <div class="imagem-noticia" :style="{ backgroundImage: `url(/${data.fileBannerDestaque_pathfile}/${data.fileBannerDestaque_namefile})` }"></div>
        </template>

        <!-- Header of Card Image -->
        <template v-if="type === 'card-image'">
            <div class="imagem-noticia" :style="{ backgroundImage: `url(/${data.fileImagemDestaque_pathfile}/${data.fileImagemDestaque_namefile})` }"></div>
        </template>

        <!-- Header of Card Video -->
        <template v-if="type === 'card-video'">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" :src="'https://www.youtube.com/embed/' + data.videoYoutube" allowfullscreen></iframe>
            </div>
        </template>

        <!-- Header of Card File -->
        <template v-if="type === 'card-file'">
            <audio controls>
                <source :src="`/${data.filePodcast_pathfile}/${data.filePodcast_namefile}`" type="audio/mpeg">
                Seu navegador de internet não suporta o elemento do tipo audio.
            </audio>
        </template>

        <!-- Top of Card Text -->
        <!-- Nothing to do because this Card don't have Header -->

        <!-- Body comun to all Types -->
        <div class="buttons">
            <a :href="`/adm/noticias/edicao/${data.id}`"><img src="/_adm/assets/SVGs/editar.svg" class="img-fluid" onload="SVGInject(this)" /></a>
            <v-menu :close-on-content-click="true" :nudge-width="150" offset-x>
                <template v-slot:activator="{ on, attrs }">
                    <a v-bind="attrs" v-on="on" @click="clickedIconDelete(data)"><img src="/_adm/assets/SVGs/excluir.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                </template>
                <v-card>
                    <v-list-item> <v-list-item-title>Deseja excluir o registro?</v-list-item-title> </v-list-item>
                    <v-btn x-small class="ma-2" text @click="menu = false">Cancelar</v-btn>
                    <v-btn small tile color="error" class="ma-2" outlined @click="deleteCard()">
                        Excluir <v-icon right dark> mdi-delete </v-icon>
                    </v-btn>
                </v-card>
            </v-menu>
        </div>
        <div class="content"> <p> {{data.titulo}} </p> </div>
    </div>
</template>

<script>
  export default {
    props: {
        type: {
            type: String,
            required: true
        },
        data: {
            type: Object,
            required: true
        }
    },
    methods: {
        clickedIconDelete(data) {
            this.$emit('clickIconDelete', data);
        },
        deleteCard() {
            this.$emit('clickedDelete');
        }
    }
  }
</script>

<style lang="scss">  
@import '~/../resources/_adm/sass/_vars.scss';

.card-news-component.box--noticia
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
</style>
