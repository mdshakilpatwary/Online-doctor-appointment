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
                  const formData = {};


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



                      const rawPersonalInfo = new FormOperation(e,personalInfoContainer); //rawPersoalInfo

                      if(rawPersonalInfo.isEmpty){
                          frmPersonalInfo.addClass('was-validated');
                      }else{
                          console.log('here you are');
                          formData["personalInfo"] = rawPersonalInfo.formDataPack;

                          // axios post request to controller
                          let data = new FormData();
                          formData.personalInfo['repackedData'].forEach (function(value, key) {
                              data.append(key,value);
                          });

                          let identity_prof = $('#identity_prof')[0].files[0];
                          let license_attachment = $('#license_attachment')[0].files[0];

                          // file
                          data.append('identity_prof', identity_prof);
                          data.append('license_attachment', license_attachment);


                          axios.post('{{route('doctor.profile.store')}}',data,{
                              headers: {
                                  'Content-Type': 'multipart/form-data', // Set the content type for file upload
                              },
                          })
                            .then(function (response) {
                                console.log(response);
                                console.log("+++++++++++++++");
                                console.log(response.data);
                                alert(response.data.message);

                                ///========================================
                                personalInfoContainer.hide(0,e=>{
                                    educationInfoContainer.show(0, e=>{
                                        if(!formActive.get('personalInfo')){
                                            formActive.set('personalInfo',personalInfoContainer);
                                            formActive.set('educationInfo',educationInfoContainer);
                                            tabActiveList.set('tabPersonal',tabPersonalInfo);
                                            tabActiveList.set('tabEdu',tabEducation);
                                        }
                                    });
                                })
                            })
                            .catch(function (error) {
                                if (error.response.status === 422) {
                                    // Handle validation errors
                                    $("form").addClass('was-validated');
                                    let errors = error.response.data.errors;
                                    for (let field in errors) {
                                        let errorMessage = errors[field][0]; // Get the first error message for each field
                                        // let inputField = document.querySelector(`[name='${field}']`); // Find the input field
                                        let inputField =$(`[name='${field}']`); // Find the input field

                                        // Create a <span> element for the error message
                                        // let errorSpan = document.createElement('span');
                                        // let errorSpan =  $('<span>').addClass('invalid-feedback').text(errorMessage);
                                        let errorSpan =  $('<span>').addClass('text-danger').text(errorMessage);
                                        // errorSpan.className = 'text-danger';
                                        // errorSpan.textContent = errorMessage;

                                        // Insert the error message after the input field
                                        // inputField.parentNode.appendChild(errorSpan);
                                        inputField.parent().append(errorSpan);
                                    }

                                }
                            });


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

                  //input font color;
                  $('input').css('color','black');



              })//main loader
          </script>
