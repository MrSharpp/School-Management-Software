<?php include 'include/header.php'; ?>
  
  <script type="text/javascript">
    $('.title').html('<strong>Dashboard</strong>');
  </script>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div> -->



          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Students</div>
                      <div id="totalStudents" class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <script type="text/javascript">
              $(document).ready(function(){
                $.ajax({
                  url: "getTotalCount.php",
                  method: "POST",
                  dataType: "json",
                  success: function(res){
                    console.log(res);
                    $('#totalStudents').html(res.students);
                    $('#totalTeachers').html(res.teachers);
                    $('#totalUsers').html(res.users);
                    $('#totalClasses').html(res.classes);
                  } 
                });
              });
            </script>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Teachers</div>
                      <div id='totalTeachers' class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">CLASSES</div>
                      <div id='totalClasses' class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">ADMINS</div>
                      <div id='totalUsers' class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <div class="col-lg-6 mb-4">

               <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Track Batches</h6>
                </div>
                <div class="batches">
                  
                </div>
              </div>

            </div>

            <script type="text/javascript">
              $.ajax({
                url: 'trackBatcher.php',
                method: 'POST',
                success: function(res)
                {
                  $('.batches').html(res);
                  console.log(res);
                }
              });
            </script>

            <div class="col-lg-6 mb-4">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Visitors Messages</h6>
                </div>
              <?php 
              $query = 'SELECT * FROM `query` order by id desc LIMIT 3';
              $stmt = $connect->prepare($query);
  $stmt->execute();

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $output = '<div id="accordion">';

  foreach($results as $row)
  {
    $output .= '<div class="card">
    <div class="card-header" id="b'.$row['id'].'">
      <h5 class="mb-0">

        <button class="btn btn-link" data-toggle="collapse" data-target="#a'.$row['id'].'" aria-expanded="true" aria-controls="collapseOne">
          '.$row['topic'].'
        </button>
        <button type="button" id='.$row['id'].' onClick="Qdelete(this);" class="btn btn-danger btn-sm pull-right">Delete</button>
      </h5>
    </div>';

      $output .= '<div id="a'.$row['id'].'" class="collapse" aria-labelledby="b'.$row['id'].'" data-parent="#accordion">
      <div class="card-body">
      '.$row['query'].'
      </div>
     <i> Email: '.$row['email'].' <br>
      Date Added: '.$row['date'].' </i>
    </div>
    <div class="card-footer py-1">
              From '.$row['name'].'
            </div>
  </div>';

  }

  $output .= '</div>';
  echo $output;
               ?>
             </div>
            </div>


          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     <?php include 'include/footer.php'; ?>
