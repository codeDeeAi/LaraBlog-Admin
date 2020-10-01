<template>
  <div>
    <!-- Preloader  -->
    <loader v-if="!spin"></loader>
    <!-- Preloader Ends -->
    <div class="tags-table">
      <h4 class="card-title">Categories <a href="!#" class="btn btn-outline-light" data-toggle="modal" data-target="#addTagModal">+ Add Tag</a></h4>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Tag Name</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="( tag ,  i) in tags" :key="i" v-if="tags.length">
            <th scope="row">{{tag.id}}</th>
            <td>{{tag.name}}</td>
            <td>{{tag.created_at}}</td>
            <td>
              <button type="button" class="btn btn-primary" @click="showEditModal(tag, i)">Edit</button>
              <button type="button" class="btn btn-danger">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Modals -->    

    <!-- Add Tag Modal -->
    <div class="modal fade" id="addTagModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Tag</h5>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="tag-name">Tag Name</label>
                <input v-model="data.name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="tagHelp">
                <small id="tagHelp" class="form-text text-muted">Enter Tag Name</small>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" @click="addTag()" :disabled="isAdding" :loading="isAdding">{{isAdding ? 'Adding ...' :'Add Tag'}}</button>
        </div>
        </div>
    </div>
    </div>
    <!-- Add Tag Modal Ends -->

     <!-- Edit Tag Modal -->
    <div class="modal fade" id="editTagModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Tag</h5>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="tag-name">Edit Tag Name</label>
                <input v-model="editData.name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="tagHelp">
                <small id="tagHelp" class="form-text text-muted">Edit Tag Name</small>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" @click="editTag()" :disabled="isAdding" :loading="isAdding">{{isAdding ? 'Editing ...' :'Edit Tag'}}</button>
        </div>
        </div>
    </div>
    </div>
    <!-- Edit Tag Modal Ends -->
    <!-- Modal Ends -->
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
      data:{
          name: ''
      },
      isAdding: false,
      tags: [],
      editData:{
        name: ''
      }
    }
  },
  methods: {
     async addTag(){
          if (this.data.name.trim()=='') {
            return  this.toast('Tag name is required!', 'error');
          }else{
              const res = await this.callApi(
                  'post',
                  'app/create_tag',
                  this.data 
              )
              if (res.status==200) {
                      this.tags.unshift(res.data);
                     this.toast('Tag has been added successfully!', 'success');
                     this.data.name = '';
                  } else{
                      this.toast('Error adding Tag!', 'error');
                  }
          }
      },
      showEditModal(tag, index){
        this.editData = tag;
         $('#editTagModal').modal('show');
      },
 
  async editTag(){
          if (this.editData.name.trim()=='') {
            return  this.toast('Tag name is required!', 'error');
          }else{
              const res = await this.callApi(
                  'post',
                  'app/edit_tag',
                  this.editData 
              )
              if (res.status==200) {                     
                     this.toast('Tag name has been edited successfully!', 'success');
                     this.editData.name = '';
                     $('#editTagModal').modal('hide');
                  } else{
                      this.toast('Error adding Tag!', 'error');
                  }
          }
      },
     },  
  async created() {
     const res = await this.callApi(
                  'get',
                  'app/get_tags',
                  this.data 
              )
              if (res.status==200) {
                  this.tags = res.data;
                  this.spin = true;
                  } else{
                      this.toast('Something went wrong!', 'error');
                  }
  },
  mounted(){
    // this.spin = true;
  }
};
</script>
<style lang="scss" scoped>
.tags-table{

    padding-top: 2%;
    h4{

        &.card-title{
            
            a{
                margin-left: 3%;
            }
        }
    }
}
</style>