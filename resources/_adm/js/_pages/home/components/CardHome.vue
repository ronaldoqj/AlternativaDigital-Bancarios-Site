
<template>
    <div class="component-card-home">

        <a :href="params.link">
            <div class="header" :style="bannerHeader">
                <!-- <img :src="params.logo" alt=""> -->
                <div class="logo" :style="{backgroundImage: 'url(' + params.logo + ')' }"></div>
            </div>
            <div class="body">
                <p>{{ params.title }}</p>
            </div>
        </a>

    </div>
</template>  

<script>
export default {
    props: [ 'params' ],
    data: () => {
        return {
            bannerHeader: null
        }
    },
    created()
    {
        if (this.params.banner)
        {
            this.bannerHeader = {
                backgroundImage: `url(${this.params.banner})`
            }
        }
    }
}
</script>

<style lang="scss">
@import '~/../resources/_adm/sass/_vars.scss';
.component-card-home
{
    position: relative;
    
    a {
        text-align: center;
        display: block;
        text-decoration: none;

        .header
        {
            margin: 0 auto;
            padding: 15px 20px;
            height: 160px;
            max-width: 400px;
            border-radius: 3px;
            text-align: center;
            background-color: $blue;
            background-size: cover;
            background-position: center;

            transition: $transition-normal;

            .logo {
                width: 100%;
                height: 100%;
                background-size: contain;
                background-position: center;
            }
        }

        .body
        {    
            p {
                font-family: "Anton", sans-serif;
                color: $blue-strong;
                font-size: 1.1em;
                padding: 10px;
                line-height: 1.1em;
                text-align: center;
                margin: 0;
                padding-bottom: 0;
            }
        }

        &:hover .header {
            max-width: 430px;
            margin-top: -10px;
            margin-bottom: 10px;
            box-shadow: 0px 5px 15px rgba(0,0,0, 0.4);
        }
    }
}
</style>
