<template>
  <div>
    <!-- Preloader  -->
    <loader v-if="!spin"></loader>
    <!-- Preloader Ends -->
    <div class="users-table">
       <h4 class="card-title">Users <button  class="btn btn-outline-light" data-toggle="modal" data-target="#createAdminModal"><i class="fas fa-plus"></i> User</button></h4>
      <table class="table table-borderless table-hover table-responsive-lg">
        <thead>
          <tr>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">User Type</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="( d ,  i) in data" :key="i" v-if="data.length">
            <td>{{d.username}}</td>
            <td>{{d.email}}</td>
            <td>{{d.userType}}</td>
            <td>
              <button type="button" class="btn btn-dark" @click="viewUserModal(d, i)">View</button>
              <button type="button" class="btn btn-info" @click="editUserModal(d, i)">Edit</button>
              <button type="button" class="btn btn-danger" @click="deleteUser(d, i)">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

  <!-- Modals  -->
  <!-- Create Admin Modal -->
  <div class="modal fade" id="createAdminModal" tabindex="-1" role="dialog" aria-labelledby="createAdminModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createAdminModalLabel">Create User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label>First Name</label>
              <input type="text" class="form-control" v-model="user.firstName"  required>
            </div>
            <div class="form-group">
              <label>Last Name</label>
              <input type="text" class="form-control" v-model="user.lastName"  required>
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" v-model="user.username"  required>
            </div>
            <div class="form-group">
              <label >Phone</label>
              <input type="text" class="form-control" v-model="user.phone"  required minlength="6" maxlength="20">
            </div>
            <div class="form-group">
              <label >Email address</label>
              <input type="email" class="form-control" v-model="user.email" aria-describedby="emailHelp" required>
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
              <div class="form-group">
                <label>User Type</label>
                <select class="form-control" v-model="user.userType" required>
                  <option value="Admin">Admin</option>
                  <option value="Writer">Writer</option>
                </select>
              </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" v-model="user.password"  required minlength="6" >
            </div>
            <div class="form-group">
              <label>Confirm Password</label>
              <input type="password" class="form-control" v-model="user.password2" aria-describedby="passwordHelp" required >
              <small id="passwordHelp" class="form-text text-muted">Confirm password</small>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button  type="button" class="btn btn-success" @click="createUser"><i class="fas fa-save"></i> Create User</button>
        </div>
      </div>
    </div>
  </div>
  <!--  Create Admin Modal Ends -->

  <!-- View Admin Modal -->
  <div class="modal fade" id="viewUserModal" tabindex="-1" role="dialog" aria-labelledby="createAdminModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >{{eachUser.lastName}} {{eachUser.firstName}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">First name</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext"  :value="eachUser.firstName">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Last name</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext"  :value="eachUser.lastName">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Phone Number</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext"  :value="eachUser.phone">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Email</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext"  :value="eachUser.email">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">User Type</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext"  :value="eachUser.userType">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Created At</label>
              <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext"  :value="eachUser.created_at">
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!--  View Admin Modal Ends -->

  <!-- Edit User Modal -->
  <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="createAdminModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createAdminModalLabel">Edit {{eachUser.username}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label>First Name</label>
              <input type="text" class="form-control"  v-model="editUser.firstName"  >
            </div>
            <div class="form-group">
              <label>Last Name</label>
              <input type="text" class="form-control"  v-model="editUser.lastName"  >
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control"  v-model="editUser.username"  >
            </div>
            <div class="form-group">
              <label >Phone</label>
              <input type="text" class="form-control"  v-model="editUser.phone"   minlength="6" maxlength="20">
            </div>
            <div class="form-group">
              <label >Email address</label>
              <input type="email" class="form-control"  v-model="editUser.email" aria-describedby="emailHelp" >
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
              <div class="form-group">
                <label>User Type</label>
                <select class="form-control"  v-model="editUser.userType" >
                  <option value="Admin">Admin</option>
                  <option value="Writer">Writer</option>
                </select>
              </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" v-model="editUser.password"   minlength="6" >
            </div>
            <div class="form-group">
              <label>Confirm Password</label>
              <input type="password" class="form-control"  v-model="editUser.password2" aria-describedby="passwordHelp"  >
              <small id="passwordHelp" class="form-text text-muted">Confirm password</small>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button  type="button" class="btn btn-success" @click="editUsers"><i class="fas fa-save"></i>Edit User</button>
        </div>
      </div>
    </div>
  </div>
  <!--  Edit User Modal Ends -->
  <!-- Modals Ends -->


  </div>
</template>
<script>
import loader from "./loader";
export default {
  name: 'users',
  components:{
    loader
  },
  data(){
    return{
      spin: false,
      user:{
        firstName : '',
        lastName : '',
        username : '',
        phone : '',
        email : '',
        password : '',
        password2 : '',
        userType : '',
      },
      data: [],
      eachUser:[],
      editUser:{
        firstName : '',
        lastName : '',
        username : '',
        phone : '',
        email : '',
        password : '',
        password2 : '',
        userType : '',
      }
    }
  },
  methods:{
    async fetchData(){
       const res = await this.callApi(
                        'get',
                        'app/get_users',
                        this.data
                    );
        if(!res.status==200){
          this.toast('Error fetching data', 'error')
        }else{
          this.data = res.data;
          this.spin = true;
          this.toastFetchData();
        }
    },
    validEmail(email){
      let re =/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/;
      return re.test(email);
    },
    async createUser(){
      if (this.user.firstName.trim()=='') {
        this.toast('first name is required !','error')
      }else if (this.user.lastName.trim()==''){
        this.toast('last name is required !','error')
      }else if (this.user.username.trim()==''){
        this.toast('user name is required !','error')
      }else if (this.user.phone.trim()==''){
        this.toast('phone number is required !','error')
      }else if (this.user.email.trim()==''){
        this.toast('Email is required !','error')
      }else if (!this.validEmail(this.user.email)){
        this.toast('Enter Valid email !','error')
      }else if (this.user.userType.trim()==''){
        this.toast('Select User Type !','error')
      }else if (this.user.password.trim()==''){
        this.toast('Password is required !','error')
      }else if (this.user.password2.trim()==''){
        this.toast('confirm Password !','error')
      }else if (this.user.password != this.user.password2){
        this.toast('Passwords not identical !','error')
      }else {

        // Call api here
        const res = await this.callApi(
                        'post',
                        'app/create_user',
                        this.user
                    );
                  if (!res.status==200) {
                      this.toast('Error creating user !', 'error');
                  }else if(res.status==422){
                      var errs = res.data.errors;
                      for (let i in errs) {
                        var err = errs[i][0];
                      this.toast(err, 'error');                        
                      }
                  }else if(res.status==500){
                      var err = 'Duplicate entry! Existing email, username or phone number. <br> <b>Try again</b>';
                      this.toast(err, 'error');
                  } else{
                     this.toast('User created successfully!', 'success');
                      this.user.firstName = '';
                      this.user.lastName = '';
                      this.user.username = '';
                      this.user.phone = '';
                      this.user.email = '';
                      this.user.password = '';
                      this.user.password2 = '';
                      this.user.userType = '';
                      $('#createAdminModal').modal('hide');
                     return this.fetchData();                     
                  }
      }
    },
    viewUserModal(d, i){
      $('#viewUserModal').modal('show');
      this.eachUser= d;
    },
    editUserModal(d, i){
      $('#editUserModal').modal('show');
      this.eachUser= d;
      this.editUser = d;
    },
    async editUsers(){
      // Call api here
        const res = await this.callApi(
                        'post',
                        'app/edit_users',
                        this.editUser
                    );
                  if (!res.status==200) {
                      this.toast('Error creating user !', 'error');
                  }else if(res.status==422){
                      var errs = res.data.errors;
                      for (let i in errs) {
                        var err = errs[i][0];
                      this.toast(err, 'error');                        
                      }
                  }else{
                      this.toast('edited user', 'success');
                      this.editUser.firstName = '';
                      this.editUser.lastName = '';
                      this.editUser.username = '';
                      this.editUser.phone = '';
                      this.editUser.email = '';
                      this.editUser.password = '';
                      this.editUser.password2 = '';
                      this.editUser.userType = '';
                      $('#editUserModal').modal('hide');
                     return this.fetchData();                     
                  }
    },
    async deleteUser(d, i){
       if (!confirm('Are you sure you want to delete this user?')) {
              this.toast('User will not be deleted!', 'warning');
          }else{            
            const res = await this.callApi(
                  'post',
                  'app/delete_user',
                   d 
              );
               if (res.status==200) {                                   
                     this.toast('User has been deleted successfully!', 'success');
                     return this.fetchData();
                  } else{
                      this.toast('Something went wrong!', 'error');
                      this.toast('Error deleting User!', 'error');
                  }
          }
    },
  },
  async created(){
    this.fetchData();
  },
  mounted(){
    
  }
};
</script>
<style lang="scss" scoped>
</style>