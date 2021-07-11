
<template>
    <div class="componente-convenios container-fluid">

        <h5>Convenios</h5>

        <!-- Menu -->
        <pages-menu-bar>
            <div class="item-btn" v-for="itemSlot in makeBtnsBarTop().onlyIcons" :key="itemSlot.title">
                <img src="/_adm/assets/SVGs/icon-arrow-right.svg" class="img-fluid" onload="SVGInject(this)" />
                <a href="#">
                    <div class="box__buttons--access">
                        <div @click="openCreateConvenio()">
                            <btn-action-widget-component :title="itemSlot.title" :link="itemSlot.link" action="adicionar"></btn-action-widget-component>
                        </div>
                    </div>
                </a>
            </div>
        </pages-menu-bar>

        <!-- List -->
        <h6 class="mt-3 mb-2 ml-3">Listagem</h6>
        <div class="box-files">

            <!-- v-model="item.id" DEIXA TODOS ITEMS ABERTOS SE COLOCADO NA LINHA EM BRANCO ABAIXO, LOGO APÓS DA PROPRIEDADE :Key -->
            <v-list>
                <v-list-group
                    v-for="item in listCategoriasComConvenios"
                    :key="item.name"

                    no-action
                >
                    <template v-slot:activator>
                        <v-list-item-avatar tile>
                            <!-- <v-img src="http://localhost:3000/files/categorias_convenios/itachi-20210705_233643-050059.png"></v-img> -->
                            <v-img :src="`/${item.file_pathfile}/${item.file_namefile}`"></v-img>
                        </v-list-item-avatar>
                        <v-list-item-content>
                            <v-list-item-title v-text="item.name"></v-list-item-title>
                        </v-list-item-content>
                    </template>

                    <!-- Level 2 list -->
                    <v-row class="p-3 pl-10 pr-10">
                        <v-col
                        class="mt-2 mb-2"
                        cols="12"
                        md="6"
                        lg="4"
                        xl="3"
                        v-for="child in item.convenios" :key="child.id"
                        >
                            <div class="card__convenio--list">
                                <div class="col__list col__list--first">
                                    <v-img :src="`/${item.file_pathfile}/${item.file_namefile}`"></v-img>
                                    
                                    <v-btn @click="openEditConvenio(child)" class="mt-2" fab outlined x-small color="indigo">
                                        <v-icon dark> mdi-pencil </v-icon>    
                                    </v-btn>
                                
                                    <v-menu :close-on-content-click="true" :nudge-width="150" offset-x>
                                        <template v-slot:activator="{ on, attrs }">
                                            <v-btn @click="deleteConvenio(child)" v-bind="attrs" v-on="on" class="mt-2" fab outlined x-small color="pink">
                                                <v-icon dark> mdi-trash-can-outline </v-icon>
                                            </v-btn>
                                        </template>
                                        <v-card>
                                            <v-list-item> <v-list-item-title>Deseja excluir o registro?</v-list-item-title> </v-list-item>
                                            <v-btn x-small class="ma-2" text @click="menu = false">Cancelar</v-btn>
                                            <v-btn small tile color="error" class="ma-2 white--text" outlined @click="formSendDelete()">
                                                Excluir <v-icon right dark> mdi-delete </v-icon>
                                            </v-btn>
                                        </v-card>
                                    </v-menu>
                                </div>
	                            <div class="coll__list col__list--last">
                                    <h2>{{child.name}}</h2>
                                    <p>{{child.description}}</p>

                                    <h3>Redes Sociais</h3>
                                    <div class="icons__socialmedias">
                                        <a target="_blank" :href="child.facebook"><img src="/_site/assets/SVGs/Brancos/facebook.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                                        <a target="_blank" :href="child.twitter"><img src="/_site/assets/SVGs/Brancos/twitter.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                                        <a target="_blank" :href="child.instagram"><img src="/_site/assets/SVGs/Brancos/instagram.svg" class="img-fluid" onload="SVGInject(this)" /></a>
                                    </div>

                                    <div class="informations">
                                        <p>
                                            <ul>
                                                <li><v-icon dense color="#125488"> mdi-map-marker </v-icon></li>
                                                <li>
                                                    <div>{{child.endereco}}, {{child.numero}}</div>
                                                    <div>{{child.bairro}} - {{child.cidade}} / {{ child.uf }}</div>
                                                </li>
                                            </ul> 
                                        </p>
                                        <p> <v-icon dense color="#125488"> mdi-phone-in-talk </v-icon> Telefone </p>
                                        <p> <v-icon dense color="#125488"> mdi-email </v-icon> {{child.email}} </p>
                                        <p> <v-icon dense color="#125488"> mdi-monitor-star </v-icon> {{child.site}} </p>
                                    </div>
                                </div>
                            </div>
                        </v-col>
                    </v-row>
                    <!-- <v-list-item
                        v-for="child in item.convenios"
                        :key="child.id"
                    >
                        <v-list-item-content>
                            <v-list-item-title v-text="child.name"></v-list-item-title>
                        </v-list-item-content>
                    </v-list-item> -->
                    <!-- Level 2 list END -->

                </v-list-group>
            </v-list>

        </div>




        <form ref="formDelete" :action="actionForm + '/convenio'" method="post">
                <input type="hidden" name="_token" :value="csrf" />
                <input type="hidden" name="id" :value="this.form.inputs.id" />
                <input type="hidden" name="action" :value="form.inputs.action" />
        </form>


        <!-- Form Create -->
        <v-dialog scrollable v-model="form.modal.show" persistent max-width="1000px">
            <form ref="formDialog" :action="actionForm + '/convenio'" method="post">
                <input type="hidden" name="_token" :value="csrf" />
                <input type="hidden" name="id" :value="this.form.inputs.id" />
                <input type="hidden" name="entity" :value="entity" />
                <input type="hidden" name="convenio" :value="computedConvenio" />
                <input type="hidden" name="uf" :value="computedUf" />
                <input type="hidden" name="action" :value="form.inputs.action" />

                <v-card>
                    <v-card-title>
                        <span class="headline modal-title">{{form.title}}</span>
                    </v-card-title>
                    <hr class="hr-line-modal" />
                    <v-card-text>
                        <v-row class="p-4 pt-2 pb-2">
                            <div class="row">
                                <!-- Convenios -->
                                <div class="col-12">
                                    <v-combobox
                                        v-model="form.inputs.convenio.selected"
                                        item-text="name"
                                        item-value="id"
                                        :items="form.inputs.convenio.list"
                                        label="Convenio:"
                                        placeholder="Selecione um convenio"
                                        rounded
                                        outlined
                                        dense
                                        clearable
                                    >
                                        <!-- Campo selecionado para personalizar -->
                                        <template v-slot:selection="data">
                                            <v-avatar  size="26" class="mr-4">
                                                <v-img :src="data.item.img"></v-img>
                                            </v-avatar>
                                            {{ data.item.name }}
                                        </template>

                                        <!-- Listagem personalizada -->
                                        <template slot="item" slot-scope="data">
                                            <v-avatar size="26" class="mr-4">
                                                <v-img :src="data.item.img"></v-img>
                                            </v-avatar>
                                            {{ data.item.name }}
                                        </template>
                                    </v-combobox>
                                </div>
                                <!-- Nome -->
                                <div class="col-12">
                                    <v-text-field
                                        v-model="form.inputs.name"
                                        name="name"
                                        label="Nome:"
                                        dense="dense"
                                        maxlength="240"
                                        counter="240"
                                        rounded
                                        outlined
                                        clearable
                                    ></v-text-field>
                                </div>
                                <!-- E-Mail -->
                                <div class="col-12">
                                    <v-text-field
                                        v-model="form.inputs.email"
                                        :rules="form.inputs.rules.email"
                                        name="email"
                                        label="E-Mail:"
                                        dense="dense"
                                        maxlength="240"
                                        counter="240"
                                        rounded
                                        outlined
                                        clearable
                                    ></v-text-field>
                                </div>
                                <div class="col-12">
                                    <v-textarea
                                    v-model="form.inputs.description"
                                    name="description"
                                    label="Descrição"
                                    dense="dense"
                                    auto-grow
                                    outlined
                                    counter
                                    row-height="15"
                                    clearable
                                    ></v-textarea>
                                </div>
                                <!-- Site -->
                                <div class="col-12">
                                    <v-text-field
                                        v-model="form.inputs.site"
                                        name="site"
                                        label="Site:"
                                        dense="dense"
                                        maxlength="240"
                                        counter="240"
                                        rounded
                                        outlined
                                        clearable
                                    ></v-text-field>
                                </div>
                                <!-- Redes Sociais -->
                                <div class="col-12">
                                    <v-card class="mx-auto" outlined>
                                        <v-card-text>
                                            <v-row>
                                                <!-- Facebook -->
                                                <div class="col-12 col-md-6">
                                                    <v-text-field
                                                        v-model="form.inputs.facebook"
                                                        name="facebook"
                                                        label="Facebook:"
                                                        :prepend-icon="'$vuetify.icons.iconOnlyLetterFacebook'"
                                                        dense="dense"
                                                        maxlength="240"
                                                        counter="240"
                                                        rounded
                                                        outlined
                                                        clearable
                                                    ></v-text-field>
                                                </div>
                                                <!-- Twitter -->
                                                <div class="col-12 col-md-6">
                                                    <v-text-field
                                                        v-model="form.inputs.twitter"
                                                        name="twitter"
                                                        label="Twitter:"
                                                        :prepend-icon="'$vuetify.icons.iconOnlyLetterTwitter'"
                                                        dense="dense"
                                                        maxlength="240"
                                                        counter="240"
                                                        rounded
                                                        outlined
                                                        clearable
                                                    ></v-text-field>
                                                </div>
                                                <!-- Instagram -->
                                                <div class="col-12 col-md-6">
                                                    <v-text-field
                                                        v-model="form.inputs.instagram"
                                                        name="instagram"
                                                        label="Instagram:"
                                                        :prepend-icon="'$vuetify.icons.iconOnlyLetterInstagram'"
                                                        dense="dense"
                                                        maxlength="240"
                                                        counter="240"
                                                        rounded
                                                        outlined
                                                        clearable
                                                    ></v-text-field>
                                                </div>
                                                <!-- Whatsapp -->
                                                <div class="col-12 col-md-6">
                                                    <v-text-field
                                                        v-model="form.inputs.whatsapp"
                                                        name="whatsapp"
                                                        label="Whatsapp:"
                                                        :prepend-icon="'$vuetify.icons.iconOnlyLetterWhatsapp'"
                                                        dense="dense"
                                                        maxlength="20"
                                                        counter="20"
                                                        v-mask="['(##) ##### ####']"
                                                        rounded
                                                        outlined
                                                        clearable
                                                    ></v-text-field>
                                                </div>
                                            </v-row>
                                        </v-card-text>
                                    </v-card>
                                </div>
                                <!-- CEP -->
                                <div class="col-12 col-md-4">
                                    <v-text-field
                                        v-model="form.inputs.cep"
                                        name="cep"
                                        label="CEP:"
                                        dense="dense"
                                        maxlength="14"
                                        counter="14"
                                        v-mask="['#####-###']"
                                        rounded
                                        outlined
                                        clearable
                                    ></v-text-field>
                                </div>
                            </div>

                            <div class="row inputs-finals-to-all-types">
                                <!-- Endereço -->
                                <div class="col-12 col-md-6">
                                    <v-text-field
                                        v-model="form.inputs.endereco"
                                        name="endereco"
                                        label="Endereço:"
                                        dense="dense"
                                        maxlength="240"
                                        counter="240"
                                        rounded
                                        outlined
                                        clearable
                                    ></v-text-field>
                                </div>
                                <!-- Número -->
                                <div class="col-12 col-md-3 col-lg-2">
                                    <v-text-field
                                        v-model="form.inputs.numero"
                                        name="numero"
                                        label="Número:"
                                        dense="dense"
                                        maxlength="30"
                                        counter="30"
                                        rounded
                                        outlined
                                        clearable
                                    ></v-text-field>
                                </div>
                                <!-- Complemento -->
                                <div class="col-12 col-md-3 col-lg-4">
                                    <v-text-field
                                        v-model="form.inputs.complemento"
                                        name="complemento"
                                        label="Complemento:"
                                        dense="dense"
                                        maxlength="240"
                                        counter="240"
                                        rounded
                                        outlined
                                        clearable
                                    ></v-text-field>
                                </div>
                                <!-- Bairro -->
                                <div class="col-12 col-md-4">
                                    <v-text-field
                                        v-model="form.inputs.bairro"
                                        name="bairro"
                                        label="Bairro:"
                                        dense="dense"
                                        maxlength="240"
                                        counter="240"
                                        rounded
                                        outlined
                                        clearable
                                    ></v-text-field>
                                </div>
                                <!-- Cidade -->
                                <div class="col-12 col-md-4">
                                    <v-text-field
                                        v-model="form.inputs.cidade"
                                        name="cidade"
                                        label="Cidade:"
                                        dense="dense"
                                        maxlength="240"
                                        counter="240"
                                        rounded
                                        outlined
                                        clearable
                                    ></v-text-field>
                                </div>
                                <!-- Estado -->
                                <div class="col-12 col-md-4">
                                    <v-combobox
                                        v-model="form.inputs.uf.selected"
                                        item-text="estado"
                                        item-value="sigla"
                                        :items="form.inputs.uf.items"
                                        label="Estado:"
                                        placeholder="Selecione um Estado"
                                        rounded
                                        outlined
                                        dense
                                        :clearable="true"
                                    ></v-combobox>
                                </div>
                            </div>
                        </v-row>
                    </v-card-text>
                    <hr class="hr-line-modal" />
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="grey darken-3" text @click="form.modal.show = false" >
                            Cancelar
                        </v-btn>
                        <v-btn class="ma-2" :color="form.buttons.action.color" type="submit" tile outlined :disabled="activeSubmitCreate">
                            {{ form.buttons.action.label }} <v-icon right dark> done </v-icon>
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </form>
        </v-dialog>
    </div>
