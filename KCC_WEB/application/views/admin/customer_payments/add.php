   <div class="page-content"> 
    <div class="content">  
      <!-- BEGIN PAGE TITLE -->
      <div class="page-title">  
               <h2><?php echo $title; ?></h2>     
      </div>
      <!-- END PAGE TITLE -->
      <!-- BEGIN PlACE PAGE CONTENT HERE -->
      <?php
        $attributes = array('name' => 'formAdd', 'id' => 'formAdd' );
       
        echo form_open('', $attributes);
      ?>
        <div class="col-md-14">
              <div class="grid simple">                
                <div class="grid-body no-border">
                  <div class="row">
        <div class="col-md-12">
          <div class="grid simple">
            <div class="grid-title no-border">
                <?php if (validation_errors()): ?>
                <div class="alert alert-danger">
                  <?php echo validation_errors(); ?>
                </div>
              <?php endif ?>
              <?php if (isset($error)) : ?>
                <div class="alert alert-danger">
                  <?php echo $error ?>
                </div>
              <?php endif ?>
            </div>
            <div class="grid-body no-border">
              <div class="row column-seperation">
                <div class="col-md-6">
                  <h4>Basic Information</h4>            
                    <div class="row form-row">
                      <!-- check -->
                      <div class="col-md-12">
                        <select name="car_sold_id" id="car_sold_id" class="form-control">
                          <option value="0">-- Select Sold car ID--</option>
                          <?php foreach ($solds as $sold): ?>
                          <option value="<?php echo $sold->car_sold_id;?>"><?php echo $sold->car_sold_id; ?></option>
                        <?php endforeach ?>
                        </select>
                        
                      </div>
                      <!-- end -->
                     


                    </div>  
                  <div class="row form-row">
                   <div class="col-md-12">
                        <select name="customer_id" id="customer_id" class="form-control">
                          <option value="0">-- Select Customer  --</option>
                          <?php foreach ($customers as $customer): ?>
                          <option value="<?php echo $customer->customer_id;  ?>"><?php echo $customer->customer_name; ?></option>
                        <?php endforeach ?>
                        </select>
                      </div>
                      </div>


                       <div class="row form-row">
                   <div class="col-md-12">
                        <select name="payment_status_code" id="payment_status_code" class="form-control">
                          <option value="0">-- Payment Status  --</option>
                          <?php foreach ($statuses as $status): ?>
                          <option value="<?php echo $status->payment_status_description;  ?>"><?php echo $status->payment_status_description; ?></option>
                        <?php endforeach ?>
                        </select>
                      </div>
                      </div>
                
                    <div class="row form-row">
                      <div class="col-md-12">
                                                <span class="text-primary">Due Date</span>
                       <input name="customer_payment_date_due" id="customer_payment_date_due" type="date"  class="form-control <?php echo form_error('customer_payment_date_due') ? 'error' : NULL ?>" placeholder="Due Date" value="<?php echo set_value('customer_payment_date_due'); ?>">
                        <?php echo form_error('customer_payment_date_due', '<div class="error">', '</div>'); ?>
                      </div>
                    </div>



                </div>
                <div class="col-md-6">
        
                  <h4>Postal Information</h4>
                     <div class="row form-row">
                      <div class="col-md-12">
                        <span class="text-primary">Date Made</span>
                       <input name="customer_payment_date_made" id="customer_payment_date_made" type="date"  class="form-control <?php echo form_error('customer_payment_date_made') ? 'error' : NULL ?>" placeholder="Date made" value="<?php echo set_value('customer_payment_date_made'); ?>">
                        <?php echo form_error('customer_payment_date_made', '<div class="error">', '</div>'); ?>
                      </div>
                    </div>
                      <div class="row form-row">
                      <div class="col-md-12">
                        <input type="numeric" name="actual_payment_amount" id="actual_payment_amount" class="form-control <?php echo form_error('actual_payment_amount') ? 'error' : NULL ?>" placeholder="Actual Payment Amount" value="<?php echo set_value('actual_payment_amount'); ?>">
                        <?php echo form_error('actual_payment_amount', '<div class="error">', '</div>'); ?>
                      </div>
                        
                      </div>


                    </div>
                </div>
              </div>
       
            </div>
          </div>
       <div class="form-actions">
          <button class="btn btn-danger btn-cons" type="submit"><i class="fa fa-save"></i> Save </button>
          <a href="/admin/customer_payments/" class="btn btn-primary btn-cons" type="button"><i class="fa fa-times"></i> Cancel </a>
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
        

