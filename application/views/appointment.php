<section class="main mb-5">
    <!--<div id="scheduler_here" class="dhx_cal_container" style='200px; height:600px;'>
        <div class="dhx_cal_navline">
            <div class="dhx_cal_prev_button">&nbsp;</div>
            <div class="dhx_cal_next_button">&nbsp;</div>
            <div class="dhx_cal_today_button"></div>
            <div class="dhx_cal_date"></div>
            <div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
            <div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
            <div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
        </div>
        <div class="dhx_cal_header"></div>
        <div class="dhx_cal_data"></div>       
    </div>-->
    <div class="container mb-5">
        <div class="row mt-2 appointments">
            <h5 class="title mb-4">My Appointments</h5>
            <div class="col-12">
                <div class="table-responsive table-wrapper">
                    <table class="table data-table products-table">
                    <?php 
                    if($bookings != false)
                    {
                        foreach($bookings as $book)
                        { ?>
                        <tr class="appointment-row">
                            
                            <td>
                                <div class="title">Doctor</div>
                                <div class="data"><?php echo $book['doctor']?></div>
                            </td>
                            <td>
                                <div class="title">Detail</div>
                                <div class="data"><?php echo $book['detail']?></div>
                            </td>
                            <td>
                                <div class="title">Date</div>
                                <div class="data"><?php echo $book['date']?></div>
                            </td>
                            <td>
                                <div class="title">Time</div>
                                <div class="data"><?php echo $book['time']?>:00</div>
                            </td>
                            <td>
                                <div class="title">Status</div>
                                <div class="data">
                                <?php 
                                if($book['status'] == 'active')
                                {
                                    echo '<span class="badge badge-primary">'.$book['status'].'</span>';
                                }
                                elseif($book['status'] == 'canceled')
                                {
                                    echo '<span class="badge badge-warning">'.$book['status'].'</span>';
                                }
                                ?>
                                </div>
                            </td>
                            <td>
                                <div class="title text-center">Action</div>
                                <div class="action-button text-center">
                                    <a href="javascript:void(0)" class="data delAppointment"  id="<?php echo $book['id']?>"><i class=" text-danger fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <?php 
                        }
                    }
                    else
                    {
                        echo "You currently have no appointment!";
                    }
                    ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="appointment-cal">
        <div class="doctor m-5">
            <h5>Select Doctor</h5>
            <select name="doctor" id="doctor">
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
        <div class="header text-center mt-3">
            <h4 class="range mb-4"></h4>
            <div class="days d-flex justify-content-between p-3 ml-5"></div>
        </div>
        <div class="body">
            <div class="hours d-flex justify-content-between p-3 ml-5">
                <div class="durations">
                    
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add Modal -->
<div class="modal" id="appointmentModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-primary">
        <h4 class="modal-title title text-light">Book appointment</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <div class="container">
           <div class="row">
               <div class="col-12">
               <?php echo form_open('appointments/create/'.$student['id'], 'id="appointment_form"');?>
                        <div class="info">
                            <div class="mb-3">
                                <span class="label">Doctor:</span><span class="ml-3 value info-doctor"></span>
                            </div>
                            <div class="mb-3">
                                <span class="label">Date:</span><span class="value info-date ml-3"></span>
                            </div>
                            <div class="mb-3">
                                <span class="label">Time:</span><span class="value info-time ml-3"></span>
                            </div>
                           
                        </div>
                        <div class="form mt-5">
                            <label for="detail">Details</label>
                            <textarea type="text" id="detail" name="detail"> </textarea>
                        </div>
                        <input type="text" name="slot_id" class="slot_id" hidden>
                        <input type="text" name="doctor" class="doctor" hidden>
                        <input type="text" name="date" class="date" hidden>
                        <input type="text" name="time" class="time" hidden>
                        
                        <button type="submit" class=" mt-3 submit ml-4 btn btn-primary btn-sm">Book</button>
                    </form>
                    <div id="add_info" class="mt-2" style="font-size:0.8em;"></div>
               </div>
           </div>
       </div>
      </div>

    </div>
  </div>
</div>