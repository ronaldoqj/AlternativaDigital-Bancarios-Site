
<template>
    <div id="page-campanhas" class="container-fluid mt-10">
        <pages-menu-bar :btns-top-bar="makeBtnsBarTop()"></pages-menu-bar>

        <errors-component :objErrorsShow="errorsShow" @showErrorsChange="errorsShow.show = $event"></errors-component>

        <form :action="formAction" method="post" @submit="checkForm" enctype="multipart/form-data">
            <input type="hidden" name="_token" :value="csrf">
            <input type="hidden" name="id" :value="id" />

            <hr>

            <!-- Imagem da Campanha -->
            <div class="row">
                <div class="col-12">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-box-files" :class="borderFields.campanha">
                                <label>Imagem da campanha</label>
                                <div class="box-files">
                                    <template v-if="fileIsEdit != ''">
                                        <div class="box-image">
                                            <img :src="fileIsEdit" class="img-fluid" alt="">
                                            <p><v-btn depressed small color="error" @click="fileIsEdit = ''">Excluir</v-btn></p>
                                        </div>
                                    </template>
                                    <template v-else>
                                        <v-file-input
                                            name="file"
                                            v-model="files"
                                            label="Logo:"
                                            placeholder="Procurar Imagem"
                                            prepend-icon=""
                                            prepend-inner-icon="add_photo_alternate"
                                            dense="dense"
                                            color="primary"
                                            counter
                                            multiple
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

            <div class="row"><div class="col"><hr mt-5 mb-5></div></div>

            <div class="row">
                <!-- Data Inclusão -->
                <div class="col-4" :class="borderFields.dataInclusao">
                    <v-dialog
                        ref="dialog1"
                        v-model="dateTimeInputs.dates.dataInclusao.modal"
                        :return-value.sync="dateTimeInputs.dates.dataInclusao.date"
                        persistent
                        width="290px"
                        >
                        <template v-slot:activator="{ on, attrs }">
                            <v-text-field
                                name="dataInclusao"
                                v-model="dateTimeInputs.dates.dataInclusao.date"
                                label="Data Inclusão:"
                                dense="dense"
                                prepend-inner-icon="event"
                                readonly
                                v-bind="attrs"
                                v-on="on"
                                outlined>
                            </v-text-field>
                        </template>
                        <v-date-picker v-model="dateTimeInputs.dates.dataInclusao.date" scrollable>
                            <v-spacer></v-spacer>
                            <v-btn text color="primary" @click="dateTimeInputs.dates.dataInclusao.modal = false">Cancelar</v-btn>
                            <v-btn text color="primary" @click="$refs.dialog1.save(dateTimeInputs.dates.dataInclusao.date)">OK</v-btn>
                        </v-date-picker>
                    </v-dialog>
                </div>

                <!-- Limite No Destaque -->
                <div class="col-4" :class="borderFields.dataLimite">
                    <v-dialog
                        ref="dialog2"
                        v-model="dateTimeInputs.dates.limite.modal"
                        :return-value.sync="dateTimeInputs.dates.limite.date"
                        persistent
                        width="290px"
                        >
                        <template v-slot:activator="{ on, attrs }">
                            <v-text-field
                                name="dataLimite"
                                v-model="dateTimeInputs.dates.limite.date"
                                label="Limite No Destaque:"
                                dense="dense"
                                prepend-inner-icon="event"
                                readonly
                                v-bind="attrs"
                                v-on="on"
                                outlined
                                :clearable="true"
                            ></v-text-field>
                        </template>
                        <v-date-picker v-model="dateTimeInputs.dates.limite.date" scrollable>
                            <v-spacer></v-spacer>
                            <v-btn text color="primary" @click="dateTimeInputs.dates.limite.modal = false">Cancelar</v-btn>
                            <v-btn text color="primary" @click="$refs.dialog2.save(dateTimeInputs.dates.limite.date)">OK</v-btn>
                        </v-date-picker>
                    </v-dialog>
                </div>

                <!-- Limite Hora -->
                <div class="col-4" :class="borderFields.horaLimite">
                    <v-dialog
                        ref="dialog3"
                        v-model="dateTimeInputs.times.limiteDestaque.modal"
                        :return-value.sync="dateTimeInputs.times.limiteDestaque.time"
                        persistent
                        width="290px"
                    >
                        <template v-slot:activator="{ on, attrs }">
                        <v-text-field
                            name="horaLimite"
                            v-model="dateTimeInputs.times.limiteDestaque.time"
                            label="Limite Hora:"
                            dense="dense"
                            prepend-inner-icon="access_time"
                            readonly
                            v-bind="attrs"
                            v-on="on"
                            outlined
                            :clearable="true"
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
            </div>

            <div class="row"><div class="col"><hr mt-5 mb-5></div></div>

            <!-- Nome e Link -->
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
                <!-- Link -->
                <div class="col-12" :class="borderFields.link">
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
import moment from 'moment';

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
            dataInclusao: 'required',
            dataLimite: 'required',
            horaLimite: 'required',
            campanha: 'required',
            file: 'required',
            name: 'required',
            link: 'required',
        },

        dataInputs: {
            name: '',
            link: '',
        },

        dateTimeInputs: {
            dates: {
                dataInclusao: {
                    modal: false,
                    date: new Date().toISOString().substr(0, 10),
                },
                limite: {
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
        files: null,
            fileIsEdit: ''
      }

    },
    methods: {
        checkForm: function (e)
        {
            this.errorsShow.errors = [];

            // Validações especificas
            if ( _.isEmpty(this.dateTimeInputs.dates.limite.date) )
            this.errorsShow.errors.push({title: 'Limite No Destaque', description: 'obrigatório'});
            if ( _.isEmpty(this.dateTimeInputs.times.limiteDestaque.time) )
                this.errorsShow.errors.push({title: 'Limite Hora', description: 'obrigatório'});

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

            if (item.dataInclusao)
            this.dateTimeInputs.dates.dataInclusao.date = moment(String(item.dataInclusao)).format('YYYY-MM-DD');
            if (item.dataLimite)
            this.dateTimeInputs.dates.limite.date = _.isEmpty(item.dataLimite) ? '' : moment(String(item.dataLimite)).format('YYYY-MM-DD');
            if (item.horaLimite)
            this.dateTimeInputs.times.limiteDestaque.time = _.isEmpty(item.horaLimite) ? '' : moment(String('2020-01-01 '+item.horaLimite)).format('H:mm');
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
                    title: 'Campanhas',
                    link: '/adm/campanhas',
                    icon: '/_adm/assets/SVGs/icon-campanhas-only-icon.svg'
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
#page-campanhas
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
