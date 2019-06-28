<?php include 'include/header.php'; ?>
<script type="text/javascript">
    $('.title').html('<strong>Query</strong>');
</script>

<!-- <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.js"></script> -->
<div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            
            <div class="card-body" id='allData'>

            </div>
          </div>
        </div>
<?php include 'include/footer.php'; ?>
        <script type="text/javascript">
            getQueries();
            function getQueries()
            {
        	$.ajax({
        		url: 'getQuery.php',
        		method: 'POST',
        		success: function(res){
        			$('#allData').html(res);
        		}
        	});
            }
        </script>

        <script type="text/javascript">
            function Qdelete(button){
                var id = button.id;
                $.ajax({
                    method: 'POST',
                    url: 'deleteQuery.php',
                    data: {id:id},
                    success: function(res)
                    {
                        getQueries();
                    }
                });
            }
        </script>

        