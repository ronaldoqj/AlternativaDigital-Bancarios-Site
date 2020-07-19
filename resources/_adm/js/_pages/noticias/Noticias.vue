
<template>
    
    <div id="noticias-cadastro" class="container-fluid">

        <noticias-header />
        <noticias-list />

    </div>

</template>  

<script>

import NoticiasHeader from './components/noticias-header.vue';
import NoticiasList from './components/noticias-list.vue';

export default {
    data () {
        return {

        }
    },
    components: { NoticiasHeader, NoticiasList },
    methods: {

    },
    created()
    {
     
    },
}


</script>

<style lang="scss">
</style>
