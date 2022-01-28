<?php require_once 'db/db.php'; ?>
<?php 
	session_start();
	if (isset($_SESSION['loggedIn'])) {
		echo "<script> window.location = './'; </script>";
	}
?>
<?php $page = basename($_SERVER['SCRIPT_NAME']); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Work 
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <style>
    [v-cloak] {
      display: none;
    }
  </style>
</head>

<body class="">
  <div id="app" v-cloak>
    <div class="content" style="height: 100vh">
      <div class="container-fluid" style="position: relative; top: 50%; transform: translateY(-60%);">
        <div class="row">
          <div class="col-md-4 offset-md-4">
            <div class="card">
              <div class="card-header card-header-primary">
                <h3 class="card-title text-center">Our Work</h3>
                <p class="card-category text-center">Log Into Your Profile</p>
              </div>
              <div class="card-body">
						<div class="row" v-if="userError">
							<div class="col-md-12">
                <div class="alert alert-danger" v-if="userError">
                    <button type="button" data-dismiss="alert" aria-label="Close" class="close" @click="empty">
                      <i class="material-icons">
                        close
                      </i>
                    </button> 
                    <span>{{ userError }}</span>
                  </div>
							</div>
						</div>
						<div class="row" v-if="userLoggedIn">
							<div class="col-md-12">
								<div class="alert alert-success w-100">
									 {{ userLoggedIn }}
								</div>
							</div>
						</div>
                  <div class="row">
                    <div class="col-md-12 mt-2">
                      <div class="form-group">
                        <label class="bmd-label-floating">Email address</label>
                        <input type="email" class="form-control" name="email" v-model="user.email" autocomplete="off">
                      </div>
                    </div>
                    <div class="col-md-12 mt-2 mb-2">
                      <div class="form-group">
                        <label class="bmd-label-floating">Password</label>
                        <input type="password" class="form-control" name="password" v-model="user.password">
                      </div>
                    </div>
                  </div>
                  
                  <button type="submit" class="btn btn-primary pull-right" @click="login">Login</button>
                  <div class="clearfix"></div>

              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
  <!-- JQuery -->
  <script src="assets/js/core/jquery.min.js"></script>
  <!-- Vue JS -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/vue"></script>
  <!-- Axios JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  
  <script>
    var app = new Vue({

    el: '#app',
    data: {
      // User Data
      users: "",
      theLoader: false,
      user: { email: "admin@admin.com", password: "12345" },
      currentUser: {},
      userError: "",
      userLoggedIn: "",
      // Projects Data
      projects: "",
      project: { name: "", price: "", platform: "" },
      currentProject: { name: "", price: "", platform: "" },
      projectError: "",
      projectSuccess: "",
      totalEarnings: 0,
      list: []
    },
    mounted: function() {
      this.theLoader = false;
    },
    methods: {
      // User Login
      login: function () {
        if (this.user.email != '' && this.user.password != '') {
          axios.post("requests/get.php", {
            request: 1,
            email: this.user.email, 
            password: this.user.password
          })
          .then(function (response) {
            if (response.data == '1') {
              app.userError = "";
              app.userLoggedIn = "Logging In...";
              window.location = './';
            } else {
              app.userLoggedIn = "";
              app.userError = response.data;
            }
          })
          .catch(function(error) {
            console.log(error);
          });
        } else {
          this.userError = "Please Type All Credentials";
        }
      },
      empty: function () {
        this.projectSuccess = "";
        this.projectError = "";
        this.userError = "";
      }
    }

  });
  </script>
  
  
</body>
</html>