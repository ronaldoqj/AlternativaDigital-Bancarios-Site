
<template>
    <div id="page-noticias-cadastro" class="container-fluid">
        <pages-menu-bar :btns-top-bar="makeBtnsBarTop()"></pages-menu-bar>

        <errors-component :objErrorsShow="errorsShow" @showErrorsChange="errorsShow.show = $event"></errors-component>

        <form :action="formAction" method="post" @submit="checkForm" enctype="multipart/form-data">
            <input type="hidden" name="_token" :value="csrf">
            <input type="hidden" name="tipoDaNoticia" :value="btnTipoNoticiaSelecionado" />
            <input type="hidden" name="ativarNoticia" :value="ativarNoticia" />
            <input type="hidden" name="idNoticia" :value="idNoticia" />
            <input type="hidden" name="idsBancos" :value="idsBancos" />
            <input type="hidden" name="idsSindicatos" :value="idsSindicatos" />

            <!-- Tipo de Notícia -->
            <div class="row">
                <div class="col-12">
                    <div class="box-btns-noticias">
                        <div @click="clickBtnNoticias('btnIconTextDestaque')"><btnIconText :params="paramsBtnIcons.btnIconTextDestaque"></btnIconText> </div>
                        <div @click="clickBtnNoticias('btnIconTextVideo')">   <btnIconText :params="paramsBtnIcons.btnIconTextVideo"></btnIconText>    </div>
                        <div @click="clickBtnNoticias('btnIconTextImagem')">  <btnIconText :params="paramsBtnIcons.btnIconTextImagem"></btnIconText>   </div>
                        <div @click="clickBtnNoticias('btnIconTextPodcast')"> <btnIconText :params="paramsBtnIcons.btnIconTextPodcast"></btnIconText>  </div>
                        <div @click="clickBtnNoticias('btnIconTextTexto')">   <btnIconText :params="paramsBtnIcons.btnIconTextTexto"></btnIconText>    </div>    
                    </div>
                </div>
            </div>

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
                                :clearable="true"
                            ></v-text-field>
                        </template>
                        <v-date-picker v-model="dateTimeInputs.dates.limiteNoDestaque.date" scrollable>
                            <v-spacer></v-spacer>
                            <v-btn text color="primary" @click="dateTimeInputs.dates.limiteNoDestaque.modal = false">Cancelar</v-btn>
                            <v-btn text color="primary" @click="$refs.dialog2.save(dateTimeInputs.dates.limiteNoDestaque.date)">OK</v-btn>
                        </v-date-picker>
                    </v-dialog>
                </div>

                <!-- Hora Limite No Destaque -->
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

                <!-- Ativar Notícia -->
                <div class="col-1 switch-ativar-noticia text-center">
                    <p>Ativar Notícia</p>
                    <v-switch v-model="ativarNoticia" class="ma-4"></v-switch>
                </div>

                <!-- Sindicatos -->
                <div class="col-3" :class="borderFields.ativarSindicatos">
                    <v-combobox
                    name="sindicatos"
                    label="Ativar no Portal e Sindicatos:"
                    v-model="dataInputs.sindicatos.selected"
                    item-text="name"
                    item-value="id"
                    :items="dataInputs.sindicatos.items"
                    :auto-select-first="true"
                    multiple
                    outlined
                    dense
                    :clearable="true"
                    ></v-combobox>
                </div>
            </div>

            <!-- Bancos -->
            <div class="row">
                <div class="col-12">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-box-files" :class="borderFields.bancos">
                                <v-combobox
                                    name="bancos"
                                    v-model="dataInputs.bancos.selected"
                                    :items="dataInputs.bancos.items"
                                    item-text="name"
                                    prepend-inner-icon="account_balance"
                                    label="Banco"
                                    placeholder="Selecione um banco"
                                    multiple
                                    outlined
                                    :clearable="true"
                                ></v-combobox>
                            </div>
                        </div>
                    </div>
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
                                            :clearable="true"
                                        ></v-text-field>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Imagem Destaque -->
                    <div class="row">
                        <div class="col-12">
                            
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-6 col-box-files" :class="borderFields.imagemDestaque">
                                        <label>Imagem Destaque</label>
                                        <div class="box-files">
                                            <template v-if="fileImagemIsEdit != ''">
                                                <div class="box-image">
                                                    <img :src="fileImagemIsEdit" class="img-fluid" alt="">
                                                    <p><v-btn depressed small color="error" @click="fileImagemIsEdit = ''">Excluir</v-btn></p>
                                                </div>
                                            </template>
                                            <template v-else>
                                                <v-file-input
                                                    name="imagemDestaque"
                                                    v-model="filesImagemDestaque"
                                                    label="Imagem Destaque:"
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
                                    <div class="col-6" :class="borderFields.creditoImagemDestaque">
                                        <div class="credito-da-imagem"></div>
                                        <v-text-field
                                            v-model="dataInputs.creditoImagemDestaque"
                                            name="creditoImagemDestaque"
                                            label="Crédito da Imagem:"
                                            placeholder="Crédito da Imagem"
                                            dense="dense"
                                            maxlength="240"
                                            counter="240"
                                            outlined
                                            :clearable="true"
                                        ></v-text-field>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Mp3 Podcast -->
                    <div class="row">
                        <div class="col-12">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-box-files" :class="borderFields.filePodcast">
                                        <label>Mp3 Podcast</label>
                                        <div class="box-files">

                                            <template v-if="filePodcastIsEdit != ''">
                                                <div class="box-image">
                                                    <audio controls>
                                                        <source :src="filePodcastIsEdit" type="audio/mpeg">
                                                        Seu navegador de internet não suporta o elemento do tipo audio.
                                                    </audio>
                                                    <p><v-btn depressed small color="error" @click="filePodcastIsEdit = ''">Excluir</v-btn></p>
                                                </div>
                                            </template>
                                            <template v-else>
                                                <v-file-input
                                                    name="filePodcast"
                                                    label="Mp3 Podcast:"
                                                    placeholder="Procurar Audio"
                                                    prepend-icon=""
                                                    prepend-inner-icon="mic_none"
                                                    v-model="filesPodcast"
                                                    dense="dense"
                                                    color="primary"
                                                    counter
                                                    accept="audio/mpeg"
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

                    <!-- Vídeo Youtube -->
                    <div class="row">
                        <div class="col-12">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-box-files" :class="borderFields.videoYoutube">
                                        <label>Vídeo Youtube</label>
                                        <div class="box-files">
                                            <v-text-field
                                                v-model="dataInputs.youtube"
                                                name="videoYoutube"
                                                label="Código do Vídeo:"
                                                dense="dense"
                                                prepend-inner-icon="videocam"
                                                maxlength="240"
                                                counter="240"
                                                outlined
                                                :clearable="true"
                                            ></v-text-field>
                                            <div class="youtube-exmaple-code">
                                                https://www.youtube.com/embed/<span>zpORURyy-n8?rel=0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </v-card-text>
            </v-card>


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
                        :clearable="true"
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
                        :clearable="true"
                    ></v-text-field>
                </div>
            </div>

            <!-- Título da Notícia -->
            <div class="row inputs-finais-to-all-types">
                <div class="col-12" :class="borderFields.tituloDaNoticia">
                    <v-textarea
                    v-model="dataInputs.tituloDaNoticia"
                    name="tituloDaNoticia"
                    label="Título da Notícia:"
                    dense="dense"
                    height="90"
                    maxlength="240"
                    counter="240"
                    outlined
                    :clearable="true"
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
                    :clearable="true"
                    ></v-textarea>
                </div>
            </div>

            <input type="hidden" id="texto" name="texto" v-model="dataInputs.texto" />

            <!-- Texto (ckeditor) -->
            <div class="row">
                <div class="col-12">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-box-files" :class="borderFields.texto">
                                <label>Texto</label>
                                <div id="ckeditor" class="box-files ckeditor">
                                    <!-- <ckeditor v-model="dataInputs.texto"></ckeditor> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jornalista Responsável -->
            <div class="row inputs-finais-to-all-types">
                <div class="col-12" :class="borderFields.jornalistaResponsavel">
                    <v-text-field
                        v-model="dataInputs.jornalistaResponsavel"
                        name="jornalistaResponsavel"
                        label="Jornalista Responsável:"
                        dense="dense"
                        maxlength="240"
                        counter="240"
                        outlined
                        :clearable="true"
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
import btnIconText from "../../components/btn_icon-text/BtnIconText.vue"
import moment from 'moment';

