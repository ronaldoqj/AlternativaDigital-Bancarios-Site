import btnIconText from "../../components/btn_icon-text/BtnIconText.vue"
export default {
    data () {

      // Variavel do combobox
      const defaultForm = Object.freeze({
        selectSindicato: '',
      })

      return {
          // Combobox Sindicatos
          form: Object.assign({}, defaultForm),
          sindicatos: ['Sindicato1', 'Sindicato2', 'Sindicato3', 'Sindicato4', 'Sindicato5'],

          // Switch Ativar Notícia
          ativarNoticia: false,


          // DateTimes
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
                text: 'Notícia Destaque',
                icon: '_adm/assets/SVGs/noticia-imagem.svg',
                selected: true
              },
              btnIconTextVideo: {
                text: 'Notícia Com Video',
                icon: '_adm/assets/SVGs/noticia-video.svg',
                selected: false
              },
              btnIconTextImagem: {
                text: 'Notícia Com Imagem',
                icon: '_adm/assets/SVGs/noticia-imagem.svg',
                selected: false
              },
              btnIconTextPodcast: {
                text: 'Notícia Com Podcast',
                icon: '_adm/assets/SVGs/noticia-podcast.svg',
                selected: false
              },
              btnIconTextTexto: {
                text: 'Notícia Simples',
                icon: '_adm/assets/SVGs/noticia-texto.svg',
                selected: false
              }
          }
      }

    },
    components: { btnIconText },
    methods: {

        clickBtnNoticias: function (btnIcon)
        {
            // select btn clicked and deselect before checked btn
            for (var key in this.paramsBtnIcons) {
                this.paramsBtnIcons[key].selected = false;
            }
            
            this.paramsBtnIcons[btnIcon].selected = true;
        }
    }

    
}
