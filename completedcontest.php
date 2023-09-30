<?php
require $_SERVER['DOCUMENT_ROOT'] . '/ballot/Admin/header.php';

$email = $_SESSION['email'];
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
                  Completed Contest
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

                    </tr>
                  </thead>
                  <tbody>

                    <?php

                    $sql1 = "SELECT * FROM `registration` WHERE email = '$email' ";

                    $data1 = select_data($sql1);

                    $row1 = mysqli_fetch_assoc($data1);

                    $admno = $row1['admno'];



                    date_default_timezone_set('Asia/Kolkata');
                    $date = date("Y-m-d");


                    $sql = " SELECT * FROM contest WHERE date > '$date' AND cid IN (SELECT cid FROM electoralroll WHERE admno = '$admno')";


                    $data = select_data($sql);

                    $n = 1;

                    while ($row = mysqli_fetch_assoc($data)) {

                      ?>
                      <tr>
                        <th scope='row'>
                          <?php echo $n++; ?>
                        </th>

                        <td>
                          <?php echo $row['cname'] ?>
                        </td>
                        <td>
                          <?php echo $row['desig'] ?>
                        </td>
                        <td>
                          <?php echo $row['date'] ?>
                        </td>
                        <td>
                          <?php echo $row['stime'] ?>
                        </td>
                        <td>
                          <?php echo $row['etime'] ?>
                        </td>
                        <td> <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="<?php echo $row['ins'] ?>">
                            View Instructions
                          </button> </td>
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