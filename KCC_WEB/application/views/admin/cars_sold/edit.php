   
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
                        <select name="car_for_sale_Id" id="car_for_sale_Id" class="form-control">
                          <option value="0">:: Select Brand ::</option>
                          <?php foreach ($sale as $sal): ?>
                            <option value="<?php echo $sal->car_for_sale_Id; ?>" <?php if($sal->car_for_sale_Id == $sold->car_for_sale_Id) { echo 'selected'; }  ?>><?php echo $sal->car_for_sale_Id; ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>

                    <div class="row form-row">
                      <div class="col-md-12">
                        <select name="customer_id" id="customer_id" class="form-control">
                          <option value="0">:: Select Customer ::</option>
                          <?php foreach ($customer as $cust): ?>
                            <option value="<?php echo $cust->customer_id; ?>" <?php if($cust->customer_id == $sold->customer_id) { echo 'selected'; }  ?>><?php echo $cust->customer_name; ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>

                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="agreed_price" id="agreed_price" type="text"  class="form-control" placeholder=" Agreed Price" value="<?php echo $sold->agreed_price ?>">
                      </div>
                    </div>

                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="date_sold" id="date_sold" type="date"  class="form-control" placeholder="date sold" value="<?php echo $sold->date_sold ?>">
                      </div>
                    </div>


                    
                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="monthly_payment_amount" id="monthly_payment_amount" type="text"  class="form-control" placeholder="monthly Payment Amount" value="<?php echo $sold->monthly_payment_amount ?>">
                      </div>
                    </div>

                    <div class="row form-row">
                      <div class="col-md-12">
                        <input name="monthly_payment_date" id="monthly_payment_date" type="date"  class="form-control" placeholder="monthly Payment Date" value="<?php echo $sold->monthly_payment_date ?>">
                      </div>
                    </div>
                  

                     <div class="row form-row">
                      <div class="col-md-12">
                        <textarea name="other_details" id="other_details" class="form-control" cols="30" placeholder="Other Details" rows="10"><?php echo $sold->other_details ?></textarea>
      
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
        
