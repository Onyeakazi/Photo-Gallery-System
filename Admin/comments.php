<?php include ("includes/admin_header.php") ?>
<?php if (!$session->is_signed_in()) {redirect("login.php");}?>

<?php
$comments = Comment::find_all();

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
            <h3 class="page-header"><i class="fa fa fa-bars"></i>All Comments</h3>
            <p style="background-color: greenyellow;"><?php echo $message; ?></p>
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
                <th>Author</th>
                <th>Body</th>
              </tr>
            </thead>
            <tbody>

            <?php foreach($comments as $comment) : ?>
              <tr>
                <td><?php echo $comment->id; ?></td>
                <!-- <td><img class="admin-user-thumbnail user_image" src="<//?php //echo $comment->image_path_and_placeholder(); ?>"></td> -->
                <td><?php echo $comment->author; ?>
              
                  <div class="action_links">
                    <a class="delete_link" href="delete_comment.php?id=<?php echo $comment->id ?>">Delete</a>
                  </div>
                </td>
                <td><?php echo $comment->body; ?></td>
              </tr>

            <?php endforeach; ?>
            </tbody>
          </table>

          
        </div>
      
        

      </section>
  
<?php include ("includes/admin_footer.php") ?>