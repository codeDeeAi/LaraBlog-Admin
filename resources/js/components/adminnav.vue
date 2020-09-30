<template>
  <div class="body">
    <div class="container fixed-top">
      <ul class="nav justify-content-end">
        <li class="nav-item">
          <!-- <form class="form-inline my-2 my-lg-0">
            <input
              class="form-control mr-sm-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>-->
        </li>
        <li class="nav-item">
          <div class="dropdown">
            <a
              class="drop"
              href="#"
              id="dropdownMenuLink"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <i class="fa fa-comment fa-1x"></i>
              <span class="badge badge-light">9</span>
              <span class="sr-only">unread messages</span>
            </a>

            <div class="dropdown-menu pd-no" aria-labelledby="dropdownMenuLink">
                    <div class=" card-title profile-dropdown">
                        <h6>New Inbox</h6>
                    </div>
                    <a class="dropdown-item" href="#"> <img src="/imgs/books.jpg" alt=""><span>Sent a new message</span></a>
                     <a class="dropdown-item" href="#"> <img src="/imgs/books.jpg" alt=""><span>Sent a new message</span></a>
                      <a class="dropdown-item" href="#"> <img src="/imgs/books.jpg" alt=""><span>Sent a new message</span></a>
               </div>
          </div>
        </li>
        <li class="nav-item">
          <div class="dropdown dropleft">
            <a
              class="drop"
              href="#"
              id="dropdownMenuLink"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <i class="fa fa-bell fa-1x"></i>
              <span class="badge badge-light">9</span>
              <span class="sr-only">unread messages</span>
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <div class=" card-title profile-dropdown">
                        <h6>New Notifications</h6>
                    </div>
                    <a class="dropdown-item" href="#">John Doe just registered</a>
                     <a class="dropdown-item" href="#">John Doe just registered</a>
                      <a class="dropdown-item" href="#">John Doe just registered</a>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <div class="dropdown dropleft">
            <a
              class
              href="#"
              id="dropdownMenuLink"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <img src="/imgs/books.jpg" class="img-fluid" alt />
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <div class=" card-title profile-dropdown">
                  <h5>John Doe</h5>
                  <p>Available</p>
              </div>
              <a class="dropdown-item" href="#"> <i class="fas fa-user"></i><span> Profile</span></a>
              <a class="dropdown-item" href="#"><i class="fas fa-cog"></i><span>Settings</span></a>
              <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
            </div>
          </div>
        </li>
      </ul>
    </div>

    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb fixed-top">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="#">Library</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Data</li>
      </ol>
    </nav>
    <!-- Breadcrumbs Ends -->
  </div>
</template>
<script>
export default {};
</script>
<style lang="scss"  scoped>
// Helper classes
.bd-no{
    border: none;
}
.pd-no{
    padding: 0;
}
// Helper Classes ends
ul {
  padding: 1rem;
}
ul li {
  margin: auto 0.5rem;
}
ul li .dropdown .drop {
  margin: 0.5rem;
  /* padding: .5rem; */
}
ul li .dropdown img {
  width: 35px;
  height: 35px;
  border-radius: 50%;
}
ul li .dropdown a:hover {
  text-decoration: none;
}
nav ol li a:hover {
  text-decoration: none;
  color: #00acee;
  font-size: 1.1rem;
}
.breadcrumb {
  margin-top: 5%;
  background-color: #fff !important;
}
@media screen and (max-width: 570px) {
  .body {
    .container {
      margin-left: 10% !important;

      ul {
        padding-right: 10%;

        li {
          .dropdown {
            img {
              width: 25px;
              height: 25px;
              border-radius: 50%;
            }
          }
        }
      }
    }
    .breadcrumb {
      margin-top: 12%;

      li {
        font-size: 0.7rem;
      }
    }
  }
}
// Dropdown styles
.dropdown{
    padding-top: 0 !important;

    .dropdown-menu{
        padding-top: 0 !important;
        div{
            &.profile-dropdown{
                padding: 1rem;
                padding-left: 1rem;
                background-color: #00acee;
            }
        }
        a{
            &.dropdown-item{

                i{
                    padding-right: .5rem !important;
                }
                img{
                    width: 25px;
                    height: 25px;
                    border-radius: 50%;
                }
                span{
                    padding-left: 1rem;
                }
            }
        }
    }
}
</style>