<template>
  <div>
    <!-- Preloader  -->
    <loader v-if="!spin"></loader>
    <!-- Preloader Ends -->
    <div class="mail-table">
      <h4 class="card-title">All Mail</h4>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col">Date</th>
            <th scope="col">E-Mail</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">30/09/2020</th>
            <td>johnee@gmail.com</td>
            <td>Login Error</td>
            <td>Can not access account?</td>
            <td>
              <button type="button" class="btn btn-dark">View</button>
              <button type="button" class="btn btn-danger">Delete</button>
            </td>
          </tr>
          <tr>
            <th scope="row">30/09/2020</th>
            <td>johnee@gmail.com</td>
            <td>Login Error</td>
            <td>Can not access account?</td>
            <td>
              <button type="button" class="btn btn-dark">View</button>
              <button type="button" class="btn btn-danger">Delete</button>
            </td>
          </tr>
          <tr>
            <th scope="row">30/09/2020</th>
            <td>johnee@gmail.com</td>
            <td>Login Error</td>
            <td>Can not access account? </td>
            <td>
              <button type="button" class="btn btn-dark">View</button>
              <button type="button" class="btn btn-danger">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
<script>
import loader from "./loader";
export default {
  components:{
    loader
  },
  data(){
    return{
      spin: false,
    }
  },
  mounted(){
    this.spin = true;
  }
};
</script>
<style lang="scss" scoped>
</style>