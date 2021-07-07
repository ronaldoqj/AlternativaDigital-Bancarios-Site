
<template>
    <div class="componente-convenios container-fluid">

        <h5>Convenios</h5>

        <!-- Menu -->
        <pages-menu-bar>
            <div class="item-btn" v-for="itemSlot in makeBtnsBarTop().onlyIcons" :key="itemSlot.title">
                <img src="/_adm/assets/SVGs/icon-arrow-right.svg" class="img-fluid" onload="SVGInject(this)" />
                <a href="#">
                    <div class="box__buttons--access">
                        <div @click="forms.create.modal.show = true">
                            <btn-action-widget-component :title="itemSlot.title" :link="itemSlot.link" action="adicionar"></btn-action-widget-component>
                        </div>
                    </div>
                </a>
            </div>
        </pages-menu-bar>

        <!-- List -->
        <h6 class="mt-3 mb-2 ml-3">Listagem</h6>
        <div class="box-files">

            <v-list>
                <v-list-group
                    v-for="item in items"
                    :key="item.title"
                    v-model="item.active"
                    no-action
                >
                    <template v-slot:activator>
                        <v-list-item-avatar>
                            <v-img src="http://localhost:3000/files/categorias_convenios/itachi-20210705_233643-050059.png"></v-img>
                        </v-list-item-avatar>
                    <v-list-item-content>
                        <v-list-item-title v-text="item.title"></v-list-item-title>
                    </v-list-item-content>
                    </template>

                    <!-- Level 2 list -->
                    <v-list-item
                        v-for="child in item.items"
                        :key="child.title"
                        >
                        <v-list-item-content>
                            <v-list-item-title v-text="child.title"></v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <!-- Level 2 list END -->

                </v-list-group>
            </v-list>

        </div>




        <!-- Form Create -->
        <v-dialog v-model="forms.create.modal.show" persistent max-width="1200px">
            <form ref="formCreate" :action="actionForm + '/convenio'" method="post">
                <input type="hidden" name="_token" :value="csrf" />
                <input type="hidden" name="entity" :value="entity" />
                <input type="hidden" name="convenio_selected" :value="computedConvenio" />
                <input type="hidden" name="action" value="create" />

                <v-card>
                    <v-card-title>
                        <span class="headline modal-title">Cadastrar convênio</span>
                    </v-card-title>
                    <hr class="hr-line-modal" />
                    <v-card-text>
                        
                        <v-row class="p-3">
                            

                            <div class="row">
                                <!-- Convenios -->
                                <div class="col-12" v-show="false">
                                    <v-combobox
                                        name="convenio"
                                        v-model="forms.create.inputs.convenio.selected"
                                        item-text="name"
                                        item-value="id"
                                        :items="forms.create.inputs.convenio.list"
                                        label="Convenio:"
                                        placeholder="Selecione um convenio"
                                        rounded
                                        outlined
                                        dense
                                        :clearable="true"
                                    ></v-combobox>
                                </div>
                                
                                <div class="col-12">
                                    <v-combobox
                                        name="convenio"
                                        v-model="forms.create.inputs.convenio.selected"
                                        item-text="name"
                                        item-value="id"
                                        :items="forms.create.inputs.convenio.list"
                                        label="Convenio:"
                                        placeholder="Selecione um convenio"
                                        rounded
                                        outlined
                                        dense
                                        :clearable="true"
                                    ></v-combobox>
                                </div>
                                <!-- Nome -->
                                <div class="col-12">
                                    <v-text-field
                                        v-model="forms.create.inputs.name"
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
                                        v-model="forms.create.inputs.email"
                                        :rules="forms.create.inputs.rules.email"
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
                                <!-- subdominio -->
                                <div class="col-12">
                                    <v-text-field
                                        v-model="forms.create.inputs.site"
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
                                                    <!-- <v-icon>$vuetify.icons.iconOnlyLetterFacebook</v-icon> -->
                                                    <v-text-field
                                                        v-model="forms.create.inputs.facebook"
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
                                                        v-model="forms.create.inputs.twitter"
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
                                                        v-model="forms.create.inputs.instagram"
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
                                                        v-model="forms.create.inputs.whatsapp"
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
                                                <!-- Podcast -->
                                                <div class="col-12 col-md-6">
                                                    <v-text-field
                                                        v-model="forms.create.inputs.podcast"
                                                        name="podcast"
                                                        label="Podcast:"
                                                        :prepend-icon="'$vuetify.icons.iconOnlyLetterPodcast'"
                                                        dense="dense"
                                                        maxlength="240"
                                                        counter="240"
                                                        rounded
                                                        outlined
                                                        clearable
                                                    ></v-text-field>
                                                </div>
                                                <!-- Youtube -->
                                                <div class="col-12 col-md-6">
                                                    <v-text-field
                                                        v-model="forms.create.inputs.youtube"
                                                        name="youtube"
                                                        label="Youtube:"
                                                        :prepend-icon="'$vuetify.icons.iconOnlyLetterYoutube'"
                                                        dense="dense"
                                                        maxlength="240"
                                                        counter="240"
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
                                        v-model="forms.create.inputs.cep"
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
                                        v-model="forms.create.inputs.endereco"
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
                                        v-model="forms.create.inputs.numero"
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
                                        v-model="forms.create.inputs.complemento"
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
                                        v-model="forms.create.inputs.bairro"
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
                                        v-model="forms.create.inputs.cidade"
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
                                        name="uf"
                                        v-model="forms.create.inputs.uf.selected"
                                        item-text="estado"
                                        item-value="sigla"
                                        :items="forms.create.inputs.uf.items"
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
                        <v-btn
                            color="blue darken-1"
                            text
                            @click="forms.create.modal.show = false"
                        >
                            Cancelar
                        </v-btn>
                        <v-btn
                            class="ma-2"
                            color="success"
                            type="submit"
                            tile
                            outlined
                            :disabled="activeSubmitCreate"
                            required
                            clearable
                        >
                            Cadastrar <v-icon right dark> done </v-icon>
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </form>
        </v-dialog>

    </div>
