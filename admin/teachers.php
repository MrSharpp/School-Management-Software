<?php include 'include/header.php'; ?>
<script type="text/javascript">
    $('.title').html('<strong>Teachers</strong>');
  </script>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <?php if($_SESSION['userType'] == 'admin')
              { ?>
            <div class="card-header py-3">
              <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
              
               <button class="btn btn-primary" data-toggle="modal" data-target="#insert">Add Teacher</button>
              
            </div>
            <?php } ?>
            <div class="card-body" id='allData'>
              
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- modal -->
        <div class="modal fade" id="details" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Details <span id="name"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="show-detail">
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="msg">
          Are you sure sure to delete this record?
        </div>
      </div>
      <div class="modal-footer">
        <button class="deleteConfirm" type="button" class="btn btn-danger" >Delete</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

  <script type="text/javascript">
    $('.deleteConfirm').click(function(){
      var id = $(this).data('id');
      $.ajax({
        method: "POST",
        url: "deleteT.php",
        data: {id:id},
        success: function(response)
        {
          $('#deleteModal').modal('hide');
          getStudents();
        }
      });
    });

    function msgDelete(button)
    {
      var id = button.id;
      $('.deleteConfirm').data('id',id);
    }
  </script>

  <script type="text/javascript">
    function showDetails(button)
    {
      var id = button.id;
      $.ajax({
        method: "POST",
        url: "getTDetails.php",
        data: {data:id},
        success: function(data){
          $('.show-detail').html(data);
        }
      });
    }
  </script>

<!-- Modal for Edit button -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
    <h4 class="modal-title">Update Details</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
   </div>
   <div class="modal-body">
    <form method="post" id="update_form">
     <label>Enter Teacher's Name</label>
     
     <input type="text" name="name" maxlength="20" id="Uname" class="form-control" />
     <br />
     <!-- <label>Select Class</label>
     <select name="class" id="Iclass" class="form-control">
      <option value="nur">Nursry</option>
      <option value="kg">KG</option>
      <option value="first">I</option>  
      <option value="second">II</option>
      <option value="third">III</option>
      <option value="fourth">IV</option>
      <option value="fifth">V</option>
      <option value="sixth">VI</option>
      <option value="seventh">VII</option>
      <option value="eight">VIII</option>
      <option value="ninth">IX</option>
      <option value="tenth">X</option>
      <option value="eleventh">XI</option>
      <option value="twelfth">XII</option>
     </select> -->
     <!-- <label>Enter Age</label>
     <input type="text" name="age" id="Uage" class="form-control" />
     <br />   -->
     <label>Enter Student's Address</label>
     <textarea name="address" id="Uaddress" maxlength="100" class="form-control"></textarea>
     <br />
     <label>Enter Contact's Info</label>
     <input type="number" name="phoneNo" maxlength="12" id="UphoneNo" class="form-control"/>
     <!-- <br />
     <label>Select Gender</label>
     <select name="gender" id="Ugender" class="form-control">
      <option value="Male">Male</option>  
      <option value="Female">Female</option>
     </select> -->
     <br /> 
     <input type="hidden" name="studId" id="studId">
     <input type="hidden" name="photoPath" id="UphotoPath">
     <input type="submit" name="submit" class="btn btn-success" value="Update Details"> 
    </form>
   </div>
        </div>
    </div>
</div>
<!-- End of Modal for Edit button -->

  <!-- insert Student -->
<div id="insert" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    
    <h4 class="modal-title">Add Teacher</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form">
     <label>Enter Student Name</label>
     <input type="text" name="name" maxlength="20"  id="Iname" class="form-control" />
     <br />
     <!-- <label>Select Class</label>
     <select name="class" id="Iclass" class="form-control">
      <option value="nur">Nursry</option>
      <option value="kg">KG</option>
      <option value="first">I</option>  
      <option value="second">II</option>
      <option value="third">III</option>
      <option value="fourth">IV</option>
      <option value="fifth">V</option>
      <option value="sixth">VI</option>
      <option value="seventh">VII</option>
      <option value="eight">VIII</option>
      <option value="ninth">IX</option>
      <option value="tenth">X</option>
      <option value="eleventh">XI</option>
      <option value="twelfth">XII</option>
     </select> -->
     <!-- <br />   -->
     <!-- <label>Enter Age</label>
     <input type="text" name="age" id="Iage" class="form-control" />
     <br />   -->
     <label>Enter Address</label>
     <textarea name="address" maxlength="100" id="Iaddress" class="form-control"></textarea>
     <br />
     <label>Enter Contact's Info</label>
     <input type="number" name="phoneNo" maxlength="12" id="IphoneNo" class="form-control"/>
     <!-- <br />
     <label>Select Gender</label>
     <select name="gender" id="Igender" class="form-control">
      <option value="Male">Male</option>  
      <option value="Female">Female</option>
     </select> -->
     <br /> 
     <input type="submit" name="submit" class="btn btn-success" value="Add Student"> 
    </form>
   </div>
 </div>
</div>



  <script type="text/javascript">
    $(document).ready(function(){
      $('#insert_form').on('submit',function(event){
        event.preventDefault();
        if($('#Iname').val() == "")
        {
          alert("Please enter the name of the Teacher.");
        }
        else if($('#Iaddress').val() == "")
        {
          alert("Please enter the address of the student.");
        }
        else if($('#IphoneNo').val() == "")
        {
          alert("Please enter the contact info of the student.");
        }
        else
        {
          $.ajax({
            url: "addTeacher.php",
            method: "post",
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
              $('#insert').val("Inserting");
            },
            success: function(data){
              console.log("HELLO");
               console.log(data);
              if(data.result == "S")
              {
                 console.log(data);
              $('#insert_form')[0].reset();
              $("#insert").modal('hide');
              getStudents();
              }
              else if(data.result == "E")
              {
                console.log(data);
                alert(data.msg);
              }
            }
        });
      }
    });
    });

      function getStudents()
      {
        var results = "";
        $.ajax({
          method: "POST",
          url: "getTeachers.php",
          success: function(response)
          {
           $('#allData').html(response);
           $('#dataTable').dataTable({
          "iDisplayLength": 10
          });
          
       }
        });
      }
    $(document).ready(function(){
      getStudents();

    });
  </script>

  <script type="text/javascript">
   $(document).on('click','.edit',function(){
    var id = $(this).attr('id');
    console.log(id);
    $.ajax({
       url:"fetchT.php",  
       method:"POST",  
        data:{id:id},  
       dataType:"json",  
      success: function(data)
      {
        console.log(data);
        $('#studId').val(id);
        $('#UphotoPath').val(data[0].photo);
        $('#Uname').val(data[0].name);
        $('#UphoneNo').val(data[0].phoneNo);
        $('#Uaddress').val(data[0].Address);
      }
    });
   });
   $('#update_form').on('submit',function(event){
    event.preventDefault();
    console.log($('#UphotoPath').val());
    $.ajax({
      url:"updateT.php",
      method: "post",
      data: new FormData(this),
      dataType: "json",
      contentType: false,
      cache: false,
       processData:false,
      beforeSend: function(){
        $('.modal-title').html('Updating');
      },
      success: function(res){
        console.log(res);
        if(res.status == "S")
        {
        console.log('sucess');
        console.log(res);
        $('.modal-title').html('Updated');
        $('#update_form')[0].reset();
         $("#update").modal('hide');
         getStudents();
       }
       else
       {
        alert(res.msg);
        console.log(res);
       }
    }
  });
  });
    

  </script>

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
