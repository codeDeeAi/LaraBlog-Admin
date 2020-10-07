<template>
  <div class="login-body">
    <div class="container-fluid">
      <div class="container">
        <div class="row">
          <div class="col"></div>
          <!-- Login Card Container -->
          <div class="col-md-6 col-sm-12">
            <div class="card">
              <div class="row">
                <div class="container">
                  <div class="row">
                    <div class="col"></div>
                    <img src="/imgs/lg.png" class="img-fluid" alt />
                    <div class="col"></div>
                  </div>
                  <div class="row">
                    <div class="col"></div>
                    <span class="card-title">LaraBlog</span>
                    <div class="col"></div>
                  </div>
                  <div class="row">
                    <div class="col"></div>
                    <span class="card-title">Signin</span>
                    <div class="col"></div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <!-- Login Form -->
                <form>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" v-model="data.email" required />
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" v-model="data.password" required />
                  </div>
                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" />
                    <label class="form-check-label">Remember Me</label>
                  </div>
                  <div class="row">
                    <div class="col"></div>
                    <button  class="btn btn-outline-primary" :disabled="isloading" :loading="isloading" @click.prevent="login">{{isloading ? 'loading' : 'Login '}} </button>
                    <div class="col"></div>
                  </div>
                </form>
                <!-- Login form ends -->

                <a href="#!">Forgot Password?</a>
                <a href="#!">New User? Sign Up</a>
              </div>
            </div>
          </div>
          <!-- Login Card Container -->
          <div class="col"></div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      data: {
        email: "",
        password: "",
      },
      isloading: false,
    };
  },
  methods: {
    validEmail(email){
      let re =/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/;
      return re.test(email);
    },
    async login(){
      // Call api here
        const res = await this.callApi(
                        'post',
                        'app/admin_login',
                        this.data
                    );
       if (this.data.email.trim()=='') {
        this.toast('Email is required !','error')
      }else if (!this.validEmail(this.data.email)){
        this.toast('Enter Valid email !','error')
      }else if (this.data.password.trim()==''){
        this.toast('Password is required !','error')
      }else if (this.data.password.length < 6){
        this.toast('Incorrect password  !','error')
      }else{  
        this.isloading = true;      
                  if (!res.status==200) {
                      var errs =res.data.message;
                      for (let i in errs) {
                        var err = errs;
                      this.toast(err, 'error');                        
                      }
                  }else if(res.status==401){
                      var errs =res.data.message;
                      for (let i in errs) {
                        var err = errs;
                      this.toast(err, 'error');                        
                      }                   
                      }else{
                    var errs =res.data.message;
                    for (let i in errs) {
                        var err = errs;
                      this.toast(err, 'error');                        
                      }                
                  }

                  this.isloading = true; 
      }
    }
  },
};
</script>
<style scoped>
.login-body {
  background-image: url(/imgs/books.jpg);
  background-size: cover;
  padding-top: 5%;
  height: 100vh;
}
.login-body .container-fluid .container .card {
  margin: 5% auto;
  padding: 8%;
  border-radius: 2%;
  -webkit-box-shadow: 10px 10px 8px 0px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: 10px 10px 8px 0px rgba(0, 0, 0, 0.75);
  box-shadow: 10px 10px 8px 0px rgba(0, 0, 0, 0.75);
}
.login-body .container-fluid .container .card img {
  width: 100px;
  height: 100px;
  border-radius: 50%;
}
.card-title {
  font-size: 1.3rem;
  font-weight: bold;
  letter-spacing: 1px;
  /* text-transform: uppercase; */
  font-family: Verdana, Geneva, Tahoma, sans-serif;
  margin: 3% auto;
}
</style>