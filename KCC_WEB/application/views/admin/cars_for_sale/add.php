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
       
        echo form_open_multipart('', $attributes);
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
                        <select name="manufacturer_name" id="manufacturer_name" class="form-control">
                          <option value="0">-- Select Manufacturer Name --</option>
                          <?php foreach ($manufacturers as $manufacturer): ?>
                          <option value="<?php echo $manufacturer->manufacturer_name;  ?>"><?php echo $manufacturer->manufacturer_name; ?></option>
                        <?php endforeach ?>
                        </select>
                        
                      </div>
                      <!-- end -->
                     
                    </div>  
                  <div class="row form-row">
                   <div class="col-md-12">
                        <select name="model_name" id="model_name" class="form-control">
                          <option value="0">-- Select Car Model --</option>
                          <?php foreach ($carmodels as $carmodel): ?>
                          <option value="<?php echo $carmodel->model_code;  ?>"><?php echo $carmodel->model_name; ?></option>
                        <?php endforeach ?>
                        </select>
                      </div>
                      </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <select name="vehicle_category_code" id="vehicle_category_code" class="form-control">
                          <option value="0">-- Select Category Code --</option>
                          <?php foreach ($categorieses as $categories): ?>
                          <option value="<?php echo $categories->vehicle_category_code;  ?>"><?php echo $categories->vehicle_category_code; ?></option>
                        <?php endforeach ?>
                        </select>
                      </div>
                      </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="asking_price" id="asking_price" type=""  class="form-control <?php echo form_error('asking_price') ? 'error' : NULL ?>" placeholder="Asking price" value="<?php echo set_value('asking_price'); ?>">
                        <?php echo form_error('asking_price', '<div class="error">', '</div>'); ?>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="current_mileage" id="current_mileage" type=""  class="form-control  <?php echo form_error('current_mileage') ? 'error' : NULL ?>" placeholder="Current mileage" value="<?php echo set_value('current_mileage'); ?>">
                        <?php echo form_error('current_mileage', '<div class="error">', '</div>'); ?>
                      </div>
                    </div>



                </div>
                <div class="col-md-6">
        
                  <h4>Postal Information</h4>
                  <div class="row form-row">
                      <div class="col-md-12">
                        <input name="car_img" id="car_img" type="file"  class="form-control">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                       <input name="date_acqired" id="date_acqired" type="date"  class="form-control <?php echo form_error('date_acqired') ? 'error' : NULL ?>" placeholder="Date" value="<?php echo set_value('date_acqired'); ?>">
                        <?php echo form_error('date_acqired', '<div class="error">', '</div>'); ?>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input type="text" name="registration_year" id="registration_year" class="form-control <?php echo form_error('registration_year') ? 'error' : NULL ?>" placeholder="Registration year" value="<?php echo set_value('registration_year'); ?>">
                        <?php echo form_error('registration_year', '<div class="error">', '</div>'); ?>
                      </div>
                      
                      <div class="col-md-12">
                        <input type="text" name="other_car_details" id="other_car_details" class="form-control" placeholder="Other car details">
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
        

