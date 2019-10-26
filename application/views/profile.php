<section class="main mb-5">
    <div class="container profile">
        <?php 
        if($this->session->role == 'student' && $this->session->id == $student['id'])
        { ?>
        <div class="row mb-5">
            <div class="col-12">
            <a href="<?php echo base_url.'/index.php/profile/edit/'?>"><button class="btn btn-sm btn-primary">Edit Medical Form <i class=" ml-2 fa fa-edit"></i></button></a>
            </div>
        </div>
        <?php } ?>
        <div class="row">
            <div class="col-md-2 text-center">
            <h5 class="header mb-4">Personal Data</h5>
                <div class="img-wrapper">
                    <img class="rounded-circle" src="<?php echo $student['image']?>" alt="image">   
                </div>
                <div class="details mt-3">
                    <h5>Student ID</h5>
                    <h6><?php echo $student['student_id']?></h6>
                    <hr>
                </div>
                <div class="details mt-3">
                    <h5>Name</h5>
                    <h6><?php echo $student['name']?></h6>
                    <hr>
                </div>
                <div class="details mt-3">
                    <h5>Matric Number</h5>
                    <h6><?php echo $student['matricNumber']?></h6>
                    <hr>
                </div>
                <div class="details mt-3">
                    <h5>Level</h5>
                    <h6><?php echo $student['level']?></h6>
                    <hr>
                </div>
                <div class="details mt-3">
                    <h5>Department</h5>
                    <h6><?php echo $student['department']?></h6>
                    <hr>
                </div>
                <div class="details mt-3">
                    <h5>School</h5>
                    <h6><?php echo $student['school']?></h6>
                    <hr>
                </div>
            </div>
            <div class="col-md-6 pl-4 medical-data">
                <h5 class="header mb-4">Medical Form</h5>
                <div class="row bg-light p-3">
                    <div class="col-md-6">
                        <div class="mb-2"><span class="label">Marital Status:</span> <span class="data"><?php echo $records['marital_status'] ?></span></div>
                        <div class="mb-2"><span class="label">Blood Group:</span> <span class="data"><?php echo $records['blood_group'] ?></span></div>
                        <div class="mb-2"><span class="label">Nationality:</span> <span class="data"><?php echo $records['nationality'] ?></span></div>
                        <div class="mb-2"><span class="label">LGA:</span> <span class="data"><?php echo $records['lga'] ?></span></div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-2"><span class="label">Date of Birth:</span> <span class="data"><?php echo $records['dob'] ?></span></div>
                        <div class="mb-2"><span class="label">State of Origin:</span> <span class="data"><?php echo $records['soo'] ?></span></div>
                        <div class="mb-2"><span class="label">Sex:</span> <span class="data"><?php echo $records['sex'] ?></span></div>
                    </div>
                    <div class="col-md-3">

                    </div>
                </div>
                <h5 class="header mt-4 mb-4">Medical History</h5>
                <div class="row bg-light p-3">
                    <div class="col-md-4">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input"  <?php if($records['measles']) echo 'checked' ?> type="checkbox">
                            <label class="custom-control-label" > Measels </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input"  <?php if($records['tuberculosis']) echo 'checked' ?> type="checkbox">
                            <label class="custom-control-label" > Tuberculosis </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['sickle_cell']) echo 'checked' ?>  type="checkbox">
                            <label class="custom-control-label" > Sickle cell </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['chicken_pox']) echo 'checked' ?>  type="checkbox">
                            <label class="custom-control-label" > Chicken pox </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['epilepsy']) echo 'checked' ?>  type="checkbox">
                            <label class="custom-control-label" > Epilepsy </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['hypertension']) echo 'checked' ?>  type="checkbox">
                            <label class="custom-control-label" > Hypertension </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['meningitis']) echo 'checked' ?>  type="checkbox">
                            <label class="custom-control-label" > Meningitis </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['asthma']) echo 'checked' ?>  type="checkbox">
                            <label class="custom-control-label" > Asthma </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['polio']) echo 'checked' ?>  type="checkbox">
                            <label class="custom-control-label" > Polio </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['whooping_cough']) echo 'checked' ?>  type="checkbox">
                            <label class="custom-control-label" > Whooping cough </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['tonsilitis']) echo 'checked' ?>  type="checkbox">
                            <label class="custom-control-label" > Tonsilitis </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['typhoid']) echo 'checked' ?>  type="checkbox">
                            <label class="custom-control-label" > Typhoid </label>
                        </div>
                    </div>
                    <div class="col-md-3">

                    </div>
                </div>
                <h5 class="header mt-4 mb-4">Social History</h5>
                <div class="row bg-light p-3">
                    <div class="col-md-4">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['smoking']) echo 'checked' ?>  type="checkbox">
                            <label class="custom-control-label" > Smoking </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['drinking']) echo 'checked' ?>  type="checkbox">
                            <label class="custom-control-label" > Drinking </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['drugs']) echo 'checked' ?>  type="checkbox">
                            <label class="custom-control-label" > Drugs </label>
                        </div>
                    </div>
                </div>
                <h5 class="header mt-4 mb-4">Family History</h5>
                <div class="row bg-light p-3">
                    <div class="col-md-4">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['diabetes']) echo 'checked' ?>  type="checkbox">
                            <label class="custom-control-label" > Diabetes </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['mental_illness']) echo 'checked' ?>  type="checkbox">
                            <label class="custom-control-label" > Mental illness </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['sickle_cell_fam']) echo 'checked' ?> type="checkbox">
                            <label class="custom-control-label" > Sickle cell </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['epilepsy_fam']) echo 'checked' ?>  type="checkbox">
                            <label class="custom-control-label" > Epilepsy </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['hypertension_fam']) echo 'checked' ?>  type="checkbox">
                            <label class="custom-control-label" > Hypertension </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['asthma_fam']) echo 'checked' ?>  type="checkbox">
                            <label class="custom-control-label" > Asthma </label>
                        </div>
                    </div>
                </div>
                <h5 class="header mt-4 mb-4">Others</h5>
                <div class="row bg-light p-3">
                    <div class="col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['sharing_needles']) echo 'checked' ?>  type="checkbox">
                            <label class="custom-control-label" > Sharing of injection needles </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['sharing_manicure_pedicure']) echo 'checked' ?>  type="checkbox">
                            <label class="custom-control-label" > sharing unsterilized manicure and pedicure materials </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['oral_sex']) echo 'checked' ?>  type="checkbox">
                            <label class="custom-control-label" > Oral sex </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['anal_sex']) echo 'checked' ?>  type="checkbox">
                            <label class="custom-control-label" > Anal sex </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 col-md-4">
                <h5 class="header mb-4">Recent Treatments 
                    <?php if($this->session->role == 'admin')
                    { ?>
                        <button class="btn ml-3 btn-sm add btn-secondary" data-toggle="modal" data-target="#treatmentModal">New Entry <i class="fa ml-2 fa-plus"></i></button>
                    <?php } ?>
                </h5>
                <?php
                if($entries != false)
                { 
                    foreach($entries as $entry)
                    {
                    ?>
                    <div class="box mb-3 bg-light p-3">
                        <div class="diagnosis">
                            <h6 class="text-primary">Diagnosis</h6>
                            <p><?php echo $entry['diagnosis'] ?></p>
                        </div>
                        <hr>
                        <div class="treatment">
                            <h6 class="text-primary">Treatment/Prescription</h6>
                            <p><?php echo $entry['treatment'] ?></p>
                        </div>
                        <hr>
                        <div class="doctor">
                            <h6 class="text-primary">Doctor</h6>
                            <p><?php echo $entry['doctor'] ?></p>
                        </div>
                        <hr>
                        <?php if($this->session->role == 'admin')
                        { ?>
                            <button id="<?php echo $entry['id'] ?>" class="trash deltreatment btn btn-link"><i class="text-danger fa fa-trash"></i></button>
                        <?php } ?>
                    </div>
                <?php } } else { echo "No treatment entry found"; }
                ?>
            </div>
        </div>
    </div>
