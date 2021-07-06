<template>
    <div class="page-categorias-convenios">
        <pages-menu-bar :btns-top-bar="makeBtnsBarTop().listIcons">
            
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
        <v-container>
            <v-row>
                <v-col>

                    <v-list nav dense>
                        <v-list-item-group v-model="selectedItem" color="primary">
                            <v-list-item v-for="(item, i) in list" :key="i">

                
                                <v-list-item-avatar>
                                <v-img :src="`/${item.file_pathfile}/${item.file_namefile}`"></v-img>
                                </v-list-item-avatar>

                                <v-list-item-content>
                                    <v-list-item-title v-text="item.name"></v-list-item-title>
                                </v-list-item-content>

                                <v-list-item-action>
                                    <div>
                                        <v-btn @click="updateItem(item)" color="primary" fab small dark>
                                            <v-icon>mdi-pencil</v-icon>
                                        </v-btn>
                                        <!-- <v-btn @click="deleteItem(item)" color="error" fab small dark>
                                            <v-icon>mdi-delete</v-icon>
                                        </v-btn> -->


                                        <v-menu :close-on-content-click="true" :nudge-width="150" offset-x>
                                            <template v-slot:activator="{ on, attrs }">
                                                <v-btn @click="clickExcluir(item)" v-bind="attrs" v-on="on" color="error" fab small dark>
                                                    <v-icon>mdi-delete</v-icon>
                                                </v-btn>
                                            </template>
                                            <v-card>
                                                <v-list-item> <v-list-item-title>Deseja excluir o registro?</v-list-item-title> </v-list-item>
                                                <v-btn x-small class="ma-2" text @click="menu = false">Cancelar</v-btn>
                                                
                                                <v-btn small tile color="error" class="ma-2 white--text" outlined @click="formDeleteSubmit()">
                                                    Excluir <v-icon right dark> mdi-delete </v-icon>
                                                </v-btn>
                                            </v-card>
                                        </v-menu>


                                    </div>
                                </v-list-item-action>

                            </v-list-item>
                        </v-list-item-group>
                    </v-list>

                </v-col>
            </v-row>
        </v-container>


        <!-- Form Delete -->
        <form ref="formDelete" :action="actionForm" method="post">
            <input type="hidden" name="_token" :value="csrf">
            <input type="hidden" name="id" :value="forms.delete.inputs.id">
            <input type="hidden" name="action" value="delete">
        </form>


        <!-- Form Update -->
        <v-dialog v-model="forms.update.modal.show" persistent max-width="600px">
            <form ref="formUpdate" :action="actionForm" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" :value="csrf">
                <input type="hidden" name="id" :value="forms.update.inputs.id">
                <input type="hidden" name="action" value="update">

                <v-card>
                <v-card-title>
                    <span class="headline modal-title">Editar categoria</span>
                </v-card-title>
                <hr class="hr-line-modal" />
                <v-card-text>
                    <v-row class="p-3">
                        <v-col class="mx-auto text-center">
                            <v-list-item-avatar size="100">
                                <v-img :src="forms.update.avatar" :alt="forms.update.inputs.name"></v-img>
                            </v-list-item-avatar>
                        </v-col>
                        <v-col cols="12">
                            <v-file-input
                                class="mt-4"
                                name="icon"
                                v-model="forms.update.inputs.icon"
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
                                v-model="forms.update.inputs.name"
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
                        @click="forms.update.modal.show = false"
                    >
                        Cancelar
                    </v-btn>
                    <v-btn
                        class="ma-2"
                        color="success"
                        type="submit"
                        tile
                        outlined
                        :disabled="activeSubmitUpdate"
                        required
                        clearable
                    >
                        Editar <v-icon right dark> done </v-icon>
                    </v-btn>
                </v-card-actions>
                </v-card>
            </form>
        </v-dialog>


        <!-- Form Create -->
        <v-dialog v-model="forms.create.modal.show" persistent max-width="600px">
            <form ref="formCreate" :action="actionForm" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" :value="csrf" />
                <input type="hidden" name="id" :value="forms.create.inputs.id" />
                <input type="hidden" name="action" value="create" />

                <v-card>
                <v-card-title>
                    <span class="headline modal-title">Cadastrar categoria</span>
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
    data: () => {
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
                },
                update: {
                    avatar: '',
                    inputs: {
                        id: null,
                        name: null,
                        icon: null
                    },
                    modal: {
                        show: false
                    },
                },
                delete: {
                    inputs: {
                        id: null
                    }
                },
            },

            /** Lista dos itens */
            list: [],

            /** Somente para dar o efeito de selecionado */
            selectedItem: null,
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

        updateItem(item) {
            console.log('update', item);
            this.forms.update.inputs.name = item.name;
            this.forms.update.inputs.id = item.id;
            this.forms.update.modal.show = true;
            this.forms.update.avatar = `/${item.file_pathfile}/${item.file_namefile}`;
        },

        deleteItem(item) {
            console.log('delete', item);
        },

        makeBtnsBarTop() {
            const btnsBarTop = {
                listIcons: {
                    home: {
                        title: 'Home',
                        link: '/adm/',
                        icon: '/_adm/assets/SVGs/Home/icon-house.svg'
                    },
                    dashboard: {
                        title: 'Dashboard',
                        link: '/adm/dashboard',
                        icon: '/_adm/assets/SVGs/icon-dashboard.svg'
                    }
                },
                onlyIcons: {
                    cadastrar: {
                        title: 'Nova Categoria de Convênio',
                        link: '#',
                        icon: '/_adm/assets/SVGs/icon-mais.svg'
                    }
                }
            }

            return btnsBarTop;
        },

        clickExcluir(item) {
            this.forms.delete.inputs.id = item.id;
        },
        formDeleteSubmit() {
            this.$refs.formDelete.submit();
        }
    },
    created()
    {
        this.list = JSON.parse(this.propList);

        if (! this.list.length) {
            this.forms.create.modal.show = true;
        }
        //this.list = JSON.parse(JSON.parse(this.propList).list);
    }
}
</script>

<style lang="scss">
@import '~/../resources/_adm/sass/_vars.scss';
.page-categorias-convenios
{
    .v-list-item {
        border-bottom: solid 1px #eee;
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

            .buttons
            {
                display: flex;
                justify-content: center;
                margin: -43px 0 0;
                position: absolute;
                width: 100%;

                .container--buttons {
                    margin-bottom: -30px;
                    text-align: center;
                }

                .icon-file {
                    text-align: center;
                    margin: 0;
                    span { font-size: 3em; }
                }

                a
                {
                    font-size: 0.9em;
                    color: $blue-strong;

                    svg
                    {
                        width: 65px;
                        height: 65px;
                        margin: 0 3px;
                        cursor: pointer;
    
                        circle { transition: ease 0.4s; }
                    }

                    &:first-child
                    {    
                        &:hover svg {
                            circle { fill: $blue-strong; }
                        }
                    }

                    &:last-child
                    {
                        &:hover svg {
                            circle { fill: $red-strong; }
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

</style>
