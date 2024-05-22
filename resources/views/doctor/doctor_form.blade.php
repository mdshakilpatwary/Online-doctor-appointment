@extends('layouts.admin.app')

@section('link')
    <link rel="stylesheet" href="{{asset('wizard_form/css/style.css')}} ">
    <link rel="stylesheet" href="{{asset('wizard_form/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free-6.2.1-web/css/all.css')}}">
    <x-vendor.bootstrap_css/>
@endsection

@section('content')
    <div >
        <!-- personal information step  -->
        <div class="row justify-content-center " id="doctor_register_container">
            <!-- tab area  -->
            <div class="col-12 col-lg-10 col-xxl-8 col-xl-10 my-4">
                <div class="tab_container ">
                    <div class="tab_list" for="personal_info_container" id="tab_personal_info"><span>Personal Info</span></div>
                    <div class="tab_list" for="education_info_container" id="tab_education"><span>Education</span></div>
                    <div class="tab_list" id="tab_training"><span>Training</span></div>
                    <div class="tab_list" id="tab_xp"><span>Experience</span></div>
                </div>
            </div>

            <div class="col-12 col-lg-10 col-xxl-8 col-xl-10 form-container" id="personal_info_container">
                <!-- <h3 class="mb-2 text-center">Personal Information</h3> -->
                <form id="form_personal_info" class="row g-3 needs-validation" novalidate>
                    <div class="col-12">
                        <label for="doc_title" class="form-label">Title</label>
                        <select id="doc_title" name="doc_title" required class="form-select" aria-label="Default select example">
                            <option value="" disabled selected>Select title</option>
                            <option value="2">Prof. Dr.</option>
                            <option value="3">Asso. Prof. Dr.</option>
                            <option value="4">Assis. Prof. Dr.</option>
                        </select>
                    </div>

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

                    <!-- end gender -->
                    <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                        <label for="date_of_birth" class="form-label">Date Of Birth</label>
                        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="" required>
                    </div>

                    <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                        <label for="marital_status" class="form-label">Marial Status(Optional)</label>
                        <select name="marital_status" id="marital_status" required  class="form-select" aria-label="Default select example">
                            <option disabled selected>Select One</option>
                            <option value="1">Unmarid</option>
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
                        <input type="text" class="form-control" name="address_line_2" id="address_line_2" placeholder="Appartment, Unit, Building, Floor etc">

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
                        <input type="number" class="form-control" minlength="6" name="contact" id="contact" data-contact="contact1" placeholder="01XXXXXXXXX" required>
                    </div>
                    <div class="col-12 col-lg-5 col-xl-5 col-xxl-5">
                        <label for="contact2"  class="form-label">Additional Number</label>
                        <input type="number" class="form-control" name="contact2" id="contact2" data-contact="contact2" placeholder="01XXXXXXXXX">
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
                        <input type="text" class="form-control" name="identity_no" id="identity" placeholder="854XXXXXXXXXXXXXXXX" required >
                    </div>

                    <div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
                        <label for="identity_proof" class="form-label">Identity Proof(img,pdf)</label>
                        <input class="form-control" type="file" name="identity_proof" id="identity_prof" required>

                    </div>

                    <!-- lisence  -->

                    <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                        <label for="license_no" class="form-label">License Number</label>
                        <input type="text" class="form-control" name="license_no" id="license_no" placeholder="1245XXXXXX" required>

                    </div>

                    <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                        <label for="license_attachment" class="form-label">License Attachment</label>
                        <input type="file" class="form-control" name="license_attachment" id="license_attachment" placeholder="" required>

                    </div>

                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="condition_checked" name="terms_condition" id="termsCondition" required>
                            <label class="form-check-label" for="termsCondition">
                                Agree to terms and conditions
                            </label>
                            <div class="invalid-feedback">
                                You must agree before submitting.
                            </div>
                        </div>
                    </div>


                    <div class="col-12 my-4">
                        <div class="text-center">
                            <button class="btn btn-outline-primary" name="btnSavePersonalInfo" type="button">Continue</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- educational information step   -->
            <div class="col-12 col-lg-8 col-xl-8 col-xxl-8 form-container" id="education_info_container">
                <!-- <h3 class="mb-2 text-center">Educational Information</h3> -->
                <form id="form_education" class="needs-validation" enctype="multipart/form-data" novalidate>

                    <div class="input-edu-container row  gy-3 ">
                        <div class="col-12 group-input">
                            <label for="institute" class="form-label">Institute</label>
                            <input type="text" class="form-control form-field" name="institute" id="institute" placeholder="Institute Name" required>
                        </div>

                        <div class="col-12 group-input">
                            <label for="specialization" class="form-label">Specialization</label>
                            <select id="specialization" name="specialization" required class="form-select form-field" aria-label="Default select example">
                                <option value="" disabled selected>Select One</option>
                                <option value="1">Subject 1</option>
                                <option value="2">Subject 2</option>
                                <option value="3">Subject 3</option>
                                <option value="4">Subject 4</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-6 col-xxl-6 group-input">
                            <label for="duration" class="form-label">Duration</label>
                            <input type="number" class="form-control form-field" name="duration" id="duration" min="1" placeholder="Total Month" required>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-6 col-xxl-6 group-input">
                            <label for="passing_year" class="form-label">Passing Year</label>
                            <input type="date" class="form-control form-field" name="passing_year" id="passing_year" placeholder="" required>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-6 col-xxl-6 group-input">
                            <label for="education_certificate" class="form-label">Upload certificate(image/pdf)</label>
                            <input type="file" class="form-control form-field" name="education_certificate" id="education_certificate" placeholder="" required>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-6 col-xxl-6 group-input">
                            <label for="edu_doc_titile" class="form-label">Certificate Title</label>
                            <input type="text" class="form-control form-field" name="edu_doc_titile" id="edu_doc_titile" placeholder="" required>
                        </div>
                    </div>

                    <div class="col-6 my-3 d-grid mx-auto">
                        <button type="button" id="btnAddMoreEdu" class="btn btn-outline-secondary"><span><i class="fa-solid fa-plus"></i> Add More</span></button>
                    </div>


                    <div class="col-12 mt-4">
                        <div class="text-center">
                            <button class="btn btn-outline-info" type="button" name="back">Previous</button>
                            <button class="btn btn-outline-primary" name="btnSaveEducationInfo" type="button">Continue</button>
                        </div>
                    </div>


                </form>
            </div>


            <!-- Training information step   -->
            <div class="col-12 col-lg-8 col-xl-8 col-xxl-8 form-container"  id="training_info_container">
                <form id="form_training" class="needs-validation" novalidate>

                    <div class="input-train-container row g-3">
                        <div class="col-12">
                            <label for="institute" class="form-label">Institute</label>
                            <input type="text" class="form-control form-field" name="institute" id="institute" placeholder="Institute Name" required>
                        </div>

                        <div class="col-12">
                            <label for="specialization" class="form-label">Specialization</label>
                            <select id="specialization" name="specialization" required class="form-select form-field" aria-label="Default select example">
                                <option value="" disabled selected>Select One</option>
                                <option value="1">Subject 1</option>
                                <option value="2">Subject 2</option>
                                <option value="3">Subject 3</option>
                                <option value="4">Subject 4</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                            <label for="from_date" class="form-label">From</label>
                            <input type="date" class="form-control form-field" name="from_date" id="from_date" placeholder="" required>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                            <label for="to_date" class="form-label">To</label>
                            <input type="date" class="form-control form-field" name="to_date" id="to_date" placeholder="" required>
                        </div>

                        <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                            <label for="training_certificate" class="form-label">Upload certificate(image/pdf)</label>
                            <input type="file" class="form-control form-field" name="training_certificate" id="training_certificate" placeholder="" required>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-6 col-xxl-6">
                            <label for="edu_doc_titile" class="form-label">Certificate Title</label>
                            <input type="text" class="form-control form-field" name="edu_doc_titile" id="edu_doc_titile" placeholder="" required>
                        </div>
                    </div>

                    <div class="col-6 my-3 d-grid mx-auto">
                        <button type="button" id="btnAddMoreTrain" class="btn btn-outline-secondary"><span><i class="fa-solid fa-plus"></i> Add More</span></button>
                    </div>

                    <div class="col-12 mt-4">
                        <div class="text-center">
                            <button class="btn btn-outline-info" type="button" name="back">Previous</button>
                            <button class="btn btn-outline-primary" name="btnSaveTraining" type="button">Continue</button>

                        </div>
                    </div>
                </form>
            </div>


            <!-- Experience information step   -->
            <div class="col-12 col-lg-8 col-xl-8 col-xxl-8 form-container" id="experience_container">
                <form id="form_experience" class="needs-validation" data-form="experience" novalidate>


                    <div class="input-xp-container row g-3">
                        <div class="col-12">
                            <label for="org_name" class="form-label">Organization</label>
                            <input type="text" class="form-control  form-field" name="org_name" id="org_name" placeholder="Institute Name" required>
                        </div>

                        <div class="col-12">
                            <label for="department" class="form-label">Department</label>
                            <select id="department" name="department" required class="form-select  form-field" aria-label="Default select example">
                                <option value="" disabled selected>Select One</option>
                                <option value="1">Department 1</option>
                                <option value="2">Department 2</option>
                                <option value="3">Department 3</option>
                                <option value="4">Department 4</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="position" class="form-label">Position</label>
                            <input type="text" class="form-control  form-field" name="position" id="position" placeholder="" required>
                        </div>

                        <div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
                            <label for="from_date" class="form-label">From</label>
                            <input type="date" class="form-control  form-field" name="from_date" id="from_date" placeholder="" required>
                        </div>

                        <div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
                            <label for="to_date" class="form-label">To</label>
                            <input type="date" class="form-control  form-field" name="to_date" id="to_date" placeholder="" data-job-condition="resign_date" required>
                        </div>

                        <div class="col-12 col-lg-4 col-xl-4 col-xxl-4">
                            <label class="form-label">Present</label>

                            <div class="form-check">
                                <input class="form-check-input  form-field" type="checkbox" value="checked" name="job_status" id="job_status" data-job-condition="present">
                                <label class="form-check-label" for="job_status">
                                    Yes
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 my-3 d-grid mx-auto">
                        <button type="button" id="btnAddMoreExperience" class="btn btn-outline-secondary"><span><i class="fa-solid fa-plus"></i> Add More</span></button>
                    </div>


                    <div class="col-12 mt-4">
                        <div class="text-center">
                            <button class="btn btn-outline-info" type="button" name="back">Previous</button>
                            <button class="btn btn-outline-primary" name="btnSaveExperience" type="button">Submit</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection


