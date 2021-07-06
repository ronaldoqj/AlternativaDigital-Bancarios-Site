
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
        <v-dialog v-model="forms.create.modal.show" persistent max-width="600px">
            <form ref="formCreate" :action="actionForm" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" :value="csrf" />
                <input type="hidden" name="id" :value="forms.create.inputs.id" />
                <input type="hidden" name="action" value="create" />

                <v-card>
                <v-card-title>
                    <span class="headline modal-title">Cadastrar convênio</span>
                </v-card-title>
                <hr class="hr-line-modal" />
                <v-card-text>
                    <v-row class="p-3">
                        <v-col cols="12">
                            <v-file-input
                                class="mt-4"
                                name="icon"
                                v-model="forms.create.inputs.icon"
                                label="Icone da categoria:"
                                placeholder="Procurar imagem"
                                prepend-icon=""
                                prepend-inner-icon="image"
                                color="primary"
                                outlined
                                counter
                                :show-size="1000"
                                accept="image/png, image/jpeg, image/bmp"
                                clearable
                                required
                            >
                                <template v-slot:selection="{ index, text }">
                                <v-chip v-if="index < 2" color="primary" dark label small>
                                    {{ text }}
                                </v-chip>
                                <span v-else-if="index === 2" class="overline grey--text text--darken-3 mx-2" >
                                    +{{ files.length - 2 }} File(s)
                                </span>
                                </template>
                            </v-file-input>
                        </v-col>
                        <v-col cols="12">
                            <v-text-field
                                v-model="forms.create.inputs.name"
                                name="name"
                                maxlength="240"
                                label="Nome da nova categoria"
                                placeholder="Informe o nome da categoria"
                                outlined
                                prepend-inner-icon="library_add"
                                counter
                                clearable
                                required
                            ></v-text-field>
                        </v-col>
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
    props: [ 'actionForm', 'propList', 'csrf' ],
    data() {
        return {
            forms: {
                create: {
                    inputs: {
                        id: null,
                        name: null,
                        icon: null
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



            items: [
                {
                    title: 'Attractions',
                    action: 'mdi-ticket',
                    active: true,
                    items: [{ title: 'List Item' }],
                },
                {
                    title: 'Dining',
                    action: 'mdi-silverware-fork-knife',
                    items: [
                        { title: 'Breakfast & brunch' },
                        { title: 'New American' },
                        { title: 'Sushi' },
                    ],
                },
                {
                    title: 'Education',
                    action: 'mdi-school',
                    items: [{ title: 'List Item' }],
                },
                {
                    title: 'Family',
                    action: 'mdi-run',
                    items: [{ title: 'List Item' }],
                },
                {
                    title: 'Health',
                    action: 'mdi-bottle-tonic-plus',
                    items: [{ title: 'List Item' }],
                },
                {
                    title: 'Office',
                    action: 'mdi-content-cut',
                    items: [{ title: 'List Item' }],
                },
                {
                    title: 'Promotions',
                    action: 'mdi-tag',
                    items: [{ title: 'List Item' }],
                },
            ],


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
                 this.forms.create.inputs.name.length > 2 &&
                 ! _.isNil(this.forms.create.inputs.icon))
            {
                disabled = false;
            }

            return disabled;
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
