   
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
                <div class="col-md-6">
                  <h4>Basic Information</h4>            
                     

                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="model_code" id="model_code" type="text"  class="form-control" placeholder="Model Code" value="<?php echo $models->model_code ?>">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="manufacturer_code" id="manufacturer_code" type="text"  class="form-control" placeholder="Manufacturer Code" value="<?php echo $models->manufacturer_code ?>">
                      </div>
                    </div>

                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="model_name" id="model_name" type="text"  class="form-control" placeholder="Model Name" value="<?php echo $models->model_name ?>">
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
      <!-- END PLACE PAGE CONTENT HERE -->
    </div>
  </div>
        
