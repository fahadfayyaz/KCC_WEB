    <div class="page-content"> 
    <div class="content">  
      <!-- BEGIN PAGE TITLE -->
      <div class="page-title">  
        <h2><?php echo $title; ?></h2>   
      </div>
      <!-- END PAGE TITLE -->
      <!-- BEGIN PlACE PAGE CONTENT HERE -->
       <?php 
              $attributes = array('name' => 'formAdd', 'id' => 'formAdd');
              echo form_open('', $attributes);
        ?>
        <div class="col-md-14">
              <div class="grid simple">
                <div class="grid-body no-border">
                  <div class="row">
        <div class="col-md-12">
          <div class="grid simple">
            <div class="grid-title no-border">
              &nbsp;
            </div>
            <div class="grid-body no-border">
               <!-- FORM VALIDATION ERRORS -->
                <?php if (validation_errors()): ?>
                    <div class="alert alert-danger">
                    <?php echo validation_errors(); ?>
                </div>
                  <?php endif ?>
              <div class="row column-seperation">
                <div class="col-md-6">
                  <h4>Basic Information</h4>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="car_feature_description" id="car_feature_description" type="text"  class="form-control <?php echo (form_error('car_feature_description')) ? 'error' : NULL ?>" placeholder="Car Feature Description" value="<?php echo set_value('car_feature_description'); ?>">
                        <?php echo form_error('car_feature_description', '<div class="error">', '</div>'); ?>
                      </div>
                    </div>
                    
                </div>
              </div>
            </div>
          </div>
       <div class="form-actions">
          <button class="btn btn-danger btn-cons" type="submit"><i class="fa fa-save"></i> Save </button>
          <a href="/admin/cars_for_sale/" class="btn btn-primary btn-cons" type="button"><i class="fa fa-times"></i> Cancel </a>
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