<template>
 <header>               
     
    <div class="container" :class="{'show': showSidebar}" v-on:click="showNav">
      <div class="control">
        <button class="btn" >
          <i  class="fas fa-angle-double-right"></i>
        </button>
      </div>
      <div class="navigation-icons">
        <span><router-link to="/"><i class="fas fa-home"></i></router-link></span>
        <span><i class="fas fa-user-circle"></i></span>
        <span><i class="fas fa-camera-retro"></i></span>
        <span><i class="fas fa-comment-dots"></i></span>
        <span><i class="fab fa-opencart"></i></span>
      </div>
      <div class="navigation-links">
          <transition-group name="fade">
              <div v-show="showLink" key="1"><router-link to="/">Home</router-link></div>
              <div v-show="showLink" key="2">Profile</div>
              <div v-show="showLink" key="3">Inventry</div>
              <div v-show="showLink" key="4"><router-link to="/store">Store</router-link></div>
              <div v-show="showLink" key="5">Cart</div>
          </transition-group>
      </div>
      
        
       
        
  </div>
         <float v-on:click="go()" id="goUp"></float>

 </header>
</template>

<script>


export default {
  components: {
  },
  data () {
    return {
       showSidebar: false,
       showLink: false,
       hide: false
    }
  },

  methods: {
    go(){
      return up;
    },
    showNav(){
      if(this.showSidebar){
          this.showLink = false;
          this.hide = true;
          setTimeout(() => {
              this.showSidebar = false;
          }, 500);
      }
      else{
            this.showSidebar = true;
            setTimeout(() => {
              this.showLink = true;
              this.hide = false;
          }, 500);
      }
    }
  },

}
</script>

<style lang="scss" scoped>
    .container {
      position: absolute;
      top: 0;
      left: 0;
      width: 8%;
      padding: 1rem;
      min-height: 100vh;
      background-color: rgba($color: #00ACEE, $alpha: .8);
      border: solid #fff;
      border-width: 0 1px 0 0;
      border-top-right-radius: 10px;
      border-bottom-right-radius: 10px;
      z-index: 999;
      transition: all .5s ease-in-out; 
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; 

          .control{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 20px;
            margin-bottom: 10px;

              i{
                  font-size: 4rem;
                  cursor: pointer;
                  transition: all .5s ease-in-out;
                }
            }
            &.show{
                    width: 100%;

                      .control > button{
                          color:#fff;
                          transform: rotateZ(-180deg);
                        }

                      .navigation-icons{
                              color: #fff;

                                a{
                                  color: #fff;
                                }
                              // &:hover{
                              //   color: #222;
                              // }
                            }

                  }              
                  

            .navigation-icons{
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                // width: 50px;
                margin: 10% auto ;
                float: left;
                
                    span {
                        font-size: 2rem;
                        padding: 10px 0;
                        cursor: pointer;
                        transition: all .5s ease-in-out;

                            &:hover{
                                color: #fff;
                                }  

                           a{
                              color: #222;
                              
                               &:hover{
                                color: #fff;
                                } 
                           }     
                      }
                }
          .navigation-links{
            padding-top: 16%;
            padding-left: 20%;
            float: left;

              div{
                font-size: 1.45rem;
                padding-left: 10px;
                margin-bottom: 37%;
                cursor: pointer;

                  &:hover{
                    color: #fff;
                  }

                  a{
                       color: #222;
                             
                         &:hover{
                                color: #fff;
                                } 
                           }   

              }
          } 
          .profile{
                padding: 10% 5%;



                        img{
                            border: 1px solid white;
                            left: calc(50% -50%);
                            border-radius: 50%;
                            width: 50px;
                            height: 50px;
                            
                          }
              }
              
            
    } 

    @mixin nav-childs($values...){
            @each $var in $values{
              &:nth-child(#{$var}){
                transition: tranform linear calc(.1s * #{$var}), display .5s;
              }
            }
          } 
    .fade-enter-active, .fade-leave-active{
      @include nav-childs(1,2,3,4,5);
    }
    .fade-enter, .fade-leave-to{
      transform: scale(0);
    }
    @media screen and (min-width: 571px) and (max-width: 800px ){
      .container{
        width: 10%;

        .control{

          i{
            font-size: 2rem;
          }
        }

            &.show{
              width: 28%;
            }

      .navigation-icons{
        span{
          font-size: 2rem;
        }
      }
      .navigation-links{
        padding-left:10%;
        padding-top:18% ;

          
      }


      }
    }

    @media screen and (max-width: 570px){
      .container{
        width: 13%;

        .control{

          i{
            font-size: 1.35rem;
          }
        }

            &.show{
              width: 32%;
            }

      .navigation-icons{
        span{
          font-size: 1.35rem;
          padding-left: 0.001rem;
        }
      }
      .navigation-links{
        padding-left:5%;
        padding-top:23% ;
            div{
              font-size: 1rem;
              margin-bottom: 44%;
            }
          
      }


      .profile{
                padding: 10% 5%;



                        img{
                            border: 1px solid white;
                            left: calc(50% -50%);
                            border-radius: 50%;
                            width: 35px;
                            height: 35px;
                            
                          }
              }
              
            .profile-body,
            .status{
              font-size: 0.7rem;
            }

      }

    }
</style>

