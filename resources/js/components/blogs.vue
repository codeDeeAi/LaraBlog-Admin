<template>
  <div>
    <!-- Preloader  -->
    <loader v-if="!spin"></loader>
    <!-- Preloader Ends -->
    <div class="blogs-table">
      <h4 class="card-title">All Blogs</h4>
      <table class="table table-borderless table-hover table-responsive-lg">
        <thead>
          <tr>
            <th scope="col">Date</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">30/09/2020</th>
            <td>Love originates from the heart</td>
            <td>Love & Romance</td>
            <td>
              <button type="button" class="btn btn-dark">View</button>
              <button type="button" class="btn btn-primary">Edit</button>
              <button type="button" class="btn btn-info">Comments</button>
              <button type="button" class="btn btn-danger">Delete</button>
            </td>
          </tr>
          <tr>
            <th scope="row">30/09/2020</th>
            <td>Love originates from the heart</td>
            <td>Christian</td>
            <td>
              <button type="button" class="btn btn-dark">View</button>
              <button type="button" class="btn btn-primary">Edit</button>
              <button type="button" class="btn btn-info">Comments</button>
              <button type="button" class="btn btn-danger">Delete</button>
            </td>
          </tr>
          <tr>
            <th scope="row">30/09/2020</th>
            <td>Love originates from the heart</td>
            <td>Music</td>
            <td>
              <button type="button" class="btn btn-dark">View</button>
              <button type="button" class="btn btn-primary">Edit</button>
              <button type="button" class="btn btn-info">Comments</button>
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
  name: 'blogs',
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