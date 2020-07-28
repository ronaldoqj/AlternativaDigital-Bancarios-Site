import moment from 'moment';

export default {
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

            // CkEditor

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
                linhaDeApoio: 'required',
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
    components: {  },
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

        editStartCompleteFilds (item)
        {
            this.id = item.id;
            this.valueBtnSubmit = 'Editar';

            // Started combobox banco
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
            this.dateTimeInputs.times.limiteDestaque.time = _.isEmpty(item.horaLimiteNoDestaque) ? '' : moment(String('2020-01-01 '+item.horaLimiteNoDestaque)).format('h:mm');

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
    },
    props: ['csrf', 'formAction', 'formEdition', 'entidades'],
}
