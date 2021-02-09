
<template>
    <div id="sindicatos" class="container-fluid mt-10">
    <errors-component :objErrorsShow="errorsShow" @showErrorsChange="errorsShow.show = $event"></errors-component>
    <form :action="formAction" method="post" @submit="checkForm" enctype="multipart/form-data">
        <input type="hidden" name="_token" :value="csrf">
        <input type="hidden" name="id" :value="dataInputs.id" />
        <input type="hidden" name="ativo" :value="dataInputs.ativar" />
        <input type="hidden" name="estado" :value="computedUF" />

        <!-- Ativar -->
        <div class="row">
            <div class="col-12 pt-0">
                <v-switch
                    v-model="dataInputs.ativar"
                    class="float-right m-0 mr-1"
                    color="primary"
                    label="Ativar Sindicato"
                    hide-details
                ></v-switch>
            </div>
        </div>

        <v-card class="mx-auto" outlined>
            <v-card-text>
                    <!-- Banner -->
                    <div class="row">
                        <div class="col-12">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-box-files" :class="borderFields.sindicato">
                                        <label>Banner da Página:</label>
                                        <div class="box-files">

                                            <template v-if="dataInputs.banner.fileIsEdit != ''">
                                                <div class="box-image">
                                                    <img :src="dataInputs.banner.fileIsEdit" class="img-fluid" alt="">
                                                    <p><v-btn depressed small color="error" @click="dataInputs.banner.fileIsEdit = ''">Excluir</v-btn></p>
                                                </div>
                                            </template>
                                            <template v-else>
                                                <v-file-input
                                                    name="banner"
                                                    v-model="dataInputs.banner.file"
                                                    label="Banner:"
                                                    placeholder="Procurar Imagem"
                                                    prepend-icon=""
                                                    prepend-inner-icon="add_photo_alternate"
                                                    dense="dense"
                                                    color="primary"
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
                    </div>
                    <!-- Logo -->
                    <div class="row">
                        <div class="col-12">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-box-files" :class="borderFields.sindicato">
                                        <label>Logo do Sindicato</label>
                                        <div class="box-files">

                                            <template v-if="dataInputs.logo.fileIsEdit != ''">
                                                <div class="box-image">
                                                    <img :src="dataInputs.logo.fileIsEdit" class="img-fluid" alt="">
                                                    <p><v-btn depressed small color="error" @click="dataInputs.logo.fileIsEdit = ''">Excluir</v-btn></p>
                                                </div>
                                            </template>
                                            <template v-else>
                                                <v-file-input
                                                    name="logo"
                                                    v-model="dataInputs.logo.file"
                                                    label="Logo:"
                                                    placeholder="Procurar Imagem"
                                                    prepend-icon=""
                                                    prepend-inner-icon="add_photo_alternate"
                                                    dense="dense"
                                                    color="primary"
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
            </v-card-text>
        </v-card>

        <div class="row"><div class="col"></div></div>

        <div class="row inputs-finals-to-all-types">
            <!-- subdominio -->
            <div class="col-12" :class="borderFields.subdominio">
                <v-text-field
                    v-model="dataInputs.subdominio"
                    name="subdominio"
                    label="Subdomínio:"
                    dense="dense"
                    maxlength="240"
                    counter="240"
                    rounded
                    outlined
                    clearable
                ></v-text-field>
            </div>
            <!-- Nome -->
            <div class="col-12" :class="borderFields.name">
                <v-text-field
                    v-model="dataInputs.name"
                    name="name"
                    label="Nome:"
                    dense="dense"
                    maxlength="240"
                    counter="240"
                    rounded
                    outlined
                    clearable
                ></v-text-field>
            </div>
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

            <!-- CEP -->
            <div class="col-12 col-md-4" :class="borderFields.cep">
                <v-text-field
                    v-model="dataInputs.cep"
                    name="cep"
                    label="CEP:"
                    dense="dense"
                    maxlength="14"
                    counter="14"
                    v-mask="['#####-###']"
                    rounded
                    outlined
                    clearable
                ></v-text-field>
            </div>
        </div>

        <div class="row inputs-finals-to-all-types">
            <!-- Endereço -->
            <div class="col-12 col-md-6" :class="borderFields.endereco">
                <v-text-field
                    v-model="dataInputs.endereco"
                    name="endereco"
                    label="Endereço:"
                    dense="dense"
                    maxlength="240"
                    counter="240"
                    rounded
                    outlined
                    clearable
                ></v-text-field>
            </div>
            <!-- Número -->
            <div class="col-12 col-md-3 col-lg-2" :class="borderFields.numero">
                <v-text-field
                    v-model="dataInputs.numero"
                    name="numero"
                    label="Número:"
                    dense="dense"
                    maxlength="30"
                    counter="30"
                    rounded
                    outlined
                    clearable
                ></v-text-field>
            </div>
            <!-- Complemento -->
            <div class="col-12 col-md-3 col-lg-4" :class="borderFields.complemento">
                <v-text-field
                    v-model="dataInputs.complemento"
                    name="complemento"
                    label="Complemento:"
                    dense="dense"
                    maxlength="240"
                    counter="240"
                    rounded
                    outlined
                    clearable
                ></v-text-field>
            </div>
            <!-- Bairro -->
            <div class="col-12 col-md-4" :class="borderFields.bairro">
                <v-text-field
                    v-model="dataInputs.bairro"
                    name="bairro"
                    label="Bairro:"
                    dense="dense"
                    maxlength="240"
                    counter="240"
                    rounded
                    outlined
                    clearable
                ></v-text-field>
            </div>
            <!-- Cidade -->
            <div class="col-12 col-md-4" :class="borderFields.cidade">
                <v-text-field
                    v-model="dataInputs.cidade"
                    name="cidade"
                    label="Cidade:"
                    dense="dense"
                    maxlength="240"
                    counter="240"
                    rounded
                    outlined
                    clearable
                ></v-text-field>
            </div>
            <!-- Estado -->
            <div class="col-12 col-md-4" :class="borderFields.uf">
                <v-combobox
                    name="uf"
                    v-model="dataInputs.uf.selected"
                    item-text="estado"
                    item-value="sigla"
                    :items="dataInputs.uf.items"
                    label="Estado:"
                    placeholder="Selecione um Estado"
                    counter="19"
                    rounded
                    outlined
                    dense
                    :clearable="true"
                ></v-combobox>
            </div>
        </div>

        <!-- Buttom Submit -->
        <div class="row mt-5 mb-5">
            <div class="col-12 mt-5">
                <v-btn type="submit" class="btn-cadastrar" block rounded dark>{{pageControl.valueBtnSubmit}}</v-btn>
            </div>
        </div>
    </form>  
    </div>
