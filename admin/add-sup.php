<?php
ob_start();
session_start();
error_reporting(0);
include '../inc/checklogin.php';
checkLogin();
?>
<?php
include '../inc/config.php';
if(isset($_POST['submit'])){
extract($_POST);
$date=date("d-m-y @ g:i A");
          $pix=$_FILES['pix']['name'];
          $temp=$_FILES['pix']['tmp_name'];
          $folder="supervisorimages/" ;  
          $pd=uniqid().'_'.$pix; 
          
          move_uploaded_file($temp,$folder.$pd)  ;

$da=mysqli_query($con,"insert into top_user(name,email,password,phoneno,level,image,date_created) values('$name','$email','$password','$phoneno','supervisor','$pd','$date')");
if ($da) {

$_SESSION['smsg']='<span style="color:#fff;">'."Supervisor Data added successfully....".'</span>';

} else {
  $_SESSION['smsg']='<span style="color:#000;">'."Error in adding Supervisor Data....".'</span>';

}

}


?>

<?php
include 'inc/header.php';
include 'inc/sidebar.php';
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 bg-dark">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Supervisor</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Supervisor : &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
        <?php if (!empty($_SESSION['smsg'])) {
          echo $_SESSION['smsg'];
          $_SESSION['smsg']="";
        }  ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="#" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleInputName">Fullname :</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Please enter your name" required="required">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address :</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Please enter your email" required="required">
                  </div>
              </div>     
<div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleInputPassword">Password :</label>
                    <input type="text" name="password" class="form-control" id="exampleInputPassword" placeholder="Please enter your password" required="required">
                  </div>
            </div>      

              
              <div class="col-sm-6">    
                  <div class="form-group">
                    <label for="exampleInputPhone">Phone Number :</label>
                    <input type="text" name="phoneno" class="form-control" id="exampleInputPhone" placeholder="Please enter phone number" required="required">
                  </div>
                </div>


<div class="col-sm-5">
                <div class="form-group">
                  <label for="exampleInputFile">Choose Image for Upload:</label>
                  <input type="file" name="pix" class="btn-info" required="required">
                </div>
              </div>


                </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary col-md-3" name="submit">Submit</button>
                  <button type="reset" class="btn btn-danger col-md-3">Clear</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

        </div>
        <!-- /.row -->
        <!-- Main row -->
       </div>
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
   <br/><br/>
  <?php
include 'inc/footer.php';
?>