</template>  

<script>
export default {
    props: [ 'actionForm', 'entity', 'listCategoriasComConvenios', 'categoriasConvenios', 'estados', 'csrf' ],
    data() {
        return {
            lists: {
                categories: []
            },
            form: {
                title: 'Cadastrar convênio',
                inputs: {
                    id: null,
                    action: null,
                    name: null,
                    email: null,
                    hiddenConvenio: null,
                    convenio: {
                        selected: null,
                        list: []
                    },
                    description: null,
                    site: null,
                    facebook: null,
                    twitter: null,
                    instagram: null,
                    whatsapp: null,
                    cep: null,
                    endereco: null,
                    numero: null,
                    complemento: null,
                    bairro: null,
                    cidade: null,
                    hiddenUf: null,
                    uf: {
                        selected: null,
                        items: JSON.parse(this.estados)
                    },

                    rules: {
                        email: [
                            //v => !!v || 'E-mail is required',
                            //v => /.+@.+/.test(v) || 'E-mail must be valid',
                            v => !v || /.+@.+/.test(v) || 'E-mail must be valid',
                        ],
                    }
                },
                buttons: {
                    action: {
                        disabled: true,
                        label: 'Cadastrar',
                        color: 'success'
                    }
                },
                modal: {
                    show: false
                }
            }
        }
    },
    computed: {
        activeSubmitUpdate() {
            let disabled = true;

            if ( this.forms.update.inputs.name && this.forms.update.inputs.name.length > 2 ) {
                disabled = false;
            }

            return disabled;
        },
        
        activeSubmitCreate() {
            let disabled = true;

            if ( this.form.inputs.name && this.form.inputs.name.length > 2 ) {
                disabled = false;
            }

            return disabled;
        },

        computedConvenio() {
            this.form.inputs.hiddenConvenio = this.form.inputs.convenio.selected;
            return this.form.inputs.hiddenConvenio ? this.form.inputs.hiddenConvenio.id : '';
        },

        computedUf() {
            this.form.inputs.hiddenUf = this.form.inputs.uf.selected;
            return this.form.inputs.hiddenUf ? this.form.inputs.hiddenUf.sigla : '';
        }
    },
    methods: {
        resetFields() {
            if (this.form.inputs.action !== 'create')
            {
                this.form.inputs.id = null;
                this.form.inputs.name = null;
                this.form.inputs.email = null;
                this.form.inputs.hiddenConvenio = null;
                this.form.inputs.convenio.selected = null;
                this.form.inputs.categoria = null;
                this.form.inputs.description = null;
                this.form.inputs.site = null;
                this.form.inputs.facebook = null;
                this.form.inputs.twitter = null;
                this.form.inputs.instagram = null;
                this.form.inputs.whatsapp = null;
                this.form.inputs.cep = null;
                this.form.inputs.endereco = null;
                this.form.inputs.numero = null;
                this.form.inputs.complemento = null;
                this.form.inputs.bairro = null;
                this.form.inputs.cidade = null;
                this.form.inputs.hiddenUf = null;
                this.form.inputs.uf.selected = null;
            }
        },

        openCreateConvenio() {
            this.form.title = 'Cadastrar convênio';
            this.resetFields();
            this.form.modal.show = true;
            this.form.buttons.action.label = 'Cadastrar'
            this.form.buttons.action.color = 'success'
            this.form.inputs.action = 'create';
        },
        
        deleteConvenio(child) {
            this.resetFields();
            this.form.inputs.action = 'delete';
            this.form.inputs.id = child.id;
        },
        formSendDelete() {
            this.$refs.formDelete.submit();
        },

        openEditConvenio(child) {
            this.form.title = 'Atualizar convênio';
            this.form.inputs.action = 'update';
            this.form.buttons.action.label = 'Atualizar'
            this.form.buttons.action.color = 'primary'
            this.resetFields();

            this.form.inputs.id = child.id;
            this.form.inputs.name = child.name;
            this.form.inputs.email = child.email;
            this.form.inputs.hiddenConvenio = null;
            this.form.inputs.convenio.selected = this.form.inputs.convenio.list.find((element, index) => element.id == child.categoria);
            this.form.inputs.categoria = null;
            this.form.inputs.description = child.description;
            this.form.inputs.site = child.site;
            this.form.inputs.facebook = child.facebook;
            this.form.inputs.twitter = child.twitter;
            this.form.inputs.instagram = child.instagram;
            this.form.inputs.whatsapp = child.whatsapp;
            this.form.inputs.cep = child.cep;
            this.form.inputs.endereco = child.endereco;
            this.form.inputs.numero = child.numero;
            this.form.inputs.complemento = child.complemento;
            this.form.inputs.bairro = child.bairro;
            this.form.inputs.cidade = child.cidade;
            this.form.inputs.hiddenUf = null;
            this.form.inputs.uf.selected = this.form.inputs.uf.items.find((element, index) => element.sigla == child.uf);

            this.form.buttons.action.label = 'Atualizar'
            this.form.modal.show = true;
        },

        makeBtnsBarTop() {
            const btnsBarTop = {
                onlyIcons: {
                    cadastrar: {
                        title: 'Novo Convênio',
                        link: '#',
                        icon: '/_adm/assets/SVGs/icon-mais.svg'
                    }
                }
            }

            return btnsBarTop;
        }
    },
    created() {
        let categoriaConvenios = JSON.parse(this.categoriasConvenios).map( item => ({id: item.id, name: item.name , img: `/${item.file_pathfile}/${item.file_namefile}`}) );
        this.form.inputs.convenio.list = categoriaConvenios;
        console.log('form.inputs.convenio.list', this.form.inputs.convenio.list);
    }
}
</script>

