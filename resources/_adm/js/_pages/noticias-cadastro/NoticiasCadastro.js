import btnIconText from "../../components/btn_icon-text/BtnIconText.vue"
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
                            ativarNoticia: '',
                            ativarNosSindicatos: '',
                            bannerDestaque: 'requided',
                            creditoBannerDestaque: 'requided',
                            imagemDestaque: 'requided',
                            creditoImagemDestaque: 'requided',
                            filePodcast: '',
                            videoYoutube: '',
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
                            dataLimiteNoDestaque: '',
                            horaLimiteNoDestaque: '',
                            ativarNoticia: '',
                            ativarNosSindicatos: '',
                            bannerDestaque: '',
                            creditoBannerDestaque: '',
                            imagemDestaque: '',
                            creditoImagemDestaque: '',
                            filePodcast: '',
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
                            dataLimiteNoDestaque: '',
                            horaLimiteNoDestaque: '',
                            ativarNoticia: '',
                            ativarNosSindicatos: '',
                            bannerDestaque: '',
                            creditoBannerDestaque: '',
                            imagemDestaque: 'requided',
                            creditoImagemDestaque: 'requided',
                            filePodcast: '',
                            videoYoutube: '',
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
                            dataLimiteNoDestaque: '',
                            horaLimiteNoDestaque: '',
                            ativarNoticia: '',
                            ativarNosSindicatos: '',
                            bannerDestaque: '',
                            creditoBannerDestaque: '',
                            imagemDestaque: '',
                            creditoImagemDestaque: '',
                            filePodcast: 'requided',
                            videoYoutube: '',
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

          // variavel necessária para o component de mensagens de erro
          errorsShow: {
            show: false,
            title: 'Não foi possivel realizar o cadastro!',
            errors: []
          },
          
          borderFields: {},
          btnTipoNoticiaSelecionado: '',
          switch1: false,

          // Combobox Sindicatos
          form: Object.assign({}, defaultForm),
          sindicatos: [],//['Sindicato1', 'Sindicato2', 'Sindicato3', 'Sindicato4', 'Sindicato5'],

          // Switch Ativar Notícia
          ativarNoticia: false,


          // DateTimes
          dateInputs: {
              creditoBannerDestaque: '',
              creditoImagemDestaque: '',
              youtube: '',
              cartola: '',
              tags: '',
              tituloDaNoticia: '',
              linhaDeApoio: '',
              texto: '',
              jornalistaResponsave: ''
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

          filesBannerDestaque: null,
          filesImagemDestaque: null,
          filesPodcast: null
      }

    },
    components: { btnIconText },
    methods: {

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
                    if ( _.isEmpty(this.dateTimeInputs.dates.limiteNoDestaque.date) )
                        this.errorsShow.errors.push({title: 'Limite No Destaque', description: 'obrigatório'});
                    if ( _.isEmpty(this.dateTimeInputs.times.limiteDestaque.time) )
                        this.errorsShow.errors.push({title: 'Limite Hora', description: 'obrigatório'});

                    if ( _.isEmpty(this.filesBannerDestaque) )
                        this.errorsShow.errors.push({title: 'Banner Destaque', description: 'obrigatório'});
                    if (! _.isEmpty(this.filesBannerDestaque)  ) {
                        if ( this.filesBannerDestaque[0].size >= 1000000) {
                            this.errorsShow.errors.push({title: 'Banner Destaque', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                        }
                    }
                    if ( _.isEmpty(this.dateInputs.creditoBannerDestaque) )
                        this.errorsShow.errors.push({title: 'Crédito da Imagem (Banner Destaque)', description: 'obrigatório'});

                    if ( _.isEmpty(this.filesImagemDestaque) )
                        this.errorsShow.errors.push({title: 'Imagem Destaque', description: 'obrigatório'});
                    if (! _.isEmpty(this.filesImagemDestaque)  ) {
                        if ( this.filesImagemDestaque[0].size >= 1000000) {
                            this.errorsShow.errors.push({title: 'Imagem Destaque', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                        }
                    }
                    if ( _.isEmpty(this.dateInputs.creditoImagemDestaque) )
                        this.errorsShow.errors.push({title: 'Crédito da Imagem (Imagem Destaque)', description: 'obrigatório'});
                break;

                case 'noticia-video':
                    if ( _.isEmpty(this.dateInputs.youtube) )
                        this.errorsShow.errors.push({title: 'Vídeo Youtube', description: 'obrigatório'});
                break;

                case 'noticia-imagem':
                    if ( _.isEmpty(this.filesImagemDestaque) )
                        this.errorsShow.errors.push({title: 'Imagem Destaque', description: 'obrigatório'});
                    if (! _.isEmpty(this.filesImagemDestaque)  ) {
                        if ( this.filesImagemDestaque[0].size >= 1000000) {
                            this.errorsShow.errors.push({title: 'Imagem Destaque', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 1mb) '});
                        }
                    }
                    if ( _.isEmpty(this.dateInputs.creditoImagemDestaque) )
                        this.errorsShow.errors.push({title: 'Crédito da Imagem (Imagem Destaque)', description: 'obrigatório'});
                break;

                case 'noticia-podcast':
                    if ( _.isEmpty(this.filesPodcast) )
                        this.errorsShow.errors.push({title: 'Mp3 Podcast', description: 'obrigatório'});
                    if (! _.isEmpty(this.filesPodcast)  ) {
                        if ( this.filesPodcast[0].size >= 20000000) {
                            this.errorsShow.errors.push({title: 'Mp3 Podcast', description: 'Tamanho do arquivo excedido! (tamanho máximo permitido é de 20mb) '});
                        }
                    }
                break;
                case 'noticia-simples':
                    //code
                break;
            }

            // Validações comuns a todos
            if ( _.isEmpty(this.dateTimeInputs.dates.dataDaInclusao.date) )
                this.errorsShow.errors.push({title: 'Data Inclusão', description: 'obrigatório'});

            if ( _.isEmpty(this.dateInputs.cartola) )
                this.errorsShow.errors.push({title: 'Cartola', description: 'obrigatório'});
            if ( _.isEmpty(this.dateInputs.tags) )
                this.errorsShow.errors.push({title: 'Tag\'s', description: 'obrigatório'});
            if ( _.isEmpty(this.dateInputs.tituloDaNoticia) )
                this.errorsShow.errors.push({title: 'Título da Notícia', description: 'obrigatório'});
            if ( _.isEmpty(this.dateInputs.linhaDeApoio) )
                this.errorsShow.errors.push({title: 'Linha de Apoio', description: 'obrigatório'});
            if ( _.isEmpty(this.dateInputs.texto) )
                this.errorsShow.errors.push({title: 'Texto', description: 'obrigatório'});
            if ( _.isEmpty(this.dateInputs.jornalistaResponsavel) )
                this.errorsShow.errors.push({title: 'Jornalista Responsável', description: 'obrigatório'});


            if (this.errorsShow.errors.length > 0)
            {
                this.errorsShow.show = true;
                e.preventDefault();
            }
            
        },

    },
    created()
    {

      for (var key in this.paramsBtnIcons) {
          if (this.paramsBtnIcons[key].selected == true) {
              this.btnTipoNoticiaSelecionado = this.paramsBtnIcons[key].type;
          }
      }

    },
    props: ['csrf', 'formAction'],
    

    
}
