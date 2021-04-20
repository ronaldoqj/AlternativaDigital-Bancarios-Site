
<template>
    
    <div id="usuario__cadastro" class="container-fluid mt-10">

    <errors-component :objErrorsShow="errorsShow" @showErrorsChange="errorsShow.show = $event"></errors-component>

    <pages-menu-bar :btns-top-bar="makeBtnsBarTop()"></pages-menu-bar>

    <form :action="formAction" method="post" @submit="checkForm" enctype="multipart/form-data">

        <input type="hidden" name="_token" :value="csrf">
        <input type="hidden" name="ativar" :value="ativar" />
        <input type="hidden" name="id" :value="id" />


        <v-row align="center">
            <v-col cols="12" sm="6" md="4" lg="3" align="center">
                <v-card class="container-image" max-width="300" max-height="300">
                    <v-responsive :aspect-ratio="4/4"  class="box-image" :style="{backgroundImage: 'url(/files/portal/background-topo-fetrafi-rs-20210418_222703-277073.jpg)'}">    
                    </v-responsive>

                    <v-btn
                    fab
                    color="#125488"
                    class="box__icon--file"
                    bottom
                    left
                    absolute
                    @click="dialog = !dialog"
                    >
                        <v-icon color="white">mdi-camera</v-icon>
                    </v-btn>

                    <v-dialog v-model="dialog" max-width="500px">
                        <v-card>
                            <v-card-title class="card__title">
                                Selecione um avatar de perfil
                            </v-card-title>
                            <v-card-text>
                                <v-file-input
                                    :rules="rules.userImg"
                                    accept="image/png, image/jpeg, image/bmp, image/svg+xml"
                                    placeholder="Selecione um avatar"
                                    prepend-icon="mdi-camera"
                                    dense
                                    outlined
                                    rounded
                                    label="Avatar"
                                ></v-file-input>
                            </v-card-text>
                            <v-card-actions>
                                <v-btn text color="gray" @click="dialog = false"> Cancelar </v-btn>
                                <v-spacer></v-spacer>
                                <v-btn text color="primary" @click="dialog = false"> OK </v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                </v-card>
            </v-col>
            <v-col cols="12" sm="6" md="8" lg="9">
                <v-text-field
                    v-model="dataInputs.nome"
                    name="nome"
                    label="nome:"
                    dense
                    maxlength="240"
                    counter="240"
                    outlined
                    rounded
                    clearable
                ></v-text-field>
                
                <v-text-field
                    v-model="dataInputs.email"
                    name="email"
                    label="Tag's:"
                    dense
                    maxlength="240"
                    counter="240"
                    outlined
                    rounded
                    clearable
                ></v-text-field>

                <v-text-field
                    v-model="dataInputs.fone"
                    name="fone"
                    label="Fone:"
                    dense
                    maxlength="240"
                    counter="240"
                    outlined
                    rounded
                    clearable
                ></v-text-field>

                <v-text-field
                    v-model="dataInputs.empresa"
                    name="empresa"
                    label="Empresa:"
                    dense
                    maxlength="240"
                    counter="240"
                    outlined
                    rounded
                    clearable
                ></v-text-field>

                <v-text-field
                    v-model="dataInputs.cargo"
                    name="cargo"
                    label="Cargo/Função:"
                    dense
                    maxlength="240"
                    counter="240"
                    outlined
                    rounded
                    clearable
                ></v-text-field>
            </v-col>
        
        </v-row>


        <v-expansion-panels v-model="panel" multiple flat>
            <v-expansion-panel>
                <v-expansion-panel-header>
                    <div class="header--panel">
                            <div>Teste header</div>
                            <div></div>
                    </div>
                </v-expansion-panel-header>
                <v-expansion-panel-content>
                    <div class="container-fluid content--panel">
                        Test conteudo
                    </div>
                </v-expansion-panel-content>
            </v-expansion-panel>
        </v-expansion-panels>
        

        <div class="row"><div class="col"><hr mt-5 mb-5></div></div>

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
    
    data () {
      return {
        rules: {
            userImg:  [
                value => !value || value.size < 1000000 || 'Imagem excedeu o máximo permitido de 1mb',
            ]  
        },

        panel: [0, 1, 2, 3, 4],
        dialog: false,
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
                file: 'required',
                nome: 'required',
                email: 'required',
                fone: 'required',
                empresa: 'required',
                cargo: 'required'
          },


          switch1: false,

          // Combobox Sindicatos
          sindicatos: [],//['Sindicato1', 'Sindicato2', 'Sindicato3', 'Sindicato4', 'Sindicato5'],

          // Switch Ativar Notícia
          ativar: false,

          dataInputs: {
            nome: '',
            email: '',
            fone: '',
            empresa: ''
          },


          // Controle dos files
          filesFile: null,
            fileFileIsEdit: '',
            fileFileName: '',

      }

    },
    components: {  },
    methods: {

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
                usuarios: {
                    title: 'Usuários',
                    link: '/adm/usuarios',
                    icon: '/_adm/assets/SVGs/Home/icon-users.svg'
                }
            }

            return btnsBarTop;
        },

        checkForm: function (e)
        {
            this.errorsShow.errors = [];

            // Opcionais
            if (! _.isEmpty(this.filesFile) )
            {
                if (! _.isEmpty(this.filesFile)  ) {
                    if ( this.filesFile[0].size >= 1000000) {
                        this.errorsShow.errors.push({title: 'Imagem', description: 'Tamanho da imagem excedida! (tamanho máximo permitido é de 1mb) '});
                    }
                }
            }

            // Validações especificas
            if ( _.isEmpty(this.filesFile) && this.fileFileIsEdit == '' )
                this.errorsShow.errors.push({title: 'Imagem', description: 'obrigatório'});
            if (! _.isEmpty(this.filesFile) && this.fileFileIsEdit == '' ) {
                if ( this.filesFile[0].size >= 1000000) {
                    this.errorsShow.errors.push({title: 'Imagem', description: 'Tamanho da imagem excedida! (tamanho máximo permitido é de 1mb) '});
                }
            }

            i
            if ( _.isEmpty(this.dataInputs.nome) )
                this.errorsShow.errors.push({title: 'nome', description: 'obrigatório'});
            if ( _.isEmpty(this.dataInputs.email) )
                this.errorsShow.errors.push({title: 'Tag\'s', description: 'obrigatório'});
            if ( _.isEmpty(this.dataInputs.fone) )
                this.errorsShow.errors.push({title: 'Fone', description: 'obrigatório'});
            if ( _.isEmpty(this.dataInputs.empresa) )
                this.errorsShow.errors.push({title: 'Empresa', description: 'obrigatório'});
            if ( _.isEmpty(this.dataInputs.cargo) )
                this.errorsShow.errors.push({title: 'Cargo/Função', description: 'obrigatório'});
            
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
            this.fileFileIsEdit = item.file_id > 0 ? `/${item.file_pathfile}/${item.file_namefile}` : '';
            this.fileFileName = item.file_namefile;

            this.dataInputs = {
                nome: item.nome,
                email: item.email,
                fone: item.fone,
                empresa: item.empresa,
                cargo: item.cargo,
            };
        },

    },
    created()
    {
        
        if (!_.isEmpty(this.formEdition)) {
            //this.isEdit = true;
            this.editStartCompleteFilds(JSON.parse(this.formEdition));
        }
    },
    props: ['csrf', 'formAction', 'formEdition'],
}
</script>

