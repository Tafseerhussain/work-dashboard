<div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      Our Work
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav"> 
      <li class="nav-item <?php if ($page == 'index.php') echo 'active'; ?>">
        <a class="nav-link" href="./">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item <?php if ($page == 'user.php') echo 'active'; ?>">
        <a class="nav-link" href="./user">
          <i class="material-icons">person</i>
          <p>My Profile</p>
        </a>
      </li>
      <li class="nav-item <?php if ($page == 'users.php') echo 'active'; ?>">
        <a class="nav-link" href="./users">
          <i class="material-icons">list_alt</i>
          <p>User List</p>
        </a>
      </li>
      <li class="nav-item <?php if ($page == 'projects.php') echo 'active'; ?>">
        <a class="nav-link" href="./projects">
          <i class="material-icons">content_paste</i>
          <p>Projects</p>
        </a>
      </li>
      <li class="nav-item <?php if ($page == 'project.php') echo 'active'; ?>">
        <a class="nav-link" href="./project">
          <i class="material-icons">library_add</i>
          <p>Add Project</p>
        </a>
      </li>
      <li class="nav-item <?php if ($page == 'records.php') echo 'active'; ?>">
        <a class="nav-link" href="./records">
          <i class="material-icons">event_note</i>
          <p>All Records</p>
        </a>
      </li>
    </ul>
  </div>
</div>