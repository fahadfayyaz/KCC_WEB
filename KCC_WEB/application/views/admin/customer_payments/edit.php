   
<div class="page-content"> 
    <div class="content">  
      <!-- BEGIN PAGE TITLE -->
      <div class="page-title">  
      <h2><?php echo $title; ?></h2>
      </div>
      <!-- END PAGE TITLE -->
      <!-- BEGIN PlACE PAGE CONTENT HERE -->
      <?php 
        $attributes = ['name' => 'formEdit', 'id' => 'formEdit'];
        // $hidden = ['img_url' => "$brand->brand_img"];
        echo form_open('', $attributes);
      ?>
     
        <div class="col-md-14">
              <div class="grid simple">                
                <div class="grid-body no-border">
                  <div class="row">
        <div class="col-md-12">
          <div class="grid simple">
            <div class="grid-title no-border">
            </div>
            <div class="grid-body no-border">
              <div class="row column-seperation">
                <div class="col-md-8">
                  <h4>Basic Information</h4>            
                   

                    <div class="row form-row">
                      <div class="col-md-12">
                        <select name="car_sold_id" id="car_sold_id" class="form-control">
                          <option value="0">:: Select Sold Car Id ::</option>
                          <?php foreach ($sold as $sal): ?>
                            <option value="<?php echo $sal->car_sold_id; ?>" <?php if($sal->car_sold_id == $payment->car_sold_id) { echo 'selected'; }  ?>><?php echo $sal->car_sold_id; ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>

                    <div class="row form-row">
                      <div class="col-md-12">
                        <select name="customer_id" id="customer_id" class="form-control">
                          <option value="0">:: Select Customer ::</option>
                          <?php foreach ($customer as $cust): ?>
                            <option value="<?php echo $cust->customer_id; ?>" <?php if($cust->customer_id == $payment->customer_id) { echo 'selected'; }  ?>><?php echo $cust->customer_name; ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>

                     <div class="row form-row">
                      <div class="col-md-12">
                        <select name="payment_status_code" id="payment_status_code" class="form-control">
                          <option value="0">:: Select status ::</option>
                          <?php foreach ($status as $pay): ?>
                            <option value="<?php echo $pay->payment_status_code; ?>" <?php if($pay->payment_status_code == $payment->payment_status_code) { echo 'selected'; }  ?>><?php echo $pay->payment_status_description; ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>

                    <div class="row form-row">
                      <div class="col-md-12">
                        <span class="text-primary">Due Date</span>
                        <input name="customer_payment_date_due" id="customer_payment_date_due" type="date"  class="form-control" placeholder="Due Date" value="<?php echo $payment->customer_payment_date_due ?>">
                      </div>
                    </div>

                    <div class="row form-row">
                      <div class="col-md-12">
                        <span class="text-primary">Date Made</span>
                        <input name="customer_payment_date_made" id="customer_payment_date_made" type="date"  class="form-control" placeholder="Date Made" value="<?php echo $payment->customer_payment_date_made ?>">
                      </div>
                    </div>
                    
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="actual_payment_amount" id="actual_payment_amount" type="text"  class="form-control" placeholder="Actual Payment Amount" value="<?php echo $payment->actual_payment_amount ?>">
                      </div>
                    </div>


                </div>
               
              </div>
       
            </div>
          </div>
       <div class="form-actions">
          <button class="btn btn-danger btn-cons" type="submit"><i class="fa fa-save"></i> Save </button>
          <a href="/admin/cars_sold/" class="btn btn-primary btn-cons" type="button"><i class="fa fa-times"></i> Cancel </a>
        </div>
        </div>
      </div>
                </div>
              </div>
        </div>
        <?php echo form_close(); ?>
      <!-- END PLACE PAGE CONTENT HERE -->
    </div>
  </div>
        
