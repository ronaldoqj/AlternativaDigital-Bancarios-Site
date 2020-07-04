
<template>

    <div class="component--btn__icon--text" :class="{selected: params.selected}">
        <div class="image"><img :src="params.icon" class="img-fluid" onload="SVGInject(this)" /></div>
        <div class="text">{{params.text}}</div>
    </div>

</template>  


<style src="./BtnIconText.scss" lang="scss"></style>
<script src="./BtnIconText.js"></script>
