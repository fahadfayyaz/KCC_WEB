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
                        <input name="customer_name" id="customer_name" type="text"  class="form-control <?php echo (form_error('customer_name')) ? 'error' : NULL ?>" placeholder="Customer Name" value="<?php echo set_value('customer_name'); ?>">
                        <?php echo form_error('customer_name', '<div class="error">', '</div>'); ?>
                      </div>
                    </div>


                     <div class="row form-row">
                      <div class="col-md-12">
                        <input name="contact_no" id="contact_no" type="text"  class="form-control <?php echo (form_error('contact_no')) ? 'error' : NULL ?>" placeholder="Contact No" value="<?php echo set_value('contact_no'); ?>">
                        <?php echo form_error('contact_no', '<div class="error">', '</div>'); ?>
                      </div>
                    </div>



                     <div class="row form-row">
                      <div class="col-md-12">
                        <input name="email_address" id="email_address" type="text"  class="form-control <?php echo (form_error('email_address')) ? 'error' : NULL ?>" placeholder="Email Address" value="<?php echo set_value('email_address'); ?>">
                        <?php echo form_error('email_address', '<div class="error">', '</div>'); ?>
                      </div>
                    </div>

                     <div class="row form-row">
                      <div class="col-md-12">
                        <input name="customer_details" id="customer_details" type="text"  class="form-control <?php echo (form_error('customer_details')) ? 'error' : NULL ?>" placeholder="Customer Details" value="<?php echo set_value('customer_details'); ?>">
                        <?php echo form_error('customer_details', '<div class="error">', '</div>'); ?>
                      </div>
                    </div>



                    
                </div>
              </div>
            </div>
          </div>
       <div class="form-actions">
          <button class="btn btn-danger btn-cons" type="submit"><i class="fa fa-save"></i> Save </button>
          <a href="./admin/customer/" class="btn btn-primary btn-cons" type="button"><i class="fa fa-times"></i> Cancel </a>
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