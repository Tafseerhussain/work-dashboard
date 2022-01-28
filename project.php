<?php include 'session.php'; ?>
<?php include 'layouts/header.php'; ?>
  <div class="wrapper ">
    <?php include 'layouts/sidebar.php'; ?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php include 'layouts/navbar.php'; ?>
      
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8 offset-md-2">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add Project</h4>
                  <p class="card-category">Write Details Of The New Project</p>
                </div>
                <div class="card-body project-fade-in">
                   <div class="row">
                    <div class="col-md-12">
                       <div class="alert alert-danger" v-if="projectError">
                          <button type="button" data-dismiss="alert" aria-label="Close" class="close" @click="empty">
                            <i class="material-icons">
                              close
                            </i>
                          </button> 
                          <span>{{ projectError }}</span>
                        </div>
                       <div class="alert alert-success" v-if="projectSuccess">
                        <button type="button" data-dismiss="alert" aria-label="Close" class="close" @click="empty">
                          <i class="material-icons">
                            close
                          </i>
                        </button> 
                        <span>{{ projectSuccess }}</span>
                      </div>
                    </div>
                   </div>
                   <div class="loading" v-if="theLoader">
                      <img src="./assets/img/loading.gif" class="loader" width="50px">
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Project Name</label>
                          <input type="text" class="form-control" v-model="project.name">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group" style="margin-top: 0.82rem !important;">
                          <label class="bmd-label-floating">Price ($)</label>
                          <input type="number" class="form-control" v-model="project.price" autocomplete="no">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
        									<select class="bmd-select form-control" v-model="project.platform">
        									  <option disabled selected value> -- Select a platform -- </option>
        									  <option value="upwork">Upwork</option>
        									  <option value="fiverr">Fiverr</option>
        									  <option value="local">Local</option>
        									</select>
                        </div>
                      </div>
                      
                    </div>
                    

                    <button type="submit" class="btn btn-primary pull-right" @click="addProject">Add Project</button>
                    <div class="clearfix"></div>
                  
                </div>
              </div>
            </div>
            <!-- <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="javascript:;">
                    <img class="img" src="assets/img/<?php echo $user['image']; ?>" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray"><?php echo $user['passion']; ?></h6>
                  <h4 class="card-title"><?php echo $user['fName']." ".$user['lName']; ?></h4>
                  <p class="card-description">
                    <?php echo $user['about']; ?>
                  </p>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>

    </div>
  </div>
 <?php include 'layouts/scripts.php'; ?>
 
</body>
</html>