</template>  

<script>
export default {
    props: [ 'actionForm', 'entity', 'propList', 'list', 'categoriasConvenios', 'estados', 'csrf' ],
    data() {
        return {
            forms: {
                create: {
                    inputs: {
                        id: null,
                        name: null,
                        email: null,
                        hiddenConvenio: null,
                        convenio: {
                            selected: null,
                            list: []
                        },
                        categoria: null,
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
                        uf: {
                            selected: null,
                            items: JSON.parse(this.estados)
                        },
                        uf2: {
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
                            disabled: true
                        }
                    },
                    modal: {
                        show: false
                    },
                }
            },



            items: [],
            // items: [
            //     {
            //         title: 'Attractions',
            //         action: 'mdi-ticket',
            //         active: true,
            //         items: [{ title: 'List Item' }],
            //     },
            //     {
            //         title: 'Dining',
            //         action: 'mdi-silverware-fork-knife',
            //         items: [
            //             { title: 'Breakfast & brunch' },
            //             { title: 'New American' },
            //             { title: 'Sushi' },
            //         ],
            //     },
            //     {
            //         title: 'Education',
            //         action: 'mdi-school',
            //         items: [{ title: 'List Item' }],
            //     },
            //     {
            //         title: 'Family',
            //         action: 'mdi-run',
            //         items: [{ title: 'List Item' }],
            //     },
            //     {
            //         title: 'Health',
            //         action: 'mdi-bottle-tonic-plus',
            //         items: [{ title: 'List Item' }],
            //     },
            //     {
            //         title: 'Office',
            //         action: 'mdi-content-cut',
            //         items: [{ title: 'List Item' }],
            //     },
            //     {
            //         title: 'Promotions',
            //         action: 'mdi-tag',
            //         items: [{ title: 'List Item' }],
            //     },
            // ],


        }
    },
    computed: {
        activeSubmitUpdate() {
            let disabled = true;

            if ( this.forms.update.inputs.name && this.forms.update.inputs.name.length > 2 )
            {
                disabled = false;
            }

            return disabled;
        },
        
        activeSubmitCreate() {
            let disabled = true;

            if ( this.forms.create.inputs.name &&
                 this.forms.create.inputs.name.length > 2 )
            {
                disabled = false;
            }

            return disabled;
        },

        computedConvenio() {
            this.forms.create.inputs.hiddenConvenio = this.forms.create.inputs.convenio.selected;
            return this.forms.create.inputs.hiddenConvenio ? this.forms.create.inputs.hiddenConvenio.id : '';
        }
    },
    methods: {
        makeBtnsBarTop()
        {
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
        this.forms.create.inputs.convenio.list = JSON.parse(this.categoriasConvenios);
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
    }
}
</style>
