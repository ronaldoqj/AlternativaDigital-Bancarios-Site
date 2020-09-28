import moment from 'moment';

export default {
    watch: {
        
    },
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
    components: {  },
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