@section('scripts')
    <x-vendor.bootstrap_bundle_js/>
  <script type="text/javascript">

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

  <script src="{{asset('wizard_form/js/wizard_step.js')}}"></script>

  <script type="text/javascript">
      $(document).ready(function () {
          // form container
          const personalInfoContainer = $("#personal_info_container");
          const educationInfoContainer= $("#education_info_container");
          const trainingInfoContainer= $("#training_info_container");
          const experienceContainer= $("#experience_container");

          // form
          const frmPersonalInfo = $("#form_personal_info");
          const frmEducation = $("#form_education");
          const frmTraining = $("#form_training");
          const frmExperience = $("#form_experience");


          // tab switching
          const tabPersonalInfo = $("#tab_personal_info");
          const tabEducation = $("#tab_education");
          const tabTraining = $("#tab_training");
          const tabExperience = $("#tab_xp");

          // hiding content
          educationInfoContainer.hide();
          trainingInfoContainer.hide();
          experienceContainer.hide();




          // form data container
          const formData = {}; //form data container


          // =====================tab function===========================
          // tab visibility
          function tabVisibility(){
              switch(true) {
                  case personalInfoContainer.is(":visible"):
                      tabPersonalInfo.css('background-color', tabActive);

                      break;
                  case educationInfoContainer.is(":visible"):
                      tabEducation.css('background-color', tabActive);
                      // code block
                      break;
                  case trainingInfoContainer.is(":visible"):
                      tabTraining.css('background-color', tabActive);
                      break;

                  case experienceContainer.is(":visible"):
                      tabExperience.css('background-color', tabActive);
                      break;
                  default:
                      console.log("Unknown");
                  // code block
              }
          }

          function tabActivated(tabList){
              tabList.forEach(element => {
                  element.css('background-color', tabVisited);
                  element.css('cursor', 'pointer');
                  element.css('color',tabFontActive);
              });
          }

          function switchTab(elementHide,elementShow){
              elementHide.forEach(element => {
                  element.hide()
              });
              elementShow.show();
          }

          // tab activity
          const formActive = new Map();
          const tabActiveList = new Map();

          //tab  color
          let tabActive = `rgb(13, 110, 253)`;
          let tabVisited = `rgb(13, 201, 239)`;
          let tabFontActive = `rgb(255,255,255)`;


          // =====================end tab function===========================

          //==========================job validation function=================
          function jobStatusValidation(arg){
              let checkbox, formContainer, currentDatebox;

              checkbox = arg.currentTarget;
              formContainer = $(checkbox).parentsUntil($('.input-xp-container')).parent();
              currentDatebox = $(formContainer).find($(`[data-job-condition="resign_date"]`));

              if(checkbox.checked){
                  currentDatebox.attr('disabled','');
                  currentDatebox.removeAttr('required','');
                  currentDatebox[0].value = '';
              }else{
                  currentDatebox.removeAttr('disabled','');
                  currentDatebox.attr('required','');
              }

          }



          // add more field +++++++++++++++++++++++
          // for education info
          const addMoreEdu = new CloneFields($('#form_education .input-edu-container'),$('#btnAddMoreEdu'),'<p class="my-0 "><strong class="h3">More Academic Info</strong></p>');

          $('#btnAddMoreEdu').click(e=>{
              addMoreEdu.formClone();
              $('#form_education .btn-close').click(e=>{
                  $(e.currentTarget).parent().parent().remove();
              })
          });


          // for training info
          const addMoreTrain = new CloneFields($('#training_info_container .input-train-container'),$('#btnAddMoreTrain'),'<p class="my-0 "><strong class="h3">More Training Info</strong></p>');

          $('#btnAddMoreTrain').click(e=>{
              addMoreTrain.formClone();
              $('#training_info_container .btn-close').click(e=>{
                  $(e.currentTarget).parent().parent().remove();
              })
          });

          // add more experience info
          const addMoreExperience = new CloneFields($('#form_experience .input-xp-container'),$('#btnAddMoreExperience'),'<p class="my-0 "><strong class="h3">More Experience Info</strong></p>');

          $('#btnAddMoreExperience').click(e=>{
              addMoreExperience.formClone(addMoreExperience.counter);
              addMoreExperience.counter++;

              //job validation
              $(`[data-job-condition="present"]`).click(e=>{
                  jobStatusValidation(e);
              });

              $('#form_experience .btn-close').click(e=>{
                  $(e.currentTarget).parent().parent().remove();
              })
          });
          // add more field end ++++++++++++++++++++++


          //personal info ===========================================
          (personalInfoContainer.find("[name='btnSavePersonalInfo']")).click(e =>{
              const rawPersonalInfo = new FormOperation(e,personalInfoContainer);

              if(rawPersonalInfo.isEmpty){
                  frmPersonalInfo.addClass('was-validated');
              }else{
                  formData["personalInfo"] = rawPersonalInfo.formDataPack;

                  personalInfoContainer.hide(0,e=>{
                      educationInfoContainer.show();

                      if(!formActive.get('personalInfo')){
                          formActive.set('personalInfo',personalInfoContainer);
                          formActive.set('educationInfo',educationInfoContainer);
                          tabActiveList.set('tabPersonal',tabPersonalInfo);
                          tabActiveList.set('tabEdu',tabEducation);
                      }

                  })

              }
              console.log(formData);
          });//end personal info -----------------------------------



          // education info -----------------------------------
          (educationInfoContainer.find("[name='btnSaveEducationInfo']")).click(e =>{
              const rawEducationInfo = new FormOperation(e,educationInfoContainer);

              if(rawEducationInfo.isEmpty){
                  frmEducation.addClass('was-validated');
              }else{

                  formData["educationInfo"] = rawEducationInfo.formDataPack;
                  educationInfoContainer.hide(0,e=>{
                      trainingInfoContainer.show();

                      if(!formActive.get('trainingInfo')){
                          formActive.set('trainingInfo',trainingInfoContainer);
                          tabActiveList.set('tabTraining',tabTraining);
                      }

                  })
              }
              // console.log(rawEducationInfo.formElements);
              console.log(formData);
          });

          //backstep
          (educationInfoContainer.find("[name='back']")).click(e => {
              educationInfoContainer.hide(0,()=>personalInfoContainer.show());
          });
          //end education info -----------------------------------


          //training info ================================================
          let countTraining = 0;
          (trainingInfoContainer.find("[name='btnSaveTraining']")).click(e =>{
              frmTraining.submit(e => e.preventDefault());

              //object creation
              const rawTrainingInfo = new FormOperation(e,trainingInfoContainer);


              if(rawTrainingInfo.isEmpty){
                  frmTraining.addClass('was-validated');
              }else{
                  formData["trainingInfo"] = rawTrainingInfo.formDataPack;
                  trainingInfoContainer.hide(0,e=>{
                      experienceContainer.show(0,e=>{

                          // job date validation
                          if(countTraining < 1){
                              $(`[data-job-condition="present"]`)[0].checked = false
                          }
                          countTraining++;
                          $(`[data-job-condition="present"]`).click(e=>{
                              jobStatusValidation(e);
                          });
                      })
                      if(!formActive.get('experienceInfo')){
                          formActive.set('expInfo',experienceContainer);
                          tabActiveList.set('tabExp',tabExperience);
                      }

                  });
              }

              console.log(formData);
          });

          //backstep
          (trainingInfoContainer.find("[name='back']")).click(e => {
              trainingInfoContainer.hide(0,()=>educationInfoContainer.show());
          });
          //end training info


          //experience info ==========================================
          (experienceContainer.find("[name='btnSaveExperience']")).click(e =>{
              frmExperience.submit(e => e.preventDefault());

              //object creation
              const rawExperienceInfo = new FormOperation(e);

              if (rawExperienceInfo.isEmpty) {
                  frmExperience.addClass('was-validated');
                  alert("Please fill the form gentally");
              }else {
                  formData["experienceInfo"] = rawExperienceInfo.formDataPack;
                  alert("Form data submitted successfully")

              }

              console.log(formData);
          });

          //backstep
          (experienceContainer.find("[name='back']")).click(e => {
              experienceContainer.hide(0,()=>trainingInfoContainer.show());
          });
          //end experience info ------------------------------------


          // form tab ------------------------------------------------
          $(document).click(e=>{
              tabActivated(tabActiveList);
              tabVisibility();
              // tab button
              if(formActive.get('personalInfo')){
                  tabPersonalInfo.click(e=>{
                      switchTab(formActive,personalInfoContainer);
                  })
              }


              if(formActive.get('educationInfo')){
                  tabEducation.click(e=>{
                      switchTab(formActive,educationInfoContainer);
                  })
              }

              if(formActive.get('trainingInfo')){
                  tabTraining.click(e=>{
                      switchTab(formActive,trainingInfoContainer);
                  })
              }

              if(formActive.get('expInfo')){
                  tabExperience.click(e=>{
                      switchTab(formActive,experienceContainer);
                  })
              }

          })


      })//main loader
  </script>
@endsection
