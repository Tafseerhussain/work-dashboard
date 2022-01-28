<?php include 'db/db.php'; ?>
<?php include 'session.php'; ?>
<?php include 'layouts/header.php'; ?>
  <div class="wrapper ">
    <?php include 'layouts/sidebar.php'; ?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php include 'layouts/navbar.php'; ?>
      <!-- End Navbar -->
      <div class="content">
        <?php 
        $currentYear = date('Y');
          $result = mysqli_query($conn,"select count(*) as count, year(created_at) as year, month(created_at) as month, sum(price) as total_amount from `projects` WHERE year(created_at) = '$currentYear' group by year(created_at), month(created_at) ");
         ?>
        <div class="container">
          <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  2020
                  <button class="btn btn-link text-white float-right" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="background-color: #9c27b0;box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(156, 39, 176, 0.4);">
                    View
                  </button>
                </h2>
              </div> 

              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  <table class="table table-bordered table-hover all-records">
                    <thead class="thead-light">
                      <tr>
                      <th>Month</th>
                      <th>Projects</th>
                      <th>Amount ($)</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $i=0;
                        while($row = mysqli_fetch_array($result)) {
                          $monthNum  = $row["month"];
                          $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                          $monthName = $dateObj->format('F');
                        ?>
                          <tr>
                          <td><?php echo $monthName.', '.$row["year"]; ?></td>
                          <td><?php echo $row['count']; ?></td>
                          <td><?php echo $row["total_amount"]; ?></td>
                          </tr>
                      <?php
                          $i++;
                        }
                      ?>
                    </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
          
      </div>
      <div class="container">
        
      </div>
      </div>
      <?php include 'layouts/footer.php'; ?>
    </div>
  </div>
  
  <?php include 'layouts/scripts.php'; ?>