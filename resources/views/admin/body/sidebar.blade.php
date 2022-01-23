    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.html">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#category" aria-expanded="false" aria-controls="category">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">Category</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="category">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('category.index')}}">View Category</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('category.create')}}">Add Category</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#subcategory" aria-expanded="false" aria-controls="subcategory">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">SubCategory</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="subcategory">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('subcategory.index')}}">View Subcategory</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('subcategory.create')}}">Add Subcategory</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#childcategory" aria-expanded="false" aria-controls="childcategory">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">ChildsCategory</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="childcategory">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('childcategory.index')}}">View Childcategory</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('childcategory.create')}}">Add Childcategory</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#advertisement" aria-expanded="false" aria-controls="advertisement">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">Advertisement</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="advertisement">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.all_ads')}}">All Advertisement</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.pending_ads')}}">Pending Advertisement</a></li>
              </ul>
            </div>
          </li>
 

           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#user" aria-expanded="false" aria-controls="user">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">User</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="user">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('all.users')}}">All Users</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('view.reported.user')}}">Reported User</a></li>
              </ul>
            </div>
          </li>


        </ul>
      </nav>