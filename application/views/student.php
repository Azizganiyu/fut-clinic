
<section class="main">
    <div class="container users">
        <div class="row">
            <div class="col-12 filter">
                <div class="text-left">
                    <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#productModal"><i class="fa fa-plus"></i></button>
                </div>
                <div class="text-right">
                    <?php echo form_open('student/view');?>
                        <input type="search" name="search" placeholder="search student by name" >
                        <button type="submit" class="btn btn-sm btn-link"><i class="ml-2 text-warning fa fa-search"></i></button>
                    </form>
                </div>
                <div class="text-primary mt-4 mb-3">Sort</div>
                <div class="sort-button">
                    <?php echo form_open('student/view');?>
                        <input type="text" name="name" value="name" hidden>
                        <button type="submit" class="mr-5 "><i class="fa fa-user mr-3 mb-3"></i>by product name</button>
                    </form>
                    <?php echo form_open('student/view');?>
                        <input type="text" name="date" value="date_added" hidden>
                        <button type="submit" ><i class="fa fa-clock mr-3"></i>by date</button> 
                    </form>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="table-responsive table-wrapper">
                    <table class="table data-table products-table">
                    <?php 
                    if($students != false)
                    {
                        foreach($students as $student)
                        { ?>
                        <tr class="product-row">
                            
                            <td>
                                <div class="title">Profile Photo</div>
                                <img class="" src="<?php echo $student['image']?>" alt="image">
                            </td>
                            <td>
                                <div class="title">ID</div>
                                <div class="data"><?php echo $student['student_id']?></div>
                            </td>
                            <td>
                                <div class="title">Full name</div>
                                <div class="data"><?php echo $student['name']?></div>
                            </td>
                            <td>
                                <div class="title">Matric Number</div>
                                <div class="data"><?php echo $student['matricNumber']?></div>
                            </td>
                            <td>
                                <div class="title">Records</div>
                                <a href="<?php echo base_url.'/index.php/profile/view/'.$student['id'] ?>" id="<?php echo $student['id']?>">
                                    <button class="btn btn-sm btn-warning">View records</button>
                                </a>
                            </td>
                            <td>
                                <div class="title">Date Added</div>
                                <div class="data"><?php echo date('M d, Y',strtotime($student['date_added']))?></div>
                            </td>
                            <td>
                                <div class="title text-center">Action</div>
                                <div class="d-flex justify-content-between">
                                    <div class="action-button edit">
                                        <a href="<?php echo base_url.'/index.php/student/edit/'.$student['id'] ?>" id="<?php echo $student['id']?>" class=" edit data mr-3"><i class=" text-primary fa fa-edit"></i></a>
                                    </div>
                                    <div class="action-button">
                                        <a href="javascript:void(0)" class="data delStudent"  id="<?php echo $student['id']?>"><i class=" text-danger fa fa-trash"></i></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php 
                        }
                    }
                    else
                    {
                        echo "No Student Found!";
                    }
                    ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add Modal -->
<div class="modal" id="productModal">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title title">Add Student</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <div class="container">
           <div class="row">
               <div class="col-12 col-md-6">
                    <div class="upload_box_new text-center col-10 offset-1">
                        <?php echo validation_errors(); ?>
                        <?php echo form_open_multipart('upload/do_upload', 'id="upload_form"');?>
                            <div class="file-input-wrapper">
                                <input name="userfile" id="userfile" type="file" class="file_input" />
                                <input type="button" class="btn" value="Upload image">
                            </div>
                            <div id="uploading">
                                <img src="" class="temp_image" alt="">
                            </div>
                            <div class="main progress mt-3" style="display:none;">
                                <div class="main progress-bar bg-success"></div>
                            </div>
                            <div id="targetLayer"></div><br/>
                        </form>
                    </div>
               </div>
               <div class="col-12 col-md-6">
                    <?php echo form_open('student/create', 'id="product_form"');?>
                        <div class="form">
                            <input type="text" id="student_id" required name="student_id" placeholder="Student ID" >
                        </div>
                        <div class="form">
                            <input type="text" id="matric_num" required name="matric_num" placeholder="Matric Number" >
                        </div>
                        <div class="form">
                            <input type="text" id="name" required  name="name" placeholder="Name of Student" >
                        </div>
                        <div class="form">
                            <input type="email" id="email"  name="email" placeholder="Email" >
                        </div>
                        <div class="form">
                            <input type="text" id="school"  name="school" placeholder="School" >
                        </div>
                        <div class="form">
                            <input type="text" id="department"  name="department" placeholder="Department" >
                        </div>
                        <div class="form">
                            <input type="text" id="level"  name="level" placeholder="Level" >
                        </div>
                        <div class="form">
                            <input type="password" id="password" required name="password" placeholder="Password" >
                        </div>
                        <div class="form">
                            <input type="text" id="image-name" name="image" hidden>
                        </div>
                        <button type="submit" class=" mt-3 submit ml-4 btn btn-secondary btn-sm">Add</button>
                    </form>
                    <div id="add_info" class="mt-2" style="font-size:0.8em;"></div>
               </div>
           </div>
       </div>
      </div>

    </div>
  </div>
</div>
