<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard')}}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title"><b>Dashboard</b></span>
        </a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link" href="{{route('blog.index')}}">
          <i class="menu-icon mdi mdi-package-variant-closed
          "></i>
          <span class="menu-title"><b>Blogs</b></span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('categories.index')}}">
          <i class="menu-icon mdi mdi-lan"></i>
          <span class="menu-title"><b>Categories</b></span>
        </a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="{{route('user.index')}}">
          <i class="menu-icon mdi mdi-account-key"></i>
          <span class="menu-title"><b>User</b></span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('role.index')}}">
          <i class="menu-icon mdi mdi-key"></i>
          <span class="menu-title"><b>Role</b></span>
        </a>
      </li>
    </ul>
  </nav>
