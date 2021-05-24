
<template>
    <div id="usuario__cadastro" class="container-fluid mt-10">
    <errors-component :objErrorsShow="configurations.errorsShow" @showErrorsChange="configurations.errorsShow.show = $event"></errors-component>
    <pages-menu-bar :btns-top-bar="makeBtnsBarTop()"></pages-menu-bar>


        <form ref="form" :action="formAction" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" :value="csrf">
            <input type="hidden" name="id" :value="configurations.id" />
            <input type="hidden" name="isEdit" :value="configurations.isEdit" />
            <input type="hidden" name="deletedImage" :value="configurations.deletedImage" />
            <input type="hidden" name="changedPermissions" :value="configurations.changedPermissions > 1 ? true : null" />
            <input type="hidden" name="permissions" :value="computedPermissions" />

            <v-row align="center">
                <!-- Image -->
                <v-col cols="12" sm="6" md="4" lg="3" align="center">
                    
                    <v-card class="container-image" max-width="300" max-height="300">
                        <v-btn
                        v-if="! configurations.showAvatarInputFile"
                        fab
                        color="red darken-4"
                        class="box__icon--file"
                        bottom
                        right
                        elevation="15"
                        @click="buttomDeleteImage()"
                        >
                            <v-icon color="white">mdi-delete</v-icon>
                        </v-btn>
                        <v-responsive :aspect-ratio="4/4"  class="box-image" :style="{backgroundImage: `url(${configurations.avatarImage})`}">
                            <div class="box__file" v-if="configurations.showAvatarInputFile">
                                <v-file-input
                                    v-model="dataInputs.fileAvatar"
                                    name="avatar"
                                    attach="form"
                                    :rules="configurations.rules.userImg"
                                    accept="image/png, image/jpeg, image/bmp, image/svg+xml"
                                    placeholder="Selecione um avatar"
                                    prepend-icon="mdi-camera"
                                    dense
                                    outlined
                                    rounded
                                    label="Avatar"
                                ></v-file-input>
                            </div>
                        </v-responsive>
                    </v-card>
                </v-col>

                <!-- Filds -->
                <v-col cols="12" sm="6" md="8" lg="9">
                    <v-text-field
                        :class="configurations.borderFields.name"
                        name="name"
                        v-model="dataInputs.name"
                        label="Nome:"
                        maxlength="240"
                        counter="240"
                        outlined
                        dense
                        clearable
                        rounded
                    ></v-text-field>
                    
                    <v-text-field
                        :class="configurations.borderFields.email"
                        name="email"
                        v-model="dataInputs.email"
                        label="E-Mail:"
                        maxlength="240"
                        counter="240"
                        outlined
                        rounded
                        dense
                        clearable
                    ></v-text-field>

                    <v-text-field
                        :class="configurations.borderFields.phone"
                        name="phone" 
                        v-model="dataInputs.phone"
                        label="Fone:"
                        maxlength="240"
                        counter="240"
                        outlined
                        dense
                        clearable
                        rounded
                    ></v-text-field>

                    <v-text-field
                        :class="configurations.borderFields.company"
                        name="company"
                        v-model="dataInputs.company"
                        label="Empresa:"
                        maxlength="240"
                        counter="240"
                        outlined
                        dense
                        clearable
                        rounded
                    ></v-text-field>

                    <v-text-field
                        :class="configurations.borderFields.position"
                        name="position"
                        v-model="dataInputs.position"
                        label="Cargo/Função:"
                        maxlength="240"
                        counter="240"
                        outlined
                        dense
                        clearable
                        rounded
                    ></v-text-field>
                    
                    <v-text-field
                        :class="configurations.borderFields.password"
                        name="password"
                        v-model="dataInputs.password"
                        label="Senha:"
                        maxlength="240"
                        counter="240"
                        outlined
                        dense
                        clearable
                        rounded
                    ></v-text-field>
                </v-col>
            </v-row>

            <div class="row"><div class="col" mt-5 mb-5></div></div>

            <!-- Permissions -->
            <v-row>
                <v-col>
                    <!-- ADM -->
                    <expancionPanel title="Funções ADM">
                        <v-simple-table class="color__table--grey">
                            <template v-slot:default>
                            <tbody>
                                <tr v-for="permission in dataInputs.switchs.adm" :key="permission.id">
                                    <td>{{ permission.name }}</td>
                                    <td> <v-switch v-model="permission.active"></v-switch> </td>
                                </tr>
                            </tbody>
                            </template>
                        </v-simple-table>
                    </expancionPanel>

                    <div class="row"><div class="col" mt-5 mb-5></div></div>

                    <!-- Portal -->
                    <expancionPanel title="Portal">
                        <v-simple-table class="color__table--grey">
                            <template v-slot:default>
                            <tbody>
                                <tr v-for="permission in dataInputs.switchs.portal" :key="permission.id">
                                    <td>{{ permission.name }}</td>
                                    <td> <v-switch v-model="permission.active"></v-switch> </td>
                                </tr>
                            </tbody>
                            </template>
                        </v-simple-table>
                    </expancionPanel>

                    <div class="row"><div class="col" mt-5 mb-5></div></div>

                    <!-- Fetrafi-RS -->
                    <expancionPanel title="Fetrafi-RS">
                        <v-simple-table class="color__table--grey">
                            <template v-slot:default>
                            <tbody>
                                <tr v-for="permission in dataInputs.switchs.fetrafiRs" :key="permission.id">
                                    <td>{{ permission.name }}</td>
                                    <td> <v-switch v-model="permission.active" right></v-switch> </td>
                                </tr>
                            </tbody>
                            </template>
                        </v-simple-table>
                    </expancionPanel>

                    <div class="row"><div class="col" mt-5 mb-5></div></div>

                    <!-- Syndicates -->
                    <expancionPanel title="Sindicatos">
                        <expancionPanel :title="item.name" v-for="item in JSON.parse(syndicates)" :key="item.id">
                            <v-simple-table class="color__table--grey">
                                <template v-slot:default>
                                <tbody>
                                    <tr v-for="permission in dataInputs.switchs.syndicates[item.id]" :key="permission.id">
                                        <td>{{ permission.name }}</td>
                                        <td> <v-switch v-model="permission.active"></v-switch> </td>
                                    </tr>
                                </tbody>
                                </template>
                            </v-simple-table>
                        </expancionPanel>
                    </expancionPanel>
                </v-col>
            </v-row>
        
            <!-- <div class="row"><div class="col"><hr mt-5 mb-5></div></div> -->

            <div class="row mt-5">
                <div class="col-12">
                    <v-btn type="bottom" @click="checkForm" class="btn-cadastrar" block rounded dark>{{configurations.valueBtnSubmit}}</v-btn>
                </div>
            </div>
        </form> 

    </div>