<style lang="scss">
@import '~/../resources/_adm/sass/_vars.scss';
.componente-convenios
{    
    .v-list-group {
        border: solid 1px #e3e3e3;
        border-radius: 5px;

        .v-list-group__header.v-list-item--active {
            background-color: rgba(0,0,0,0.04);
        }
    }

    .card__convenio--list
    {
        display: flex;

        .col__list {
            
            width: 40px;
            height: 40px;
        }
        .col__list--first {
            margin-right: 10px;
            text-align: center;
        }
        .col__list--last
        {
            h2 {
                font-size: 1.4em;
                font-weight: bold;
                color: #125488;
            }
            h3 {
                font-size: 1em;
                font-weight: bold;
                color: #125488;
                text-transform: uppercase;
            }
            p {
                font-size: 0.9em;
                color: #A9A9A9;
            }

            .icons__socialmedias {
                display: flex;
                justify-content: space-around;
                padding: 10px;

                a {
                    width: 40px;

                    svg
                    {
                        .cls-1,
                        .cls-3,
                        .cls-4,
                        path,
                        tspan {
                            fill: #A5A5A5;
                            transition: 0.4s;
                        }
                    }
                }
            }

            .informations {
                p {
                    & > ul
                    {
                        margin: 0;
                        padding: 0;
                    
                        & > li {
                            display: inline-table;
                        }
                    }
                    margin: 5px 0;
                }
            }
        }
    }
}
</style>
