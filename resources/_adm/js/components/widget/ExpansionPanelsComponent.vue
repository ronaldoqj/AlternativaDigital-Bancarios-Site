<template>
    <div class="component__expancion-panel">
        <v-expansion-panels :flat="flat">
            <v-expansion-panel>
                <v-expansion-panel-header>
                    {{ title }}
                    <template v-slot:actions>
                        <v-icon color="primary">$expand</v-icon>
                    </template>
                </v-expansion-panel-header>
                <v-expansion-panel-content>
                    <slot></slot>
                </v-expansion-panel-content>
            </v-expansion-panel>
        </v-expansion-panels>
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
         */
        btnsTopBar: {
            type: Object,
            required: false
        },
        title: {
            type: String,
            required: true
        },
        flat: {
            type: Boolean,
            require: false
        }
    }
}
</script>

<style lang="scss" scoped>
@import '~/../resources/_adm/sass/_vars.scss';
// .component__expancion-panel {
//     .v-item--active {
//         .v-icon {
//             transform: rotate(-90deg) !important;
//         }
//     }
// }
</style>
