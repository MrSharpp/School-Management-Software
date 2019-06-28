<?php include 'include/header.php'; ?>
<script type="text/javascript">
    $('.title').html('<strong>Gallary</strong>');
</script>

  <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
              
               <button class="btn btn-primary" onclick="insertModal();">Add Photo</button>
            </div>
            <div class="card-body" id='allData'>
              
            </div>
          </div>
        </div>
  <!-- /.container-fluid -->

  <script type="text/javascript">
    function insertModal(){
      var table = $('#dataTable').dataTable();
      var rows = table.fnGetData().length;

      if(rows == 6)
      {
        console.log('Maximun photos can be 6 only')
      }
      else
      {
        $("#insert").modal('show');
      }
    }
  </script>

  <script type="text/javascript">
    getGallary();

    function getGallary()
    {
    $.ajax({
      url:'getGallary.php',
      method: 'POST',
      success: function(res){
        $('#allData').html(res);
      }
    })
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
    var ext = $('#photo').val().split('.').pop().toLowerCase();
    var title = $('#title').val();
    if(ext != 'jpg' && ext != 'jpeg' && ext != 'pjpeg' && ext != 'png' && ext != 'TIFF')
    {
      $('#error').html('Please select valid file type');
    }
    else if(title.length > 15 || title.length < 5)
    {
      $('#error').html('The title filed must have only 15 character');
    }
    else
    {
      $.ajax({
        url: 'insertGallary.php',
        method: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success: function(res)
        {
          $('#insert_form')[0].reset();
          $("#insert").modal('hide');
          getGallary();
        }
      });
    }
  });
</script>

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
        url: "deleteG.php",
        data: {id:id},
        success: function(response)
        {
          console.log(response);
          $('#deleteModal').modal('hide');
           getGallary();
        }
      });
    });

  function msgDelete(button)
    {
      var id = button.id;
      $('.deleteConfirm').data('id',id);
    }
</script>

<?php include 'include/footer.php' ?>