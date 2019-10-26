
<section class="main">
    <div class="container users">
        <?php if($this->session->role == 'admin')
        { ?>
        <div class="row">
            <div class="col-12">
                <div class="text-left">
                    <button class="btn btn-sm add btn-secondary" data-toggle="modal" data-target="#categoryModal"><i class="fa fa-plus"></i></button>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="row mt-5">

            <?php 
            if($doctors != false)
            {
                foreach($doctors as $doctor)
                { ?>
                    <div class=" categories col-12 col-sm-6 col-md-3 mb-4">
                        <div class="box">
                            <img class="category-image rounded" src="<?php echo $doctor['image'] ?>" alt="No Image">
                            <div class="name text-center mt-1"><?php echo $doctor['name'] ?></div>
                            <p class="speciality text-center mt-3"><?php echo $doctor['speciality'] ?></p>

                            <?php if($this->session->role == 'admin')
                            { ?>
                            <button id="<?php echo $doctor['id'] ?>" class="edit" data-toggle="modal" data-target="#categoryModal"><i class="text-primary fa fa-edit"></i></i></button>
                            <button name="<?php echo $doctor['name'] ?>" id="<?php echo $doctor['id'] ?>" class="trash delCategory"><i class="text-danger fa fa-trash"></i></i></button>
                            <?php } ?>
                              
                        </div>
                    </div>
            
                <?php 
                }
            }
            else
            {
                echo "No Doctors Found!";
            }
            ?>
    
        </div>
    </div>
</section>


<!-- Add Modal -->
<div class="modal" id="categoryModal">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title title">Add Category</h4>
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
                    <?php echo form_open('doctors/create', 'id="category_form"');?>
                        <div class="form">
                            <input type="text" id="name" name="name" placeholder="Name of doctor" >
                        </div>
                        <div class="form">
                            <input type="text" id="speciality" name="speciality" placeholder="Speciality" >
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

</body>