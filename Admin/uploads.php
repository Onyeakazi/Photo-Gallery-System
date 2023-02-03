<?php include ("includes/admin_header.php") ?>
<?php if (!$session->is_signed_in()) {redirect("login.php");}?>

<?php

$message = "";
if(isset($_FILES['file'])) {

  $photo = new Photo();
  $photo->title = $_POST['title'];
  $photo->set_file($_FILES['file']);

  if($photo->save()) {
    $message = "Photo upload successfully";

  } else {
    $message = join("<br>", $photo->errors);

  }
}

?>

  <!-- container section start -->
  <section id="container" class="">
    
  
     <?php include ("includes/navigation.php") ?>

    <!--header end-->

    <?php include "includes/sidebar.php" ?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Uploads</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="admin_index.php">Home</a></li>
              <li><i class="fa fa-bars"></i>Pages</li>
              <li><i class="fa fa-square-o"></i>Pages</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">

            <?php echo $message; ?>
            <form action="uploads.php" method="post" enctype="multipart/form-data">
          
              <div class="form-group">
              <input type="text" name="title" class="form-control">
              </div>
              <div class="form-group">
              <input type="file" name="file">
              </div>
              <div class="form-group">
              <input type="submit" name="submit" class="btn btn-primary">
              </div>

            </form>
          </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <form action="upload.php" class="dropzone" name="file">
          </form>
        </div>
      </div>
        
      
        

      </section>
  
<?php include ("includes/admin_footer.php") ?>