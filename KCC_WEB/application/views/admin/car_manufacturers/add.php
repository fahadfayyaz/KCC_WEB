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
            </div>
            <div class="grid-body no-border">
              <div class="row column-seperation">
                <div class="col-md-6">
                  <h4>Basic Information</h4>            
                    

                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="manufacturer_name" id="manufacturer_name" type="text"  class="form-control" placeholder="Manufacturer Name">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="manufacturer_Details" id="manufacturer_Details" type="text"  class="form-control" placeholder="Manufacturer Details" >
                      </div>
                    </div>
                </div>
                <div class="col-md-6">
        
                 
          
                </div>
              </div>
       
            </div>
          </div>
       <div class="form-actions">
          <button class="btn btn-danger btn-cons" type="submit"><i class="fa fa-save"></i> Save </button>
          <a href="/admin/car_manufacturers/" class="btn btn-primary btn-cons" type="button"><i class="fa fa-times"></i> Cancel </a>
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
        

