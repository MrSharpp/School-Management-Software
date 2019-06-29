<?php include 'include/header.php';?>
<script type="text/javascript">
    $('.title').html('<strong>Batches</strong>');
  </script>
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <?php if($_SESSION['userType'] == 'admin'){ ?>
          <form id='addClassForm' method="POST">
            <div class="col-md-4">
            <label>Class Name</label>
            <input type="text" name="className" class="form-control">
            <label>Start Month</label>
              <select name="startMonth"  class="form-control">
                <option value="1">Janwary</option>  
               <option value="2">Feburary</option>
               <option value="3">March</option>
               <option value="4">April</option>
               <option value="5">May</option>
               <option value="6">June</option>
               <option value="7">July</option>
               <option value="8">August</option>
               <option value="9">October</option>
               <option value="10">September</option>
               <option value="11">November</option>
               <option value="12">December</option>
              </select>
              <input type="text" name="startYear" placeholder="year">
              <br><label>Course Duration</label>
              <input name="duration" type="text" name="" placeholder="year">
            <input type="submit" name="submit" id='buttonAdd' value="Add" class="btn btn-primary">
            </div>
          </form>
        <?php }?>
          <script type="text/javascript">
                 $('.t-datepicker').tDatePicker();
          </script>

          <script type="text/javascript">
             $(document).ready(function(){
                $('#addClassForm').on('submit',function(e){
                  e.preventDefault();
                     if($('.classText').val() == "")
                    {
                      alert('Please fill all fields.');
                    }else{
                  $.ajax({
                    url:"addClass.php",
                    method: "post",
                    data: $('#addClassForm').serialize(),
                    success: function(data){
                        $('.classText').val("");
                        getClass();
                    }
                  });
                  }
                });
             });
          </script>

          <div class="table-responsive" id="allData">
              <div id="allClasses">
                
              </div>
            </table>
        </table>
      </div>

      <script type="text/javascript">
        $(document).ready(function(){
          getClass();
        });
       function  getClass(){
          $.ajax({
            url:"getClass.php",
            method: "POST",
            success: function(data){
              console.log(data);              
              $('#allClasses').html(data);
            }
          });
          }
      </script>

      <script type="text/javascript">
        function deleteClass(button)
        {
          var id = button.id;
          $.ajax({
            url: "deleteClass.php",
            method: "POST",
            data: {id:id},
            success: function(){
              alert('Sucessfuly delete '+id+'th item.');
              getClass();
            }
          });
        }
      </script>

        </div>
        <!-- /.container-fluid -->

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
