<template>
  <div class="row login-body">
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
                    <span class="card-title">LaraBlog </span>
                    <div class="col"></div>
                  </div>
                  <div class="row">
                    <div class="col"></div>
                    <span class="card-title">Signin </span>
                    <div class="col"></div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <!-- Login Form -->
                <form>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input
                      type="email"
                      class="form-control"
                      id="exampleInputEmail1"
                      aria-describedby="emailHelp"
                    />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" />
                  </div>
                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                  </div>
                  <div class="row">
                    <div class="col"></div>
                    <a href="#!" class="btn btn-outline-primary">Login</a>
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
export default {};
</script>
<style scoped>
.login-body {
  background-image: url(/imgs/books.jpg);
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
.card-title{
    font-size: 1.3rem;
    font-weight: bold;
    letter-spacing: 1px;
    /* text-transform: uppercase; */
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    margin: 3% auto;
}
</style>