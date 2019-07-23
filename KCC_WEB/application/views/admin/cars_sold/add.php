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
                        <select name="car_for_sale_Id" id="car_for_sale_Id" class="form-control">
                          <option value="0">-- Select car Id --</option>
                          <?php foreach ($sales as $sale): ?>
                          <option value="<?php echo $sale->car_for_sale_Id;?>"><?php echo $sale->car_for_sale_Id; ?></option>
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
                        <input name="agreed_price" id="agreed_price" type=""  class="form-control <?php echo form_error('agreed_price') ? 'error' : NULL ?>" placeholder="Agreed Price" value="<?php echo set_value('agreed_price'); ?>">
                        <?php echo form_error('agreed_price', '<div class="error">', '</div>'); ?>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                       <input name="date_sold" id="date_sold" type="date"  class="form-control <?php echo form_error('date_sold') ? 'error' : NULL ?>" placeholder="Date" value="<?php echo set_value('date_sold'); ?>">
                        <?php echo form_error('date_sold', '<div class="error">', '</div>'); ?>
                      </div>
                    </div>



                </div>
                <div class="col-md-6">
        
                  <h4>Postal Information</h4>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="monthly_payment_amount" id="monthly_payment_amount" type=""  class="form-control <?php echo form_error('monthly_payment_amount') ? 'error' : NULL ?>" placeholder="Monthly Payment Amount" value="<?php echo set_value('monthly_payment_amount'); ?>">
                        <?php echo form_error('monthly_payment_amount', '<div class="error">', '</div>'); ?>
                      </div>
                    </div>


                    <div class="row form-row">
                      <div class="col-md-12">
                       <input name="monthly_payment_date" id="monthly_payment_date" type="date"  class="form-control <?php echo form_error('monthly_payment_date') ? 'error' : NULL ?>" placeholder="Date" value="<?php echo set_value('monthly_payment_date'); ?>">
                        <?php echo form_error('monthly_payment_date', '<div class="error">', '</div>'); ?>
                      </div>
                    </div>
                      
                      <div class="col-md-12">
                        <input type="text" name="other_details" id="other_details" class="form-control" placeholder="Other details ">
                      </div>


                    </div>
                </div>
              </div>
       
            </div>
          </div>
       <div class="form-actions">
          <button class="btn btn-danger btn-cons" type="submit"><i class="fa fa-save"></i> Save </button>
          <a href="#" class="btn btn-primary btn-cons" type="button"><i class="fa fa-times"></i> Cancel </a>
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
        

