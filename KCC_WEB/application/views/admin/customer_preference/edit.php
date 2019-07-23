   
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
                        <select name="car_feature_id" id="car_feature_id" class="form-control">
                          <option value="0">:: Select Car Feature Id ::</option>
                          <?php foreach ($features as $feature): ?>
                            <option value="<?php echo $feature->car_feature_id; ?>" <?php if($feature->car_feature_id == $preference->car_feature_id) { echo 'selected'; }  ?>><?php echo $feature->car_feature_id; ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>

                    <div class="row form-row">
                      <div class="col-md-12">
                        <select name="customer_id" id="customer_id" class="form-control">
                          <option value="0">:: Select Customer ::</option>
                          <?php foreach ($customer as $cust): ?>
                            <option value="<?php echo $cust->customer_id; ?>" <?php if($cust->customer_id == $preference->customer_id) { echo 'selected'; }  ?>><?php echo $cust->customer_name; ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>
                    
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="customer_preference_details" id="customer_preference_details" type="text"  class="form-control" placeholder="Customer Preference Details" value="<?php echo $preference->customer_preference_details ?>">
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
        
