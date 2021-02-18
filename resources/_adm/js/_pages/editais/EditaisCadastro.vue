<template>
    <div id="page-editais-cadastro" class="container-fluid">
        <pages-menu-bar :btns-top-bar="makeBtnsBarTop()"></pages-menu-bar>
        <errors-component :objErrorsShow="errorsShow" @showErrorsChange="errorsShow.show = $event"></errors-component>

        <form :action="actionForm + methodUrl" method="post" @submit="checkForm" enctype="multipart/form-data">
            <input type="hidden" name="_token" :value="csrf">
            <input type="hidden" name="ativar" :value="dataInputs.ativar" />
            <input type="hidden" name="id" :value="id" />
            <input type="hidden" name="idsSindicatos" :value="idsSindicatos" />

            <div class="row mt-4">
                <!-- Data Inclusão -->
                <div class="col-6 col-sm-4 col-lg-3" :class="borderFields.dataDaInclusao">
                    <v-dialog
                        ref="dialog1"
                        v-model="dateTimeInputs.dates.dataDaInclusao.modal"
                        :return-value.sync="dateTimeInputs.dates.dataDaInclusao.date"
                        persistent
                        width="290px"
                        >
                        <template v-slot:activator="{ on, attrs }">
                            <v-text-field
                                name="dataInclusao"
                                v-model="dateTimeInputs.dates.dataDaInclusao.date"
                                label="Data Inclusão:"
                                dense="dense"
                                prepend-inner-icon="event"
                                readonly
                                v-bind="attrs"
                                v-on="on"
                                outlined>
                            </v-text-field>
                        </template>
                        <v-date-picker v-model="dateTimeInputs.dates.dataDaInclusao.date" scrollable>
                            <v-spacer></v-spacer>
                            <v-btn text color="primary" @click="dateTimeInputs.dates.dataDaInclusao.modal = false">Cancelar</v-btn>
                            <v-btn text color="primary" @click="$refs.dialog1.save(dateTimeInputs.dates.dataDaInclusao.date)">OK</v-btn>
                        </v-date-picker>
                    </v-dialog>
                </div>

                <!-- Data Limite no Destaque -->
                <!-- Campo removido. Funcionalidade removida -->
                <div v-if="false" class="col-4" :class="borderFields.dataLimiteNoDestaque">
                    <v-dialog
                        ref="dialog2"
                        v-model="dateTimeInputs.dates.limiteNoDestaque.modal"
                        :return-value.sync="dateTimeInputs.dates.limiteNoDestaque.date"
                        persistent
                        width="290px"
                        >
                        <template v-slot:activator="{ on, attrs }">
                            <v-text-field
                                name="dataLimiteNoDestaque"
                                v-model="dateTimeInputs.dates.limiteNoDestaque.date"
                                label="Limite No Destaque:"
                                dense="dense"
                                prepend-inner-icon="event"
                                readonly
                                v-bind="attrs"
                                v-on="on"
                                outlined
                                clearable
                            ></v-text-field>
                        </template>
                        <v-date-picker v-model="dateTimeInputs.dates.limiteNoDestaque.date" scrollable>
                            <v-spacer></v-spacer>
                            <v-btn text color="primary" @click="dateTimeInputs.dates.limiteNoDestaque.modal = false">Cancelar</v-btn>
                            <v-btn text color="primary" @click="$refs.dialog2.save(dateTimeInputs.dates.limiteNoDestaque.date)">OK</v-btn>
                        </v-date-picker>
                    </v-dialog>
                </div>

                <!-- Hora Limite no Destaque -->
                <!-- Campo removido. Funcionalidade removida -->
                <div v-if="false" class="col-3" :class="borderFields.horaLimiteNoDestaque">
                    <v-dialog
                        ref="dialog3"
                        v-model="dateTimeInputs.times.limiteDestaque.modal"
                        :return-value.sync="dateTimeInputs.times.limiteDestaque.time"
                        persistent
                        width="290px"
                    >
                        <template v-slot:activator="{ on, attrs }">
                        <v-text-field
                            name="horaLimiteNoDestaque"
                            v-model="dateTimeInputs.times.limiteDestaque.time"
                            label="Limite Hora:"
                            dense="dense"
                            prepend-inner-icon="access_time"
                            readonly
                            v-bind="attrs"
                            v-on="on"
                            outlined
                            clearable
                        ></v-text-field>
                        </template>
                        <v-time-picker
                        v-if="dateTimeInputs.times.limiteDestaque.modal"
                        v-model="dateTimeInputs.times.limiteDestaque.time"
                        full-width
                        >
                        <v-spacer></v-spacer>
                        <v-btn text color="primary" @click="dateTimeInputs.times.limiteDestaque.modal = false">Cancelar</v-btn>
                        <v-btn text color="primary" @click="$refs.dialog3.save(dateTimeInputs.times.limiteDestaque.time)">OK</v-btn>
                        </v-time-picker>
                    </v-dialog>
                </div>

                <!-- Aticar Notícia -->
                <div class="col-6 col-sm-8 col-lg-9">
                    <v-switch
                        v-model="dataInputs.ativar"
                        class="float-right m-0 mr-1"
                        label="Ativar Edital"
                        hide-details
                    ></v-switch>
                </div>
                <!-- Ativar nos Sindicatos -->
                <!-- Campo removido. Até o momento não é para ter essa funcionalidade -->
                <div class="col-3" v-if="false" >
                    <v-combobox
                        name="ativarNosSindicatos"
                        label="Ativar nos Sindicatos:"
                        v-model="dataInputs.sindicatos.selected"
                        multiple
                        item-text="name"
                        item-value="id"
                        :items="dataInputs.sindicatos.items"
                        color="primary"
                        dense="dense"
                        outlined
                        clearable
                        :disabled="dataInputs.sindicatos.disabled"
                    ></v-combobox>
                </div>
            </div>

            <v-card class="mx-auto mb-4" outlined>
                <v-card-text>

                    <!-- Banner Destaque -->
                    <div class="row">
                        <div class="col-12">
                            
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-8 col-box-files" :class="borderFields.bannerDestaque">
                                        <label>Banner Destaque</label>
                                        <div class="box-files">

                                            <template v-if="fileBannerIsEdit != ''">
                                                <div class="box-image">
                                                    <img :src="fileBannerIsEdit" class="img-fluid" alt="">
                                                    <p><v-btn depressed small color="error" @click="fileBannerIsEdit = ''">Excluir</v-btn></p>
                                                </div>
                                            </template>
                                            <template v-else>
                                                <v-file-input name="bannerDestaque"
                                                    v-model="filesBannerDestaque"
                                                    label="Banner Destaque:"
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
                                    <!-- Credito da Imagem -->
                                    <div class="col-4" :class="borderFields.creditoBannerDestaque">
                                        <div class="credito-da-imagem"></div>
                                        <v-text-field
                                            v-model="dataInputs.creditoBannerDestaque"
                                            name="creditoBannerDestaque"
                                            label="Crédito da Imagem:"
                                            placeholder="Crédito da Imagem"
                                            dense="dense"
                                            maxlength="240"
                                            counter="240"
                                            outlined
                                            clearable
                                        ></v-text-field>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Arquivo PDF -->
                    <div class="row">
                        <div class="col-12">
                            
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-box-files" :class="borderFields.file">
                                        <label>Arquivo PDF</label>
                                        <div class="box-files">
                                            <template v-if="fileFileIsEdit != ''">
                                                <div class="box-image box-file">
                                                    <p class="icon-file"><span class="material-icons"> picture_as_pdf </span></p>
                                                    <a :href="fileFileIsEdit" target="_blank">{{this.fileFileName}}</a>
                                                    <p><v-btn depressed small color="error" @click="fileFileIsEdit = ''">Excluir</v-btn></p>
                                                </div>
                                            </template>
                                            <template v-else>
                                                <v-file-input
                                                    name="file"
                                                    v-model="filesFile"
                                                    label="Arquivo PDF:"
                                                    placeholder="Procurar Arquivo"
                                                    prepend-icon=""
                                                    prepend-inner-icon="picture_as_pdf"
                                                    dense="dense"
                                                    color="primary"
                                                    counter
                                                    accept=".pdf"
                                                    outlined
                                                    :show-size="1000"
                                                >
                                                    <template v-slot:selection="{ index, text }">
                                                    <v-chip v-if="index < 2" color="primary" dark label small >
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
                <!-- Cartola -->
                <div class="col-8" :class="borderFields.cartola">
                    <v-text-field
                        v-model="dataInputs.cartola"
                        name="cartola"
                        label="Cartola:"
                        dense="dense"
                        maxlength="240"
                        counter="240"
                        outlined
                        clearable
                    ></v-text-field>
                </div>
                <!-- Tag's -->
                <div class="col-4" :class="borderFields.tags">
                    <v-text-field
                        v-model="dataInputs.tags"
                        name="tags"
                        label="Tag's:"
                        dense="dense"
                        maxlength="240"
                        counter="240"
                        outlined
                        clearable
                    ></v-text-field>
                </div>
            </div>

            <!-- Titulo -->
            <div class="row inputs-finais-to-all-types">
                <div class="col-12" :class="borderFields.titulo">
                    <v-textarea
                    v-model="dataInputs.titulo"
                    name="titulo"
                    label="Título do Edital:"
                    dense="dense"
                    height="90"
                    maxlength="240"
                    counter="240"
                    outlined
                    clearable
                    ></v-textarea>
                </div>
            </div>

            <!-- Linha de Apoio -->
            <div class="row inputs-finais-to-all-types">
                <div class="col-12" :class="borderFields.linhaDeApoio">
                    <v-textarea
                    v-model="dataInputs.linhaDeApoio"
                    name="linhaDeApoio"
                    label="Linha de Apoio:"
                    dense="dense"
                    height="90"
                    maxlength="240"
                    counter="240"
                    outlined
                    clearable
                    ></v-textarea>
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
import moment from 'moment';

