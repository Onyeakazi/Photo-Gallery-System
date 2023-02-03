<?php include ("includes/admin_header.php") ?>
<?php if (!$session->is_signed_in()) {redirect("login.php");}?>

<?php

  $user = new User();

    if (isset($_POST['create'])) {

        if($user) {
          $user->username = $_POST['username'];
          $user->first_name = $_POST['first_name'];
          $user->last_name = $_POST['last_name'];
          $user->password = $_POST['password'];

          $user->set_file($_FILES['user_image']);
          $session->message("The user {$user->username} has been added.");
          $user->update_photo();
          $user->save();
          redirect("users.php");
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
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Edit Photo</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="admin_index.php">Home</a></li>
              <li><i class="fa fa-bars"></i>Pages</li>
              <li><i class="fa fa-square-o"></i>Pages</li>
            </ol>
          </div>
        </div>
        
        <form action="" method="post" enctype="multipart/form-data">

          <div class="col-md-6 col-md-offset-3">

            <div class="form-group">
                <input type="file" name="user_image">
            </div>
          
            <div class="form-group">
              <label for="username" style="font-weight:700; color:#007aff;font-size:20px;">Username:</label>
              <input type="text" name="username" class="form-control">
            </div>

            <div class="form-group">
              <label for="first_name" style="font-weight:700;color:#007aff;font-size:20px;">First Name:</label>
              <input type="text" name="first_name" class="form-control">
            </div>

            <div class="form-group">
              <label for="last_name" style="font-weight:700;color:#007aff;font-size:20px;">Last Name:</label>
              <input type="text" name="last_name" class="form-control">
            </div>

            <div class="form-group">
              <label for="password" style="font-weight:700;color:#007aff;font-size:20px;">Password:</label>
              <input type="text" name="password" class="form-control">
            </div>

            <div class="form-group">
              <input type="submit" class="btn btn-primary pull-right" name="create" value="Create">
            </div>
            
          </div>

        </form>
        

      
        

      </section>
  
<?php include ("includes/admin_footer.php") ?>