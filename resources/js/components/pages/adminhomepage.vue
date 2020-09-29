<template>
  <div class="main-body">
    <div class="row">
      <!-- Left Side (Side Bar) -->
      <div class="container left-side" :class="{'show': showSidebar}">
        <div class="control">
          <button class="btn" v-on:click="showNav">
            <i class="fas fa-angle-double-right"></i>
          </button>
        </div>
        <div class="navigation-icons">
          <span>
            <router-link to="/">
              <i class="fas fa-home"></i>
            </router-link>
          </span>
          <span>
            <i class="fas fa-user-circle"></i>
          </span>
          <span>
            <i class="fas fa-camera-retro"></i>
          </span>
          <span>
            <i class="fas fa-comment-dots"></i>
          </span>
          <span>
            <i class="fab fa-opencart"></i>
          </span>
        </div>
        <div class="navigation-links">
          <transition-group name="fade">
            <div v-show="showLink" key="1">
              <router-link to="/">Home</router-link>
            </div>
            <div v-show="showLink" key="2">Profile</div>
            <div v-show="showLink" key="3">Inventry</div>
            <div v-show="showLink" key="4">
              <router-link to="/store">Store</router-link>
            </div>
            <div v-show="showLink" key="5">Cart</div>
          </transition-group>
        </div>
      </div>
      <!-- Left side (sidebar) ends  -->

      <!-- Right hand side (Main View) -->
      <div class="right-side" :class="{'main': showMain}">
        <!-- Nav Bar -->
        <navmain></navmain>
        <!-- Nav Bar  Ends -->
        <!-- Router View for Admin -->
        <div class="router-view">
          <div class="container-90">
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <p>This is the admin page</p>
            <router-view></router-view>
          </div>
        </div>
        <!-- Router View for Admin Ends -->
      </div>
      <!-- Right hand side (Main View) Ends -->
    </div>
  </div>
</template>
<script>
import sidenav from "../adminsidenav";
import navmain from "../adminnav";
export default {
  components: {
    sidenav,
    navmain,
  },
  data() {
    return {
      showSidebar: false,
      showMain: false,
      showLink: false,
      hide: false,
    };
  },
  methods: {
    showNav() {
      if (this.showSidebar) {
        this.showLink = false;
        this.hide = true;
        setTimeout(() => {
          this.showSidebar = false;
          this.showMain = false;
        }, 500);
      } else {
        this.showSidebar = true;
        this.showMain = true;
        setTimeout(() => {
          this.showLink = true;
          this.hide = false;
        }, 500);
      }
    },
  },
};
</script>
<style lang="scss" scoped>
// Helper classes
.container-90 {
  width: 90%;
  margin: auto;
}
// Main body
.main-body {
  height: 100vh;
  overflow-y: hidden;
  overflow-x: hidden;
}
// Right Side (Main view)
.right-side {
  width: 91.5%;
  margin-left: 7%;
  transition: all 0.5s ease-in-out;

  &.main {
    margin-left: 20.2%;
    width: 78%;
  }

  .router-view {
    width: 100%;
    height: 83vh;
    overflow-y: scroll;
  }
}
// Right Side Media Query
@media screen and (min-width: 571px) and (max-width: 800px) {
  .right-side {
    width: 89%;
    margin-left: 9%;
    transition: all 0.5s ease-in-out;
    height: 100vh;

    &.main {
      margin-left: 25%;
      width: 72%;
    }
  }
}

@media screen and (max-width: 570px) {
  .right-side {
    width: 84%;
    margin-left: 12%;
    transition: all 0.5s ease-in-out;
    height: 100vh;

    &.main {
      margin-left: 26%;
      width: 70%;
    }
  }
}
// Side Bar
.container {
  position: absolute;
  top: 0;
  left: 0;
  width: 6%;
  padding: 1rem;
  min-height: 100vh;
  background-color: rgba($color: #00acee, $alpha: 0.8);
  border: solid #fff;
  border-width: 0 1px 0 0;
  border-top-right-radius: 10px;
  border-bottom-right-radius: 10px;
  z-index: 999;
  transition: all 0.5s ease-in-out;
  font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;

  .control {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 20px;
    margin-bottom: 10px;

    i {
      font-size: 4rem;
      cursor: pointer;
      transition: all 0.2s ease-in-out;
    }
  }
  &.show {
    width: 20%;

    .control > button {
      color: #fff;
      transform: rotateZ(-180deg);
    }

    .navigation-icons {
      color: #fff;

      a {
        color: #fff;
      }
      // &:hover{
      //   color: #222;
      // }
    }
  }

  .navigation-icons {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    // width: 50px;
    margin: 10% auto;
    float: left;

    span {
      font-size: 1.2rem;
      padding: 10px 0;
      cursor: pointer;
      transition: all 0.5s ease-in-out;

      &:hover {
        color: #fff;
      }

      a {
        color: #222;

        &:hover {
          color: #fff;
        }
      }
    }
  }
  .navigation-links {
    padding-top: 16%;
    padding-left: 20%;
    float: left;

    div {
      font-size: 1rem;
      padding-left: 10px;
      margin-bottom: 37%;
      cursor: pointer;

      &:hover {
        color: #fff;
      }

      a {
        color: #222;

        &:hover {
          color: #fff;
        }
      }
    }
  }
}

@mixin nav-childs($values...) {
  @each $var in $values {
    &:nth-child(#{$var}) {
      transition: tranform linear calc(0.1s * #{$var}), display 0.5s;
    }
  }
}
.fade-enter-active,
.fade-leave-active {
  @include nav-childs(1, 2, 3, 4, 5);
}
.fade-enter,
.fade-leave-to {
  transform: scale(0);
}
// Side Bar Media Queries
@media screen and (min-width: 571px) and (max-width: 800px) {
  .container {
    width: 8%;

    .control {
      i {
        font-size: 1rem;
      }
    }

    &.show {
      width: 25%;
    }

    .navigation-icons {
      span {
        font-size: 1rem;
      }
    }
    .navigation-links {
      padding-left: 10%;
      padding-top: 18%;
    }
  }
}

@media screen and (max-width: 570px) {
  .container {
    width: 10%;
    padding: 0.4rem !important;

    .control {
      i {
        font-size: 0.5rem;
      }
    }

    &.show {
      width: 25%;
    }

    .navigation-icons {
      span {
        font-size: 0.8rem;
        padding-left: -0.001rem;
      }
    }
    .navigation-links {
      padding-left: 3%;
      padding-top: 20%;
      div {
        font-size: 0.75rem;
        margin-bottom: 40%;
      }
    }
  }
}
</style>