</section>

<!-- Add Modal -->
<div class="modal" id="treatmentModal">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title title">Entry</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <div class="container">
           <div class="row">
               <div class="col-12">
               <?php echo form_open('profile/create_entry/'.$student['id'], 'id="treatment_form"');?>
                        <div class="form">
                            <label for="diagnosis">Diagnosis</label>
                            <textarea type="text" id="diagnosis" name="diagnosis"> </textarea>
                        </div>
                        <div class="form">
                            <label for="treatment">Treatment</label>
                            <textarea type="text" id="treatment" name="treatment"> </textarea>
                        </div>
                        <div class="form mt-5">
                            <label for="doctor">Doctor</label>
                            <select name="doctor" id="">
                                <?php 
                                if($doctors)
                                {
                                    foreach($doctors as $doctor)
                                    {
                                        echo '<option>'.$doctor['name'].'</option>';
                                    }
                                }
                                else
                                {
                                    echo '<option>No doctors available</option>';
                                }
                                
                                ?>
                            </select>
                        </div>
                        <button type="submit" class=" mt-3 submit ml-4 btn btn-primary btn-sm">Add Entry</button>
                    </form>
                    <div id="add_info" class="mt-2" style="font-size:0.8em;"></div>
               </div>
           </div>
       </div>
      </div>

    </div>
  </div>
</div>