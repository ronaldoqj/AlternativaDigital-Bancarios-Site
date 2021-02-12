
<template>
    <div id="page-noticias-cadastro" class="container-fluid">
        <pages-menu-bar :btns-top-bar="makeBtnsBarTop()"></pages-menu-bar>

        <errors-component :objErrorsShow="errorsShow" @showErrorsChange="errorsShow.show = $event"></errors-component>

        <form :action="formAction" method="post" @submit="checkForm" enctype="multipart/form-data">
            <input type="hidden" name="_token" :value="csrf">
            <input type="hidden" name="ativar" :value="ativar" />
            <input type="hidden" name="id" :value="id" />
            <input type="hidden" name="idEntidade" :value="idEntidade" />

            <div class="row">
                <!-- Data Inclusão -->
                <div class="col-3" :class="borderFields.dataDaInclusao">
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

                <!-- Limite No Destaque -->
                <div class="col-3" :class="borderFields.dataLimiteNoDestaque">
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

                <!-- Limite Hora -->
                <div class="col-2" :class="borderFields.horaLimiteNoDestaque">
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

                <!-- Ativar Notícia -->
                <div class="col-1 switch-ativar-noticia text-center">
                    <p>Ativar Notícia</p>
                    <v-switch v-model="ativar" class="ma-4"></v-switch>
                </div>

                <!-- Ativar nos Sindicatos -->
                <div class="col-3">
                    <v-select
                    name="ativarNosSindicatos"
                    label="Ativar nos Sindicatos:"
                    v-model="form.selectSindicato"
                    :items="sindicatos"
                    dense="dense"
                    color="primary"
                    outlined
                    clearable
                    ></v-select>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-12">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- Banner Destaque -->
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

            <div class="row"><div class="col"><hr mt-5 mb-5></div></div>

            <!-- Entidade -->
            <div class="row">
                <div class="col-12">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-box-files" :class="borderFields.entidades">
                                <div class="credito-da-imagem"></div>
                                <v-combobox
                                name="entidade"
                                v-model="entidadeValue"
                                :items="entidadeItems"
                                prepend-inner-icon="layers"
                                label="Entidade"
                                placeholder="Selecione uma entidade"
                                outlined
                                clearable
                                ></v-combobox>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cartola e Tag's -->
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

            <!-- Título do Acordo ou Convenção -->
            <div class="row inputs-finais-to-all-types">
                <div class="col-12" :class="borderFields.titulo">
                    <v-textarea
                    v-model="dataInputs.titulo"
                    name="titulo"
                    label="Título do Acordo ou Convenção:"
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
                                            multiple
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
    props: ['csrf', 'formAction', 'formEdition', 'entidades'],
    data () {
        // Variavel do combobox
        const defaultForm = Object.freeze({
            selectSindicato: '',
        })

        return {
            /**
             * Campos Hiden
             */
            // tratamento para o compo combobox do entidade
            id: '',
            entidadeValue: '',
            entidadeItems: [],
            entidadeItemsObject: {},

            idEntidade: '',
            valueBtnSubmit: 'Cadastrar',

              // variavel necessária para o component de mensagens de erro
            errorsShow: {
                show: false,
                title: 'Não foi possivel realizar o cadastro!',
                errors: []
            },

            isEdit: false,
            
            borderFields: {
                dataDaInclusao: 'required',
                dataLimiteNoDestaque: 'required',
                horaLimiteNoDestaque: 'required',
                ativarNosSindicatos: '',
                entidades: 'required',
                bannerDestaque: 'required',
                creditoBannerDestaque: 'required',
                file: 'required',
                cartola: 'required',
                tags: 'required',
                titulo: 'required',
                linhaDeApoio: 'required'
            },

            switch1: false,

            // Combobox Sindicatos
            form: Object.assign({}, defaultForm),
            sindicatos: [],//['Sindicato1', 'Sindicato2', 'Sindicato3', 'Sindicato4', 'Sindicato5'],

            // Switch Ativar Notícia
            ativar: false,

            dataInputs: {
                creditoBannerDestaque: '',
                cartola: '',
                tags: '',
                titulo: '',
                linhaDeApoio: '',
                entidade: {
                    select: null,
                    items: [
                        'item1',
                        'item2',
                        'item3',
                        'item4',
                        'item5'
                    ]
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
                    }
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
    methods: {
        checkForm: function (e)
        {
            this.errorsShow.errors = [];

            // Opcionais
            if (! _.isEmpty(this.filesFile) )
            {
                if (! _.isEmpty(this.filesFile)  ) {
                    if ( this.filesFile[0].size >= 20000000) {
                        this.errorsShow.errors.push({title: 'Arquivo PDF', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 20mb) '});
                    }
                }
            }

            // Validações especificas
            if ( _.isEmpty(this.filesFile) && this.fileFileIsEdit == '' )
                this.errorsShow.errors.push({title: 'Arquivo PDF', description: 'obrigatório'});
            if (! _.isEmpty(this.filesFile) && this.fileFileIsEdit == '' ) {
                if ( this.filesFile[0].size >= 20000000) {
                    this.errorsShow.errors.push({title: 'Arquivo PDF', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 20mb) '});
                }
            }

            // Validações especificas
            if ( _.isEmpty(this.dateTimeInputs.dates.limiteNoDestaque.date) )
                this.errorsShow.errors.push({title: 'Limite No Destaque', description: 'obrigatório'});
            if ( _.isEmpty(this.dateTimeInputs.times.limiteDestaque.time) )
                this.errorsShow.errors.push({title: 'Limite Hora', description: 'obrigatório'});

            if ( _.isEmpty(this.filesBannerDestaque) && this.fileBannerIsEdit == '' )
                this.errorsShow.errors.push({title: 'Banner Destaque', description: 'obrigatório'});
            if (! _.isEmpty(this.filesBannerDestaque) && this.fileBannerIsEdit == ''  ) {
                if ( this.filesBannerDestaque[0].size >= 1000000) {
                    this.errorsShow.errors.push({title: 'Banner Destaque', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                }
            }
            if ( _.isEmpty(this.dataInputs.creditoBannerDestaque) )
                this.errorsShow.errors.push({title: 'Crédito da Imagem (Banner Destaque)', description: 'obrigatório'});
            
            // Validações comuns a todos
            if ( _.isEmpty(this.entidadeValue) )
                this.errorsShow.errors.push({title: 'Entidade', description: 'obrigatório'});

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
        editStartCompleteFilds(item)
        {
            this.id = item.id;
            this.valueBtnSubmit = 'Editar';

            // Started combobox entidade
            this.idEntidade = item.entidade;
            
            for (let i in this.entidadeItemsObject)
            {
                if ( item.entidade == this.entidadeItemsObject[i].id ) {
                    this.entidadeValue = this.entidadeItemsObject[i].name;
                    break;
                }
            }

            // Setando campos com os valores já cadastrados
            this.dateTimeInputs.dates.dataDaInclusao.date = moment(String(item.dataInclusao)).format('YYYY-MM-DD');
            this.dateTimeInputs.dates.limiteNoDestaque.date = _.isEmpty(item.dataLimiteNoDestaque) ? '' : moment(String(item.dataLimiteNoDestaque)).format('YYYY-MM-DD');
            this.dateTimeInputs.times.limiteDestaque.time = _.isEmpty(item.horaLimiteNoDestaque) ? '' : moment(String('2020-01-01 '+item.horaLimiteNoDestaque)).format('H:mm');

            this.ativar = item.ativo == 'S' ? true: false;

            // Controle para mostrar os files ignorando a regra atual de validação (CONTEM VALOR DO TIPO STRING)
            // Ou manter a mesma logica que é quando o formulário está realizando cadastro (VAZIO DO TIPO STRING) 
            console.log('now', item.file_id);
            this.fileBannerIsEdit = item.fileBannerDestaque_id > 0 ? `/${item.fileBannerDestaque_pathfile}/${item.fileBannerDestaque_namefile}` : '';
            this.fileFileIsEdit = item.file_id > 0 ? `/${item.file_pathfile}/${item.file_namefile}` : '';
            this.fileFileName = item.file_namefile;

            this.dataInputs = {
                creditoBannerDestaque: item.fileBannerDestaque_creditfile,
                cartola: item.cartola,
                tags: item.tags,
                titulo: item.titulo,
                linhaDeApoio: item.linhaDeApoio,
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
                acordosConvencoes: {
                    title: 'Acordos e Convenções',
                    link: '/adm/acordos-e-convencoes',
                    icon: '/_adm/assets/SVGs/icon-pdf.svg'
                }
            }

            return btnsBarTop;
        }
    },
    watch: {
        entidadeValue(newValue, oldValue)
        {
            for (var item in this.entidadeItemsObject)
            {
                if ( this.entidadeValue == this.entidadeItemsObject[item].name ) {
                    this.idEntidade = this.entidadeItemsObject[item].id;
                    break;
                }
            }
        }
    },
    created()
    {
        if (!_.isEmpty(this.entidades))
        {
            this.entidadeItemsObject = JSON.parse(this.entidades);

            for (let item in this.entidadeItemsObject)
            {
                this.entidadeItems.push(this.entidadeItemsObject[item].name);
            }
        }
        
        if (!_.isEmpty(this.formEdition)) {
            this.isEdit = true;
            this.editStartCompleteFilds(JSON.parse(this.formEdition));
        }
    }
}
</script>

<style lang="scss">
@import '~/../resources/_adm/sass/_vars.scss';
#page-noticias-cadastro
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
