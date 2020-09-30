<template>
  <div>
    <!-- Preloader  -->
    <loader v-if="!spin"></loader>
    <!-- Preloader Ends -->
    <div class="users-table">
      <h4 class="card-title">All Users</h4>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col">Date Joined</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">30/09/2020</th>
            <td>John Doe</td>
            <td>Johnee@gmail.com</td>
            <td>
              <button type="button" class="btn btn-dark">View</button>
              <button type="button" class="btn btn-info">Password Reset</button>
              <button type="button" class="btn btn-danger">Delete</button>
            </td>
          </tr>
          <tr>
            <th scope="row">30/09/2020</th>
            <td>John Doe</td>
            <td>Johnee@gmail.com</td>
            <td>
              <button type="button" class="btn btn-dark">View</button>
              <button type="button" class="btn btn-info">Password Reset</button>
              <button type="button" class="btn btn-danger">Delete</button>
            </td>
          </tr>
          <tr>
            <th scope="row">30/09/2020</th>
            <td>John Doe</td>
            <td>Johnee@gmail.com</td>
            <td>
              <button type="button" class="btn btn-dark">View</button>
              <button type="button" class="btn btn-info">Password Reset</button>
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