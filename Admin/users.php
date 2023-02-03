<?php include ("includes/admin_header.php") ?>
<?php if (!$session->is_signed_in()) {redirect("login.php");}?>

<?php
$users = User::find_all();

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
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Users</h3>
            <p style="background-color:greenyellow;"><?php echo $message; ?></p>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="admin_index.php">Home</a></li>
              <li><i class="fa fa-bars"></i>Pages</li>
              <li><i class="fa fa-square-o"></i>Pages</li>
            </ol>
          </div>
        </div>
            <a href="add_user.php" class="btn btn-primary" style="margin-left:15px;margin-bottom: 4px;">Add User</a>


        <div class="col-md-12">
        
          <table class="table-bordered table table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
              </tr>
            </thead>
            <tbody>

            <?php foreach($users as $user) : ?>
              <tr>
                <td><?php echo $user->id; ?></td>
                <td><img class="admin-user-thumbnail user_image" src="<?php echo $user->image_path_and_placeholder(); ?>"></td>
                <td><?php echo $user->username; ?>
              
                  <div class="action_links">
                    <a class="delete_link" href="delete_user.php?id=<?php echo $user->id ?>">Delete</a>
                    <a href="edit_user.php?id=<?php echo $user->id ?>">Edit</a>
                  </div>
                </td>
                <td><?php echo $user->first_name; ?></td>
                <td><?php echo $user->last_name; ?></td>
              </tr>

            <?php endforeach; ?>
            </tbody>
          </table>

          
        </div>
      
        

      </section>
  
<?php include ("includes/admin_footer.php") ?>