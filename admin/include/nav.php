<!-- Nav Item - Dashboard -->
      <li class="nav-item" id='index'>
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <li class="nav-item" id='gallary'>
        <a class="nav-link" href="gallary.php">
          <i class="fas fa-fw fa-images"></i>
          <span>Gallary</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Students And Teachers
      </div>

      <li class="nav-item" id='Students'>
        <a class="nav-link" href="Students.php">
          <i class="fas fa-user-alt"></i>
          <span>Students</span></a>
      </li>

      <li class="nav-item" id='Teachers'>
        <a class="nav-link" href="Teachers.php">
          <i class="fas fa-user-tie"></i>
          <span>Teachers</span></a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li> -->

      <!-- Nav Item - Utilities Collapse Menu -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
        </div>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <li class="nav-item" id='result'>
        <a class="nav-link" href="result.php">
          <i class="fas fa-chalkboard"></i>
          <span>Results</span></a>
      </li>

      <li class="nav-item" id='class'>
        <a class="nav-link" href="class.php">
          <i class="fas fa-chalkboard"></i>
          <span>Class</span></a>
      </li>

      <li class="nav-item" id='notices'>
        <a class="nav-link" href="notices.php">
          <i class="fas fa-flag"></i>
          <span>Notices</span></a>
      </li>

      <li class="nav-item" id='trackbatches'>
        <a class="nav-link" href="trackbatches.php">
          <i class="fas fa-user-tie"></i>
          <span>Track Batches</span></a>
      </li>

      <li class="nav-item" id='query'>
        <a class="nav-link" href="query.php">
          <i class="fas fa-flag"></i>
          <span>Visitors Query</span></a>
      </li>
<?php if($_SESSION['userType'] == 'admin')
              { ?>
      <li class="nav-item" id='users'>
        <a class="nav-link" href="users.php">
          <i class="fas fa-users-cog"></i>
          <span>Users</span></a>
      </li>
    <?php } ?>
    <li class="nav-item" id='info'>
        <a class="nav-link" href="info.php">
          <i class="fas fa-info-circle"></i>
          <span>Help</span></a>
      </li>

  <script type="text/javascript">
  var url = window.location.pathname;
  var filename = url.substring(url.lastIndexOf('/')+1);
  var filename = filename.split('.').slice(0, -1).join('.');
  $('#'+filename).addClass('active');
  </script>