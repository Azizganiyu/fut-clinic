<header>
    <nav>
        <div class="navbar d-flex justify-content-between">
            <div class="d-flex">
                <div class="menu-icon mr-4">
                    <a href="javascript:void(0)" onclick="openSideNav()">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
                <div class="mr-3">
                <img src="<?php echo base_url.'/images/logo.jpg' ?>" alt="logo" height="30">
                </div>
                <div class="title"><span class="admin">FUT-</span><span class="panel">CLINIC</span></div>
            </div>
            <div>
                <button data-toggle="modal" data-target="#logoutModal" title="Logout!" class="sign-out"><i class="ml-2 fa fa-sign-out-alt"></i></button>
            </div>
        </div>

        <div class="sidebar">
            <div class="sidebar-image">
                <?php 
                if($this->session->role == 'student')
                {?>
                    <img class="rounded-circle" src="<?php echo $student['image'] ?>" alt="logo">
                    <div class="text-center">
                        <h6 class="mt-2"> <?php echo $student['name'] ?> </h6>
                        <h6 class="mt-2"> <?php echo $student['student_id'] ?> </h6>
                    </div>
                    
                <?php }
                elseif($this->session->role == 'admin')
                { ?>
                    <img class="rounded-circle" src="<?php echo base_url.'/images/admin.jpg' ?>" alt="logo">
                    <h6 class="mt-2"> Administrator </h6>
                <?php } ?>
                
            </div>
            <div class="links">
                <ul>
                    <?php
                        if($_SESSION['role'] == 'admin'){
                    ?>
                    <li class="navlink" route="<?php echo base_url.'/index.php/dashboard'?>"><i class="fa fa-tachometer-alt mr-2"></i>Dashboard</li>
                    <?php } ?>
                    
                    <?php
                        if($_SESSION['role'] == 'student'){
                    ?>
                    <li class="navlink" route="<?php echo base_url.'/index.php/profile'?>"><i class="fa fa-user mr-2"></i>My profile</li>
                    <?php } ?>

                    <?php
                        if($_SESSION['role'] == 'student'){
                    ?>
                    <li class="navlink" route="<?php echo base_url.'/index.php/appointments'?>"><i class="fas fa-calendar-check mr-2"></i>Appointments</li>
                    <?php } ?>
                    
                    <li class="navlink" route="<?php echo base_url.'/index.php/doctors'?>"><i class="fa fa-user-md mr-2"></i>Doctors</li>

                    <?php
                        if($_SESSION['role'] == 'admin'){
                    ?>
                    <li class="navlink" route="<?php echo base_url.'/index.php/student'?>"><i class="fa fa-users mr-2"></i>Students</li>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <div class="page-title mt-3 ml-3">
            <p><?php echo $title; ?></p>
        </div>

    </nav>
</header>

<!-- Logout Modal -->
<div class="modal" id="logoutModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title title">Are you sure you want to log out?</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <div class="container">
           <div class="row">
               <div class="col-12">
                    <a href="<?php echo base_url.'/index.php/user/logout' ?>" class=" mt-3 submit ml-4 btn btn-danger btn-sm">Logout</a>
               </div>
            </div>
       </div>
      </div>

    </div>
  </div>
</div>