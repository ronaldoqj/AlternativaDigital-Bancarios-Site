
<template>
    <div id="page-portal" class="container-fluid mt-10">
        <pages-menu-bar :btns-top-bar="makeBtnsBarTop()"></pages-menu-bar>

        <errors-component :objErrorsShow="errorsShow" @showErrorsChange="errorsShow.show = $event"></errors-component>
        <form :action="formAction" method="post" @submit="checkForm" enctype="multipart/form-data">
            <input type="hidden" name="_token" :value="csrf">

            <input type="hidden" name="deleteBannerOnEdit" :value="pageControl.deleteBannerOnEdit" />
            <input type="hidden" name="deleteLogoOnEdit" :value="pageControl.deleteLogoOnEdit" />

            <v-card class="mx-auto" outlined v-if="dataInputs.id === 2">
                <v-card-text>
                    <!-- Images -->
                    <div class="row">

                        <!-- Banner -->
                        <div class="col-12 col-md-6">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-box-files" :class="borderFields.sindicato">
                                        <label>Banner da Página:</label>
                                        <div class="box-files" :style="{backgroundImage: `url(${dataInputs.banner.fileIsEdit})`}">

                                            <template v-if="dataInputs.banner.fileIsEdit != ''">
                                                <v-btn
                                                elevation="6"
                                                large
                                                color="error"
                                                @click="deleteOnEdit('banner')"
                                                >
                                                    Excluir
                                                </v-btn>
                                            </template>
                                            <template v-else>
                                                <v-file-input
                                                    name="banner"
                                                    v-model="dataInputs.banner.file"
                                                    label="Banner:"
                                                    placeholder="Procurar Imagem"
                                                    prepend-icon=""
                                                    prepend-inner-icon="image"
                                                    dense="dense"
                                                    color="primary"
                                                    background-color="rgba(255, 255, 255, 0.7)"
                                                    counter
                                                    accept="image/png, image/jpeg, image/bmp"
                                                    outlined
                                                    :show-size="1000"
                                                >
                                                    <template v-slot:selection="{ index, text }">
                                                    <v-chip v-if="index < 2" color="primary" dark label small>
                                                        {{ text }}
                                                    </v-chip>
                                                    <span v-else-if="index === 2" class="overline grey--text text--darken-3 mx-2" >
                                                        +{{ dataInputs.banner.file.length - 2 }} File(s)
                                                    </span>
                                                    </template>
                                                </v-file-input>
                                            </template>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- Logo -->
                        <div class="col-12 col-md-6">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-box-files" :class="borderFields.sindicato">
                                        <label>Logo do Sindicato</label>
                                        <div class="box-files" :style="{backgroundImage: `url(${dataInputs.banner.fileIsEdit})`}">

                                            <template v-if="dataInputs.logo.fileIsEdit != ''">
                                                <div class="box-image">
                                                    <img :src="dataInputs.logo.fileIsEdit" class="img-fluid" alt="">
                                                    <p>
                                                        <v-btn
                                                        elevation="6"
                                                        small
                                                        color="error"
                                                        @click="deleteOnEdit('logo')"
                                                        >
                                                            Excluir
                                                        </v-btn>
                                                    </p>
                                                </div>
                                            </template>
                                            <template v-else>
                                                <v-file-input
                                                    name="logo"
                                                    v-model="dataInputs.logo.file"
                                                    label="Logo:"
                                                    placeholder="Procurar Imagem"
                                                    prepend-icon=""
                                                    prepend-inner-icon="image"
                                                    dense="dense"
                                                    color="primary"
                                                    background-color="rgba(255, 255, 255, 0.7)"
                                                    counter
                                                    accept="image/png, image/jpeg, image/bmp, image/svg+xml"
                                                    outlined
                                                    :show-size="1000"
                                                >
                                                    <template v-slot:selection="{ index, text }">
                                                    <v-chip v-if="index < 2" color="primary" dark label small>
                                                        {{ text }}
                                                    </v-chip>
                                                    <span v-else-if="index === 2" class="overline grey--text text--darken-3 mx-2" >
                                                        +{{ dataInputs.logo.file.length - 2 }} File(s)
                                                    </span>
                                                    </template>
                                                </v-file-input>
                                            </template>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        
                    </div>
                </v-card-text>
            </v-card>

            <div class="row"><div class="col"></div></div>

            <div class="row inputs-finals-to-all-types">
                <!-- Telefone Princípal-->
                <div class="col-12 col-md-6" :class="borderFields.fone">
                    <v-text-field
                        v-model="dataInputs.fone"
                        name="fone"
                        label="Telefone Principal:"
                        dense="dense"
                        maxlength="20"
                        counter="20"
                        v-mask="['(##) #####-####']"
                        rounded
                        outlined
                        clearable
                    ></v-text-field>
                </div>
                <!-- Telefone Secundário -->
                <div class="col-12 col-md-6" :class="borderFields.fone2">
                    <v-text-field
                        v-model="dataInputs.fone2"
                        name="fone2"
                        label="Telefone Secundário:"
                        dense="dense"
                        maxlength="20"
                        counter="20"
                        v-mask="['(##) #####-####']"
                        rounded
                        outlined
                        clearable
                    ></v-text-field>
                </div>
                <!-- E-Mail -->
                <div class="col-12" :class="borderFields.email">
                    <v-text-field
                        v-model="dataInputs.email"
                        :rules="dataInputs.rules.email"
                        name="email"
                        label="E-Mail:"
                        dense="dense"
                        maxlength="240"
                        counter="240"
                        rounded
                        outlined
                        clearable
                    ></v-text-field>
                </div>
                <!-- Redes Sociais -->
                <div class="col-12">
                    <v-card class="mx-auto" outlined>
                        <v-card-text>
                            <v-row>
                                <!-- Facebook -->
                                <div class="col-12 col-md-6" :class="borderFields.facebook">
                                    <!-- <v-icon>$vuetify.icons.iconOnlyLetterFacebook</v-icon> -->
                                    <v-text-field
                                        v-model="dataInputs.facebook"
                                        name="facebook"
                                        label="Facebook:"
                                        :prepend-icon="'$vuetify.icons.iconOnlyLetterFacebook'"
                                        dense="dense"
                                        maxlength="240"
                                        counter="240"
                                        rounded
                                        outlined
                                        clearable
                                    ></v-text-field>
                                </div>
                                <!-- Twitter -->
                                <div class="col-12 col-md-6" :class="borderFields.twitter">
                                    <v-text-field
                                        v-model="dataInputs.twitter"
                                        name="twitter"
                                        label="Twitter:"
                                        :prepend-icon="'$vuetify.icons.iconOnlyLetterTwitter'"
                                        dense="dense"
                                        maxlength="240"
                                        counter="240"
                                        rounded
                                        outlined
                                        clearable
                                    ></v-text-field>
                                </div>
                                <!-- Instagram -->
                                <div class="col-12 col-md-6" :class="borderFields.instagram">
                                    <v-text-field
                                        v-model="dataInputs.instagram"
                                        name="instagram"
                                        label="Instagram:"
                                        :prepend-icon="'$vuetify.icons.iconOnlyLetterInstagram'"
                                        dense="dense"
                                        maxlength="240"
                                        counter="240"
                                        rounded
                                        outlined
                                        clearable
                                    ></v-text-field>
                                </div>
                                <!-- Whatsapp -->
                                <div class="col-12 col-md-6" :class="borderFields.whatsapp">
                                    <v-text-field
                                        v-model="dataInputs.whatsapp"
                                        name="whatsapp"
                                        label="Whatsapp:"
                                        :prepend-icon="'$vuetify.icons.iconOnlyLetterWhatsapp'"
                                        dense="dense"
                                        maxlength="240"
                                        counter="240"
                                        rounded
                                        outlined
                                        disabled
                                        clearable
                                    ></v-text-field>
                                </div>
                                <!-- Podcast -->
                                <div class="col-12 col-md-6" :class="borderFields.podcast">
                                    <v-text-field
                                        v-model="dataInputs.podcast"
                                        name="podcast"
                                        label="Podcast:"
                                        :prepend-icon="'$vuetify.icons.iconOnlyLetterPodcast'"
                                        dense="dense"
                                        maxlength="240"
                                        counter="240"
                                        rounded
                                        outlined
                                        clearable
                                    ></v-text-field>
                                </div>
                                <!-- Youtube -->
                                <div class="col-12 col-md-6" :class="borderFields.youtube">
                                    <v-text-field
                                        v-model="dataInputs.youtube"
                                        name="youtube"
                                        label="Youtube:"
                                        :prepend-icon="'$vuetify.icons.iconOnlyLetterYoutube'"
                                        dense="dense"
                                        maxlength="240"
                                        counter="240"
                                        rounded
                                        outlined
                                        clearable
                                    ></v-text-field>
                                </div>
                            </v-row>
                        </v-card-text>
                    </v-card>
                </div>
            </div>

            <!-- Buttom Submit -->
            <div class="row mt-5 mb-5">
                <div class="col-12 mt-5">
                    <v-btn type="submit" class="btn-cadastrar" block rounded dark>Atualizar</v-btn>
                </div>
            </div>
        </form>  
    </div>
