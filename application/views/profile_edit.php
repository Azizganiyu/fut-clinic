<section class="main mb-5">
    <div class="container profile">
        <?php 
        if(isset($updateInfo))
        {
            echo $updateInfo;
        }
        ?>
        <?php echo form_open('profile/edit'); ?>
        <div class="submit mb-5">
            <input type="submit" name="submit" class="btn btn-sm btn-primary" value="Update" />
        </div>
        <div class="row">
            <div class="col-md-12 pl-4 medical-data medical-data-edit">
                <h5 class="header mb-4">Medical Form</h5>
                <div class="row text-input bg-light p-3">
                    <div class="col-md-6">
                        <div class="mb-2"><span class="label">Marital Status:</span> <span class="data"><input name="marital_status" value="<?php echo $records['marital_status'] ?>" type="text" placeholder="e.g Single"></span></div>
                        <div class="mb-2"><span class="label">Blood Group:</span> <span class="data"><input name="blood_group" value="<?php echo $records['blood_group'] ?>" type="text" placeholder="e.g AB+"></span></div>
                        <div class="mb-2"><span class="label">Nationality:</span> <span class="data"><input name="nationality" value="<?php echo $records['nationality'] ?>" type="text" placeholder="e.g Nigeria"></span></div>
                        <div class="mb-2"><span class="label">LGA:</span> <span class="data"><input name="lga" value="<?php echo $records['lga'] ?>" type="text" placeholder="e.g Bosso"></span></div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-2"><span class="label">Date of Birth:</span> <span class="data"><input name="dob" value="<?php echo $records['dob'] ?>" type="text" placeholder="e.g 04/6/1988"></span></div>
                        <div class="mb-2"><span class="label">State of Origin:</span> <span class="data"><input name="soo" value="<?php echo $records['soo'] ?>" type="text" placeholder="e.g Niger"></span></div>
                        <div class="mb-2"><span class="label">Sex:</span> <span class="data">
                            <select name="sex">
                                <option <?php if($records['sex'] == 'M') echo 'selected' ?> value="M">Male</option>
                                <option <?php if($records['sex'] == 'F') echo 'selected' ?> value="F">female</option>
                            </select>
                        </span></div>
                    </div>
                    <div class="col-md-3">

                    </div>
                </div>
                <h5 class="header mt-4 mb-4">Medical History</h5>
                <div class="row bg-light p-3">
                    <div class="col-md-4">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input"  <?php if($records['measles']) echo 'checked' ?>  name="measles" value="1" id="measles" type="checkbox">
                            <label class="custom-control-label" for="measles"> Measles </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['tuberculosis']) echo 'checked' ?>  name="tuberculosis" value="1" id="tuberculosis" type="checkbox">
                            <label class="custom-control-label" for="tuberculosis"> Tuberculosis </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['sickle_cell']) echo 'checked' ?>  name="sickle_cell" value="1" id="sickle_cell"  type="checkbox">
                            <label class="custom-control-label" for="sickle_cell"> Sickle cell </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['chicken_pox']) echo 'checked' ?>  name="chicken_pox" value="1" id="chicken_pox"  type="checkbox">
                            <label class="custom-control-label" for="chicken_pox"> Chicken pox </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['epilepsy']) echo 'checked' ?>  name="epilepsy" value="1" id="epilepsy"  type="checkbox">
                            <label class="custom-control-label" for="epilepsy"> Epilepsy </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['hypertension']) echo 'checked' ?>  name="hypertension" value="1" id="hypertension"  type="checkbox">
                            <label class="custom-control-label" for="hypertension"> Hypertension </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input"  <?php if($records['meningitis']) echo 'checked' ?>  name="meningitis" value="1" id="meningitis" type="checkbox">
                            <label class="custom-control-label" for="meningitis"> Meningitis </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['asthma']) echo 'checked' ?>  name="asthma" value="1" id="asthma"  type="checkbox">
                            <label class="custom-control-label" for="asthma"> Asthma </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['polio']) echo 'checked' ?>  name="polio" value="1" id="polio"  type="checkbox">
                            <label class="custom-control-label" for="polio"> Polio </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input"  <?php if($records['whooping_cough']) echo 'checked' ?>  name="whooping_cough" value="1" id="whooping_cough" type="checkbox">
                            <label class="custom-control-label" for="whooping_cough"> Whooping cough </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['tonsilitis']) echo 'checked' ?>  name="tonsilitis" value="1" id="tonsilitis"  type="checkbox">
                            <label class="custom-control-label" for="tonsilitis"> Tonsilitis </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['typhoid']) echo 'checked' ?>  name="typhoid" value="1" id="typhoid"  type="checkbox">
                            <label class="custom-control-label" for="typhoid"> Typhoid </label>
                        </div>
                    </div>
                    <div class="col-md-3">

                    </div>
                </div>
                <h5 class="header mt-4 mb-4">Social History</h5>
                <div class="row bg-light p-3">
                    <div class="col-md-4">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['smoking']) echo 'checked' ?>  name="smoking" value="1" id="smoking"  type="checkbox">
                            <label class="custom-control-label" for="smoking"> Smoking </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['drinking']) echo 'checked' ?>  name="drinking" value="1" id="drinking"  type="checkbox">
                            <label class="custom-control-label" for="drinking"> Drinking </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['drugs']) echo 'checked' ?>  name="drugs" value="1" id="drugs"  type="checkbox">
                            <label class="custom-control-label" for="drugs"> Drugs </label>
                        </div>
                    </div>
                </div>
                <h5 class="header mt-4 mb-4">Family History</h5>
                <div class="row bg-light p-3">
                    <div class="col-md-4">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['diabetes']) echo 'checked' ?>  name="diabetes" value="1" id="diabetes"  type="checkbox">
                            <label class="custom-control-label" for="diabetes"> Diabetes </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['mental_illness']) echo 'checked' ?>  name="mental_illness" value="1" id="mental_illness"  type="checkbox">
                            <label class="custom-control-label" for="mental_illness"> Mental illness </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['sickle_cell_fam']) echo 'checked' ?>  name="sickle_cell_fam" value="1" id="sickle_cell_fam"  type="checkbox">
                            <label class="custom-control-label" for="sickle_cell_fam"> Sickle cell </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['epilepsy_fam']) echo 'checked' ?>  name="epilepsy_fam" value="1" id="epilepsy_fam"  type="checkbox">
                            <label class="custom-control-label" for="epilepsy_fam"> Epilepsy </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['hypertension_fam']) echo 'checked' ?>  name="hypertension_fam" value="1" id="hypertension_fam"  type="checkbox">
                            <label class="custom-control-label" for="hypertension_fam"> Hypertension </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input"  <?php if($records['asthma_fam']) echo 'checked' ?>  name="asthma_fam" value="1" id="asthma_fam" type="checkbox">
                            <label class="custom-control-label" for="asthma_fam"> Asthma </label>
                        </div>
                    </div>
                </div>
                <h5 class="header mt-4 mb-4">Others</h5>
                <div class="row bg-light p-3">
                    <div class="col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['sharing_needles']) echo 'checked' ?>  name="sharing_needles" value="1" id="sharing_needles"  type="checkbox">
                            <label class="custom-control-label" for="sharing_needles"> Sharing of injection needles </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input"  <?php if($records['sharing_manicure_pedicure']) echo 'checked' ?>  name="sharing_manicure_pedicure" value="1" id="sharing_manicure_pedicure" type="checkbox">
                            <label class="custom-control-label" for="sharing_manicure_pedicure"> sharing unsterilized manicure and pedicure materials </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['oral_sex']) echo 'checked' ?>  name="oral_sex" value="1" id="oral_sex"  type="checkbox">
                            <label class="custom-control-label" for="oral_sex"> Oral sex </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" <?php if($records['anal_sex']) echo 'checked' ?>  name="anal_sex" value="1" id="anal_sex"  type="checkbox">
                            <label class="custom-control-label" for="anal_sex"> Anal sex </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="submit mt-5">
            <input type="submit" name="submit" class="btn btn-sm btn-primary" value="Update" />
        </div>
        </form>
    </div>
</section>