<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Doctor Registration System</title>

  <!-- bootstrapstrap -->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap-5.3.0-alpha1-dist/css/bootstrap.css">
  <script src="vendor/bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.js"></script>
  <!-- <script src="vendor/bootstrap-5.3.0-alpha1-dist/js/bootstrap.js"></script> -->

  <!-- fontawesome  -->
  <link rel="stylesheet" href="vendor/fontawesome-free-6.2.1-web/css/all.css">


  <!-- custom css  -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/responsive.css">


  <!-- jquery js  -->
  <script src="vendor/jquery/jquery-3.6.3.min.js" ></script>

</head>


<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand" href="#">Hidden brand</a>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled">Disabled</a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>



    <!-- =========main============== -->
    <main class="container">
      <div class="my-5" id="patient_register_container">
      <!-- <h2 class="text-center">Registraton Form</h2> -->
        <div class="row justify-content-center my-4" id="personal_info_container">
          <div class="col-12 col-lg-10 col-xxl-8 col-xl-10">
            <!-- personal information step  -->
            <h3 class="mb-3 text-center">Personal Information</h3>
            <form id="form_personal_info" class="row g-3 needs-validation" novalidate>

              <!-- name  -->
              <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required>

              </div>


              <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required>
              </div>

              <!-- gender  -->
              <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                <label for="" class="form-label">Gender</label>
                <div class="input-group">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male"  required>
                    <label class="form-check-label" for="male">Male</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female"  required>
                    <label class="form-check-label" for="female">Female</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="other" value="other"  required>
                    <label class="form-check-label" for="other">Other</label>
                  </div>
                </div>
              </div>

              <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                <label for="date_of_birth" class="form-label">Date Of Birth</label>
                <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="" required>
              </div>

              <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                <label for="marital_status" class="form-label">Relationship Status(Optional)</label>
                <select name="marital_status" id="marital_status" required  class="form-select" aria-label="Default select example">
                  <option disabled selected>Select One</option>
                  <option value="1">Sigle</option>
                  <option value="1">In a Relationship</option>
                  <option value="1">Angaged</option>
                  <option value="2">Marid</option>
                  <option value="3">Devorced</option>
                </select>

              </div>

              <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                <label for="nationality" class="form-label">Nationality</label>
                <select name="nationality" id="nationality" required  class="form-select" aria-label="Default select example">
                  <option value="" disabled selected>Select One</option>
                  <option value="1">Bangladeshi</option>
                  <option value="2">Indian</option>
                  <option value="3">British</option>
                </select>
              </div>

              <!-- address  -->
              <div class="col-12 ">
                <label for="address_line_1" class="form-label">Address Line 1</label>
                <input type="text" class="form-control" name="address_line_1" id="address_line_1" placeholder="Street address" required>

              </div>
              <div class="col-12 ">
                <label for="address_line_2" class="form-label">Address Line 2</label>
                <input type="text" class="form-control" name="address_line_2" id="address_line_2" placeholder="Appartment, Unit, Building, Floor etc" required>

              </div>
              <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" name="city" id="city" placeholder="City" required>

              </div>
              <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                <label for="state" class="form-label">State</label>
                <input type="text" class="form-control" name="state" id="state" placeholder="District/Region/Province" required>

              </div>

              <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                <label for="zip_code" class="form-label">Zip Code</label>
                <input type="text" class="form-control" name="zip_code" id="zip_code" placeholder="Postal/Zip Code" required>

              </div>

              <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                <label for="country" class="form-label">Country</label>
                <select  class="form-select" aria-label="Default select example" name="country" id="country" required>
                  <option value="" disabled selected>Select One</option>
                  <option value="1">Bangladesh</option>
                  <option value="2">India</option>
                  <option value="3">UK</option>
                </select>
              </div>

              <!-- end address  -->

              <!-- contact no  -->
              <div class="col-12 col-lg-2 col-xl-2 col-xxl-2">
                <label for="phone_code" class="form-label">Phone Code</label>
                <select name="phone_code" id="phone_code" required class="form-select" aria-label="Default select example">
                  <option value="" disabled selected>Select One</option>
                  <option value="1">+88</option>
                  <option value="2">+1597</option>
                  <option value="3">+9715</option>
                </select>
              </div>
              <div class="col-12 col-lg-5 col-xl-5 col-xxl-5">
                <label for="contact"  class="form-label col-4">Phone Number</label>
                <input type="number" class="form-control" name="contact" id="contact" placeholder="01XXXXXXXXX" required>
              </div>
              <div class="col-12 col-lg-5 col-xl-5 col-xxl-5">
                <label for="contact2"  class="form-label">Additional Number</label>
                <input type="number" class="form-control" name="contact2" id="contact2" placeholder="01XXXXXXXXX" required>
              </div>


              <!-- identity -->
              <div class="col-12 col-lg-3 col-xl-3 col-xxl-3">
                <label for="identity" class="form-label">Identity</label>
                <select name="identity_type" id="" required class="form-select">
                  <option value="" disabled selected>Select Type</option>
                  <option value="1">Passport</option>
                  <option value="2">Residential Card</option>
                </select>
              </div>

              <div class="col-12 col-lg-5 col-xl-5 col-xxl-5">
                <label for="identity" class="form-label">Identity no.</label>
                <input type="text" class="form-control" name="identity_no" id="identity" placeholder="854XXXXXXXXXXXXXXXX" >
              </div>

              <div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
                <label for="identity_proof" class="form-label">Identity Proof(img,pdf)</label>
                <input class="form-control" type="file" name="identity_proof" id="identity_prof" required>
              </div>

              <div class="col-12 my-4">
                <div class="text-center">
                  <button class="btn btn-outline-primary" name="btnSavePersonalInfo" type="button">Continue</button>
                </div>
              </div>
            </form>
          </div>
        </div>

        <!-- physical information step   -->
        <div class="row justify-content-center" id="physical_info_container">
          <div class="col-12 col-lg-10 col-xxl-8 col-xl-10">
          <h3 class="mb-3 text-center">Physical Information</h3>
          <form id="frm_physical_info" class="row g-3 needs-validation" enctype="multipart/form-data" novalidate>

            <div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
              <label class="form-label" for="height">Height</label>
              <input class="form-control" type="number" name="height" id="height" minlength="30" placeholder="In CM">
            </div>

            <div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
              <label class="form-label" for="weight">Weight</label>
              <input class="form-control" type="number" name="weight" id="weight" minlength="20" placeholder="In KG">
            </div>

            <div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
              <label class="form-label" for="blood_group">Blood Group</label>
              <select id="blood_group" name="blood_group" required class="form-select" aria-label="Default select example">
                <option value="" disabled selected>Select One</option>
                <option value="1">A+</option>
                <option value="2">A-</option>
                <option value="3">B+</option>
                <option value="4">B-</option>
              </select>
            </div>

            <div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
              <label class="form-label" for="disability">Disability</label>
              <select id="disability" name="disability" required class="form-select" aria-label="Default select example">
                <option value="" disabled selected>Select One</option>
                <option value="1">Yes</option>
                <option value="2">No</option>
              </select>
            </div>

            <div class="col-12 col-lg-8 col-xl-8 col-xxl-8">
              <label for="disability_desc" class="form-label">Description(If Yes)</label>
              <input type="text" class="form-control" name="disability_desc" id="disability_desc" placeholder="What's your disability?" required>
            </div>


            <h4 class="mt-4 col-12">Vital Info</h4>
            <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
              <label for="blood_pressure" class="form-label">Blood Pressure</label>
              <input type="text" class="form-control" name="blood_pressure" id="blood_pressure" placeholder="Highest Value/Lower Value" required>
            </div>

            <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
              <label for="sugar_level" class="form-label">Sugar Level</label>
              <input type="number" class="form-control" name="sugar_level" id="sugar_level" placeholder="00.0" required>
            </div>

            <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
              <label for="heart_rate" class="form-label">Heart Rate</label>
              <input type="number" class="form-control" name="heart_rate" id="heart_rate" placeholder="00 bpm" required>
            </div>

            <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
              <label for="respiratory" class="form-label">Respiratory Rate</label>
              <input type="number" class="form-control" name="respiratory" id="respiratory" placeholder="00" required>
            </div>

            <div class="col-12 mt-4">
              <div class="text-center">
                <button class="btn btn-outline-info" type="button" name="back">Previous</button>
                <button class="btn btn-outline-primary" name="btnPysicalInfo" type="button">Continue</button>
              </div>
            </div>
          </form>
          </div>
        </div>

        <!-- Previous Diagonosis Report step   -->
        <div class="row justify-content-center" id="diagonosis_report_container">
          <div class="col-10">
            <h3 class="mb-2 text-center">Diagonosis Report(If any)</h3>
            <form id="frm_diagonosis_report" class="row g-3 needs-validation" novalidate>

              <div class="col-12">
                <label for="current_prescription" class="form-label">Upload Current Prescription(image/pdf)</label>
                <input type="file" class="form-control" name="current_prescription" id="current_prescription" placeholder="" required>
              </div>

              <div class="row g-3">
                <div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
                  <label for="test_name" class="form-label">Test Name</label>
                  <input type="text" class="form-control" name="test_name" id="test_name" placeholder="Test Name" required>
                </div>

                <div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
                  <label for="test_attachment" class="form-label">Upload Test Copy(image/pdf)</label>
                  <input type="file" class="form-control" name="test_attachment" id="test_attachment" placeholder="" required>
                </div>

                <div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
                  <label for="test_date" class="form-label">Test Date</label>
                  <input type="date" class="form-control" name="test_date" id="test_date" placeholder="" required>
                </div>

              </div>

              <div class="col-12 mt-4">
                <div class="text-center">
                  <button class="btn btn-outline-info" type="button" name="back">Previous</button>
                  <button class="btn btn-outline-primary" name="btnDiagonosis" type="button">Continue</button>

                </div>
              </div>
            </form>
          </div>
        </div>


        </div>
    </main>

    <!-- =============footer section ============== -->
    <footer class="footer ">
      <div class="footer__body f-bdy">
        <div class="f-bdy__segment">
          <h3 class="f-bdy__title">Quick Links</h3>
          <ul class="f-bdy__contents">
            <li class="f-bdy__content"><a href="./doctor_appointment.php" class="f-bdy__content-link">Get Help</a></li>
            <li class="f-bdy__content"><a href="./community.php" class="f-bdy__content-link">Community</a></li>
            <li class="f-bdy__content"><a href="contact_us.php" class="f-bdy__content-link">Contact Us</a></li>
            <li class="f-bdy__content"><a href="about.php" class="f-bdy__content-link">About</a></li>
          </ul>
        </div>

        <div class="f-bdy__segment">
          <h3 class="f-bdy__title">Get Involved</h3>
          <ul class="f-bdy__contents">
            <li class="f-bdy__content"><a href="councilor_reg.php" class="f-bdy__content-link">Join as counselor</a></li>
            <li class="f-bdy__content"><a href="contact_us.php" class="f-bdy__content-link">Browse and contact </a></li>
            <li class="f-bdy__content"><a href="doc_reg.php" class="f-bdy__content-link">Become a doctor </a></li>
            <li class="f-bdy__content"><a href="index.php" class="f-bdy__content-link">Work with us</a></li>
          </ul>
        </div>

        <div class="f-bdy__segment">
          <h3 class="f-bdy__title">Social Links</h3>
          <ul class="f-bdy__contents">
            <li class="f-bdy__content"><a href="https://www.facebook.com/" class="f-bdy__content-link">Facebook</a></li>
            <li class="f-bdy__content"><a href="https://twitter.com/i/flow/login" class="f-bdy__content-link">Twitter</a></li>
            <li class="f-bdy__content"><a href="https://www.instagram.com/" class="f-bdy__content-link">Instagram</a></li>
            <li class="f-bdy__content"><a href="https://bd.linkedin.com/" class="f-bdy__content-link">Linkdin</a></li>
          </ul>
        </div>
      </div>
      <div class="footer__bottom f-btm">
        <p class="f-btm__content">Copyright ©2022 All rights reserved | This template is made with &#128420; by Bikash Chowdhury</p>

    </footer>

    <!-- modal area  -->
  </div>



  <!-- script area  -->
  <script src="vendor/fontawesome-free-6.2.1-web/js/all.js"></script>


  <script type="text/javascript">
    // tooltip code
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
    })();

  </script>

  <!-- <script src="js/main.js"></script> -->
  <!-- <script src="js/wizard_step.js"></script> -->
  <script src="js/wizard_step.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      // form container
      const personalInfoContainer = $("#personal_info_container");
      const physicalInfoContainer= $("#physical_info_container");
      const diagonosisReportContainer= $("#diagonosis_report_container");

      // form
      const frmPersonalInfo = $("#form_personal_info");
      const frmPhysicalInfo = $("#frm_physical_info");
      const frmDiagonosisReport = $("#frm_diagonosis_report");

      // hiding content
      physicalInfoContainer.hide();
      diagonosisReportContainer.hide();

      // form data container
      const formData = {}; //form data container


      //personal info
      (personalInfoContainer.find("[name='btnSavePersonalInfo']")).click(e =>{
          const rawPersonalInfo = new FormOperation(e,personalInfoContainer);

          if(rawPersonalInfo.isEmpty){
              frmPersonalInfo.addClass('was-validated');
          }else{
              formData["personalInfo"] = rawPersonalInfo.formDataPack;
              // personalInfoContainer.hide(e=>educationInfoContainer.show());
              rawPersonalInfo.formSlider(physicalInfoContainer);
          }

      });//end personal info

      // physical info container
      (physicalInfoContainer.find("[name='btnPysicalInfo']")).click(e =>{
          const rawPhysicalInfo = new FormOperation(e,physicalInfoContainer);


          if(rawPhysicalInfo.isEmpty){
              frmPhysicalInfo.addClass('was-validated');
          }else{
              formData["physicalInfo"] = rawPhysicalInfo.formDataPack;
              // personalInfoContainer.hide(e=>educationInfoContainer.show());
              rawPhysicalInfo.formSlider(diagonosisReportContainer);
          }

          console.log(formData);
      });

      //backstep
      (physicalInfoContainer.find("[name='back']")).click(e => {
          physicalInfoContainer.hide(0,()=>personalInfoContainer.show());
      });
      //end physical info container



      //diagonosis report
      (diagonosisReportContainer.find("[name='btnDiagonosis']")).click(e =>{
          frmDiagonosisReport.submit(e => e.preventDefault());

          //object creation
          const rawDiagonosisReport = new FormOperation(e);


          if (rawDiagonosisReport.isEmpty) {
              frmDiagonosisReport.addClass('was-validated');
          }else {
              formData["diagonosisReport"] = rawDiagonosisReport.formDataPack;
          }

          console.log(formData);
      });

      //backstep
      (diagonosisReportContainer.find("[name='back']")).click(e => {
          diagonosisReportContainer.hide(0,()=>physicalInfoContainer.show());
      });
      //end diagonosis report

    })//main loader
  </script>

</body>
</html>