</template>  

<script>
    export default {
        props: ['csrf', 'formAction', 'formEdition'],
        data () {
            return {
                pageControl: {
                    pageEdit: true,
                    deleteBannerOnEdit: null,
                    deleteLogoOnEdit: null
                },

                // variavel necessária para o component de mensagens de erro
                errorsShow: {
                    show: false,
                    title: 'Não foi possivel atualizar!',
                    errors: []
                },

                borderFields: {
                    //name: 'required',
                },

                dataInputs: {
                    id: null,
                    banner: {
                        file: null,
                        fileIsEdit: ''
                    },
                    logo: {
                        file: null,
                        fileIsEdit: ''
                    },
                    fone: '',
                    fone2: '',
                    email: '',
                    facebook: '',
                    twitter: '',
                    instagram: '',
                    whatsapp: '',
                    podcast: '',
                    youtube: '',

                    rules: {
                        email: [
                            //v => !!v || 'E-mail is required',
                            //v => /.+@.+/.test(v) || 'E-mail must be valid',
                            v => !v || /.+@.+/.test(v) || 'E-mail must be valid',
                        ],
                    }
                }
            }
        },
        methods: {
            checkForm: function(e)
            {
                this.errorsShow.errors = [];
                
                if ( ! _.isNull(this.dataInputs.banner.file) )
                {
                    if ( this.dataInputs.banner.file.size >= 1000000 ) {
                        this.errorsShow.errors.push({title: 'Banner', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                    }
                }
                
                if ( ! _.isNull(this.dataInputs.logo.file) )
                {
                    if ( this.dataInputs.logo.file.size >= 1000000 ) {
                        this.errorsShow.errors.push({title: 'Logo', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                    }
                }

                if (this.errorsShow.errors.length > 0)
                {
                    this.errorsShow.show = true;
                    e.preventDefault();
                }
            },

            editStartCompleteFilds(item)
            {
                // Controle para mostrar os files ignorando a regra atual de validação (CONTEM VALOR DO TIPO STRING)
                // Ou manter a mesma logica que é quando o formulário está realizando cadastro (VAZIO DO TIPO STRING) 
                this.dataInputs.id = item.id;
                
                this.dataInputs.banner.fileIsEdit  = item.banner > 0 ? `/${item.banner_pathfile}/${item.banner_namefile}` : '';
                this.dataInputs.logo.fileIsEdit  = item.logo > 0 ? `/${item.logo_pathfile}/${item.logo_namefile}` : '';

                this.dataInputs.fone = item.fone;
                this.dataInputs.fone2 = item.fone2;
                this.dataInputs.email = item.email;
                this.dataInputs.facebook = item.facebook;
                this.dataInputs.twitter = item.twitter;
                this.dataInputs.instagram = item.instagram;
                this.dataInputs.whatsapp = item.whatsapp;
                this.dataInputs.podcast = item.podcast;
                this.dataInputs.youtube = item.youtube;
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
                    }
                }

                return btnsBarTop;
            },

            deleteOnEdit(typeFile)
            {
                if (typeFile === 'banner') {
                    this.pageControl.deleteBannerOnEdit = 'S';
                    this.dataInputs.banner.fileIsEdit = '';
                }
                if (typeFile === 'logo') {
                    this.pageControl.deleteLogoOnEdit = 'S';
                    this.dataInputs.logo.fileIsEdit = '';
                }
            }
        },
        created()
        {
            this.editStartCompleteFilds(JSON.parse(this.formEdition));
            console.log('oioioi');
            console.log(JSON.parse(this.formEdition));
        }
    }
</script>

<style lang="scss">
@import '~/../resources/_adm/sass/_vars.scss';

#page-portal
{
    .box-btns-noticias {
        margin: 10px 0;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        border: solid 1px $grey;
        padding: 20px 20px 10px;
        border-radius: 20px;
    
        > div {
            margin-bottom: 10px;
        }
    }

    .col-box-files
    {
        padding: 0;
        padding-right: 0;

        >label {
            font-size: 0.8em;
            margin-left: 10px;
            margin-bottom: 0;
        }
        .box-files {
            padding: 10px;
            border: solid 1px $grey;
            border-radius: 20px;
            min-height: 200px;
            background-size: cover;

            display: flex;
            align-items: center;
            justify-content: center;

            .box-image
            {
                text-align: center;

                img {
                    height: 100px;
                    padding: 15px;
                    background-color: rgba(8, 90, 76, 0.87);
                    border-radius: 10px;
                }

                audio { margin-top: -15px; }
                p { margin: 5px 0 0; }

                &.box-file
                {
                    .icon-file
                    {
                        span { font-size: 3em; }
                    }
                    a {
                        font-size: 0.9em;
                        color: $blue-strong;
                    }
                    
                    p:last-child { margin: 15px 0; }
                }
            }
        }
    }
    .credito-da-imagem { height: 20px; }
    .youtube-exmaple-code
    {
        margin-top: -20px;
        text-align: center;
        font-size: 0.8em;
        color: $grey;

        span { color: $blue-light; }
    }
    .btn-cadastrar {
        background-color: $blue-light !important;
        text-transform: unset;
    }
    .required
    {
        .box-files {
            border-color: #53A6D8;
            transition: $transition-normal ease;
            animation: shadowEfectBorder 1s;
            animation-fill-mode: forwards;

            &.ckeditor {
                padding: 5px;
                border-radius: 5px;
            }
        }
        fieldset {
            border-color: #53A6D8;
            transition: $transition-normal ease;
            animation: shadowEfectBorder 1s;
            animation-fill-mode: forwards;
        }
    }
    .inputs-finals-to-all-types {
        .v-input { margin-bottom: -20px; }
    }
}


@keyframes shadowEfectBorder
{
    0% {
        box-shadow: 0px 0px 15px 0px #53A6D8;
    }
    100% {
        box-shadow: 0px 0px 0px 0px #53A6D8;
    }
}
</style>
