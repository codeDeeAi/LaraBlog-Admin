<template>
    <div class="main-body">
            <div class="welcome-msg">
                <h5 class="card-title">Hi John, Welcome back</h5>
                <p class="card-subtitle">Administrator</p>
            </div>
        <div class="container">
            <!-- Quick Cards -->
            <div class="quick-cards">
                <div class="row">
                    <!-- First Card -->
                    <div class="card col-md-4">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-6"><i class="fas fa-users fa-3x"></i></div>
                                <div class="col-6">
                                    <h4 class="card-subtitle">12,000</h4>
                                    <p class="card-text">Total Users</p>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    </div>
                    <!-- First Card Ends -->
                    <!-- Second Card -->
                    <div class="card col-md-4">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-6"><i class="fas fa-th fa-3x"></i></div>
                                <div class="col-6">
                                    <h4 class="card-subtitle">12,000</h4>
                                    <p class="card-text">New Blogs</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- Second Card Ends -->
                    <!-- Third Card -->
                    <div class="card col-md-4">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-6"><i class="fas fa-eye fa-3x"></i></div>
                                <div class="col-6">
                                    <h4 class="card-subtitle">12,000</h4>
                                    <p class="card-text">Visitors</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- Third Card Ends -->
                </div>
            </div>
            <!-- Quick Cards ends -->
            <!-- Overview Collections -->
            <div class="overview-collections">
                    <div class="container">
                        <div class="the-table">
                            <h4 class="card-title">
                                Recent
                            </h4>
                            <table class="table table-striped table-bordered ">
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
            </div>
            <!-- Overview Collections -->
        </div>
    </div>
</template>
<script>
export default {
    
}
</script>
<style lang="scss" scoped>
.main-body{
    
    .welcome-msg{
        width: 95%;
        margin: auto;
        padding: 2.5rem;
        border-radius: 5px;
        -webkit-box-shadow: 2px 2 3px 1px rgba(0,0,0,0.75);
        -moz-box-shadow: 2px 2px 3px 1px rgba(0,0,0,0.75);
         box-shadow: 2px 2px 3px 1px rgba(0,0,0,0.75);
         margin-bottom: 2%;
        background-color: #00acee;

        &:hover{
            background-color: #f4f4f4;
        }
    }
    .container{

        .quick-cards{

            .card{
                border: none;

                .container{
                    border: 1px solid #999;
                    padding: 1rem;
                    -webkit-box-shadow: 2px 2 3px 1px rgba(0,0,0,0.75);
                    -moz-box-shadow: 2px 2px 3px 1px rgba(0,0,0,0.75);
                     box-shadow: 2px 2px 3px 1px rgba(0,0,0,0.75);
                     border-radius: 5px;
                     border-top: 3px solid #00acee;
                     background-color: #f4f4f4;

                    i{
                        color: #00acee;
                    }

                    &:hover{
                        background-color: #00acee;
                    }
                }
            }
        }

        .overview-collections{
            margin-top: 5%;

            table{                
            -webkit-box-shadow: 2px 2 3px 1px rgba(0,0,0,0.75);
            -moz-box-shadow: 2px 2px 3px 1px rgba(0,0,0,0.75);
             box-shadow: 2px 2px 3px 1px rgba(0,0,0,0.75);
            }
        }
    }
}
</style>