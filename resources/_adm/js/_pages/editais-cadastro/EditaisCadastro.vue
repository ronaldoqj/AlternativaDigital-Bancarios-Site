
<template>
    
    <div id="noticias-cadastro" class="container-fluid mt-10">

    <errors-component :objErrorsShow="errorsShow" @showErrorsChange="errorsShow.show = $event"></errors-component>

    <form :action="formAction" method="post" @submit="checkForm" enctype="multipart/form-data">

        <input type="hidden" name="_token" :value="csrf">
        <input type="hidden" name="ativar" :value="ativar" />
        <input type="hidden" name="id" :value="id" />

        <div class="row">
            <div class="col-3" :class="borderFields.dataDaInclusao">
                <v-dialog
                    ref="dialog1"
                    v-model="dateTimeInputs.dates.dataDaInclusao.modal"
                    :return-value.sync="dateTimeInputs.dates.dataDaInclusao.date"
                    persistent
                    width="290px"
                    >
                    <template v-slot:activator="{ on, attrs }">
                        <v-text-field
                            name="dataInclusao"
                            v-model="dateTimeInputs.dates.dataDaInclusao.date"
                            label="Data Inclusão:"
                            dense="dense"
                            prepend-inner-icon="event"
                            readonly
                            v-bind="attrs"
                            v-on="on"
                            outlined>
                        </v-text-field>
                    </template>
                    <v-date-picker v-model="dateTimeInputs.dates.dataDaInclusao.date" scrollable>
                        <v-spacer></v-spacer>
                        <v-btn text color="primary" @click="dateTimeInputs.dates.dataDaInclusao.modal = false">Cancelar</v-btn>
                        <v-btn text color="primary" @click="$refs.dialog1.save(dateTimeInputs.dates.dataDaInclusao.date)">OK</v-btn>
                    </v-date-picker>
                </v-dialog>
            </div>

            <div class="col-3" :class="borderFields.dataLimiteNoDestaque">
                <v-dialog
                    ref="dialog2"
                    v-model="dateTimeInputs.dates.limiteNoDestaque.modal"
                    :return-value.sync="dateTimeInputs.dates.limiteNoDestaque.date"
                    persistent
                    width="290px"
                    >
                    <template v-slot:activator="{ on, attrs }">
                        <v-text-field
                            name="dataLimiteNoDestaque"
                            v-model="dateTimeInputs.dates.limiteNoDestaque.date"
                            label="Limite No Destaque:"
                            dense="dense"
                            prepend-inner-icon="event"
                            readonly
                            v-bind="attrs"
                            v-on="on"
                            outlined
                            clearable
                        ></v-text-field>
                    </template>
                    <v-date-picker v-model="dateTimeInputs.dates.limiteNoDestaque.date" scrollable>
                        <v-spacer></v-spacer>
                        <v-btn text color="primary" @click="dateTimeInputs.dates.limiteNoDestaque.modal = false">Cancelar</v-btn>
                        <v-btn text color="primary" @click="$refs.dialog2.save(dateTimeInputs.dates.limiteNoDestaque.date)">OK</v-btn>
                    </v-date-picker>
                </v-dialog>
            </div>

            <div class="col-2" :class="borderFields.horaLimiteNoDestaque">
                <v-dialog
                    ref="dialog3"
                    v-model="dateTimeInputs.times.limiteDestaque.modal"
                    :return-value.sync="dateTimeInputs.times.limiteDestaque.time"
                    persistent
                    width="290px"
                >
                    <template v-slot:activator="{ on, attrs }">
                    <v-text-field
                        name="horaLimiteNoDestaque"
                        v-model="dateTimeInputs.times.limiteDestaque.time"
                        label="Limite Hora:"
                        dense="dense"
                        prepend-inner-icon="access_time"
                        readonly
                        v-bind="attrs"
                        v-on="on"
                        outlined
                        clearable
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

            <div class="col-1 switch-ativar-noticia text-center">
                <p>Ativar Notícia</p>
                <v-switch v-model="ativar" class="ma-4"></v-switch>
            </div>

            <div class="col-3">
                <v-select
                name="ativarNosSindicatos"
                label="Ativar nos Sindicatos:"
                v-model="form.selectSindicato"
                :items="sindicatos"
                dense="dense"
                color="primary"
                outlined
                clearable
                ></v-select>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-12">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-8 col-box-files" :class="borderFields.bannerDestaque">
                            <label>Banner Destaque</label>
                            <div class="box-files">

                                <template v-if="fileBannerIsEdit != ''">
                                    <div class="box-image">
                                        <img :src="fileBannerIsEdit" class="img-fluid" alt="">
                                        <p><v-btn depressed small color="error" @click="fileBannerIsEdit = ''">Excluir</v-btn></p>
                                    </div>
                                </template>
                                <template v-else>
                                    <v-file-input name="bannerDestaque"
                                        v-model="filesBannerDestaque"
                                        label="Banner Destaque:"
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
                        <div class="col-4" :class="borderFields.creditoBannerDestaque">
                            <div class="credito-da-imagem"></div>
                            <v-text-field
                                v-model="dataInputs.creditoBannerDestaque"
                                name="creditoBannerDestaque"
                                label="Crédito da Imagem:"
                                placeholder="Crédito da Imagem"
                                dense="dense"
                                maxlength="240"
                                counter="240"
                                outlined
                                clearable
                            ></v-text-field>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row"><div class="col"><hr mt-5 mb-5></div></div>

        <div class="row inputs-finais-to-all-types">
            <div class="col-8" :class="borderFields.cartola">
                <v-text-field
                    v-model="dataInputs.cartola"
                    name="cartola"
                    label="Cartola:"
                    dense="dense"
                    maxlength="240"
                    counter="240"
                    outlined
                    clearable
                ></v-text-field>
            </div>
            <div class="col-4" :class="borderFields.tags">
                <v-text-field
                    v-model="dataInputs.tags"
                    name="tags"
                    label="Tag's:"
                    dense="dense"
                    maxlength="240"
                    counter="240"
                    outlined
                    clearable
                ></v-text-field>
            </div>
        </div>

        <div class="row inputs-finais-to-all-types">
            <div class="col-12" :class="borderFields.titulo">
                <v-textarea
                v-model="dataInputs.titulo"
                name="titulo"
                label="Título do Edital:"
                dense="dense"
                height="90"
                maxlength="240"
                counter="240"
                outlined
                clearable
                ></v-textarea>
            </div>
        </div>

        <div class="row inputs-finais-to-all-types">
            <div class="col-12" :class="borderFields.linhaDeApoio">
                <v-textarea
                v-model="dataInputs.linhaDeApoio"
                name="linhaDeApoio"
                label="Linha de Apoio:"
                dense="dense"
                height="90"
                maxlength="240"
                counter="240"
                outlined
                clearable
                ></v-textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-box-files" :class="borderFields.file">
                            <label>Arquivo PDF</label>
                            <div class="box-files">
                                <template v-if="fileFileIsEdit != ''">
                                    <div class="box-image box-file">
                                        <p class="icon-file"><span class="material-icons"> picture_as_pdf </span></p>
                                        <a :href="fileFileIsEdit" target="_blank">{{this.fileFileName}}</a>
                                        <p><v-btn depressed small color="error" @click="fileFileIsEdit = ''">Excluir</v-btn></p>
                                    </div>
                                </template>
                                <template v-else>
                                    <v-file-input
                                        name="file"
                                        v-model="filesFile"
                                        label="Arquivo PDF:"
                                        placeholder="Procurar Arquivo"
                                        prepend-icon=""
                                        prepend-inner-icon="picture_as_pdf"
                                        dense="dense"
                                        color="primary"
                                        counter
                                        multiple
                                        accept=".pdf"
                                        outlined
                                        :show-size="1000"
                                    >
                                        <template v-slot:selection="{ index, text }">
                                        <v-chip v-if="index < 2" color="primary" dark label small >
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

        <div class="row mt-5">
            <div class="col-12">
                <v-btn type="submit" class="btn-cadastrar" block rounded dark>{{valueBtnSubmit}}</v-btn>
            </div>
        </div>
    </form>  
    </div>
</template>  

<style src="./EditaisCadastro.scss" lang="scss"></style>
<script src="./EditaisCadastro.js"></script>
