
<template>
    
    <div id="noticias-cadastro" class="container-fluid">

    <errors-component :objErrorsShow="errorsShow" @showErrorsChange="errorsShow.show = $event"></errors-component>

    <form :action="formAction" method="post" @submit="checkForm" enctype="multipart/form-data">

        <input type="hidden" name="_token" :value="csrf">
        <input type="hidden" name="tipoDaNoticia" :value="btnTipoNoticiaSelecionado" />
        <input type="hidden" name="ativarNoticia" :value="ativarNoticia" />
        <input type="hidden" name="idNoticia" :value="idNoticia" />

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
                        <v-btn text color="primary" @click="dateTimeInputs.dates.dataDaInclusao.modal = false">Cancel</v-btn>
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
                        ></v-text-field>
                    </template>
                    <v-date-picker v-model="dateTimeInputs.dates.limiteNoDestaque.date" scrollable>
                        <v-spacer></v-spacer>
                        <v-btn text color="primary" @click="dateTimeInputs.dates.limiteNoDestaque.modal = false">Cancel</v-btn>
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

            <div class="col-1 switch-ativar-noticia">
                <p>Ativar Notícia</p>
                <v-switch v-model="ativarNoticia" class="ma-4"></v-switch>
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
                            ></v-text-field>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 col-box-files" :class="borderFields.imagemDestaque">
                            <label>Imagem Destaque</label>
                            <div class="box-files">
                                <template v-if="fileImagemIsEdit != ''">
                                    <div class="box-image">
                                        <img :src="fileImagemIsEdit" class="img-fluid" alt="">
                                        <p><v-btn depressed small color="error" @click="fileImagemIsEdit = ''">Excluir</v-btn></p>
                                    </div>
                                </template>
                                <template v-else>
                                    <v-file-input
                                        name="imagemDestaque"
                                        v-model="filesImagemDestaque"
                                        label="Imagem Destaque:"
                                        placeholder="Procurar Imagem"
                                        prepend-icon=""
                                        prepend-inner-icon="image"
                                        dense="dense"
                                        color="primary"
                                        counter
                                        multiple
                                        accept="image/png, image/jpeg, image/bmp"
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
                        <div class="col-6" :class="borderFields.creditoImagemDestaque">
                            <div class="credito-da-imagem"></div>
                            <v-text-field
                                v-model="dataInputs.creditoImagemDestaque"
                                name="creditoImagemDestaque"
                                label="Crédito da Imagem:"
                                placeholder="Crédito da Imagem"
                                dense="dense"
                                maxlength="240"
                                counter="240"
                                outlined
                            ></v-text-field>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-box-files" :class="borderFields.filePodcast">
                            <label>Mp3 Podcast</label>
                            <div class="box-files">

                                <template v-if="filePodcastIsEdit != ''">
                                    <div class="box-image">
                                        <audio controls>
                                            <source :src="filePodcastIsEdit" type="audio/mpeg">
                                            Seu navegador de internet não suporta o elemento do tipo audio.
                                        </audio>
                                        <p><v-btn depressed small color="error" @click="filePodcastIsEdit = ''">Excluir</v-btn></p>
                                    </div>
                                </template>
                                <template v-else>
                                    <v-file-input
                                        name="filePodcast"
                                        label="Mp3 Podcast:"
                                        placeholder="Procurar Audio"
                                        prepend-icon=""
                                        prepend-inner-icon="mic_none"
                                        v-model="filesPodcast"
                                        dense="dense"
                                        color="primary"
                                        counter
                                        multiple
                                        accept="audio/mpeg"
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

        <div class="row">
            <div class="col-12">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-box-files" :class="borderFields.videoYoutube">
                            <label>Vídeo Youtube</label>
                            <div class="box-files">
                                <v-text-field
                                    v-model="dataInputs.youtube"
                                    name="videoYoutube"
                                    label="Código do Vídeo:"
                                    dense="dense"
                                    prepend-inner-icon="videocam"
                                    maxlength="240"
                                    counter="240"
                                    outlined
                                ></v-text-field>
                                <div class="youtube-exmaple-code">
                                    https://www.youtube.com/embed/<span>zpORURyy-n8?rel=0</span>
                                </div>
                            </div>
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
                ></v-text-field>
            </div>
        </div>

        <div class="row inputs-finais-to-all-types">
            <div class="col-12" :class="borderFields.tituloDaNoticia">
                <v-textarea
                v-model="dataInputs.tituloDaNoticia"
                name="tituloDaNoticia"
                label="Título da Notícia:"
                dense="dense"
                height="90"
                maxlength="240"
                counter="240"
                outlined
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
                ></v-textarea>
            </div>
        </div>

        <!-- <div class="row inputs-finais-to-all-types">
            <div class="col-12" :class="borderFields.texto">
                <v-textarea
                v-model="dataInputs.texto"
                name="texto"
                label="Texto:"
                dense="dense"
                counter="240"
                outlined
                ></v-textarea>

                <ckeditor v-model="dataInputs.texto"></ckeditor>
            </div>
        </div> -->











        <div class="row">
            <div class="col-12">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-box-files" :class="borderFields.texto">
                            <label>Texto</label>
                            <div class="box-files ckeditor">

                                <ckeditor v-model="dataInputs.texto"></ckeditor>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>







        <div class="row inputs-finais-to-all-types">
            <div class="col-12" :class="borderFields.jornalistaResponsavel">
                <v-text-field
                    v-model="dataInputs.jornalistaResponsavel"
                    name="jornalistaResponsavel"
                    label="Jornalista Responsável:"
                    dense="dense"
                    maxlength="240"
                    counter="240"
                    outlined
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

<style src="./NoticiasCadastro.scss" lang="scss"></style>
<script src="./NoticiasCadastro.js"></script>