export default {
    components: { btnIconText },
    props: [
        'csrf',
        'formAction',
        'noticiaEdition',
        'banks',
        'syndicates',
        'textInput',
        'registeredSyndicates',
        'registeredBanks'
    ],
    data() {
        return {
            /**
             * Campos Hiden
             */
            idNoticia: '',
            valueBtnSubmit: 'Cadastrar',

            // variavel necessária para o component de mensagens de erro
            errorsShow: {
                show: false,
                title: 'Não foi possivel realizar o cadastro!',
                errors: []
            },

            isEdit: false,
          
            borderFields: {},
            btnTipoNoticiaSelecionado: '',
            switch1: false,
           

            // Switch Ativar Notícia
            ativarNoticia: false,

            dataInputs: {
                creditoBannerDestaque: '',
                creditoImagemDestaque: '',
                youtube: '',
                cartola: '',
                tags: '',
                tituloDaNoticia: '',
                linhaDeApoio: '',
                texto: '',
                jornalistaResponsavel: '',
                bancos: {
                    selected: [],
                    items: []
                },
                sindicatos: {
                    selected: [],
                    items: []
                }
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

            // Botões de seleção do tipo de notícias
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
                    selected: false
                },
                btnIconTextImagem: {
                    type: 'noticia-imagem',
                    text: 'Notícia Com Imagem',
                    icon: '/_adm/assets/SVGs/noticia-imagem.svg',
                    selected: false
                },
                btnIconTextPodcast: {
                    type: 'noticia-podcast',
                    text: 'Notícia Com Podcast',
                    icon: '/_adm/assets/SVGs/noticia-podcast.svg',
                    selected: false
                },
                btnIconTextTexto: {
                    type: 'noticia-simples',
                    text: 'Notícia Simples',
                    icon: '/_adm/assets/SVGs/noticia-texto.svg',
                    selected: false
                }
            },

            // Controle dos files
            filesBannerDestaque: null,
            fileBannerIsEdit: '',
            filesImagemDestaque: null,
            fileImagemIsEdit: '',
            filesPodcast: null,
            filePodcastIsEdit: '',
        }
    },
    computed: {
        idsSindicatos()
        {
            let arrayIdsSindicatos = [];
            this.dataInputs.sindicatos.selected.forEach(function(item, index){
                arrayIdsSindicatos.push(item.id);
            });
            
            return arrayIdsSindicatos;
        },
        idsBancos()
        {
            let arrayIdsBancos = [];
            this.dataInputs.bancos.selected.forEach(function(item, index){
                arrayIdsBancos.push(item.id);
            });
            
            return arrayIdsBancos;
        }
    },
    methods: {
        updateCkeditorViaJquery: function(text)
        {
            console.log('Funcionou', text);
        },

        shadowEfectBorderReset: function()
        {
            this.borderFields = {
                dataDaInclusao: '',
                dataLimiteNoDestaque: '',
                horaLimiteNoDestaque: '',
                ativarNoticia: '',
                ativarSindicatos: '',
                bancos: '',
                bannerDestaque: '',
                creditoBannerDestaque: '',
                imagemDestaque: '',
                creditoImagemDestaque: '',
                filePodcast: '',
                videoYoutube: '',
                cartola: '',
                tags: '',
                tituloDaNoticia: '',
                linhaDeApoio: '',
                texto: '',
                jornalistaResponsave: ''
            }
        },

        clickBtnNoticias: function(btnIcon)
        {
            // select btn clicked and deselect before checked btn
            for ( let key in this.paramsBtnIcons ) {
                this.paramsBtnIcons[key].selected = false;
            }
            
            this.paramsBtnIcons[btnIcon].selected = true;
            this.btnTipoNoticiaSelecionado = this.paramsBtnIcons[btnIcon].type;
        },

        checkForm: function (e)
        {
            this.dataInputs.texto = textoCkeditor.getData();
            this.errorsShow.errors = [];

            switch (this.btnTipoNoticiaSelecionado)
            {
                case 'noticia-destaque':
                    // Opcionais
                    if ( ! _.isEmpty(this.filesPodcast) )
                    {
                        if ( ! _.isEmpty(this.filesPodcast) ) {
                            if ( this.filesPodcast[0].size >= 20000000 ) {
                                this.errorsShow.errors.push({title: 'Mp3 Podcast', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 20mb) '});
                            }
                        }
                    }

                    // Validações especificas
                    if ( _.isEmpty(this.dateTimeInputs.dates.limiteNoDestaque.date) )
                        this.errorsShow.errors.push({title: 'Limite No Destaque', description: 'obrigatório'});
                    if ( _.isEmpty(this.dateTimeInputs.times.limiteDestaque.time) )
                        this.errorsShow.errors.push({title: 'Limite Hora', description: 'obrigatório'});

                    if ( _.isEmpty(this.filesBannerDestaque) && this.fileBannerIsEdit == '' )
                        this.errorsShow.errors.push({title: 'Banner Destaque', description: 'obrigatório'});
                    if ( ! _.isEmpty(this.filesBannerDestaque) && this.fileBannerIsEdit == '' ) {
                        if ( this.filesBannerDestaque[0].size >= 1000000) {
                            this.errorsShow.errors.push({title: 'Banner Destaque', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                        }
                    }
                    if ( _.isEmpty(this.dataInputs.creditoBannerDestaque) )
                        this.errorsShow.errors.push({title: 'Crédito da Imagem (Banner Destaque)', description: 'obrigatório'});

                    if ( _.isEmpty(this.filesImagemDestaque) && this.fileImagemIsEdit == '' )
                        this.errorsShow.errors.push({title: 'Imagem Destaque', description: 'obrigatório'});
                    if ( ! _.isEmpty(this.filesImagemDestaque) && this.fileImagemIsEdit == '' ) {
                        if ( this.filesImagemDestaque[0].size >= 1000000) {
                            this.errorsShow.errors.push({title: 'Imagem Destaque', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                        }
                    }
                    if ( _.isEmpty(this.dataInputs.creditoImagemDestaque) )
                        this.errorsShow.errors.push({title: 'Crédito da Imagem (Imagem Destaque)', description: 'obrigatório'});
                break;

                case 'noticia-video':
                    // Opcionais
                    if ( ! _.isEmpty(this.filesBannerDestaque) )
                    {
                        if ( this.filesBannerDestaque[0].size >= 1000000 ) {
                            this.errorsShow.errors.push({title: 'Banner Destaque', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                        }
                    }
                    if ( ! _.isEmpty(this.filesImagemDestaque) ) {
                        if ( this.filesImagemDestaque[0].size >= 1000000) {
                            this.errorsShow.errors.push({title: 'Imagem Destaque', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                        }
                    }
                    if ( ! _.isEmpty(this.filesPodcast) ) {
                        if ( this.filesPodcast[0].size >= 20000000) {
                            this.errorsShow.errors.push({title: 'Mp3 Podcast', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 20mb) '});
                        }
                    }
                    

                    // Validações especificas
                    if ( _.isEmpty(this.dataInputs.youtube) )
                        this.errorsShow.errors.push({title: 'Vídeo Youtube', description: 'obrigatório'});
                break;

                case 'noticia-imagem':
                    // Opcionais
                    if ( ! _.isEmpty(this.filesBannerDestaque) )
                    {
                        if ( this.filesBannerDestaque[0].size >= 1000000 ) {
                            this.errorsShow.errors.push({title: 'Banner Destaque', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                        }
                    }
                    if ( ! _.isEmpty(this.filesPodcast) ) {
                        if ( this.filesPodcast[0].size >= 20000000) {
                            this.errorsShow.errors.push({title: 'Mp3 Podcast', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 20mb) '});
                        }
                    }
                    

                    // Validações especificas
                    if ( _.isEmpty(this.filesImagemDestaque) && this.fileImagemIsEdit == '' )
                        this.errorsShow.errors.push({title: 'Imagem Destaque', description: 'obrigatório'});
                    if ( ! _.isEmpty(this.filesImagemDestaque && this.fileImagemIsEdit == '') ) {
                        if ( this.filesImagemDestaque[0].size >= 1000000) {
                            this.errorsShow.errors.push({title: 'Imagem Destaque', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                        }
                    }
                    if ( _.isEmpty(this.dataInputs.creditoImagemDestaque) )
                        this.errorsShow.errors.push({title: 'Crédito da Imagem (Imagem Destaque)', description: 'obrigatório'});
                break;

                case 'noticia-podcast':
                    // Opcionais
                    if ( ! _.isEmpty(this.filesBannerDestaque) )
                    {
                        if ( this.filesBannerDestaque[0].size >= 1000000 ) {
                            this.errorsShow.errors.push({title: 'Banner Destaque', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                        }
                    }
                    if ( ! _.isEmpty(this.filesImagemDestaque) ) {
                        if ( this.filesImagemDestaque[0].size >= 1000000 ) {
                            this.errorsShow.errors.push({title: 'Imagem Destaque', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                        }
                    }

                    // Validações especificas
                    if ( _.isEmpty(this.filesPodcast) && this.filePodcastIsEdit == '' )
                        this.errorsShow.errors.push({title: 'Mp3 Podcast', description: 'obrigatório'});
                    if ( ! _.isEmpty(this.filesPodcast) && this.filePodcastIsEdit == '' ) {
                        if ( this.filesPodcast[0].size >= 20000000 ) {
                            this.errorsShow.errors.push({title: 'Mp3 Podcast', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 20mb) '});
                        }
                    }
                break;
                case 'noticia-simples':
                    // Opcionais
                    if ( ! _.isEmpty(this.filesBannerDestaque) )
                    {
                        if ( this.filesBannerDestaque[0].size >= 1000000) {
                            this.errorsShow.errors.push({title: 'Banner Destaque', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                        }
                    }
                    if ( ! _.isEmpty(this.filesImagemDestaque) ) {
                        if ( this.filesImagemDestaque[0].size >= 1000000) {
                            this.errorsShow.errors.push({title: 'Imagem Destaque', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                        }
                    }
                    if ( ! _.isEmpty(this.filesPodcast) ) {
                        if ( this.filesPodcast[0].size >= 20000000 ) {
                            this.errorsShow.errors.push({title: 'Mp3 Podcast', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 20mb) '});
                        }
                    }
                break;
            }

            // Validações comuns a todos
            if ( _.isEmpty(this.dateTimeInputs.dates.dataDaInclusao.date) )
                this.errorsShow.errors.push({title: 'Data Inclusão', description: 'obrigatório'});
            if ( this.dataInputs.sindicatos.selected.length == 0 )
                this.errorsShow.errors.push({title: 'Ativar no Portal e Sindicatos', description: 'obrigatório'});

            if ( _.isEmpty(this.dataInputs.cartola) )
                this.errorsShow.errors.push({title: 'Cartola', description: 'obrigatório'});
            if ( _.isEmpty(this.dataInputs.tags) )
                this.errorsShow.errors.push({title: 'Tag\'s', description: 'obrigatório'});
            if ( _.isEmpty(this.dataInputs.tituloDaNoticia) )
                this.errorsShow.errors.push({title: 'Título da Notícia', description: 'obrigatório'});
            if ( _.isEmpty(this.dataInputs.linhaDeApoio) )
                this.errorsShow.errors.push({title: 'Linha de Apoio', description: 'obrigatório'});
            if ( _.isEmpty(this.dataInputs.texto) )
                this.errorsShow.errors.push({title: 'Texto', description: 'obrigatório'});
            if ( _.isEmpty(this.dataInputs.jornalistaResponsavel) )
                this.errorsShow.errors.push({title: 'Jornalista Responsável', description: 'obrigatório'});


            if ( this.errorsShow.errors.length > 0 )
            {
                this.errorsShow.show = true;
                e.preventDefault();
            }
        },

        editStartCompleteFilds( noticia )
        {
            this.idNoticia = noticia.id;
            this.valueBtnSubmit = 'Editar';

            // Started combobox banco
            if ( ! _.isEmpty(this.registeredBanks) )
            {
                let registeredBanks = JSON.parse(this.registeredBanks);
                let bank = [];
                for ( let item in registeredBanks )
                {
                    let contructBank = {
                        name: registeredBanks[item].name,
                        id: registeredBanks[item].banco,
                    }

                    bank.push(contructBank);
                }

                this.dataInputs.bancos.selected = bank;
            }

            // Started combobox syndicates
            if ( ! _.isEmpty(this.registeredSyndicates) )
            {
                let registeredSyndicates = JSON.parse(this.registeredSyndicates);
                let syndicate = [];
                for ( let item in registeredSyndicates )
                {
                    let contructSyndicate = {
                        name: registeredSyndicates[item].name,
                        id: registeredSyndicates[item].sindicato,
                    }

                    syndicate.push(contructSyndicate);
                }

                this.dataInputs.sindicatos.selected = syndicate;
            }

            // Seleciona o tipo de noticia
            switch ( noticia.tipoDaNoticia )
            {
                case 'noticia-destaque':
                    this.clickBtnNoticias('btnIconTextDestaque');
                break;
                case 'noticia-video':
                    this.clickBtnNoticias('btnIconTextVideo');
                break;
                case 'noticia-imagem':
                    this.clickBtnNoticias('btnIconTextImagem');
                break;
                case 'noticia-podcast':
                    this.clickBtnNoticias('btnIconTextPodcast');
                break;
                case 'noticia-simples':
                    this.clickBtnNoticias('btnIconTextTexto');
                break;
            }

            // Setando campos com os valores já cadastrados
            this.dateTimeInputs.dates.dataDaInclusao.date   = moment(String(noticia.dataInclusao)).format('YYYY-MM-DD');
            this.dateTimeInputs.dates.limiteNoDestaque.date = _.isEmpty(noticia.dataLimiteNoDestaque) ? '' : moment(String(noticia.dataLimiteNoDestaque)).format('YYYY-MM-DD');
            this.dateTimeInputs.times.limiteDestaque.time   = _.isEmpty(noticia.horaLimiteNoDestaque) ? '' : moment(String('2020-01-01 '+noticia.horaLimiteNoDestaque)).format('H:mm');

            this.ativarNoticia = noticia.ativo == 'S' ? true: false;

            // Controle para mostrar os files ignorando a regra atual de validação (CONTEM VALOR DO TIPO STRING)
            // Ou manter a mesma logica que é quando o formulário está realizando cadastro (VAZIO DO TIPO STRING) 
            this.fileBannerIsEdit  = noticia.fileBannerDestaque_id > 0 ? `/${noticia.fileBannerDestaque_pathfile}/${noticia.fileBannerDestaque_namefile}` : '';
            this.fileImagemIsEdit  = noticia.fileImagemDestaque_id > 0 ? `/${noticia.fileImagemDestaque_pathfile}/${noticia.fileImagemDestaque_namefile}` : '';
            this.filePodcastIsEdit = noticia.filePodcast_id > 0        ? `/${noticia.filePodcast_pathfile}/${noticia.filePodcast_namefile}` : '';
            
            this.dataInputs.creditoBannerDestaque = noticia.fileBannerDestaque_creditfile;
            this.dataInputs.creditoImagemDestaque = noticia.fileImagemDestaque_creditfile;
            this.dataInputs.youtube = noticia.videoYoutube;
            this.dataInputs.cartola = noticia.cartola;
            this.dataInputs.tags = noticia.tags;
            this.dataInputs.tituloDaNoticia = noticia.titulo;
            this.dataInputs.linhaDeApoio = noticia.linhaDeApoio;
            this.dataInputs.texto = noticia.texto;
            this.dataInputs.jornalistaResponsavel = noticia.jornalistaResponsavel;

            // Seta a gambiarra do ckeditor
            // Para funcionar precisa atualizar o conteúdo após 1seg.
            // Caso contrário o vue não reconhece a variavel criada no JS
            setTimeout(function(){
                textoCkeditor.setData(noticia.texto);
            }, 1500);
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
                    title: 'Notícias',
                    link: '/adm/noticias',
                    icon: '/_adm/assets/SVGs/icon-noticias.svg'
                }
            }

            return btnsBarTop;
        }
    },
    watch: {
        btnTipoNoticiaSelecionado(newValue, oldValue)
        {
            this.shadowEfectBorderReset();

              setTimeout(()=> {
                  switch (newValue)
                  {
                      case 'noticia-destaque':
                        this.borderFields = {
                            dataDaInclusao: 'required',
                            dataLimiteNoDestaque: 'required',
                            horaLimiteNoDestaque: 'required',
                            ativarSindicatos: 'required',
                            bannerDestaque: 'required',
                            creditoBannerDestaque: 'required',
                            imagemDestaque: 'required',
                            creditoImagemDestaque: 'required',
                            cartola: 'required',
                            tags: 'required',
                            tituloDaNoticia: 'required',
                            linhaDeApoio: 'required',
                            texto: 'required',
                            jornalistaResponsavel: 'required'
                        }
                        break;
                      case 'noticia-video':
                        this.borderFields = {
                            dataDaInclusao: 'required',
                            ativarSindicatos: 'required',
                            videoYoutube: 'required',
                            cartola: 'required',
                            tags: 'required',
                            tituloDaNoticia: 'required',
                            linhaDeApoio: 'required',
                            texto: 'required',
                            jornalistaResponsavel: 'required'
                        }
                        break;
                      case 'noticia-imagem':
                        this.borderFields = {
                            dataDaInclusao: 'required',
                            ativarSindicatos: 'required',
                            imagemDestaque: 'required',
                            creditoImagemDestaque: 'required',
                            cartola: 'required',
                            tags: 'required',
                            tituloDaNoticia: 'required',
                            linhaDeApoio: 'required',
                            texto: 'required',
                            jornalistaResponsavel: 'required'
                        }
                        break;
                      case 'noticia-podcast':
                        this.borderFields = {
                            dataDaInclusao: 'required',
                            ativarSindicatos: 'required',
                            filePodcast: 'required',
                            cartola: 'required',
                            tags: 'required',
                            tituloDaNoticia: 'required',
                            linhaDeApoio: 'required',
                            texto: 'required',
                            jornalistaResponsavel: 'required'
                        }
                        break;
                      case 'noticia-simples':
                        this.borderFields = {
                            dataDaInclusao: 'required',
                            ativarSindicatos: 'required',
                            cartola: 'required',
                            tags: 'required',
                            tituloDaNoticia: 'required',
                            linhaDeApoio: 'required',
                            texto: 'required',
                            jornalistaResponsavel: 'required'
                        }
                        break;
                  }
              }, 500);
        },
    },
    created()
    {
        for ( let key in this.paramsBtnIcons )
        {
            if ( this.paramsBtnIcons[key].selected == true ) {
                this.btnTipoNoticiaSelecionado = this.paramsBtnIcons[key].type;
            }
        }
        
        if ( ! _.isEmpty(this.banks) )
        {
            //bank
            this.bankItemsObject = JSON.parse(this.banks);
            for ( let item in this.bankItemsObject )
            {
                let bank = {
                    name: this.bankItemsObject[item].name,
                    id: this.bankItemsObject[item].id
                };

                this.dataInputs.bancos.items.push(bank);
            }
        }

        if ( ! _.isEmpty(this.syndicates) )
        {
            //syndicate
            this.syndicateItemsObject = JSON.parse(this.syndicates);
            for ( let item in this.syndicateItemsObject )
            {
                let syndicate = {
                    name: this.syndicateItemsObject[item].name,
                    id: this.syndicateItemsObject[item].id
                };

                this.dataInputs.sindicatos.items.push(syndicate);
            }
        }
    },
    mounted()
    {
        if ( ! _.isEmpty(this.noticiaEdition) ) {
            this.isEdit = true;
            this.editStartCompleteFilds(JSON.parse(this.noticiaEdition));
        } else {
            let syndicates = JSON.parse(this.syndicates);
            let syndicate = {
                name: syndicates[0].name,
                id: syndicates[0].id
            };

            this.dataInputs.sindicatos.selected.push(syndicate);
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
