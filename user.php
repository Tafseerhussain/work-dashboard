<?php include 'db/db.php'; ?>
<?php include 'session.php'; ?>
<?php include 'layouts/header.php'; ?> 
  <div class="wrapper ">
    <?php include 'layouts/sidebar.php'; ?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php include 'layouts/navbar.php'; ?>
      <?php
        $id = $_SESSION["loggedIn"]["id"];
        $query = $conn->query("SELECT * FROM `users` WHERE `id`='$id'");
        $user = mysqli_fetch_assoc($query); 
      ?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body user-form">
                  
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label">Company (disabled)</label>
                          <input type="text" value="Art Dev" class="form-control pt-4 pb-3" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label">Email address</label>
                          <input type="email" value="<?php echo $user['email']; ?>" class="form-control pt-4 pb-3"  autocomplete="no">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label">First Name</label>
                          <input type="text" value="<?php echo $user['fName']; ?>" class="form-control pt-4 pb-3" autocomplete="no">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label">Last Name</label>
                          <input type="text" value="<?php echo $user['lName']; ?>" class="form-control pt-4 pb-3" autocomplete="no">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label">Address</label>
                          <input type="text" value="<?php echo $user['address']; ?>" class="form-control pt-4 pb-3" autocomplete="no">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label">City</label>
                          <input type="text" value="<?php echo $user['city']; ?>" class="form-control pt-4 pb-3" autocomplete="no">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label">Country</label>
                          <input type="text" value="<?php echo $user['country']; ?>" class="form-control pt-4 pb-3" autocomplete="no">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label">Postal Code</label>
                          <input type="text" value="<?php echo $user['postalCode']; ?>" class="form-control pt-4 pb-3" autocomplete="no">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="form-group">
                            <label class="bmd-label">About Me</label>
                            <textarea class="form-control pt-4 pb-3" rows="5"><?php echo $user['about']; ?>
                            </textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                    <div class="clearfix"></div>
                  
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="javascript:;">
                    <img class="img" src="assets/img/<?php echo $user['image']; ?>" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray"><?php echo $user['passion']; ?></h6>
                  <h4 class="card-title text-capitalize"><?php echo $user['fName']." ".$user['lName']; ?></h4>
                  <p class="card-description">
                    <?php echo $user['about']; ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include 'layouts/footer.php'; ?>
    </div>
  </div>
  
  <!--   Core JS Files   -->
  <?php include 'layouts/scripts.php'; ?>
  
</body>
</html>