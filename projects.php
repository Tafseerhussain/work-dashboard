<?php include 'db/db.php'; ?>
<?php include 'session.php'; ?>
<?php include 'layouts/header.php'; ?> 
  <div class="wrapper ">
    <?php include 'layouts/sidebar.php'; ?> 
    <div class="main-panel">
      <!-- Navbar -->
      <?php include 'layouts/navbar.php'; ?>
      <!-- End Navbar -->
      <?php
        $currentMonth = date('m');
        $query = $conn->query("SELECT * FROM `projects` WHERE MONTH(created_at) = '$currentMonth'");
      ?>
      <div class="content">
      <!-- <div class="alert alert-success alert-with-icon w-100" data-notify="container">
        <i class="material-icons" data-notify="icon">done</i>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
        <span data-notify="message">Project Edited.</span>
      </div> -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Projects
                  <span class="float-right" style="top: 13px;position: relative;">
                    This Month Total :
                    <span id="projectsTotal"></span>
                  </span>
                </h4>
                <span>Projects Of <?php echo date('F, Y') ?></span>
              </div>
              <div class="card-body">
                  <table class="table table-hover table-striped" id="projects">
                    <thead class=" text-primary">
                      <th>ID</th>
                      <th>Name</th>
                      <th>Price ($)</th>
                      <th>Added By</th>
                      <th>Platform</th>
                      <th>Date/Time</th>
                      <th>Actions</th>
                    </thead>
                    <tbody>
                      <tr v-for="project in projects">
                        <td>{{ project.id }}</td>
                        <td>{{ project.name }}</td>
                        <td>{{ project.price }}</td>
                        <td>{{ project[0] }}</td>
                        <td>{{ project.platform }}</td>
                        <td>{{ project[1] }}</td>
                        <td class="actions td-actions">
                          <button type="button" class="btn btn-primary btn-link btn-sm" @click="getCurrentProject(project.id)" data-toggle="modal" data-target="#basicExampleModal">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" class="btn btn-danger btn-link btn-sm" @click="removeProject(project.id)">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                
              </div>
            </div>
          </div>
          
        </div>
      </div>

      <!-- Edit Project Modal -->
      <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Project</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
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
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label" style="position: relative;">Project Name</label>
                    <input type="text" class="form-control" v-model="currentProject.name">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label" style="position: relative;">Project Price ($)</label>
                    <input type="number" class="form-control" v-model="currentProject.price">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label mb-0" style="position: relative;">Project Platform</label>
                    <select class="bmd-select form-control" v-model="currentProject.platform">
                      <option disabled selected value> -- Select a platform -- </option>
                      <option value="upwork">Upwork</option>
                      <option value="fiverr">Fiverr</option>
                      <option value="local">Local</option>
                    </select>
                    </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" @click="updateProject(currentProject.id)">Save changes</button>
            </div>
          </div>
        </div>
      </div>


    </div>
      <?php include 'layouts/footer.php'; ?> 
    </div>
  </div>
  
  <?php include 'layouts/scripts.php'; ?>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    $(document).ready(function() {

      setTimeout(function(){ 

        var projects = $('#projects').DataTable({

          retrieve: true,
          
        });
        var totalPrice = projects.column( 2 ).data().sum();
        $("#projectsTotal").text(totalPrice+" ($)");

      },1500 );

    });
  </script>
</body>
</html>