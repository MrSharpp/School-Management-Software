<?php include 'include/header.php'; ?>
<script type="text/javascript">
    $('.title').html('<strong>Users</strong>');
  </script>
  
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <?php if($_SESSION['userType'] == 'admin'){ ?>
            <div class="card-header py-3">
              <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
               <button class="btn btn-primary" data-toggle="modal" data-target="#insert">Add User</button>
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
        url: "deleteU.php",
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
    <h4 class="modal-title">Update User</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
   </div>
   <div class="modal-body">
    <form method="post" id="update_form">
     <label>Enter Username</label>
     <input type="text" name="name" id="Uname" class="form-control" />
     <br />
     <label>Enter Password</label>
     <input type="text" name="password" id="Upassword" class="form-control"/>
     <br />
     <label>Select Usertype</label>
     <select name="usertype" id="Ugender" class="form-control">
      <option value="teacher">Teacher</option>  
      <option value="moderator">Moderator</option>
     </select>
     <br /> 
     <input type="hidden" name="studId" id="studId">
     <input type="submit" name="submit" class="btn btn-success" value="Update User"> 
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
    
    <h4 class="modal-title">Add User</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form">
     <label>Enter Username</label>
     <input type="text" name="name" id="Iname" class="form-control" />
     <br />
     <label>Enter Password</label>
     <input type="password" name="password" id="Ipassword" class="form-control"/>
     <br />
     <label>Select Usertype</label>
     <select name="usertype" id="Igender" class="form-control">
      <option value="teacher">Teacher</option>  
      <option value="moderator">Moderator</option>
     </select>
     <br /> 
     <input type="submit" name="submit" class="btn btn-success" value="Add User"> 
    </form>
   </div>
 </div>
</div>
</div>

  <script type="text/javascript">
    function statusChange(button)
    {
      console.log("HHOLA");
      var id= button.id;
        $.ajax({
          url: "changeStatus.php",
          method: "POST",
          data: {id:id},
          success: function(res)
          {
           getStudents();
          }
        });
    }
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('#insert_form').on('submit',function(event){
        event.preventDefault();
        if($('#Iname').val() == "")
        {
          alert("Please enter the name of the Teacher.");
        }
        // else if($('#Iclass').val() == "")
        // {
        //   alert("Please select the class of the student.");
        // }
        // else if($('#Iage').val() == "")
        // {
        //   alert("Please enter the age of the student.");
        // }
        else if($('#Iaddress').val() == "")
        {
          alert("Please enter the address of the student.");
        }
        else if($('#IphoneNo').val() == "")
        {
          alert("Please enter the contact info of the student.");
        }
        // else if($('#Igender').val() == "")
        // {
        //   alert("Please select the gender of the student.");
        // }
        else
        {
          $.ajax({
            url: "addUser.php",
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
          url: "getUsers.php",
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
    $.ajax({
       url:"fetchU.php",  
       method:"POST",  
        data:{id:id},  
       dataType:"json",  
      success: function(data)
      {
        $('#studId').val(id);
        $('#Uname').val(data[0].username);
        $('#Upassword').val(data[0].password);
      }
    });
   });
   $('#update_form').on('submit',function(event){
    event.preventDefault();
    $.ajax({
      url:"updateU.php",
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
        console.log('Hello');
        console.log(res);
        $('.modal-title').html('Updated');
        $('#update_form')[0].reset();
         $("#update").modal('hide');
         getStudents();
    }
  });
  });
    

  </script>

      </div>
      <!-- End of Main Content -->

      <?php include 'include/footer.php'; ?>