export default {
    props: [
        'actionForm',
        'methodUrl',
        'formEdition',
        'entity',
        'sindicatos',
        'csrf'
    ],
    data () {
        return {
            /**
             * Campos Hiden
             */
            id: '',
            isEdit: false,

            valueBtnSubmit: 'Cadastrar',

            // variavel necessária para o component de mensagens de erro
            errorsShow: {
                show: false,
                title: 'Não foi possivel realizar o cadastro!',
                errors: []
            },
        
            borderFields: {
                dataDaInclusao: 'required',
                dataLimiteNoDestaque: '',
                horaLimiteNoDestaque: '',
                ativarNosSindicatos: '',
                bannerDestaque: 'required',
                creditoBannerDestaque: 'required',
                file: 'required',
                cartola: 'required',
                tags: 'required',
                titulo: 'required',
                linhaDeApoio: 'required',
            },

            dataInputs: {
                ativar: false,
                creditoBannerDestaque: '',
                cartola: '',
                tags: '',
                titulo: '',
                linhaDeApoio: '',
                sindicatos: {
                    items: [],
                    selected: null,
                    disabled: false
                },
            },

            dateTimeInputs: {
                dates: {
                    dataDaInclusao: {
                        modal: false,
                        date: new Date().toISOString().substr(0, 10),
                    },
                    limiteNoDestaque: {
                        modal: false,
                        date: null,
                    },
                },
                times: {
                    limiteDestaque: {
                        modal: false,
                        time: null,
                    }
                }
            },

            // Controle dos files
            filesBannerDestaque: null,
            fileBannerIsEdit: '',
            filesFile: null,
            fileFileIsEdit: '',
            fileFileName: '',
        }
    },
    computed: {
        idsSindicatos()
        {
            let arrayIdsSindicatos = null;
            if (this.dataInputs.sindicatos.selected) {
                arrayIdsSindicatos = [];

                this.dataInputs.sindicatos.selected.forEach(function(item) {
                    arrayIdsSindicatos.push(item.id);
                });
            }
            
            return arrayIdsSindicatos;
        }
    },
    methods: {
        checkForm: function (e)
        {
            this.errorsShow.errors = [];

            // Validações especificas
            if ( _.isEmpty(this.filesBannerDestaque) && this.fileBannerIsEdit == '' )
                this.errorsShow.errors.push({title: 'Banner Destaque', description: 'obrigatório'});
            if (! _.isEmpty(this.filesBannerDestaque) && this.fileBannerIsEdit == ''  ) {
                if ( this.filesBannerDestaque[0].size >= 1000000) {
                    this.errorsShow.errors.push({title: 'Banner Destaque', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                }
            }
            if ( _.isEmpty(this.dataInputs.creditoBannerDestaque) )
                this.errorsShow.errors.push({title: 'Crédito da Imagem (Banner Destaque)', description: 'obrigatório'});
            

            if ( _.isEmpty(this.filesFile) && this.fileFileIsEdit == '' )
                this.errorsShow.errors.push({title: 'Arquivo PDF', description: 'obrigatório'});
            if (! _.isEmpty(this.filesFile) && this.fileFileIsEdit == '' ) {
                if ( this.filesFile[0].size >= 20000000) {
                    this.errorsShow.errors.push({title: 'Arquivo PDF', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 20mb) '});
                }
            }


            if ( _.isEmpty(this.dateTimeInputs.dates.dataDaInclusao.date) )
                this.errorsShow.errors.push({title: 'Data Inclusão', description: 'obrigatório'});

            if ( _.isEmpty(this.dataInputs.cartola) )
                this.errorsShow.errors.push({title: 'Cartola', description: 'obrigatório'});
            if ( _.isEmpty(this.dataInputs.tags) )
                this.errorsShow.errors.push({title: 'Tag\'s', description: 'obrigatório'});
            if ( _.isEmpty(this.dataInputs.titulo) )
                this.errorsShow.errors.push({title: 'Título do Acordo ou Convenções', description: 'obrigatório'});
            if ( _.isEmpty(this.dataInputs.linhaDeApoio) )
                this.errorsShow.errors.push({title: 'Linha de Apoio', description: 'obrigatório'});
            
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

            // Setando campos com os valores já cadastrados
            this.dateTimeInputs.dates.dataDaInclusao.date = moment(String(item.dataInclusao)).format('YYYY-MM-DD');
            this.dateTimeInputs.dates.limiteNoDestaque.date = _.isEmpty(item.dataLimiteNoDestaque) ? '' : moment(String(item.dataLimiteNoDestaque)).format('YYYY-MM-DD');
            this.dateTimeInputs.times.limiteDestaque.time = _.isEmpty(item.horaLimiteNoDestaque) ? '' : moment(String('2020-01-01 '+item.horaLimiteNoDestaque)).format('H:mm');

            this.dataInputs.ativar = item.ativo == 'S' ? true: false;

            // Controle para mostrar os files ignorando a regra atual de validação (CONTEM VALOR DO TIPO STRING)
            // Ou manter a mesma logica que é quando o formulário está realizando cadastro (VAZIO DO TIPO STRING) 
            this.fileBannerIsEdit = item.fileBannerDestaque_id > 0 ? `/${item.fileBannerDestaque_pathfile}/${item.fileBannerDestaque_namefile}` : '';
            this.fileFileIsEdit = item.file_id > 0 ? `/${item.file_pathfile}/${item.file_namefile}` : '';
            this.fileFileName = item.file_namefile;

            this.dataInputs.creditoBannerDestaque = item.fileBannerDestaque_creditfile;
            this.dataInputs.cartola = item.cartola;
            this.dataInputs.tags = item.tags;
            this.dataInputs.titulo = item.titulo;
            this.dataInputs.linhaDeApoio = item.linhaDeApoio;

            /**
             * Só faz a validação se "item.ativarNosSindicatos" for diferente de NULL
             */
            if (item.ativarNosSindicatos)
            {
                // Seleciona os sindicatos que estão cadastrados
                const arraySelected = item.ativarNosSindicatos.split(",")
                                                              .map(function(item) {
                                                                  return parseInt(item, 10);
                                                              });
                JSON.parse(this.sindicatos).forEach( item =>
                {
                    if ( arraySelected.indexOf(item.id) >= 0 )
                    {
                        // Caso a variavel this.dataInputs.sindicatos.selected seja null, é alterada para array
                        if (!this.dataInputs.sindicatos.selected)
                        {
                            this.dataInputs.sindicatos.selected = [];
                        }

                        this.dataInputs.sindicatos.selected.push(item);
                    }
                });
            }
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
                editais: {
                    title: 'Editais',
                    link: this.actionForm,
                    icon: '/_adm/assets/SVGs/icon-menu-editais.svg'
                }
            }

            return btnsBarTop;
        }
    },
    created()
    {
        /**
         * Caso a entidade for um sindicato, então não poderá
         * escolhar um sindicado para compartilhar o edital
         */
        if (this.entity > 0) {
            this.dataInputs.sindicatos.disabled = true;
        } else {
            /**
             * Caso contrário é populado o combobox dos sindicatos
             */
            this.dataInputs.sindicatos.items = JSON.parse(this.sindicatos);
        }

        /**
         * Verifica se é o modo de edição para setar os campos
         */
        if (!_.isEmpty(this.formEdition)) {
            this.isEdit = true;
            this.editStartCompleteFilds(JSON.parse(this.formEdition));
        }
    }
}
</script>

<style lang="scss">
@import '~/../resources/_adm/sass/_vars.scss';

#page-editais-cadastro
{    
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
