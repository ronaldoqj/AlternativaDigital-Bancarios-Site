import btnIconText from "../../components/btn_icon-text/BtnIconText.vue"
import moment from 'moment';

export default {
    watch: {
        btnTipoNoticiaSelecionado(newValue, oldValue)
        {
            this.shadowEfectBorderReset();

              setTimeout(()=> {

                  switch (newValue)
                  {
                      case 'noticia-destaque':
                        this.borderFields = {
                            dataDaInclusao: 'requided',
                            dataLimiteNoDestaque: 'requided',
                            horaLimiteNoDestaque: 'requided',
                            bannerDestaque: 'requided',
                            creditoBannerDestaque: 'requided',
                            imagemDestaque: 'requided',
                            creditoImagemDestaque: 'requided',
                            cartola: 'requided',
                            tags: 'requided',
                            tituloDaNoticia: 'requided',
                            linhaDeApoio: 'requided',
                            texto: 'requided',
                            jornalistaResponsavel: 'requided'
                        }
                        break;
                      case 'noticia-video':
                        this.borderFields = {
                            dataDaInclusao: 'requided',
                            videoYoutube: 'requided',
                            cartola: 'requided',
                            tags: 'requided',
                            tituloDaNoticia: 'requided',
                            linhaDeApoio: 'requided',
                            texto: 'requided',
                            jornalistaResponsavel: 'requided'
                        }
                        break;
                      case 'noticia-imagem':
                        this.borderFields = {
                            dataDaInclusao: 'requided',
                            imagemDestaque: 'requided',
                            creditoImagemDestaque: 'requided',
                            cartola: 'requided',
                            tags: 'requided',
                            tituloDaNoticia: 'requided',
                            linhaDeApoio: 'requided',
                            texto: 'requided',
                            jornalistaResponsavel: 'requided'
                        }
                        break;
                      case 'noticia-podcast':
                        this.borderFields = {
                            dataDaInclusao: 'requided',
                            filePodcast: 'requided',
                            cartola: 'requided',
                            tags: 'requided',
                            tituloDaNoticia: 'requided',
                            linhaDeApoio: 'requided',
                            texto: 'requided',
                            jornalistaResponsavel: 'requided'
                        }
                        break;
                      case 'noticia-simples':
                        this.borderFields = {
                            dataDaInclusao: 'requided',
                            cartola: 'requided',
                            tags: 'requided',
                            tituloDaNoticia: 'requided',
                            linhaDeApoio: 'requided',
                            texto: 'requided',
                            jornalistaResponsavel: 'requided'
                        }
                        break;
                  }
              }, 500);
        }
    },
    data () {

      // Variavel do combobox
      const defaultForm = Object.freeze({
        selectSindicato: '',
      })

      return {


            // CkEditor
           




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

          // Combobox Sindicatos
          form: Object.assign({}, defaultForm),
          sindicatos: [],//['Sindicato1', 'Sindicato2', 'Sindicato3', 'Sindicato4', 'Sindicato5'],

          // Switch Ativar Notícia
          ativarNoticia: false,

          // DateTimes
          dataInputs: {
              creditoBannerDestaque: '',
              creditoImagemDestaque: '',
              youtube: '',
              cartola: '',
              tags: '',
              tituloDaNoticia: '',
              linhaDeApoio: '',
              texto: '',
              jornalistaResponsavel: ''
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
    components: { btnIconText  },
    methods: {


        // CKeditor
        


        shadowEfectBorderReset: function()
        {
            this.borderFields = {
                dataDaInclusao: '',
                dataLimiteNoDestaque: '',
                horaLimiteNoDestaque: '',
                ativarNoticia: '',
                ativarNosSindicatos: '',
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
            for (var key in this.paramsBtnIcons) {
                this.paramsBtnIcons[key].selected = false;
            }
            
            this.paramsBtnIcons[btnIcon].selected = true;
            this.btnTipoNoticiaSelecionado = this.paramsBtnIcons[btnIcon].type;
        },

        checkForm: function (e)
        {
            this.errorsShow.errors = [];

            switch (this.btnTipoNoticiaSelecionado)
            {
                case 'noticia-destaque':
                    // Opcionais
                    if (! _.isEmpty(this.filesPodcast) )
                    {
                        if (! _.isEmpty(this.filesPodcast)  ) {
                            if ( this.filesPodcast[0].size >= 20000000) {
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
                    if (! _.isEmpty(this.filesBannerDestaque) && this.fileBannerIsEdit == ''  ) {
                        if ( this.filesBannerDestaque[0].size >= 1000000) {
                            this.errorsShow.errors.push({title: 'Banner Destaque', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                        }
                    }
                    if ( _.isEmpty(this.dataInputs.creditoBannerDestaque) )
                        this.errorsShow.errors.push({title: 'Crédito da Imagem (Banner Destaque)', description: 'obrigatório'});

                    if ( _.isEmpty(this.filesImagemDestaque) && this.fileImagemIsEdit == '' )
                        this.errorsShow.errors.push({title: 'Imagem Destaque', description: 'obrigatório'});
                    if (! _.isEmpty(this.filesImagemDestaque) && this.fileImagemIsEdit == ''  ) {
                        if ( this.filesImagemDestaque[0].size >= 1000000) {
                            this.errorsShow.errors.push({title: 'Imagem Destaque', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                        }
                    }
                    if ( _.isEmpty(this.dataInputs.creditoImagemDestaque) )
                        this.errorsShow.errors.push({title: 'Crédito da Imagem (Imagem Destaque)', description: 'obrigatório'});
                break;

                case 'noticia-video':
                    // Opcionais
                    if (! _.isEmpty(this.filesBannerDestaque) )
                    {
                        if ( this.filesBannerDestaque[0].size >= 1000000) {
                            this.errorsShow.errors.push({title: 'Banner Destaque', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                        }
                    }
                    if (! _.isEmpty(this.filesImagemDestaque)  ) {
                        if ( this.filesImagemDestaque[0].size >= 1000000) {
                            this.errorsShow.errors.push({title: 'Imagem Destaque', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                        }
                    }
                    if (! _.isEmpty(this.filesPodcast) )
                    {
                        if (! _.isEmpty(this.filesPodcast)  ) {
                            if ( this.filesPodcast[0].size >= 20000000) {
                                this.errorsShow.errors.push({title: 'Mp3 Podcast', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 20mb) '});
                            }
                        }
                    }

                    // Validações especificas
                    if ( _.isEmpty(this.dataInputs.youtube) )
                        this.errorsShow.errors.push({title: 'Vídeo Youtube', description: 'obrigatório'});
                break;

                case 'noticia-imagem':
                    // Opcionais
                    if (! _.isEmpty(this.filesBannerDestaque) )
                    {
                        if ( this.filesBannerDestaque[0].size >= 1000000) {
                            this.errorsShow.errors.push({title: 'Banner Destaque', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                        }
                    }
                    if (! _.isEmpty(this.filesPodcast) )
                    {
                        if (! _.isEmpty(this.filesPodcast)  ) {
                            if ( this.filesPodcast[0].size >= 20000000) {
                                this.errorsShow.errors.push({title: 'Mp3 Podcast', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 20mb) '});
                            }
                        }
                    }

                    // Validações especificas
                    if ( _.isEmpty(this.filesImagemDestaque) && this.fileImagemIsEdit == '' )
                        this.errorsShow.errors.push({title: 'Imagem Destaque', description: 'obrigatório'});
                    if (! _.isEmpty(this.filesImagemDestaque && this.fileImagemIsEdit == '')  ) {
                        if ( this.filesImagemDestaque[0].size >= 1000000) {
                            this.errorsShow.errors.push({title: 'Imagem Destaque', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                        }
                    }
                    if ( _.isEmpty(this.dataInputs.creditoImagemDestaque) )
                        this.errorsShow.errors.push({title: 'Crédito da Imagem (Imagem Destaque)', description: 'obrigatório'});
                break;

                case 'noticia-podcast':
                    // Opcionais
                    if (! _.isEmpty(this.filesBannerDestaque) )
                    {
                        if ( this.filesBannerDestaque[0].size >= 1000000) {
                            this.errorsShow.errors.push({title: 'Banner Destaque', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                        }
                    }
                    if (! _.isEmpty(this.filesImagemDestaque)  ) {
                        if ( this.filesImagemDestaque[0].size >= 1000000) {
                            this.errorsShow.errors.push({title: 'Imagem Destaque', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                        }
                    }

                    // Validações especificas
                    if ( _.isEmpty(this.filesPodcast) && this.filePodcastIsEdit == '' )
                        this.errorsShow.errors.push({title: 'Mp3 Podcast', description: 'obrigatório'});
                    if (! _.isEmpty(this.filesPodcast) && this.filePodcastIsEdit == '' ) {
                        if ( this.filesPodcast[0].size >= 20000000) {
                            this.errorsShow.errors.push({title: 'Mp3 Podcast', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 20mb) '});
                        }
                    }
                break;
                case 'noticia-simples':
                    // Opcionais
                    if (! _.isEmpty(this.filesBannerDestaque) )
                    {
                        if ( this.filesBannerDestaque[0].size >= 1000000) {
                            this.errorsShow.errors.push({title: 'Banner Destaque', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                        }
                    }
                    if (! _.isEmpty(this.filesImagemDestaque)  ) {
                        if ( this.filesImagemDestaque[0].size >= 1000000) {
                            this.errorsShow.errors.push({title: 'Imagem Destaque', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                        }
                    }
                    if (! _.isEmpty(this.filesPodcast) )
                    {
                        if (! _.isEmpty(this.filesPodcast)  ) {
                            if ( this.filesPodcast[0].size >= 20000000) {
                                this.errorsShow.errors.push({title: 'Mp3 Podcast', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 20mb) '});
                            }
                        }
                    }
                break;
            }

            // Validações comuns a todos
            if ( _.isEmpty(this.dateTimeInputs.dates.dataDaInclusao.date) )
                this.errorsShow.errors.push({title: 'Data Inclusão', description: 'obrigatório'});

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


            if (this.errorsShow.errors.length > 0)
            {
                this.errorsShow.show = true;
                e.preventDefault();
            }
            
        },

        editStartCompleteFilds (noticia)
        {
            console.log(noticia);


            this.idNoticia = noticia.id;
            this.valueBtnSubmit = 'Editar';

            // Seleciona o tipo de noticia
            switch (noticia.tipoDaNoticia)
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
            this.dateTimeInputs.dates.dataDaInclusao.date = moment(String(noticia.dataInclusao)).format('YYYY-MM-DD');
            this.dateTimeInputs.dates.limiteNoDestaque.date = _.isEmpty(noticia.dataLimiteNoDestaque) ? '' : moment(String(noticia.dataLimiteNoDestaque)).format('YYYY-MM-DD');
            this.dateTimeInputs.times.limiteDestaque.time = _.isEmpty(noticia.horaLimiteNoDestaque) ? '' : moment(String('2020-01-01 '+noticia.horaLimiteNoDestaque)).format('h:mm');

            this.ativarNoticia = noticia.ativo == 'S' ? true: false;

            // Controle para mostrar os files ignorando a regra atual de validação (CONTEM VALOR DO TIPO STRING)
            // Ou manter a mesma logica que é quando o formulário está realizando cadastro (VAZIO DO TIPO STRING) 
            this.fileBannerIsEdit = noticia.fileBannerDestaque_id > 0 ? `/${noticia.fileBannerDestaque_pathfile}/${noticia.fileBannerDestaque_namefile}` : '';
            this.fileImagemIsEdit = noticia.fileImagemDestaque_id > 0 ? `/${noticia.fileImagemDestaque_pathfile}/${noticia.fileImagemDestaque_namefile}` : '';
            this.filePodcastIsEdit = noticia.filePodcast_id > 0 ? `/${noticia.filePodcast_pathfile}/${noticia.filePodcast_namefile}` : '';

            this.dataInputs = {
                creditoBannerDestaque: noticia.fileBannerDestaque_creditfile,
                creditoImagemDestaque: noticia.fileImagemDestaque_creditfile,
                youtube: noticia.videoYoutube,
                cartola: noticia.cartola,
                tags: noticia.tags,
                tituloDaNoticia: noticia.titulo,
                linhaDeApoio: noticia.linhaDeApoio,
                texto: noticia.texto,
                jornalistaResponsavel: noticia.jornalistaResponsavel
            };
        }

    },
    created()
    {
        for (var key in this.paramsBtnIcons)
        {
            if (this.paramsBtnIcons[key].selected == true) {
                this.btnTipoNoticiaSelecionado = this.paramsBtnIcons[key].type;
            }
        }

        if (!_.isEmpty(this.noticiaEdition)) {
            this.isEdit = true;
            this.editStartCompleteFilds(JSON.parse(this.noticiaEdition));
        }
        
    },
    props: ['csrf', 'formAction', 'noticiaEdition'],
}
