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

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="#">Action 1</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
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
              <a class="dropdown-item" href="#">Action 2</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
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
              <a class="dropdown-item" href="#">Action 3</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
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
</style>