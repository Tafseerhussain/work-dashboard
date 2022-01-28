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
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Users</h4>
                <span>All Users</span>
                  <div style="position: absolute;right: 10px;top: 10px">
                    <div v-for="user in users" class="d-inline-block mr-1">
                      <img v-bind:src="'assets/img/' + user.image" style="border-radius: 50%;width: 50px; box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);">
                    </div>
                  </div>
              </div>
              <div class="card-body users-fade-in">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead class=" text-primary">
                      <th>
                        ID
                      </th>
                      <th>
                        Name
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        Passion
                      </th>
                      <th>
                        City
                      </th>
                    </thead>
                    <tbody>
                      <tr v-for="user in users" v-bind:class="
                      {'text-primary bg-light': (user.id==<?php echo $_SESSION['loggedIn']['id'];?>) }">
                        <td >
                          {{ user.id }}
                        </td>
                        <td class="text-capitalize">
                          {{ user.fName }} {{ user.lName }}
                        </td>
                        <td>
                          {{ user.email }}
                        </td>
                        <td>
                          {{ user.passion }}
                        </td>
                        <td>
                          {{ user.city }}, {{ user.country }}
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
    <?php include 'layouts/footer.php'; ?>
  </div>
</div>

<?php include 'layouts/scripts.php'; ?>
</body>
</html>