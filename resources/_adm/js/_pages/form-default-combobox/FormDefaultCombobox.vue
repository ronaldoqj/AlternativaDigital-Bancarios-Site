
<template>
<div class="form-default-combobox">
        
    <div class="row">
        <div class="col-12">
            <div class="box-btns-items">
                <div @click="openCadastrar">
                    <btn-action-widget-component :title="nameOfPage.btnAdicionar" link="#" action="adicionar"></btn-action-widget-component>
                </div>
            </div>
        </div>
    </div>
 


    <form ref="formDelete" :action="actionForm" method="post">
        <input type="hidden" name="_token" :value="csrf">
        <input type="hidden" name="id" :value="id">
        <input type="hidden" name="action" :value="modal.action">

        <div class="container-fluid content--panel">
            
            <h6 class="pt-6">{{ nameOfPage.tituloListagem }}</h6>
            <v-divider></v-divider>

            <div class="row">
                <template v-if="this.list.length">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2" v-for="item in list">
                        <v-hover>
                        <template v-slot="{ hover }">
                        <div class="box--items mx-auto pa-3 transition-swing" :class="`elevation-${hover ? 6 : 4}`">

                            <div class="header">{{item.name}}</div>
                            <div class="content">
                                <div class="edit">
                                    <!-- <a :href="`/adm/noticias/edicao/${item.id}`"><img src="/_adm/assets/SVGs/editar.svg" class="img-fluid" onload="SVGInject(this)" /></a> -->
                                    <a @click="openEditar(item)"><img src="/_adm/assets/SVGs/editar.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                                </div>
                                
                                <div class="excluir">
                                    <v-menu :close-on-content-click="true" :nudge-width="150" offset-x>
                                        <template v-slot:activator="{ on, attrs }">
                                            <a @click="clickExcluir(item)" v-bind="attrs" v-on="on"><img src="/_adm/assets/SVGs/excluir.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                                        </template>
                                        
                                        <v-card>
                                            <v-list-item> <v-list-item-title>Deseja excluir o registro?</v-list-item-title> </v-list-item>
                                            <v-btn x-small class="ma-2" text @click="menu = false">Cancelar</v-btn>
                                            <v-btn small class="ma-2" tile outlined color="error" @click="formExcluirEnviar()">
                                                <v-icon left>delete_outline</v-icon> Excluir
                                            </v-btn>
                                        </v-card>
                                    </v-menu>
                                </div>
                            </div>

                        </div>
                        </template>
                        </v-hover>
                    </div>
                </template>

                <template v-else>
                    <div class="col-12">
                        <div class="box--noticia">
                            <div class="content">
                                <p> Não foram encontrados registros. </p>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

        </div>
    </form>

    <!-- Modal -->
    <v-row justify="center">
    <v-dialog v-model="modal.show" persistent max-width="600px">
        <form ref="form" :action="actionForm" @submit="checkForm()" method="post">
            <input type="hidden" name="_token" :value="csrf">
            <input type="hidden" name="id" :value="id">
            <input type="hidden" name="action" :value="modal.action">

            <v-card>
            <v-card-title>
                <span class="headline modal-title">{{ modal.titleAction }} {{ nameOfPage.formTitulo }}</span>
            </v-card-title>
            <hr class="hr-line-modal" />
            <v-card-text>
                
                <v-row>
                    <v-col cols="12">
                        <v-text-field v-model="name" name="name" maxlength="120" :label="nameOfPage.inputName" outlined prepend-icon="domain" counter required clearable="true"></v-text-field>
                    </v-col>
                </v-row>
            </v-card-text>
            <hr class="hr-line-modal" />
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="modal.show = false">Cancelar</v-btn>
                <v-btn class="ma-2" tile outlined color="success" @click="checkForm" :disabled="disabledBtnCadastrar">
                    <v-icon left>done_outline</v-icon> {{modal.btnName}}
                </v-btn>
            </v-card-actions>
            </v-card>
        </form>
    </v-dialog>
    </v-row>
    <!-- Fim Modal -->
</div>
</template>  

<script>
export default {
    data: () => {
        return {
            // Registros da DB
            list: [],

            // Modal
            modal: {
                show: false,
                titleAction: '',
                action: '',
                btnName: ''
            },

            // Variaveis do Form
            id: '',
            name: '',
            disabledBtnCadastrar: true,

            // Variaveis para alterar nomes referente a página
            nameOfPage: {
                btnAdicionar: '',
                tituloListagem: '',
                inputName: '',
                formTitulo: ''
            }
        }
    },
    components: {  },
    watch: {
        name(newValue, oldValue)
        {
            this.name.length > 3 ? this.disabledBtnCadastrar = false : this.disabledBtnCadastrar = true;
        }
    },
    methods: {
        checkForm(e)
        {
            if (this.disabledBtnCadastrar) {
                e.preventDefault()
            } else {
                this.$refs.form.submit();
            }
        },

        checkFormDelete(e)
        {
            console.log('submit do form delete');
            e.preventDefault()
        },
        
        openCadastrar() {
            this.id = '';
            this.name = '';
            this.modal.show = true;
            this.modal.btnName = 'Cadastrar';
            this.modal.titleAction = 'Cadastrar';
            this.modal.action = 'cadastrar';
        },
        openEditar(item) {
            this.id = item.id;
            this.name = _.isEmpty(item.name) ? '' : item.name;
            this.modal.show = true;
            this.modal.btnName = 'Editar';
            this.modal.titleAction = 'Editar';
            this.modal.action = 'editar';
        },
        clickExcluir(item) {
            this.id = item.id;
            this.modal.action = 'excluir';
        },
        formExcluirEnviar() {
            this.$refs.formDelete.submit();
        }
    },
    props: [ 'propGetParams', 'csrf', 'actionForm', 'page' ],
    created()
    {
        this.list = JSON.parse(this.propGetParams);

        switch (this.page) {
        case 'entidades':
            this.nameOfPage = {
                btnAdicionar: 'Nova entidade',
                tituloListagem: 'Entidades cadastradas',
                inputName: 'Nome da entidade',
                formTitulo: 'entidade'
            };
            break;
        case 'bancos':
            this.nameOfPage = {
                btnAdicionar: 'Novo banco',
                tituloListagem: 'Bancos cadastrados',
                inputName: 'Nome do banco',
                formTitulo: 'banco'
            };
            break;
        }
    }
}

</script>


<style lang="scss">
@import '~/../resources/_adm/sass/_vars.scss';
.form-default-combobox
{
    .box-btns-items {
        margin: 10px 0;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        border: solid 1px $grey;
        padding: 10px 40px;
        border-radius: 40px;
        background-color: $blue;

    }

    .title-items {
        padding: 0 10px;
    }

    .box--items
    {
        .header {
            color: $blue;
            font-size: 1.3em;
            text-align: center;
        }

        .content {
            margin-top: 10px;
            display: flex;
            justify-content: center;

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
                            fill: $red-strong;
                        }
                    }
                }

                &:last-child
                {
                    &:hover svg {
                        circle {
                            fill: $blue-strong;
                        }
                    }
                }
            }
        }
        
    }


}


.modal-title {
    text-transform: capitalize;
}

.v-dialog>.v-card>.v-card__subtitle, .v-dialog>.v-card>.v-card__text {
    padding: 35px 24px 20px;
}

hr.hr-line-modal {
    margin: 0;
}

.v-text-field .v-input__control, .v-text-field .v-input__slot, .v-text-field fieldset {
    margin: 0;
}
</style>
