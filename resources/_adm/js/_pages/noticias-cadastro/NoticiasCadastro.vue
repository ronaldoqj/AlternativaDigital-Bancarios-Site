
<template>


    
    <div class="container">
        <!-- <btn-icon-Text /> -->
        <div class="row">
            <div class="col-12">
                <div class="box-btns-noticias">
                    <div @click="clickBtnNoticias('btnIconTextDestaque')"><btnIconText :params="paramsBtnIcons.btnIconTextDestaque"></btnIconText> </div>
                    <div @click="clickBtnNoticias('btnIconTextVideo')">   <btnIconText :params="paramsBtnIcons.btnIconTextVideo"></btnIconText>    </div>
                    <div @click="clickBtnNoticias('btnIconTextImagem')">  <btnIconText :params="paramsBtnIcons.btnIconTextImagem"></btnIconText>   </div>
                    <div @click="clickBtnNoticias('btnIconTextPodcast')"> <btnIconText :params="paramsBtnIcons.btnIconTextPodcast"></btnIconText>  </div>
                    <div @click="clickBtnNoticias('btnIconTextTexto')">   <btnIconText :params="paramsBtnIcons.btnIconTextTexto"></btnIconText>    </div>    
                </div>
            </div>
        </div>


        <v-app id="inspire">
        <div class="row">
            <div class="col-3">
                <v-dialog
                    ref="dialog1"
                    v-model="dateTimeInputs.dates.dataDaInclusao.modal"
                    :return-value.sync="dateTimeInputs.dates.dataDaInclusao.date"
                    persistent
                    width="290px"
                    >
                    <template v-slot:activator="{ on, attrs }">
                        <v-text-field
                            v-model="dateTimeInputs.dates.dataDaInclusao.date"
                            label="Data Inclusão"
                            prepend-inner-icon="event"
                            readonly
                            v-bind="attrs"
                            v-on="on"
                            outlined>
                        </v-text-field>
                    </template>
                    <v-date-picker v-model="dateTimeInputs.dates.dataDaInclusao.date" scrollable>
                        <v-spacer></v-spacer>
                        <v-btn text color="primary" @click="dateTimeInputs.dates.dataDaInclusao.modal = false">Cancel</v-btn>
                        <v-btn text color="primary" @click="$refs.dialog1.save(dateTimeInputs.dates.dataDaInclusao.date)">OK</v-btn>
                    </v-date-picker>
                </v-dialog>
            </div>

            <div class="col-3">
                <v-dialog
                    ref="dialog2"
                    v-model="dateTimeInputs.dates.limiteNoDestaque.modal"
                    :return-value.sync="dateTimeInputs.dates.limiteNoDestaque.date"
                    persistent
                    width="290px"
                    >
                    <template v-slot:activator="{ on, attrs }">
                        <v-text-field
                            v-model="dateTimeInputs.dates.limiteNoDestaque.date"
                            label="Limite No Destaque"
                            prepend-inner-icon="event"
                            readonly
                            v-bind="attrs"
                            v-on="on"
                            outlined
                        ></v-text-field>
                    </template>
                    <v-date-picker v-model="dateTimeInputs.dates.limiteNoDestaque.date" scrollable>
                        <v-spacer></v-spacer>
                        <v-btn text color="primary" @click="dateTimeInputs.dates.limiteNoDestaque.modal = false">Cancel</v-btn>
                        <v-btn text color="primary" @click="$refs.dialog2.save(dateTimeInputs.dates.limiteNoDestaque.date)">OK</v-btn>
                    </v-date-picker>
                </v-dialog>
            </div>

            <div class="col-2">
                <v-dialog
                    ref="dialog3"
                    v-model="dateTimeInputs.times.limiteDestaque.modal"
                    :return-value.sync="dateTimeInputs.times.limiteDestaque.time"
                    persistent
                    width="290px"
                >
                    <template v-slot:activator="{ on, attrs }">
                    <v-text-field
                        v-model="dateTimeInputs.times.limiteDestaque.time"
                        label="Limite Hora"
                        prepend-inner-icon="access_time"
                        readonly
                        v-bind="attrs"
                        v-on="on"
                        outlined
                    ></v-text-field>
                    </template>
                    <v-time-picker
                    v-if="dateTimeInputs.times.limiteDestaque.modal"
                    v-model="dateTimeInputs.times.limiteDestaque.time"
                    full-width
                    >
                    <v-spacer></v-spacer>
                    <v-btn text color="primary" @click="dateTimeInputs.times.limiteDestaque.modal = false">Cancel</v-btn>
                    <v-btn text color="primary" @click="$refs.dialog3.save(dateTimeInputs.times.limiteDestaque.time)">OK</v-btn>
                    </v-time-picker>
                </v-dialog>
            </div>

            <div class="col-2">
                <v-switch v-model="ativarNoticia" class="ma-4" label="Ativar Notícia"></v-switch>
            </div>

            <div class="col-2">
                <v-select
                v-model="form.selectSindicato"
                :items="sindicatos"
                color="primary"
                label="Ativar Nos Sindicatos:"
                outlined
                ></v-select>
            </div>

        </div>
        </v-app>

    </div>

</template>  

<style src="./NoticiasCadastro.scss" lang="scss"></style>
<script src="./NoticiasCadastro.js"></script>
