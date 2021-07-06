<template>

    <div>
        <div class="row">
            <div class="col-12">
                <div class="box-btns">
                    <div class="item-btn" v-for="(item, key, index) in btnsTopBar" :key="index" style="display:flex">
                        <img v-if="index" src="/_adm/assets/SVGs/icon-arrow-right.svg" class="img-fluid" onload="SVGInject(this)" />
                        <a :href="item.link" >
                            <div class="box__buttons--access">
                                <img :src="item.icon" class="img-fluid" width="30" height="30" onload="SVGInject(this)" />
                                <p>{{item.title}}</p>
                            </div>
                        </a>
                    </div>

                    <slot></slot>
                </div>
            </div>
        </div>
    </div>

</template>  

<script>
export default {
    props: {
        /**
         * btnsTopBar
         * 
         * @property {object} btnsTopBar Conteiner object
         * @property {string} btnsTopBar.title texto com o nome do btn
         * @property {string} btnsTopBar.link  link para outra página
         * @property {string} btnsTopBar.icon  icon em .svg
         *
         * @property {Boolean} onlyIcon obriga o componente retornar apenas icones, ou seja, sem a estrutura html
         *                     contentora dos botões onde é renderizado o background e outros estilos da section bos botões
         */
        btnsTopBar: {
            type: Object,
            required: false
        },
        onlyIcon: {
            type: Boolean,
            required: false
        }
    }
}
</script>

<style lang="scss">
@import '~/../resources/_adm/sass/_vars.scss';
.box-btns {
    display: flex;
    justify-content: flex-start;
    flex-wrap: wrap;
    border: solid 1px $grey;
    padding: 10px 40px;
    border-radius: 40px;
    background-color: $blue;

    .item-btn {
        display: flex;
        margin: 0 5px;
    }

    a {
        .box__buttons--access
        {
            margin: 0 5px;
            text-align: center;

            svg { transition: $transition-normal; }
            p {
                font-size: 0.7em;
                color: $grey;
                margin: 0;
                transition: $transition-normal;
            }
        }

        &:hover
        {
            svg {
                transform: rotate(360deg);
                circle { fill: $blue-light; }
            }

            p { color: $blue-light; }
        }
    }
}
</style>
