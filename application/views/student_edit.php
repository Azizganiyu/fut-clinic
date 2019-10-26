
<section class="main">
    <div class="container edit-product">
        <?php if(isset($updateInfo)) {echo $updateInfo; } ?>
        <div class="row">
           <div class="col-12 col-md-6">
                <div class="upload_box_new text-center col-10 offset-1">
                    <?php echo form_open_multipart('upload/do_upload', 'id="upload_form"');?>
                        <div class="file-input-wrapper">
                            <input name="userfile" id="userfile" type="file" class="file_input" />
                            <input type="button" class="btn" value="Upload image">
                        </div>
                        <div id="uploading">
                            <img src="<?php echo $student['image'] ?>" class="temp_image" alt="">
                        </div>
                        <div class="main progress mt-3" style="display:none;">
                            <div class="main progress-bar bg-success"></div>
                        </div>
                        <div id="targetLayer"></div><br/>
                    </form>
                </div>
            </div>
           <div class="col-12 col-md-6">
                <?php echo form_open('student/edit/'.$student['id'], 'id="product_edit_form"');?>
                    <div class="form">
                        <input type="text" id="image-name" value="<?php echo $student['image'] ?>" name="image" hidden>
                    </div>
                    <div class="form">
                        <label>Student ID</label>
                        <div class="text-danger form-error"><?php echo form_error('student_id');?></div>
                        <input type="text" id="student_id" value="<?php echo $student['student_id'] ?>" readonly name="student_id" placeholder="Student ID" >
                    </div>
                    <div class="form">
                        <label>Matric Number</label>
                        <div class="text-danger form-error"><?php echo form_error('matric_num');?></div>
                        <input type="text" id="matric_num" value="<?php echo $student['matricNumber'] ?>" readonly name="matric_num" placeholder="Matric Number" >
                    </div>
                    <div class="form">
                        <label>Name</label>
                        <div class="text-danger form-error"><?php echo form_error('name');?></div>
                        <input type="text" id="name" name="name" placeholder="Name of student" value="<?php echo $student['name'] ?>" >
                    </div>
                    <div class="form">
                        <label>Email</label>
                        <div class="text-danger form-error"><?php echo form_error('email');?></div>
                        <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $student['email'] ?>" >
                    </div>
                    <div class="form">
                        <label>School</label>
                        <div class="text-danger form-error"><?php echo form_error('school');?></div>
                        <input type="text" id="school" name="school" placeholder="School" value="<?php echo $student['school'] ?>" >
                    </div>
                    <div class="form">
                        <label>Department</label>
                        <div class="text-danger form-error"><?php echo form_error('department');?></div>
                        <input type="text" id="department" name="department" placeholder="Department" value="<?php echo $student['department'] ?>" >
                    </div>
                    <div class="form">
                        <label>Level</label>
                        <div class="text-danger form-error"><?php echo form_error('level');?></div>
                        <input type="text" id="level" name="level" placeholder="Level" value="<?php echo $student['level'] ?>" >
                    </div>
                    <div class="change-password mb-3 mt-3">
                        <button type="button">change password</button>
                    </div>
                    <div class="form edit-password">
                        <label>Password</label>
                        <div class="text-danger form-error"><?php echo form_error('password');?></div>
                        <input type="password" id="department" required name="password" placeholder="New Password" value="<?php echo $student['password'] ?>" >
                    </div>
                    <button type="submit" name="submit" class=" mt-3 submit ml-4 btn btn-secondary btn-sm">Update</button>
                </form>
                <div id="add_info" class="mt-2" style="font-size:0.8em;"></div>
            </div>
        </div>
    </div>
</section>