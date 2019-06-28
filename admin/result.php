<?php include 'include/header.php'; ?>
<script type="text/javascript">
    $('.title').html('<strong>Top Students</strong>');
</script>

  <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
              
              <button class="btn btn-primary" data-toggle="modal" data-target="#insert">Add Student</button>
            	<div class="custom-control custom-switch">
  						<input type="checkbox" class="custom-control-input" id="customSwitches">
  						<label class="custom-control-label" for="customSwitches">Show on Landing Page</label>
				</div>
            </div>
            <div class="card-body" id='allData'>

            </div>
          </div>
        </div>

        <script type="text/javascript">
        	getResult();

        	function getResult()
        	{
        	$.ajax({
        		url: 'getResult.php',
        		method: 'POST',
        		success: function(res){
        			$('#allData').html(res);
        		}
        	});
        	}
        </script>

  <!-- insert Student -->
<div id="insert" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    
    <h4 class="modal-title">Add Photo</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form">
     <label>Select Image</label>
     <input type="file" name="photo" id="photo" class="form-control" />
     <br />
     <label>Enter Student's Name</label>
     <input type="text" name="name" id="name" class="form-control"/>
     <br />
     <label>Enter Title</label>
     <input type="text" name="title" id="title" class="form-control"/>
     <p class="text-danger" id='error'></p>
     <input type="submit" name="submit" class="btn btn-success" value="Add User"> 
    </form>
   </div>
 </div>
</div>
</div>

 <script type="text/javascript">
        	$('#insert_form').on('submit',function(event){
        		event.preventDefault();
        		$.ajax({
        			url: 'insertResult.php',
        			method: 'POST',
        			data: new FormData(this),
        			contentType: false,
        			cache: false,
        			processData: false,
        			success: function(res){
        				getResult();
        				$("#insert").modal('hide');
        			}
        		});
        	});
        </script>

<?php include 'include/footer.php' ?>