<?php include ("includes/admin_header.php") ?>
<?php include ("includes/photo_library_modal.php") ?>
<?php if (!$session->is_signed_in()) {redirect("login.php");}?>

<?php 

    if(empty($_GET['id'])) {
        redirect("users.php");
    }

    $user = User::find_by_id($_GET['id']);

    if(isset($_POST['shutdown'])) {

        if($user) {

            $user->username = $_POST['username'];
            $user->user_name = $_POST['user_name'];
            $user->first_name = $_POST['first_name'];
            $user->last_name = $_POST['last_name'];
            $user->password = $_POST['password'];

            if(empty($_FILES['user_image'])) {
                $user->save();
                redirect("users.php");
                $session->message("The User {$user->username} has been updated");
            } else {
                $user->set_file($_FILES['user_image']);
                $user->update_photo();
                $user->save();
                // redirect("edit_user.php?id={$user->id}");
                redirect("users.php");
                $session->message("The User {$user->username}  has been updated");

            }
        
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
                    <h3 class="page-header"><i class="fa fa fa-bars"></i>Edit User</h3>
                    <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="admin_index.php">Home</a></li>
                    <li><i class="fa fa-bars"></i>Pages</li>
                    <li><i class="fa fa-square-o"></i>Pages</li>
                    </ol>
                </div>
            </div>

            <div class="col-md-6 user_image_box">
                <a href="" data-toggle="modal" data-target="#photo-modal"><img class="img-responsive" style="border-radius:5px;" src="<?php echo $user->image_path_and_placeholder() ?>" alt=""></a>
            </div>
            
            <form action="" method="post" enctype="multipart/form-data">

                <div class="col-md-6">

                    <div class="form-group">
                        <input type="file" name="user_image">
                    </div>
                
                    <div class="form-group">
                        <label for="username" style="font-weight:700; color:#007aff; font-size:20px;">Username:</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $user->username ?>">
                    </div>

                    <div class="form-group">
                        <label for="first_name" style="font-weight:700; color:#007aff;font-size:20px;">First Name:</label>
                        <input type="text" name="first_name" class="form-control" value="<?php echo $user->first_name ?>">
                    </div>

                    <div class="form-group">
                        <label for="last_name" style="font-weight:700; color:#007aff;font-size:20px;">Last Name:</label>
                        <input type="text" name="last_name" class="form-control" value="<?php echo $user->last_name ?>">
                    </div>

                    <div class="form-group">
                        <label for="password" style="font-weight:700; color:#007aff;font-size:20px;">Password:</label>
                        <input type="text" name="password" class="form-control" value="<?php echo $user->password ?>">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary pull-right" name="shutdown" value="Update">
                    </div>

                    <div class="form-group">
                        <a id="user-id" class="btn btn-danger delete_link" href="delete_user.php?id=<?php echo $user->id ?>">Delete</a>
                    </div>
                    
                </div>

            </form>

        </section>
    </section>
  
<?php include ("includes/admin_footer.php") ?>