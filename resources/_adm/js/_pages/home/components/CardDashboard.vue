
<template>
    <div class="component-card-dashboard">

        <a :href="params.link">
            <div class="icon">
                <div><img :src="params.icon" alt=""></div>
                <p>{{ params.title }}</p>
            </div>
        </a>

        <template v-if="showSubitem">
            <a :href="params.subItem.link">
                <div class="action">
                    <div class="box-img">
                        <img :src="params.subItem.icon" alt="">
                    </div>
                    <p>{{params.subItem.title}}</p>
                </div>
            </a>
        </template>
    
    </div>
</template>  

<script>
export default {
    data: () => {
        return {
            panel: [0, 1],
            showSubitem: true
        }
    },
    components: {  },
    props: [ 'params' ],
    methods: {
        
    },
    created()
    {
        
    },
    mounted()
    {
        if ( _.isEmpty(this.params.subItem) )
        {
            this.showSubitem = false;
        }
    }
}

</script>


<style lang="scss">
@import '~/../resources/_adm/sass/_vars.scss';
.component-card-dashboard
{
    width: fit-content;
    padding: 15px;
    position: relative;
    margin: 0 auto;
    border-radius: 10px;
    
    a
    {
        display: block;

        .icon
        {
            display: flex;
            margin: 0 auto;
            justify-content: center;
            align-content: center;
            flex-direction: column;
            text-align: center;
            background-color: $blue;
            border-radius: 50%;
            width: 95px;
            height: 95px;
            transition: $transition-normal;
            text-align: center;
            padding: 10px;

            img {
                width: 25px;
                height: 25px;
                margin-bottom: 5px;
            }

            p {
                color: white;
                font-size: 0.75em;
                padding: 0;
                margin: 0;
                line-height: 1em;
                
            }
        }

        &:hover .icon {
            transform: rotateY(360deg);
            background: $blue-light;
        }

        .action
        {
            display: flex;
            justify-content: center;
            flex-direction: column;
            margin-top: 20px;

            .box-img {
                text-align: center;
                margin-bottom: 3px;

                img {
                    width: 40px;
                    height: 40px;
                    transition: $transition-normal;
                    border-radius: 50%;
                }
            }

            p {
                color: $blue-light;
                transition: $transition-normal;
                text-align: center;
                padding: 0;
                margin: 0;
                font-size: 0.8em;
            }

            &:hover
            {
                .box-img img {
                    transform: rotate(360deg);
                    border: solid 2px $blue-strong;
                    box-sizing: border-box;
                }

                p {
                    color: $blue-strong;
                }
            }
        }
    }
}
</style>
