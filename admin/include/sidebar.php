<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/widgets/widgets.html">
              <i class="icon-cog menu-icon"></i>
              <span class="menu-title">Widgets</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#facts" aria-expanded="false" aria-controls="facts">
              <i class="fa fa-smile-o menu-icon"></i>
              <span class="menu-title">Fun Facts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="facts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="facts_addf.php">Add Facts</a></li>
                <li class="nav-item"> <a class="nav-link" href="facts_list.php"> Show all Facts</a></li>
               
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#e-commerce" aria-expanded="false" aria-controls="e-commerce">
              <i class="fa fa-user menu-icon"></i>
              <span class="menu-title">My Profile</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="e-commerce">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="setting.php"> Setting </a></li>
                <li class="nav-item"> <a class="nav-link" href="change_password.php"> Change Password</a></li>
                <li class="nav-item"> <a class="nav-link" href="logout.php"> Logout </a></li>
              </ul>
            </div>
          </li>
          
        </ul>
      </nav>