<?php include("includes/header.php"); ?>
<?php
require_once("Admin/includes/init.php");


if(empty($_GET['id'])) {
    redirect("index.php");
}

$photo = Photo::find_by_id($_GET['id']);


if(isset($_POST['submit'])) {
    $author = $_POST['author'];
    $body = $_POST['body'];

    $new_comment = Comment::create_comment($photo->id, $author, $body);
    if($new_comment) {
        $new_comment->save();
        $session->message("You made a Comment.");
        redirect("photo.php?id={$photo->id}");
    } else {
        $message = "There was a problem saving";
    }

} else {
    $author = "";
    $body = "";
}

$find_comments = Comment::find_the_comments($photo->id);

?>
    <div class="row">

    <div class="col-lg-12">

        <!-- Blog Post -->

        <!-- Title -->
        <h1><?php echo $photo->title; ?></h1>

        <!-- Author -->
        <p class="lead">
            by <a href="#">Godswill Berry</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2023 at 9:00 PM</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-responsive" src="Admin/<?php echo $photo->picture_path(); ?>" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead"><?php echo $photo->caption; ?></p>
        <p><?php echo $photo->description; ?></p>

        <hr>
        <p style="background-color: greenyellow;"><?php echo $message; ?></p>

        <!-- Blog Comments -->

        <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>
            <form role="form" method="post">
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" name="author" class="form-control">
                </div>
                <div class="form-group">
                    <label for="massage">Your Massage</label>
                    <textarea name="body" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <hr>

        <!-- Posted Comments -->

        <!-- Comment -->


        <?php  foreach ($find_comments as $comment) : ?>

            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading" style="font-weight: 700;color:#35a2aa;"><?php echo $comment->author; ?>:
                    </h4>
                    <?php echo $comment->body; ?>
                </div>
            </div>

        <?php endforeach; ?>

    </div>

 <!-- Blog Sidebar Widgets Column -->
 <!-- <div class="col-md-4"> -->

        
    <//?php include("includes/sidebar.php"); ?>



</div>
<!-- /.row -->

<?php include("includes/footer.php"); ?>
</div>
