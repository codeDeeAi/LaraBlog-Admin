<template>
  <div>
    <!-- Preloader  -->
    <loader v-if="!spin"></loader>
    <!-- Preloader Ends -->
    <div class="blogs-table">
      <h4 class="card-title">Categories <button  class="btn btn-outline-light" data-toggle="modal" data-target="#uploadModal"><i class="fas fa-plus"></i> New</button></h4>
      <table class="table table-borderless table-hover table-responsive-lg">
        <thead>
          <tr>
            <!-- <th scope="col">ID</th> -->
            <th scope="col">Title</th>
            <th scope="col">Date</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="( d ,  i) in data" :key="i" v-if="data.length">
            <!-- <td>{{d.id}} </td> -->           
            <td>
                <span>
                    <img :src="d.iconImage" alt="icon">
                    {{d.categoryName}}
                </span>                

            </td>
            <td>{{d.created_at}}</td>
            <td>
              <button type="button" class="btn btn-primary" @click="editNameModal(d, i)">Edit</button>
              <button type="button" class="btn btn-danger" @click="deleteCategory(d, i)">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>

      <!-- Modals  -->
      <!-- Upload Modal -->
        <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
            </div>
            <div class="modal-body">
                <form id="form" @submit.prevent="upload" enctype="multipart/form-data ">
                <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" id="category" aria-describedby="catName" v-model="category">
                    <small id="name" class="form-text text-muted">Enter Category name</small>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Upload Image</label>
                    <input type="file" class="form-control-file"  @click="onFileSelected"  accept="image/*" required>    
                </div>
                <!-- <div class="progress" style="margin: 4% auto;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"  style="width: 50%;" aria-valuemin="0" aria-valuemax="100" >
                        <span>50%</span>
                    </div>                    
                </div> -->
                <div id="success" v-if="check" class="row">
                        <img :src="this.picture" alt="" class="img-thumbnail img-fluid">
                </div>
                <button type="button" v-if="check" @click="upload" class="btn btn-outline-success float-right"><i class="fas fa-upload"></i> Upload</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button  type="button" class="btn btn-success" @click="saveNew"><i class="fas fa-save"></i> Save</button>
            </div>
            </div>
        </div>
        </div>
        <!-- Upload Modal Ends-->

        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
            </div>
            <div class="modal-body">
                <form >
                <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" id="category" aria-describedby="catName" v-model="storeEditData.categoryName"  readonly>
                    <small id="name" class="form-text text-muted">Category name</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">New Category Name</label>
                    <input type="text" class="form-control" id="editcategory" aria-describedby="catName" v-model="editData.category">
                    <small id="name2" class="form-text text-muted">Enter New Category name</small>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" @click="editName"><i class="fas fa-save"></i> Save</button>
            </div>
            </div>
        </div>
        </div>
        <!-- Edit Modal Ends-->
      <!-- Modals Ends -->
    </div>
  </div>
</template>
<script>
import loader from "./loader";
export default {
    name: 'category',
  components:{
    loader
  },
  data(){
    return{
      spin: false,
      all:{
          image:null,
          category: '' 
      }, 
      category:'',         
      picture:null,
      image:null,
      uploadValue: '',
      check: false,
      data:[],
      editData:{
          category: '',
          id: null
      },
      storeEditData:{

      },
    //   token: ''
    }
  },
  methods:{
     async fetchData(){
         const res = await this.callApi(
                  'get',
                  'app/get_category',
                  this.data 
              )
              if (res.status==200) {
                  this.data = res.data;
                  this.toastFetchData();
                  this.spin = true;
                  } else{
                      this.toast('Something went wrong!', 'error');
                  }
      },
      onFileSelected(e){
            // this.uploadValue= 0;
            // this.picture=null;  
            let category = this.category;
            let image = e.target.files[0];
            var formData = new FormData();
            formData.append('category', category);
            formData.append('image', image);
            this.all = formData;
            this.reader(image);
            
      },
      reader(image){
          let reader = new FileReader();
            reader.readAsDataURL(image);
            reader.onload = e=>{
                this.picture = e.target.result;
                this.check = true;
            }
      },
 async upload(){     
              
              if (this.category.trim()=='') {
                  this.toast('Category name is required !','error');
                  this.toast('Input category name ! ','error');
              }else{
                  const res = await this.callApi(
                        'post',
                        'app/upload_category',
                        this.all
                    );
                  if (!res.status==200) {
                      this.toast('Error adding category !', 'error');
                  } else{
                     this.toast('image Upload successful !', 'success');
                     this.toast('Category has been added successfully!', 'success');
                     this.all.catName = ''; 
                     return this.fetchData();                     
                  }
              }
      },

      saveNew(){
          if (this.category.trim() == '') {
              this.toast('Upload a category or click <b>Close</b> !', 'info');
          } else {
              $('#uploadModal').modal('hide');
              this.category = '';
              this.picture = null;
          }
      },
      editNameModal(d, i){
          $('#editModal').modal('show');
          this.storeEditData = d;
          this.editData.id = d.id;
      },
      async editName(){
          if (this.editData.category.trim() == '') {
                this.toast('Edit or click <b>Close</b> !', 'info');
                this.toast('New category name is required !', 'error');
          } else {
               const res = await this.callApi(
                        'post',
                        'app/edit_category',
                        this.editData
                    );
                  if (!res.status==200) {
                      this.toast('Error adding  new name !', 'error');
                  } else{
                     this.toast('Category name updated successfully !', 'success');
                     this.editData.category = ''; 
                     $('#editModal').modal('hide');
                     return this.fetchData();                    
                  }
          }
      },
      async deleteCategory(d, i){
        //   console.log(d)
        //   console.log(d.iconImage)
        if (!confirm('Are you sure you want to delete this category?')) {
              this.toast('Category will not be deleted!', 'warning');
          }else{            
            const res = await this.callApi(
                  'post',
                  'app/delete_category',
                   d 
              );
               if (res.status==200) {                                   
                     this.toast('Category has been deleted successfully!', 'success');
                     return this.fetchData();
                  } else{
                      this.toast('Something went wrong!', 'error');
                      this.toast('Error deleting Category!', 'error');
                  }
          }
      },
  },
  async created() {
    //   this.token = window.Laravel.csrfToken
     this.fetchData();
  },
  mounted(){
    // this.spin = true;
  }
};
</script>
<style lang="scss" scoped>
#success{
    img{
        // width: 70px;
        // max-height: 300px;
        margin: 3% auto;
    }
}
.blogs-table{
    table{
        tbody{
            td{
                span{
                    img{
                        width: 25px;
                        height: 25px;
                        border-radius: 50%;
                        margin-right: 4%;
                    }
                }
            }
        }
    }
}
</style>