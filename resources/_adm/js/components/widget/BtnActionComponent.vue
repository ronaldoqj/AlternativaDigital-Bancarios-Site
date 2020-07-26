<template>
    <div class="component__btn--action">
        <a :href="link">
            <img src="/_adm/assets/SVGs/icon-mais.svg" class="img-fluid" onload="SVGInject(this)" />
            <p>{{ title }}</p>
        </a>
    </div>
</template>

<script>
  export default {
    data: () => ({
      
    }),
    props: {
      title: [ String ],
      link: [ String ],
      action: [ String ]
    }
  }
</script>

<style lang="scss">
  
  @import '~/../resources/_adm/sass/_vars.scss';

  .component__btn--action
  {
        text-align: center;

        a
        {
            text-align: center;
            svg {
                transition: $transition-normal;
            }

            p {
                font-size: 0.7em;
                color: $grey;
                margin: 0;
                transition: $transition-normal;
            }

            &:hover
            {
                svg {
                    
                    transform: rotate(360deg);

                    circle {
                        fill: $blue-light;
                    }
                }

                p {
                    color: $blue-light;
                }
            }
        }
      
  }
</style>