</template>  

<script>
    export default {
        data () {
            return {
                pageControl: {
                    valueBtnSubmit: 'Cadastrar',
                    pageEdit: false
                },

                // variavel necessária para o component de mensagens de erro
                errorsShow: {
                    show: false,
                    title: 'Não foi possivel realizar o cadastro!',
                    errors: []
                },

                borderFields: {
                    sindicato: 'required',
                    file: 'required',
                    subdominio: 'required',
                    name: 'required',
                },

                dataInputs: {
                    id: '',
                    ativar: false,
                    banner: {
                        file: null,
                        fileIsEdit: ''
                    },
                    logo: {
                        file: null,
                        fileIsEdit: ''
                    },
                    subdominio: '',
                    name: '',
                    fone: '',
                    fone2: '',
                    email: '',
                    facebook: '',
                    twitter: '',
                    instagram: '',
                    whatsapp: '',
                    podcast: '',
                    youtube: '',
                    cep: '',
                    endereco: '',
                    numero: '',
                    complemento: '',
                    bairro: '',
                    cidade: '',
                    uf: {
                        selected: null,
                        items: JSON.parse(this.estados)
                    },

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
        computed: {
            computedUF() {
                return this.dataInputs.uf.selected ? this.dataInputs.uf.selected.sigla : null;
            }
        },
        components: {  },
        methods: {
            checkForm: function (e)
            {
                this.errorsShow.errors = [];
                // Validações especificas
               
                if ( _.isNull(this.dataInputs.banner.file) && this.dataInputs.banner.fileIsEdit == '' ) {
                    this.errorsShow.errors.push({title: 'Banner', description: 'obrigatório'});
                }
                if ( ! _.isNull(this.dataInputs.banner.file) )
                {
                    if ( this.dataInputs.banner.file.size >= 1000000 ) {
                        this.errorsShow.errors.push({title: 'Banner', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                    }
                }
                
                if ( _.isNull(this.dataInputs.logo.file) && this.dataInputs.logo.fileIsEdit == '' ) {
                    this.errorsShow.errors.push({title: 'Logo', description: 'obrigatório'});
                }
                if ( ! _.isNull(this.dataInputs.logo.file) )
                {
                    if ( this.dataInputs.logo.file.size >= 1000000 ) {
                        this.errorsShow.errors.push({title: 'Logo', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                    }
                }

                

                if ( _.isEmpty(this.dataInputs.subdominio) )
                    this.errorsShow.errors.push({title: 'Subdomínio', description: 'obrigatório'});
                if ( _.isEmpty(this.dataInputs.name) )
                    this.errorsShow.errors.push({title: 'Nome', description: 'obrigatório'});
                
                if (this.errorsShow.errors.length > 0)
                {
                    this.errorsShow.show = true;
                    e.preventDefault();
                }
            },

            editStartCompleteFilds(item)
            {
                this.dataInputs.id = item.id;
                this.pageControl.valueBtnSubmit = 'Editar';

                // Controle para mostrar os files ignorando a regra atual de validação (CONTEM VALOR DO TIPO STRING)
                // Ou manter a mesma logica que é quando o formulário está realizando cadastro (VAZIO DO TIPO STRING) 
                // this.dataInputs.banner.fileIsEdit = item.file_id > 0 ? `/${item.file_pathfile}/${item.file_namefile}` : '';
                console.log('file_id', item.file_id);
                console.log('item', item);
                // this.dataInputs.banner.file = item.file_id > 0 ? `/${item.file_pathfile}/${item.file_namefile}` : '';
                // this.fileName = item.file_namefile;

                this.dataInputs.banner.fileIsEdit  = item.banner > 0 ? `/${item.banner_pathfile}/${item.banner_namefile}` : '';
                this.dataInputs.logo.fileIsEdit  = item.logo > 0 ? `/${item.logo_pathfile}/${item.logo_namefile}` : '';

                this.dataInputs.ativar = item.ativo === 'S' ? true : false;
                this.dataInputs.subdominio = item.subdomain;
                this.dataInputs.name = item.name;

                this.dataInputs.fone = item.fone;
                this.dataInputs.fone2 = item.fone2;
                this.dataInputs.email = item.email;
                this.dataInputs.facebook = item.facebook;
                this.dataInputs.twitter = item.twitter;
                this.dataInputs.instagram = item.instagram;
                this.dataInputs.whatsapp = item.whatsapp;
                this.dataInputs.podcast = item.podcast;
                this.dataInputs.youtube = item.youtube;
                this.dataInputs.cep = item.cep;
                this.dataInputs.endereco = item.endereco;
                this.dataInputs.numero = item.numero;
                this.dataInputs.complemento = item.complemento;
                this.dataInputs.bairro = item.bairro;
                this.dataInputs.cidade = item.cidade;

                JSON.parse(this.estados).forEach(estado => {
                    if (estado.sigla == item.uf) {
                        this.dataInputs.uf.selected = estado;
                    }
                });
            },

        },
        created()
        {
            if (!_.isEmpty(this.formEdition)) {
                this.pageControl.pageEdit = true;
                this.editStartCompleteFilds(JSON.parse(this.formEdition));
            }
        },
        mounted()
        {
            console.log(JSON.parse(this.estados));
            console.log('pageEdit', this.pageControl.pageEdit);
        },
        props: ['csrf', 'formAction', 'formEdition', 'estados'],
    }
</script>

<style lang="scss">
@import '~/../resources/_adm/sass/_vars.scss';

#sindicatos
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
            border: solid 1px $grey;
            border-radius: 20px;
            padding: 30px 20px 10px;

            .box-image
            {
                text-align: center;

                img { height: 100px; margin-top: -20px; }
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
