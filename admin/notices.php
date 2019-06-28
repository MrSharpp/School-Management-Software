<?php include 'include/header.php'; ?>
<script type="text/javascript">
    $('.title').html('<strong>Notices</strong>');
  </script>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1>
          <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
              <?php if($_SESSION['userType'] == 'teacher')
              { ?>
               <button class="btn btn-primary" data-toggle="modal" data-target="#insert">Add Notice</button>
              <?php } ?>
            </div>
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
        url: "deleteN.php",
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
        url: "getNDetails.php",
        data: {data:id},
        success: function(data){
          $('.show-detail').html(data);
        }
      });
    }
  </script>

  <!-- insert Student -->
<div id="insert" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    
    <h4 class="modal-title">Add Notice</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form">
     <label>Enter Notice Heading</label>
     <input type="text" name="heading" id="Iheading" class="form-control" />
     <br />
     <label>Enter Notice Text</label>
     <textarea name="text" id="Itext" class="form-control"></textarea>
     <br />
     <label>For</label>
     <select name="for" id="Ifor" class="form-control">
      <option value="student">Students</option>  
      <option value="teacher">Teachers</option>
     </select>
     <br />
     <input type="submit" name="submit" class="btn btn-success" value="Add Notice"> 
    </form>
   </div>
 </div>
</div>



  <script type="text/javascript">
    $(document).ready(function(){
      $('#insert_form').on('submit',function(event){
        event.preventDefault();
        if($('#Iheading').val() == "")
        {
          alert("Please enter the heading.");
        }
        // else if($('#Iclass').val() == "")
        // {
        //   alert("Please select the class of the student.");
        // }
        // else if($('#Iage').val() == "")
        // {
        //   alert("Please enter the age of the student.");
        // }
        else if($('#Itext').val() == "")
        {
          alert("Please enter the notice.");
        }
        else if($('#Ifor').val() == "")
        {
          alert("Please select the 'For' field.");
        }
        // else if($('#Igender').val() == "")
        // {
        //   alert("Please select the gender of the student.");
        // }
        else
        {
          $.ajax({
            url: "addNotice.php",
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
          url: "getNotices.php",
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

     <?php include 'include/footer.php'; ?>