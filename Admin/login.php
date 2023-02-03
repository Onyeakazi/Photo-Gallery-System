<?php require_once("includes/admin_header.php"); ?>

<?php

if($session->is_signed_in()) {
    redirect("admin_index.php");
}

if(isset($_POST['submit'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // METHOD TO CHECK DATABASE 
    $found_user = User::verify_user($username, $password);

    if($found_user) {
        $session->login($found_user);
        redirect("admin_index.php");
    } else {
        $the_message = "Your username or password is incorrect";
    }
} else {
    $the_message = "";
    $username = "";
    $password = "";
}

?>


<div class="col-md-4 col-md-offset-3">

    <h4 style="background-color:red;color:white;font-weight:600; padding: 7px 7px;text-align:center;border-radius:10px;margin-left:50px;margin-right:50px;"><?php echo $the_message ?></h4>
	
    <form id="login-id" action="" method="post">
        
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">
            
        </div>

        <div class="form-group">
        <input type="submit" name="submit" value="Submit" class="btn btn-primary">

        </div>

    </form>


</div>