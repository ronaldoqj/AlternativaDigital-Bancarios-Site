<template>
    <div class="form-errors" :class="[showErrors(), displayNone]">
        <div class="box">
            <div class="icon-delete" @click="close()"><span class="material-icons">delete</span></div>
            <div class="header">
                <div class="titulo">
                    {{ objErrorsShow.title }}
                </div>
            </div>
            
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col">

                          <ul>
                              <li v-for="item in objErrorsShow.errors" :key="item.title">
                                  <code>{{item.title}}</code> - {{item.description}}
                              </li>
                          </ul>

                        </div>
                    </div>
                </div>
            </div>

            <div class="footer"></div>
        </div>
    </div>
</template>

<script>
  export default {
      data: () => ({
          displayNone : ''
      }),
      props: ['objErrorsShow'],
      methods: {
          showErrors()
          {
            setTimeout(()=> {

                this.displayNone ? 'display-none' : '';
              
            }, 2000);
            
            return this.objErrorsShow.show ? 'show' : 'hiden';
          },
          close()
          {
            this.$emit('showErrorsChange', false)
          }
      }
  }
</script>

<style lang="scss">
.form-errors
{
    margin-top: -100%;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    //background-color: rgba(254, 62, 62, 0.2);
    background-color: rgba(255, 255, 255, 0.7);
    border-radius: 0 0 5px 5px;
    z-index: 90;
    max-height: 100%;
    overflow-y: auto;

    box-shadow: 0px 0px 13px 0px #721B1B;
    transition: ease-out 0.5s;

    &.show {
        margin-top: 0;
    }

    &.hiden {
      margin-top: -100%;
      transition: ease-in 0.5s;
    }

    &.display-none {
        display: none;
    }

    .box
    {
        color: #721B1B;

        .icon-delete {
            position: absolute;
            right: 10px;
            top: 10px;
            transition: ease 0.4s;
            cursor: pointer;

            &:hover {
                color: black;
            }
        }

        .header {
            padding: 10px 15px;
            background-color: rgba(254, 62, 62, 0.2);
            box-shadow: 0px 0px 8px 0px #721B1B;

            .titulo {
                font-size: 1.5em;
                text-align: center;
            }
        }
        .content {
            padding: 15px 20px;
            color: black;

            ul {
              list-style: none;
            }
        }
    }

    .footer {
        background-color: rgba(254, 62, 62, 0.8);
        height: 10px;
    }

}
</style>
