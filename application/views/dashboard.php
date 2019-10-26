<div class="container mb-5">
        <div class="row mb-5">
            <div class="col-12 filter">
                <div class="text-right">
                    <?php echo form_open('dashboard/view');?>
                        <input type="search" name="search_doc" placeholder="search by doctor" >
                        <button type="submit" class="btn btn-sm btn-link"><i class="ml-2 text-warning fa fa-search"></i></button>
                    </form>
                </div>
                <div class="">
                    <?php echo form_open('dashboard/view');?>
                        <input type="search" name="search_stu" placeholder="search by student ID" >
                        <button type="submit" class="btn btn-sm btn-link"><i class="ml-2 text-warning fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row mt-2 appointments">
            <h5 class="title mb-4">Appointments</h5>
            <div class="col-12">
                <div class="table-responsive table-wrapper">
                    <table class="table data-table products-table">
                    <?php 
                    if($appointments != false)
                    {
                        foreach($appointments as $appointment)
                        { ?>
                        <tr class="appointment-row">
                            
                            <td>
                                <div class="title">Student ID</div>
                                <div class="data"><?php  echo $this->student_model->get_student($appointment['student_id'])['student_id']?></div>
                            </td>
                            <td>
                                <div class="title">Student name</div>
                                <div class="data"><?php  echo $this->student_model->get_student($appointment['student_id'])['name']?></div>
                            </td>
                            <td>
                                <div class="title">Doctor</div>
                                <div class="data"><?php echo $appointment['doctor']?></div>
                            </td>
                            <td>
                                <div class="title">Detail</div>
                                <div class="data"><?php echo $appointment['detail']?></div>
                            </td>
                            <td>
                                <div class="title">Date</div>
                                <div class="data"><?php echo $appointment['date']?></div>
                            </td>
                            <td>
                                <div class="title">Time</div>
                                <div class="data"><?php echo $appointment['time']?>:00</div>
                            </td>
                            <td>
                                <div class="title">Status</div>
                                <div class="data">
                                <?php 
                                if($appointment['status'] == 'active')
                                {
                                    echo '<span class="badge badge-primary">'.$appointment['status'].'</span>';
                                }
                                elseif($appointment['status'] == 'canceled')
                                {
                                    echo '<span class="badge badge-warning">'.$appointment['status'].'</span>';
                                }
                                ?>
                                </div>
                            </td>
                            <td>
                                <div class="title text-center">Action</div>
                                <?php
                                if($appointment['status'] == 'active')
                                { ?>
                                   <div class="action-button text-center"><a href="javascript:void(0)" class="data cancAppointment"  id="<?php echo $appointment['id'] ?>"><button class="btn btn-sm btn-danger">Cancel</button></a></div>
                               <?php  }
                                ?>
                            </td>
                        </tr>
                        <?php 
                        }
                    }
                    else
                    {
                        echo "No appointments found!";
                    }
                    ?>
                    </table>
                </div>
            </div>
        </div>
    </div>