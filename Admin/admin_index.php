<?php include ("includes/admin_header.php") ?>
<?php if(!$session->is_signed_in()) {redirect("login.php");}

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
            <h3 class="page-header"><i class="fa fa fa-bars"></i> Welcome to Admin Dashboard</h3>

              

            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="admin_index.php">Home</a></li>
              <li><i class="fa fa-bars"></i>Pages</li>
              <li><i class="fa fa-square-o"></i>Pages</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-3 col-md-6">
              <div class="panel panel-primary">
                <div class="info-box blue-bg">
                  <div class="row">
                    <div class="col-xs-3">
                      <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                      <div class="huge" style="font-size:50px;"><?php echo $session->count; ?></div>
                      <div>New Views</div>
                    </div>
                  </div>
                </div>
                <a href="#">
                  <div class="panel-footer" style="background-color: #fff;">
                    <span class="pull-left">View Details</span> 
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> 
                    <div class="clearfix"></div>
                  </div>
                </a>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="panel panel-green">
                <div class="info-box green-bg">
                  <div class="row">
                    <div class="col-xs-3">
                      <i class="fa fa-photo fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                      <div class="huge" style="font-size:50px;"><?php echo Photo::number(); ?></div>
                      <div>Photos</div>
                    </div>
                  </div>
                </div>
                <a href="photos.php">
                  <div class="panel-footer">
                    <span class="pull-left">Total Photos in Gallery</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                  </div>
                </a>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="panel panel-yellow">
                <div class="info-box orange-bg">
                  <div class="row">
                    <div class="col-xs-3">
                      <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                      <div class="huge" style="font-size:50px;"><?php echo USer::number(); ?></div>
                      <div>Users</div>
                    </div>
                  </div>
                </div>
                <a href="users.php">
                  <div class="panel-footer">
                    <span class="pull-left">Total Users</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                  </div>
                </a>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="panel panel-red">
                <div class="info-box red-bg">
                  <div class="row">
                    <div class="col-xs-3">
                      <i class="fa fa-support fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                      <div class="huge" style="font-size:50px;"><?php echo Comment::number(); ?></div>
                      <div>Comments</div>
                    </div>
                  </div>
                </div>
                  <a href="comments.php">
                    <div class="panel-footer">
                      <span class="pull-left">Total Comments</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                    </div>
                  </a>
              </div>
            </div>
          </div> <!--First Row-->

          <div class="container">
          <div class="row" >
                <div id="piechart" style="width: 900px; height: 500px;"></div>
              </div>
          </div>
              




        </div>


        
      </section>
      
        

      </section>
  
<?php include ("includes/admin_footer.php") ?>