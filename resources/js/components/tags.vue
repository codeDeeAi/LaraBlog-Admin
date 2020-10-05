<template>
  <div>
    <!-- Preloader  -->
    <loader v-if="!spin"></loader>
    <!-- Preloader Ends -->
    <div class="tags-table">
      <h4 class="card-title">All Tags <a href="!#" class="btn btn-outline-light" data-toggle="modal" data-target="#addTagModal">+ Add Tag</a></h4>
      <table class="table table-borderless table-hover table-responsive-lg">
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
              <button type="button" class="btn btn-danger" @click="deleteTag(tag, i)">Delete</button>
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
                <label for="tag-name-old">Current Tag Name</label>
                <input v-model="editData.name" type="text" class="form-control disabled" id="oldTagName" aria-describedby="tagHelpOld" readonly>
                <small id="tagHelpOld" class="form-text text-muted">Current Tag Name</small>
            </div>
            <div class="form-group">
                <label for="tag-name">New Tag Name</label>
                <input v-model="editDataNew.name" type="text" class="form-control" id="newTagName" aria-describedby="tagHelp">
                <small id="tagHelp" class="form-text text-muted">New Tag Name</small>
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
  name: 'tags',
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
      },
      editDataNew:{
        name: '',
        index: ''
      },
    }
  },
  methods: {
    async fetchData(){
      const res = await this.callApi(
                  'get',
                  'app/get_tags',
                  this.data 
              )
              if (res.status==200) {
                  this.tags = res.data;
                  this.spin = true;
                  this.toastFetchData();
                  } else{
                      this.toast('Something went wrong!', 'error');
                  }
    },
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
                     this.toast('Tag has been added successfully!', 'success');
                     this.data.name = '';
                     $('#addTagModal').modal('hide');
                     return this.fetchData();
                  } else{
                      this.toast('Error adding Tag!', 'error');
                  }
          }
      },
      showEditModal(tag, index){
        this.editData = tag;
        this.editDataNew.index = tag.id;
         $('#editTagModal').modal('show');
      },
 
  async editTag(){
          if (this.editDataNew.name.trim()=='') {
            return  this.toast('Tag name is required!', 'error');
          }else{
              const res = await this.callApi(
                  'post',
                  'app/edit_tag',
                  this.editDataNew 
              )
              if (res.status==200) {                     
                     this.toast('Tag name has been edited successfully!', 'success');
                     this.editDataNew.name = '';
                     $('#editTagModal').modal('hide');
                     return this.fetchData();
                  } else{
                      this.toast('Error adding Tag!', 'error');
                  }
          }
      },

      async deleteTag(tag, i){
          if (!confirm('Are you sure you want to delete this tag?')) {
              this.toast('Tag will not be deleted!', 'warning');
          }else{            
            const res = await this.callApi(
                  'post',
                  'app/delete_tag',
                   tag 
              );
               if (res.status==200) {                                   
                     this.toast('Tag name has been deleted successfully!', 'success');
                     return this.fetchData();
                  } else{
                      this.toast('Something went wrong!', 'error');
                      this.toast('Error deleting Tag!', 'error');
                  }
          }
      }
     },  
  async created() {
     this.fetchData();
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