
<template>
    <div id="page-entidades-parceiras" class="container-fluid mt-10">
        <pages-menu-bar :btns-top-bar="makeBtnsBarTop()"></pages-menu-bar>

        <errors-component :objErrorsShow="errorsShow" @showErrorsChange="errorsShow.show = $event"></errors-component>

        <form :action="formAction" method="post" @submit="checkForm" enctype="multipart/form-data">
            <input type="hidden" name="_token" :value="csrf">
            <input type="hidden" name="id" :value="id" />

            <!-- Logo -->
            <v-card class="mx-auto mt-4 mb-4" outlined>
                <v-card-text>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-box-files" :class="borderFields.entidadeParceira">
                                        <label>Logo</label>
                                        <div class="box-files">
                                            <template v-if="fileIsEdit != ''">
                                                <div class="box-image">
                                                    <img :src="fileIsEdit" class="img-fluid" alt="">
                                                    <p><v-btn depressed small color="error" @click="fileIsEdit = ''">Excluir</v-btn></p>
                                                </div>
                                            </template>
                                            <template v-else>
                                                <v-file-input name="file"
                                                    v-model="files"
                                                    label="Logo:"
                                                    placeholder="Procurar Imagem"
                                                    prepend-icon=""
                                                    prepend-inner-icon="image"
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
                                                        +{{ files.length - 2 }} File(s)
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

            <div class="row inputs-finais-to-all-types">
                <!-- Nome -->
                <div class="col-12" :class="borderFields.name">
                    <v-text-field
                        v-model="dataInputs.name"
                        name="name"
                        label="Nome:"
                        dense="dense"
                        maxlength="240"
                        counter="240"
                        outlined
                        clearable
                    ></v-text-field>
                </div>
                <div class="col-12" :class="borderFields.link">
                    <!-- Link -->
                    <v-text-field
                        v-model="dataInputs.link"
                        name="link"
                        label="Link:"
                        dense="dense"
                        maxlength="240"
                        counter="240"
                        outlined
                        clearable
                    ></v-text-field>
                </div>
            </div>

            <!-- Submit -->
            <div class="row mt-5">
                <div class="col-12">
                    <v-btn type="submit" class="btn-cadastrar" block rounded dark>{{valueBtnSubmit}}</v-btn>
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
        /**
         * Campos Hiden
         */
        id: '',

        valueBtnSubmit: 'Cadastrar',

        // variavel necessária para o component de mensagens de erro
        errorsShow: {
        show: false,
        title: 'Não foi possivel realizar o cadastro!',
        errors: []
        },

        isEdit: false,

        borderFields: {
            entidadeParceira: 'required',
            file: 'required',
            name: 'required',
            link: 'required',
        },

        dataInputs: {
            name: '',
            link: '',
        },

        // Controle dos files
        files: null,
            fileIsEdit: ''
      }
    },
    methods: {
        checkForm: function (e)
        {
            this.errorsShow.errors = [];

            if ( _.isEmpty(this.files) && this.fileIsEdit == '' )
                this.errorsShow.errors.push({title: 'Logo', description: 'obrigatório'});
            if (! _.isEmpty(this.files) && this.fileIsEdit == ''  ) {
                if ( this.files[0].size >= 1000000) {
                    this.errorsShow.errors.push({title: 'Logo', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                }
            }

            if ( _.isEmpty(this.dataInputs.name) )
                this.errorsShow.errors.push({title: 'Nome', description: 'obrigatório'});
            if ( _.isEmpty(this.dataInputs.link) )
                this.errorsShow.errors.push({title: 'Link', description: 'obrigatório'});
            
            if (this.errorsShow.errors.length > 0)
            {
                this.errorsShow.show = true;
                e.preventDefault();
            }
        },

        editStartCompleteFilds (item)
        {
            this.id = item.id;
            this.valueBtnSubmit = 'Editar';

            // Controle para mostrar os files ignorando a regra atual de validação (CONTEM VALOR DO TIPO STRING)
            // Ou manter a mesma logica que é quando o formulário está realizando cadastro (VAZIO DO TIPO STRING) 
            this.file = item.file_id > 0 ? `/${item.file_pathfile}/${item.file_namefile}` : '';
            this.fileIsEdit = item.file_id > 0 ? `/${item.file_pathfile}/${item.file_namefile}` : '';
            this.fileName = item.file_namefile;

            this.dataInputs = {
                name: item.name,
                link: item.link,
            };
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
                    title: 'Entidades Parceiras',
                    link: '/adm/entidades-parceiras',
                    icon: '/_adm/assets/SVGs/icon-entidades-parceiras.svg'
                }
            }

            return btnsBarTop;
        }
    },
    created()
    {
        if (!_.isEmpty(this.formEdition)) {
            this.isEdit = true;
            this.editStartCompleteFilds(JSON.parse(this.formEdition));
        }
    }
}
</script>

<style lang="scss">
@import '~/../resources/_adm/sass/_vars.scss';

#page-entidades-parceiras
{
    .switch-ativar-noticia {
        p {
            font-size: 0.7em;
            margin: 0;
            padding: 0;
            margin-bottom: -20px;
            margin-top: -6px;
            white-space: nowrap;
            color: $gray-font;
        }
    }

    .col-box-files
    {
        padding: 0;
        padding-right: 0;

        > label {
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

                img {
                    height: 100px;
                    margin-top: -20px;
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

    .inputs-finais-to-all-types {
        .v-input { margin-bottom: -30px; }
    }

    .v-input--switch .v-input--selection-controls__input { margin: 0 auto; }
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
