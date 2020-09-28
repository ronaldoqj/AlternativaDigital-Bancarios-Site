
<template>
    
    <div id="entidades-parceiras" class="container-fluid mt-10">

    <errors-component :objErrorsShow="errorsShow" @showErrorsChange="errorsShow.show = $event"></errors-component>

    <form :action="formAction" method="post" @submit="checkForm" enctype="multipart/form-data">

        <input type="hidden" name="_token" :value="csrf">
        <input type="hidden" name="id" :value="id" />

        <hr>

        <div class="row">
            <div class="col-12">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-box-files" :class="borderFields.entidadeParceira">
                            <label>Logo</label>
                            <div class="box-files">

                                <template v-if="fileIsEdit != ''">
                                    <div class="box-image">
                                        <img :src="fileIsEdit" class="img-fluid" alt="">
                                        <p><v-btn depressed small color="error" @click="fileIsEdit = ''">Excluir</v-btn></p>
                                    </div>
                                </template>
                                <template v-else>
                                    <v-file-input name="file"
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

<style src="./EntidadesParceirasCadastro.scss" lang="scss"></style>
<script src="./EntidadesParceirasCadastro.js"></script>
