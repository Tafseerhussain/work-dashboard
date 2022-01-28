var app = new Vue({

	el: '#app',
	data: {
		// User Data
		users: "",
		theLoader: false,
		user: { email: "", password: "" },
		currentUser: {},
		userError: "",
		userLoggedIn: "",
		// Projects Data
		projects: "",
		allProjects: "",
		project: { name: "", price: "", platform: "" },
		currentProject: { name: "", price: "", platform: "" },
		projectError: "",
		projectSuccess: "",
		totalEarnings: 0,
		totalEarningsAllTime: 0,
		list: []
	},
	mounted: function() {
		this.getAllUsers();
		this.getAllProjects();
		this.getAllTimeProjects();
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
		// Get All Data For Dashboard
		getDashboard: function () {
			
		},
		// Get All Users
		getAllUsers: function () {
			axios.post("requests/get.php", {
				request: 2
			})
			.then(function (response) {
				app.users = response.data;
			})
			.catch(function(error) {
				console.log(error);
			});
		},
		// Get All Projects
		getAllProjects: function () {
			axios.post("requests/get.php", {
				request: 11
			})
			.then(function (response) {
				app.projects = response.data;
				$.each(response.data, function(key, value) {
			     app.totalEarnings += parseFloat(value.price);
			   });
			})
			.catch(function(error) {
				console.log(error);
			});
		},
		// Get All Projects
		getAllTimeProjects: function () {
			axios.post("requests/get.php", {
				request: 15
			})
			.then(function (response) {
				app.allProjects = response.data;
				$.each(response.data, function(key, value) {
			     app.totalEarningsAllTime += parseFloat(value.price);
			   });
			})
			.catch(function(error) {
				console.log(error);
			});
		},
		// Add A New Project
		addProject: function () {
			if (this.project.name != '' && this.project.price != '' && this.project.platform != '') {
			    app.theLoader = true;
				axios.post("requests/post.php",{
					request: 12,
					name: this.project.name,
					price: this.project.price,
					platform: this.project.platform
				})
				.then(function (response) {
					app.projectError = "";
					app.project.name = "";
					app.project.price = "";
					app.project.platform = "";
					app.theLoader = false;
					app.projectSuccess = response.data;
				})
				.catch(function(error) {
					console.log(error);
				});
			} else {
				this.projectSuccess = "";
				this.projectError = "All Fields Are Required";
			}
		},
		// Get Current Project
		getCurrentProject: function (id) {
			axios.post("requests/get.php",{
				request: 13,
				id: id
			})
			.then(function (response) {
				app.currentProject = "";
				app.currentProject = response.data;
			})
			.catch(function(error) {
				console.log(error);
			});
		},
		// Update Project
		updateProject: function (id) {
			if (this.currentProject.name != '' && this.currentProject.price != '' && this.currentProject.platform != '') {
				axios.post("requests/post.php",{
					request: 14,
					id: id,
					name: this.currentProject.name,
					price: this.currentProject.price,
					platform: this.currentProject.platform
				})
				.then(function (response) {
					app.projectError = "";
					app.projectSuccess = response.data;
					app.getAllProjects();
				})
				.catch(function(error) {
					console.log(error);
				});
			} else {
				this.projectSuccess = "";
				this.projectError = "All Fields Are Required";
			}
		},
		removeProject: function (id) {
			swal({
    		title: "Remove Project?",
    		text: "Are you sure you want to Remove this Project and its Data?",
    		icon: "warning",
    		buttons: true,
    		dangerMode: true,
    		})
    		.then((willDelete) => {
        		if (willDelete) {
        		    swal("Project Removed.", {
        		    icon: "success",
        		    });
        		    app.confirmRemoveProject(id);
        		}
    		});
		},
		confirmRemoveProject: function (id) {
			axios.post("requests/post.php",{
				request: 17,
				id: id
			})
			.then(function (response) {
				app.getAllProjects();
			})
			.catch(function(error) {
				console.log(error);
			});
		},
		empty: function () {
			this.projectSuccess = "";
			this.projectError = "";
			this.userError = "";
		}
	}

});