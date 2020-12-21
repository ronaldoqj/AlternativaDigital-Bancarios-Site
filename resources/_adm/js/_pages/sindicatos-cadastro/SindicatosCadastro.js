import moment from 'moment';

export default {
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
            sindicato: 'required',
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
    components: {  },
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


            console.log('teste', item.dataInclusao);

            if (item.dataInclusao)
            this.dateTimeInputs.dates.dataInclusao.date = moment(String(item.dataInclusao)).format('YYYY-MM-DD');
            if (item.dataLimite)
            this.dateTimeInputs.dates.limite.date = _.isEmpty(item.dataLimite) ? '' : moment(String(item.dataLimite)).format('YYYY-MM-DD');
            if (item.horaLimite)
            this.dateTimeInputs.times.limiteDestaque.time   = _.isEmpty(item.horaLimite) ? '' : moment(String('2020-01-01 '+item.horaLimite)).format('H:mm');
        },

    },
    created()
    {
        if (!_.isEmpty(this.formEdition)) {
            this.isEdit = true;
            this.editStartCompleteFilds(JSON.parse(this.formEdition));
        }
    },
    props: ['csrf', 'formAction', 'formEdition'],
}