</template>  

<script>
import expancionPanel from '../../components/widget/ExpansionPanelsComponent';
export default {
    props: ['csrf', 'formAction', 'formEdition', 'syndicates', 'permissions', 'permissionsAssigned'],
    components: { expancionPanel },
    data () {
        return {
            configurations: {
                id: null,
                isEdit: false,
                deletedImage: null,
                changedPermissions: 0,
                imageDefault: '/_adm/assets/profile-default.jpg',
                avatarImage: '/_adm/assets/profile-default.jpg',
                valueBtnSubmit: 'Cadastrar',
                showAvatarInputFile: true,
                rules: {
                    userImg:  [
                        value => !value || value.size < 1000000 || 'Imagem excedeu o máximo permitido de 1mb',
                    ]  
                },
                // variavel necessária para o component de mensagens de erro
                errorsShow: {
                    show: false,
                    title: 'Não foi possivel realizar o cadastro!',
                    errors: []
                },
                borderFields: {
                    file: 'required',
                    name: 'required',
                    email: 'required',
                    phone: 'required',
                    company: 'required',
                    position: 'required',
                    password: 'required'
                }
            },

           
            dataInputs: {
                /** Campos */
                name: '',
                email: '',
                phone: '',
                company: '',
                position: '',
                password: '',
                
                /** Switchs dinamicos de permições */
                switchs: {
                    adm:[],
                    portal: [],
                    fetrafiRs: [],
                    syndicates: {}
                },

                // Controle dos files
                fileAvatar: null,
                fileFileIsEdit: '',
                fileFileName: '',
            }
        }
    },
    computed:{
        computedPermissions() {
            this.configurations.changedPermissions++;
            return JSON.stringify(this.dataInputs.switchs);
        }
    },
    methods:
    {
        buttomDeleteImage() {
            this.configurations.showAvatarInputFile = true;
            this.configurations.avatarImage = this.configurations.imageDefault;
            this.configurations.deletedImage = true;
        },
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

        checkForm: function(e)
        {
            this.configurations.errorsShow.errors = [];


            // // Validações especificas
            if (! _.isNil(this.dataInputs.fileAvatar) ) {
                if ( this.dataInputs.fileAvatar.size >= 1000000) {
                    this.configurations.errorsShow.errors.push({title: 'Imagem', description: 'Tamanho da imagem excedida! (tamanho máximo permitido é de 1mb) '});
                }
            }

            if ( _.isEmpty(this.dataInputs.name) )
                this.configurations.errorsShow.errors.push({title: 'Nome', description: 'obrigatório'});
            if ( _.isEmpty(this.dataInputs.email) )
                this.configurations.errorsShow.errors.push({title: 'E-Mail', description: 'obrigatório'});
            if ( _.isEmpty(this.dataInputs.phone) )
                this.configurations.errorsShow.errors.push({title: 'Telefone', description: 'obrigatório'});
            if ( _.isEmpty(this.dataInputs.company) )
                this.configurations.errorsShow.errors.push({title: 'Empresa', description: 'obrigatório'});
            if ( _.isEmpty(this.dataInputs.position) )
                this.configurations.errorsShow.errors.push({title: 'Cargo/Função', description: 'obrigatório'});
            
            if (this.configurations.errorsShow.errors.length > 0)
            {
                this.configurations.errorsShow.show = true;
                e.preventDefault();
            } else {
                this.$refs.form.submit()
            }
        },

        
        

        addActivePropertyToPortalAndFetrafirs(arraySwitch)
        {
            arraySwitch.forEach(function(element)
            {
                element.active = false;
            });

            return arraySwitch;
        },

        addActivePropertyToSyndicates(arraySwitch)
        {
            let newObjectSyndicate = {};
            let permissionsSyndicates = JSON.parse(this.permissions).syndicates;
            
            permissionsSyndicates.forEach(function(element)
            {
                element.active = false;
            });

            JSON.parse(this.syndicates).forEach( (element) =>
            {
                newObjectSyndicate[element.id] = JSON.parse(JSON.stringify(permissionsSyndicates));
            });
            
            return newObjectSyndicate;
        },

        checkImage(item)
        {
            console.log('image', item);
            if ( !_.isNil(item.image_pathfile) != '' && !_.isNil(item.image_namefile != '') ) {
                this.configurations.avatarImage = `/${item.image_pathfile}/${item.image_namefile}`;
            }
            return this.configurations.avatarImage;
        },

        editStartCompleteFilds(item)
        {
            if (item.image) {
                this.configurations.showAvatarInputFile = false;
            }

            const permissionsAssigned = JSON.parse(this.permissionsAssigned);
            this.configurations.id = item.id;
            this.configurations.isEdit = true;
            this.dataInputs.name = item.name;
            this.dataInputs.email = item.email;
            this.dataInputs.phone = item.phone;
            this.dataInputs.company = item.company;
            this.dataInputs.position = item.position;
            this.dataInputs.password = item.password;
            this.configurations.avatarImage = this.checkImage(item);

            if (permissionsAssigned.assigned.adm.length) {
                this.dataInputs.switchs.adm = this.setPermissionsAssigned(this.dataInputs.switchs.adm, permissionsAssigned.assigned.adm);
            }
            if (permissionsAssigned.assigned.portal.length) {
                this.dataInputs.switchs.portal = this.setPermissionsAssigned(this.dataInputs.switchs.portal, permissionsAssigned.assigned.portal);
            }
            if (permissionsAssigned.assigned.fetrafiRs.length) {
                this.dataInputs.switchs.fetrafiRs = this.setPermissionsAssigned(this.dataInputs.switchs.fetrafiRs, permissionsAssigned.assigned.fetrafiRs);
            }

            console.log( permissionsAssigned.assigned );

            if ( Object.keys(permissionsAssigned.assigned.syndicates).length) {
                this.dataInputs.switchs.syndicates = this.setPermissionsAssignedToSyndicates(this.dataInputs.switchs.syndicates, permissionsAssigned.assigned.syndicates);
            }
        },

        /** Type Object */
        setPermissionsAssignedToSyndicates(switchs, permissionsAssigned)
        {
            Object.keys(permissionsAssigned).forEach(element => {
                switchs[element] = switchs[element].map(item => {
                    permissionsAssigned[element].forEach(value => {
                        if (item.id == value.permission_id) {
                            item.active = true;
                        }
                    });

                    return item;
                });
            });

            return switchs;
        },

        /** Type Array */
        setPermissionsAssigned(switchs, permissionsAssigned)
        {
            permissionsAssigned.forEach(element => {
                switchs = switchs.map(item => {
                    if (item.id == element.permission_id) {
                        item.active = true;
                    }
                    return item;
                });
            });

            return switchs;
        }
    },
    created()
    {
        this.dataInputs.switchs.adm = this.addActivePropertyToPortalAndFetrafirs(JSON.parse(this.permissions).adm);
        this.dataInputs.switchs.portal = this.addActivePropertyToPortalAndFetrafirs(JSON.parse(this.permissions).portal);
        this.dataInputs.switchs.fetrafiRs = this.addActivePropertyToPortalAndFetrafirs(JSON.parse(this.permissions).fetrafiRs);
        this.dataInputs.switchs.syndicates = this.addActivePropertyToSyndicates(this.dataInputs.switchs.syndicates);

        if (!_.isEmpty(this.formEdition)) {
            this.configurations.isEdit = true;
            this.editStartCompleteFilds(JSON.parse(this.formEdition));
        }
    }
}
</script>

<style lang="scss">
@import '~/../resources/_adm/sass/_vars.scss';

.color__table--grey {
    background-color: #f5f5f5 !important;
}

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
        max-width: 100%;
        display: flex;
        align-items: center;

        .box__file {
            background-color: rgba(255,255,255, 0.7);

            padding-top: 15px;
            padding: 15px 5px 0 5px;

        }
    }

    .box__icon--file {
        border: solid 1px white !important;
        position: absolute;
        right: 0;
        margin-right: 25px;
        z-index: 90;
    }

    .v-text-field.v-text-field--enclosed .v-text-field__details { margin-bottom: 0; }

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
}

#usuario__cadastro
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
    
    .switch-ativar-noticia
    {
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

        .box-file
        {
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