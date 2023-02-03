<?php include ("includes/admin_header.php") ?>
<?php if (!$session->is_signed_in()) {redirect("login.php");}?>

<?php
$photos = Photo::find_all();

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
            <h3 class="page-header"><i class="fa fa fa-bars"></i>Photos</h3>
            <p style="background-color:greenyellow;"><?php echo $message; ?></p>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="admin_index.php">Home</a></li>
              <li><i class="fa fa-bars"></i>Pages</li>
              <li><i class="fa fa-square-o"></i>Pages</li>
            </ol>
          </div>
        </div>


        <div class="col-md-12">
        
          <table class="table-bordered table table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>File Name</th>
                <th>Title</th>
                <th>Size</th>
                <th>Comments</th>
              </tr>
            </thead>
            <tbody>

            <?php foreach($photos as $photo) : ?>
              <tr>
                <td><?php echo $photo->id; ?></td>
                <td><img class="admin-photo-thumbnail" src="<?php echo $photo->picture_path(); ?>">
              
                <div class="action_link">
                  <a class="delete_link" href="delete_photo.php?id=<?php echo $photo->id ?>">Delete</a>
                  <a href="edit_photo.php?id=<?php echo $photo->id ?>">Edit</a>
                  <a href="../photo.php?id=<?php echo $photo->id ?>">View</a>
                </div>
              
                </td>
                <td><?php echo $photo->filename; ?></td>
                <td><?php echo $photo->title; ?></td>
                <td><?php echo $photo->size; ?></td>
                <td>
                  <a href="comment_photo.php?id=<?php echo $photo->id ?>">
                    <?php 

                      $comments = Comment::find_the_comments($photo->id);
                      echo count($comments);

                    ?>
                  </a>
                  
                </td>
              </tr>

            <?php endforeach; ?>
            </tbody>
          </table>

          
        </div>
      
        

      </section>
  
<?php include ("includes/admin_footer.php") ?>