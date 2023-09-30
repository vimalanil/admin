<?php



require 'header.php';

?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Contest Managment</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Contest Management</li>
        <li class="breadcrumb-item active">Create contest</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Create Contest</h5>

      <!-- Floating Labels Form -->
      <form class="row g-3" action="php/createcontestaction.php" method="POST">
        <div class="col-md-12">
          <div class="form-floating">
            <input type="text" class="form-control" id="floatingName" name="cname" placeholder="Name of Contest">
            <label for="floatingName">Name of Contest</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control" id="floatingdesignation" name="desig" placeholder="designation">
            <label for="floatingdesignation">Designation</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-floating">
            <input type="date" class="form-control" id="floatingDate" name="date" placeholder="Date">
            <label for="floatingDate">Date</label>
          </div>
        </div>

        <div class="col-md-6">
          <div class="col-md-12">
            <div class="form-floating mb-3">
              <select class="form-select" id="stime" name="stime" aria-label="State">
                <option selected disabled>Select Starting Time</option>

                <?php
                $sql = "SELECT * FROM `time`";


                $data = select_data($sql);

       

                while ($row = mysqli_fetch_assoc($data)) {

                  ?>
                  <option value="<?php echo $row['id']; ?>"><?php echo $row['time']; ?></option>

                  <?php
                }
                ?>




              </select>
              <label for="floatingstime">Starting Time</label>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="col-md-12">
            <div class="form-floating mb-3">
              <select class="form-select" id="etime" name="etime" aria-label="State">
                <option selected disabled>Select Ending Time</option>

                <?php
                $sql = "SELECT * FROM `time`";


                $data = select_data($sql);

                $n = 1;

                while ($row = mysqli_fetch_assoc($data)) {

                  ?>
                  <option value="<?php echo $row['id']; ?>"><?php echo $row['time']; ?></option>

                  <?php
                }
                ?>




              </select>
              <label for="floatingetime">Ending Time</label>
            </div>
          </div>
        </div>


       
        <!-- <div class="col-md-4"> 
      <div class="form-floating mb-3">
        <select class="form-select" id="floatingSelect" aria-label="State">
          <option selected>New York</option>
          <option value="1">Oregon</option>
          <option value="2">DC</option>
        </select>
        <label for="floatingSelect">State</label>
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-floating">
        <input type="text" class="form-control" id="floatingZip" placeholder="Zip">
        <label for="floatingZip">Zip</label>
      </div>
    </div>-->
        <div class="col-12">
          <div class="form-floating">
            <textarea class="form-control" placeholder="Discription" name="ins" id="floatingTextarea"
              style="height: 100px;"></textarea>
            <label for="floatingTextarea">Instructions</label>
          </div>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End floating Labels Form -->

    </div>
  </div>

  </div>
  </div>
  </section>

</main><!-- End #main -->

<?php



require 'footer.html';

?>