<style lang="scss">
@import '~/../resources/_adm/sass/_vars.scss';

.card__title {
    background-color: $blue;
    color: white;
}

#usuario__cadastro
{
    .container-image {
        border: solid 1px $grey-light;
        border-radius: 50%;
        padding: 2px;
    }

    .box-image {
        background-size: cover;
        background-position: center;
        border-radius: 50%;
    }

    .box__icon--file {
        border-color: rgb(18, 84, 136);
        margin-left: calc(50% - 44px);
    }

    

    .v-text-field.v-text-field--enclosed .v-text-field__details {
        margin-bottom: 0;
    }

    .img__profile {
        border: solid 1px $grey-strong;
        border-radius: 50%;
        padding: 2px;

        img {
            width: 100%;
            border-radius: 50%;
        }
    }

    .box-btns-noticias {
        margin: 10px 0;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        border: solid 1px $grey;
        padding: 10px 40px;
        border-radius: 40px;
        background-color: $blue;

    }

    .v-expansion-panel-header
    {
        padding: 0;
        outline: none;

        .v-icon {
            font-size: 3rem;
            color: #125488 !important;
        }
    }

    .header--panel
    {
        display: flex;
        justify-content: space-between;
        align-items: center;
        order: 2;
    
        > div
        {
            &:first-child {
                 margin-right: 8px;
            }

            &:last-child
            {
                background-color: #E0E1E3;
                height: 2px;
                width: 100%;
            }
        }   
    }

    .content--panel
    {
        padding-left: 30px;

        .box--noticia
        {
            position: relative;
            border-bottom: solid 1px $grey-light;

            .imagem-noticia {
                width: 100%;
                height: 100px;
                background-size: cover;
                background-position: center;
            }

            audio {
                width: 100%;
                margin: 0px 0 20px;
            }

            .buttons
            {
                display: flex;
                justify-content: center;
                margin: -43px 0 0;
                position: absolute;
                width: 100%;
                a
                {
                    svg
                    {
                        width: 65px;
                        height: 65px;
                        margin: 0 3px;
                        cursor: pointer;
    
                        circle {
                            transition: ease 0.4s;
                        }
                    }

                    &:first-child
                    {    
                        &:hover svg {
                            circle {
                                fill: $blue-strong;
                            }
                        }
                    }

                    &:last-child
                    {
                        &:hover svg {
                            circle {
                                fill: $red-strong;
                            }
                        }
                    }
                }
            }

            .content {
                color: #125488;
                line-height: 1.2em;
                font-size: 0.9em;
                margin-top: 15px;
            }

            &.noticia-simples
            {
                .buttons {
                    margin: 0;
                    position: relative;
                    margin-top: 20px;
                }
                
            }

        }
        
    }
}



#noticias-cadastro
{
    .box-btns-noticias {
        margin: 10px 0;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        border: solid 1px $grey;
        padding: 20px 20px 10px;
        border-radius: 20px;
    
        > div { margin-bottom: 10px; }
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

    .col-box-file
    {
        padding: 0;
        padding-right: 0;

        >label {
            font-size: 0.8em;
            margin-left: 10px;
            margin-bottom: 0;
        }

        .box-file {
            border: solid 1px $grey;
            border-radius: 20px;
            padding: 30px 20px 10px;

            .box-image
            {
                text-align: center;

                img { height: 100px; margin-top: -20px; }

                audio { margin-top: -15px; }

                p { margin: 5px 0 0; }

                &.box-file
                {
                    .icon-file
                    {
                        span { font-size: 3em; }
                    }

                    a { font-size: 0.9em; color: $blue-strong; }
                    
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
        .box-file {
            border-color: #53A6D8;
            transition: $transition-normal ease;
            animation: shadowEfectBorder 1s;
            animation-fill-mode: forwards;

            &.ckeditor { padding: 5px; border-radius: 5px; }
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
    0% { box-shadow: 0px 0px 15px 0px #53A6D8; }
    100% { box-shadow: 0px 0px 0px 0px #53A6D8; }
}

</style>