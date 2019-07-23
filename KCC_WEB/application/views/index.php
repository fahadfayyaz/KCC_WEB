<?php $this->load->view('layout/header'); ?> 
  
  <div id="container">
    <!-- Feature Box Start-->
    <div class="container">&nbsp;</div>
    <!-- Feature Box End-->
    <div class="container">
      <div class="row">
        <!-- Left Part Start-->
        <?php $this->load->view('layout/sidebar'); ?> 
        <!-- Left Part End-->
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
          <!-- Slideshow Start-->
          <div class="slideshow single-slider owl-carousel">
            <div class="item"> <a href="#"><img class="img-responsive" src="/assets/image/slider/b1.jpg" alt="banner 1" /></a> </div>
            <div class="item"> <a href="#"><img class="img-responsive" src="/assets/image/slider/b2.jpeg" alt="banner 2" /></a> </div>
            <div class="item"> <a href="#"><img class="img-responsive" src="/assets/image/slider/b3.jpg" alt="banner 3" /></a> </div>
          </div>
          <!-- Slideshow End-->
          <!-- Featured Product Start-->
          <h3 class="subtitle">Honda</h3>
          <div class="owl-carousel product_carousel">
            <?php $sales = $this->sales->show_all_by('Honda'); ?>
            <?php if ($sales) : ?>
            <?php foreach ($sales as $sale): ?>
            <div class="product-thumb clearfix">
              <div class="image"><a href="<?php echo '/cars_for_sale/' . $sale->model_code ?>"><img src="/uploads/<?php echo $sale->car_img; ?>" width="200" height="200" alt="<?php echo $sale->model_code; ?>" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="<?php echo '/cars_for_sale/' . $sale->model_code; ?>"><?php echo $sale->model_code; ?></a></h4>
                <p class="price"><span class="price-new">Rs/ <?php echo number_format($sale->asking_price); ?></span></p>
              </div>
              <div class="button-group">
                <button class="btn-primary" type="button" onClick="cart.add('42');"><span>Add to Cart</span></button>
                <div class="add-to-links">
                  <button type="button" data-toggle="tooltip" title="Add to Wish List" onClick=""><i class="fa fa-heart"></i></button>
                </div>
              </div>
            </div>
            <?php endforeach ?>
            <?php else: ?>
            <div class="alert alert-danger">
              No product found!
            </div>
          <?php endif ?> 
            
          </div>
          <!-- Featured Product End-->
          <!-- Categories Product Slider Start-->

          <div class="category-module" id="latest_category">
            <h3 class="subtitle">Toyota - <a class="viewall" href="#">view all</a></h3>
            <div class="category-module-content">
              <div id="tab-cat1" class="tab_content">
                <div class="owl-carousel latest_category_tabs">
                    <?php $sales = $this->sales->show_all_by('Toyota'); ?>
                <?php if ($sales) : ?>
                <?php foreach ($sales as $sale): ?>
                  <div class="product-thumb">
                    <div class="image"><a href="<?php echo '/cars_for_sale/' . $sale->model_code ?>"><img src="/uploads/<?php echo $sale->car_img ?>" width="200" height="200" alt="<?php echo $sale->model_code ?>" class="img-responsive" /></a></div>
                    <div class="caption">
                      <h4><a href="<?php echo '/cars_for_sale/' . $sale->model_code; ?>"><?php echo $sale->model_code; ?></a></h4>
                      <p class="price"> <span class="price-new">Rs/ <?php echo number_format($sale->asking_price); ?></span></p>
                    </div>
                    <div class="button-group">
                      <button class="btn-primary" type="button" onClick=""><span>Add to Cart</span></button>
                      <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="Add to wishlist" onClick=""><i class="fa fa-heart"></i></button>
                      </div>
                    </div>
                  </div>
                   <?php endforeach ?>
                <?php else: ?>
                <div class="alert alert-danger">
                  No Car found!
                </div>
              <?php endif ?> 
                  
                  
                  
                  
                  
                </div>
              </div>
            </div>
          </div>
          <!-- Toyota Product Slider End-->
          
          <!-- next Product Slider Start -->
        
 
          <!-- Brand Logo Carousel End -->
        </div>
        <!--Middle Part End-->
      </div>
    </div>
  </div>

  <!--Footer Start-->
  <?php $this->load->view('layout/footer'); ?> 
