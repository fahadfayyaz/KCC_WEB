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
                        <select name="car_feature_id" id="car_feature_id" class="form-control">
                          <option value="0">-- Select features On Car--</option>
                          <?php foreach ($features as $feature): ?>
                          <option value="<?php echo $feature->car_feature_id;?>"><?php echo $feature->car_feature_description; ?></option>
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
                          <input type="numeric" name="customer_preference_details" id="customer_preference_details" class="form-control <?php echo form_error('customer_preference_details') ? 'error' : NULL ?>" placeholder="customer Preference Details" value="<?php echo set_value('customer_preference_details'); ?>">
                          <?php echo form_error('customer_preference_details', '<div class="error">', '</div>'); ?>
                        </div> 
                      </div>


                </div>
                </div>
              </div>
       
            </div>
          </div>
       <div class="form-actions">
          <button class="btn btn-danger btn-cons" type="submit"><i class="fa fa-save"></i> Save </button>
          <a href="/admin/customer_preference/" class="btn btn-primary btn-cons" type="button"><i class="fa fa-times"></i> Cancel </a>
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
        

