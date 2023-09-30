<?php
require $_SERVER['DOCUMENT_ROOT'] . '/ballot/Admin/header.php';

$email=$_SESSION['email'];
?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

      <section class="section">
      <div class="row">
        <div class="col-lg-12">

        <div class="card"> 
          <div class="card-body"> 
            <h5 class="card-title"> 
       Upcoming Contest
            </h5>


         
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Sl no</th>
                   
                    <th scope="col">Contest Name</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Date</th>
                    <th scope="col">Starting Time</th>
                    <th scope="col">Ending Time</th>
                    <th scope="col">Instructions</th>
                    <th scope="col">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
 
                <?php 

           
               date_default_timezone_set('Asia/Kolkata');
               $date = date("Y-m-d"); 
               $sql = "SELECT * FROM `contest` WHERE date>'$date'";


                $data=select_data($sql);

                $n=1;

                while ($row = mysqli_fetch_assoc($data)) {
                  
                  ?>
                  <tr>
                 <th scope='row'><?php echo $n++; ?></th>
                
                 <td> <?php echo $row['cname'] ?></td>
                 <td><?php echo $row['desig'] ?></td>
                 <td><?php echo $row['date']?></td>
                 <td> <?php echo $row['stime']  ?></td>
                 <td> <?php echo $row['etime'] ?></td>
                 <td> <button type="button" class="btn btn-primary btn-sm"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="<?php echo $row['ins'] ?>">
                                                        View Instructions
                 </button> </td>
                 <td>
                      <div class="btn-group">
                        <a href="managecontest.php?cid=<?php echo $row['cid']; ?>" class="btn btn-success btn-sm">Manage</a>
                        <a href="managecontest.php?cid=<?php echo $row['cid']; ?>&s=2" class="btn btn-danger btn-sm">Remove</a>
                      </div>
                 </td>                                   
                 </tr>

                  <?php
                  }
                  ?>
                 
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->


      <?php 

      echo "admin :";
      echo $email;

      ?>




      </div>
    </section>

  </main><!-- End #main -->

<?php 


require $_SERVER['DOCUMENT_ROOT'] . '/ballot/Admin/footer.html';

?>