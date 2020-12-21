
<template>
    
    <div id="sindicatos" class="container-fluid mt-10">

    <errors-component :objErrorsShow="errorsShow" @showErrorsChange="errorsShow.show = $event"></errors-component>

    <form :action="formAction" method="post" @submit="checkForm" enctype="multipart/form-data">

        <input type="hidden" name="_token" :value="csrf">
        <input type="hidden" name="id" :value="id" />

        <hr>

        <div class="row">
            <div class="col-12">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-box-files" :class="borderFields.sindicato">
                            <label>Imagem do sindicato</label>
                            <div class="box-files">

                                <template v-if="fileIsEdit != ''">
                                    <div class="box-image">
                                        <img :src="fileIsEdit" class="img-fluid" alt="">
                                        <p><v-btn depressed small color="error" @click="fileIsEdit = ''">Excluir</v-btn></p>
                                    </div>
                                </template>
                                <template v-else>
                                    <v-file-input
                                        name="file"
                                        v-model="files"
                                        label="Logo:"
                                        placeholder="Procurar Imagem"
                                        prepend-icon=""
                                        prepend-inner-icon="add_photo_alternate"
                                        dense="dense"
                                        color="primary"
                                        counter
                                        multiple
                                        accept="image/png, image/jpeg, image/bmp"
                                        outlined
                                        :show-size="1000"
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
                                </template>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="row"><div class="col"><hr mt-5 mb-5></div></div>

        <div class="row">
            <div class="col-4" :class="borderFields.dataInclusao">
                <v-dialog
                    ref="dialog1"
                    v-model="dateTimeInputs.dates.dataInclusao.modal"
                    :return-value.sync="dateTimeInputs.dates.dataInclusao.date"
                    persistent
                    width="290px"
                    >
                    <template v-slot:activator="{ on, attrs }">
                        <v-text-field
                            name="dataInclusao"
                            v-model="dateTimeInputs.dates.dataInclusao.date"
                            label="Data Inclusão:"
                            dense="dense"
                            prepend-inner-icon="event"
                            readonly
                            v-bind="attrs"
                            v-on="on"
                            outlined>
                        </v-text-field>
                    </template>
                    <v-date-picker v-model="dateTimeInputs.dates.dataInclusao.date" scrollable>
                        <v-spacer></v-spacer>
                        <v-btn text color="primary" @click="dateTimeInputs.dates.dataInclusao.modal = false">Cancelar</v-btn>
                        <v-btn text color="primary" @click="$refs.dialog1.save(dateTimeInputs.dates.dataInclusao.date)">OK</v-btn>
                    </v-date-picker>
                </v-dialog>
            </div>

            <div class="col-4" :class="borderFields.dataLimite">
                <v-dialog
                    ref="dialog2"
                    v-model="dateTimeInputs.dates.limite.modal"
                    :return-value.sync="dateTimeInputs.dates.limite.date"
                    persistent
                    width="290px"
                    >
                    <template v-slot:activator="{ on, attrs }">
                        <v-text-field
                            name="dataLimite"
                            v-model="dateTimeInputs.dates.limite.date"
                            label="Limite No Destaque:"
                            dense="dense"
                            prepend-inner-icon="event"
                            readonly
                            v-bind="attrs"
                            v-on="on"
                            outlined
                            :clearable="true"
                        ></v-text-field>
                    </template>
                    <v-date-picker v-model="dateTimeInputs.dates.limite.date" scrollable>
                        <v-spacer></v-spacer>
                        <v-btn text color="primary" @click="dateTimeInputs.dates.limite.modal = false">Cancelar</v-btn>
                        <v-btn text color="primary" @click="$refs.dialog2.save(dateTimeInputs.dates.limite.date)">OK</v-btn>
                    </v-date-picker>
                </v-dialog>
            </div>

            <div class="col-4" :class="borderFields.horaLimite">
                <v-dialog
                    ref="dialog3"
                    v-model="dateTimeInputs.times.limiteDestaque.modal"
                    :return-value.sync="dateTimeInputs.times.limiteDestaque.time"
                    persistent
                    width="290px"
                >
                    <template v-slot:activator="{ on, attrs }">
                    <v-text-field
                        name="horaLimite"
                        v-model="dateTimeInputs.times.limiteDestaque.time"
                        label="Limite Hora:"
                        dense="dense"
                        prepend-inner-icon="access_time"
                        readonly
                        v-bind="attrs"
                        v-on="on"
                        outlined
                        :clearable="true"
                    ></v-text-field>
                    </template>
                    <v-time-picker
                    v-if="dateTimeInputs.times.limiteDestaque.modal"
                    v-model="dateTimeInputs.times.limiteDestaque.time"
                    full-width
                    >
                    <v-spacer></v-spacer>
                    <v-btn text color="primary" @click="dateTimeInputs.times.limiteDestaque.modal = false">Cancelar</v-btn>
                    <v-btn text color="primary" @click="$refs.dialog3.save(dateTimeInputs.times.limiteDestaque.time)">OK</v-btn>
                    </v-time-picker>
                </v-dialog>
            </div>
        </div>

        <div class="row"><div class="col"><hr mt-5 mb-5></div></div>

        <div class="row inputs-finais-to-all-types">
            <div class="col-12" :class="borderFields.name">
                <v-text-field
                    v-model="dataInputs.name"
                    name="name"
                    label="Nome:"
                    dense="dense"
                    maxlength="240"
                    counter="240"
                    outlined
                    clearable
                ></v-text-field>
            </div>
            <div class="col-12" :class="borderFields.link">
                <v-text-field
                    v-model="dataInputs.link"
                    name="link"
                    label="Link:"
                    dense="dense"
                    maxlength="240"
                    counter="240"
                    outlined
                    clearable
                ></v-text-field>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <v-btn type="submit" class="btn-cadastrar" block rounded dark>{{valueBtnSubmit}}</v-btn>
            </div>
        </div>
    </form>  
    </div>
</template>  

<style src="./SindicatosCadastro.scss" lang="scss"></style>
<script src="./SindicatosCadastro.js"></script>
