<?php $this->load->view('layout/header'); ?>
  <div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="category.html">DELL</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Left Part Start -->
        <?php $this->load->view('layout/sidebar'); ?>
        <!--Left Part End -->
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
          <h1 class="title"><?php echo $title; ?></h1>
          <div class="row products-category">
            <?php if ($sales): ?>
            <?php foreach ($sales as $sale): ?>
            <div class="product-layout product-list col-xs-12">
              <div class="product-thumb">
                <div class="image"><a href="<?php echo '/cars_for_sale/' . $sale->model_code; ?>"><img src="/uploads/<?php echo $sale->car_img; ?>" width="200" height="200" alt="<?php echo $sale->model_code; ?>" class="img-responsive" /></a></div>
                <div>
                  <div class="caption">
                    <h4><a href="<?php echo '/cars_for_sale/' . $sale->model_code; ?>"><?php echo $sale->model_code ?> </a></h4>
                    <p class="description"><?php echo substr($sale->other_car_details, 0, 150); ?>...</p>
                    <p class="price"> <span class="price-new">Rs/ <?php echo number_format($sale->asking_price); ?> </span></p>
                  </div>
                  <div class="button-group">
                    <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                    <div class="add-to-links">
                      <button type="button" data-toggle="tooltip" title="Add to Wish List" onClick=""><i class="fa fa-heart"></i> <span>Add to Wish List</span></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
             <?php endforeach ?>
            <?php else: ?>
              <div class="alert alert-danger">
                No Cars found!
              </div>
            <?php endif ?>
            
           
          </div>
          <div class="row">
            <div class="col-sm-6 text-left">
              <ul class="pagination">
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">6</a></li>
               </ul>
            </div>
          </div>
        </div>
        <!--Middle Part End -->
      </div>
    </div>
  </div>
  <!--Footer Start-->
  <?php $this->load->view('layout/footer'); ?>
