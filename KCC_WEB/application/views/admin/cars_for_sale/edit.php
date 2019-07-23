   
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
         $hidden = ['img_url' => "$sale->car_img"];
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
                        <select name="manufacturer_name" id="manufacturer_name" class="form-control">
                          <option value="0">:: Select Manufacturer ::</option>
                          <?php foreach ($manufacturer as $manufacture): ?>
                            <option value="<?php echo $manufacture->manufacturer_name; ?>" <?php if($manufacture->manufacturer_name == $sale->manufacturer_name) { echo 'selected'; }  ?>><?php echo $manufacture->manufacturer_name; ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>

                    <div class="row form-row">
                      <div class="col-md-12">
                        <select name="model_code" id="model_code" class="form-control">
                          <option value="0">:: Select Model ::</option>
                          <?php foreach ($carmodels as $model): ?>
                            <option value="<?php echo $model->model_name; ?>" <?php if($model->model_code == $sale->model_code) { echo 'selected'; }  ?>><?php echo $model->model_name; ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>


                    <div class="row form-row">
                      <div class="col-md-12">
                        <select name="vehicle_category_code" id="vehicle_category_code" class="form-control">
                          <option value="0">:: Select Model ::</option>
                          <?php foreach ($categoriese as $category): ?>
                            <option value="<?php echo $category->vehicle_category_description; ?>" <?php if($category->vehicle_category_code == $sale->vehicle_category_code) { echo 'selected'; }  ?>><?php echo $category->vehicle_category_description; ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>

                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="asking_price" id="asking_price" type="text"  class="form-control" placeholder="Asking Price" value="<?php echo $sale->asking_price ?>">
                      </div>
                    </div>
      
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="current_mileage" id="current_mileage" type="text"  class="form-control" placeholder="Current Mileage" value="<?php echo $sale->current_mileage ?>">
                      </div>
                    </div>

                    <div class="row form-row">
                  <div class="col-md-12">
                        <input name="car_img" id="car_img" type="file"  class="form-control">
                      </div>
                    </div>
                  

                     <div class="row form-row">
                     <div class="col-md-12">
                        <input name="date_acqired" id="date_acqired" type="text"  class="form-control" placeholder="Date Acqired" value="<?php echo $sale->date_acqired; ?>">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="registration_year" id="registration_year" type="text"  class="form-control" placeholder="Registration Year" value="<?php echo $sale->registration_year ?>">
                      </div>
                    </div>

                     <div class="row form-row">
                      <div class="col-md-12">
                        <input name="other_car_details" id="other_car_details" type="text"  class="form-control" placeholder="Other Car Details" value="<?php echo $sale->other_car_details ?>">
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
        
