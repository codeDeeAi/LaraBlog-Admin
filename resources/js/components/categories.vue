<template>
  <div>
    <!-- Preloader  -->
    <loader v-if="!spin"></loader>
    <!-- Preloader Ends -->
    <div class="blogs-table">
      <h4 class="card-title">Categories <button  class="btn btn-outline-light" data-toggle="modal" data-target="#uploadModal"><i class="fas fa-plus"></i> New</button></h4>
      <table class="table table-striped table-bordered">
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
              <button type="button" class="btn btn-primary">Edit</button>
              <button type="button" class="btn btn-danger">Delete</button>
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
                        <img :src="this.picture" alt="">
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
      <!-- Modals Ends -->
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
    //   token: ''
    }
  },
  methods:{
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
                  }
              }
      },

      saveNew(){
          if (this.category.trim() == '') {
              this.toast('Upload a category or click <b>Close</b> !', 'info');
          } else {
              $('#uploadModal').modal('hide');
          }
      }
  },
  async created() {
    //   this.token = window.Laravel.csrfToken
     const res = await this.callApi(
                  'get',
                  'app/get_category',
                  this.data 
              )
              if (res.status==200) {
                  this.data = res.data;
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
#success{
    img{
        width: 70px;
        height: 70px;
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