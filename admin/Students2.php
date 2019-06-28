<?php include 'include/header.php'; ?>
<script type="text/javascript">
    $('.title').html('<strong>Students</strong>');
 </script>


		<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
              <?php if($_SESSION['userType'] == 'teacher')
              { ?>
               <button class="btn btn-primary" data-toggle="modal" data-target="#insert">Add Student</button>
              <?php }?>
            </div>
            <div class="card-body" id='allData'>
              
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

 </body>

  <!-- insert Student -->
<div id="insert" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    
    <h4 class="modal-title">Add a student</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form">
     <label>Enter Student Name</label>
     <input type="text" name="name" id="Iname" class="form-control" />
     <br />
     <label>Select a Photo</label>
     <input type="file" name="photo" id="Iphoto" class="form-control" />
     <br /> 
     <label>Select Class</label>
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
     </select>
     <br />  
     <label>Enter Age</label>
     <input type="text" name="age" id="Iage" class="form-control" />
     <br />  
     <label>Enter Student's Address</label>
     <textarea name="address" id="Iaddress" class="form-control"></textarea>
     <br />
     <label>Enter Contact's Info</label>
     <input type="number" name="phoneNo" id="IphoneNo" class="form-control"/>
     <br />
     <label>Select Gender</label>
     <select name="gender" id="Igender" class="form-control">
      <option value="Male">Male</option>  
      <option value="Female">Female</option>
     </select>
     <br /> 
     <input type="submit" name="submit" class="btn btn-success" value="Add Student" data-dismiss="modal"> 
    </form>
   </div>
 </div>
</div>
</div>

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
        <button type="button" class="close" aria-label="Close">
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

  <!-- SCRIPT FOR GETTING STUDENTS -->
<script type="text/javascript">
	getStudents();
	function getStudents(){
	$.ajax({
		url: 'getStudents.php',
		method: 'POST',
		success: function(res)
		{
			$('#allData').html(res);
			$('#dataTable').dataTable({
          "iDisplayLength": 10
          });
		}
	});
	}
</script>

  <!-- SCRIPT FOR ADDING STUDENTS -->
 <script type="text/javascript">
 	$('#insert_form').on('submit',function(e){
 		e.preventDefault();
 		$.ajax({
 			url: 'addStudent2.php',
 			method: 'POST',
 			data: new FormData(this),
 			contentType : false,
 			cache: false,
 			processData: false,
 			success: function(res){
 				$('#insert').modal('hide');
 			}
 		});
 	});
 </script>

 	<!-- SCRIPT FOR GETTING DETAILS -->
 	<script type="text/javascript">
    function showDetails(button)
    {
      var id = button.id;
      $.ajax({
        method: "POST",
        url: "getDetails.php",
        data: {data:id},
        success: function(data){
          $('.show-detail').html(data);
        }
      });
    }
  </script>

  <!-- SCRIPT FOR DELETEING A RECORD -->
  <script type="text/javascript">
    $('.deleteConfirm').click(function(){
      var id = $(this).data('id');
      $.ajax({
        method: "POST",
        url: "delete.php",
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
  	$('#deleteModal').on('hidden.bs.modal', function(){
  //remove the backdrop
  $('.modal-backdrop').remove();
	});
  </script>

<?php include 'include/footer.php'; ?>