
<template>
    <div id="page-internas" class="container-fluid">
        <pages-menu-bar :btns-top-bar="makeBtnsBarTop()"></pages-menu-bar>

        <errors-component :objErrorsShow="errorsShow" @showErrorsChange="errorsShow.show = $event"></errors-component>

        <form :action="formAction" method="post" @submit="checkForm" enctype="multipart/form-data">
            <input type="hidden" name="_token" :value="csrf">
            <input type="hidden" name="entity" :value="entity" />
            <input type="hidden" name="fetrafi" :value="fetrafi" />

            <input type="hidden" id="texto" name="texto" v-model="dataInputs.texto" />

            <!-- Texto (ckeditor) -->
            <div class="row">
                <div class="col-12">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-box-files" :class="borderFields.texto">
                                <label>Texto</label>
                                <div id="ckeditor" class="box-files ckeditor">
                                    <!-- <ckeditor v-model="dataInputs.texto"></ckeditor> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="row mt-5">
                <div class="col-12">
                    <v-btn type="submit" class="btn-cadastrar" block rounded dark>{{valueBtnSubmit}}</v-btn>
                </div>
            </div>
        </form>  
    </div>
</template>  

<script>
export default {
    props: [
        'formAction',
        'csrf',
        'data'
    ],
    data() {
        return {
            /**
             * Campos Hiden
             */
            entity: '',
            fetrafi: '',
            valueBtnSubmit: 'Atualizar',

            // variavel necessária para o component de mensagens de erro
            errorsShow: {
                show: false,
                title: 'Não foi possivel realizar a Edição!',
                errors: []
            },

            borderFields: {},

            dataInputs: {
                texto: ''
            }
        }
    },
    methods: {
        checkForm: function (e)
        {
            this.dataInputs.texto = textoCkeditor.getData();
        },
        editStartCompleteFilds( data )
        {
            console.log('testestess', data);
            this.entity = data.id;
            this.fetrafi = data.fetrafi;

            // Seta a gambiarra do ckeditor
            // Para funcionar precisa atualizar o conteúdo após 1seg.
            // Caso contrário o vue não reconhece a variavel criada no JS
            setTimeout(function(){
                textoCkeditor.setData(data.texto);
            }, 1500);
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
                }
            }

            return btnsBarTop;
        }
    },
    mounted()
    {
        this.editStartCompleteFilds( JSON.parse(this.data));
    }
}
</script>

<style lang="scss">
@import '~/../resources/_adm/sass/_vars.scss';
#page-internas
{    
    .col-box-files
    {
        padding: 0;
        padding-right: 0;

        >label {
            font-size: 0.8em;
            margin-left: 10px;
            margin-bottom: 0;
        }

        .box-files {
            border: solid 1px $grey;
            border-radius: 10px;
            padding: 20px 15px;

            .box-image
            {
                text-align: center;

                img {
                    height: 100px;
                    margin-top: -20px;
                }

                audio { margin-top: -15px; }
                p { margin: 5px 0 0; }
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
        .box-files {
            border-color: #53A6D8;
            transition: $transition-normal ease;
            animation: shadowEfectBorder 1s;
            animation-fill-mode: forwards;

            &.ckeditor {
                padding: 5px;
                border-radius: 5px;
            }
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
    0% {
        box-shadow: 0px 0px 15px 0px #53A6D8;
    }
    100% {
        box-shadow: 0px 0px 0px 0px #53A6D8;
    }
}
</style>
