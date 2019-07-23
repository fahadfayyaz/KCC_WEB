<aside id="column-left" class="col-sm-3 hidden-xs">
          <h3 class="subtitle">Manufacturers</h3>
          <div class="box-category">
          <?php $manufacturers = $this->manufacturer->show_all(); ?>
          <?php if ($manufacturers) : ?>
            <ul id="cat_accordion">
              <?php foreach ($manufacturers as $manufacturer): ?>
                <li><a href="<?php echo '/car_manufacturers/' . $manufacturer->manufacturer_name ?>"><?php echo $manufacturer->manufacturer_name; ?></a></li>
              <?php endforeach ?>
             
            </ul>
          <?php else: ?>
            <div class="alert alert-danger">
              No manufacturer found!
            </div>
          <?php endif ?>  
         
          </div>
          <h3 class="subtitle">Latest</h3>
          <div class="side-item">
            <?php $latest_cars = $this->sales->latest_product(); ?>
            <?php if ($latest_cars) : ?>
            <?php foreach ($latest_cars as $latest_car): ?>
            <div class="product-thumb clearfix">
              <div class="image"><a href="<?php echo '/cars_for_sale/' . $latest_car->model_code ?>"><img src="/uploads/<?php echo $latest_car->car_img; ?>" alt="<?php echo $latest_car->model_code; ?>" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="<?php echo '/cars_for_sale/' . $latest_car->model_code; ?>"><?php echo $latest_car->model_code; ?></a></h4>
                <p class="price"><span class="price-new">Rs/ <?php echo number_format($latest_car->asking_price); ?></span></p>
              </div>
            </div>
            <?php endforeach ?>
            <?php else: ?>
            <div class="alert alert-danger">
              No Cars found!
            </div>
          <?php endif ?>  
          </div>
          <h3 class="subtitle">Most Viewed</h3>
          <div class="side-item">
            <?php $most_viewed = $this->sales->most_viewed(); ?>
            <?php if ($most_viewed) : ?>
            <?php foreach ($most_viewed as $most_views) : ?>
            <div class="product-thumb clearfix">
              <div class="image"><a href="<?php echo '/cars_for_sale/' . $most_views->model_code; ?>"><img src="/uploads/<?php echo $most_views->car_img; ?>" alt="<?php echo $most_views->model_code; ?>" width="100" height="100" class="img-responsive" /></a></div>
              <div class="caption">
                <h4><a href="<?php echo '/cars_for_sale/' . $most_views->model_code; ?>"><?php echo $most_views->model_code; ?></a></h4>
                <p class="price"><span class="price-new">Rs/ <?php echo number_format($most_views->asking_price); ?></span></p>
              </div>
            </div>
            <?php endforeach ?>
            <?php else: ?>
            <div class="alert alert-danger">
              No Car found!
            </div>
          <?php endif ?>  
          </div>
          
           <h3 class="subtitle">Prices</h3>
          <?php 
            $asking_price = [
              '100000-500000' => '100,000 To 500,000', 
              '500000-1000000' => '5,000,00 To 1,000,000', 
              '1000000-1500000' => '1,000,000 To 1,500,000', 
              '1500000-2000000' => '1,500,000 To 2,000,000', 
              '2000000-2500000' => '2,000,000 To 2,500,000', 
              '2500000-3000000' => '2,500,000 To 3,000,000', 
              '3000000-3500000' => '3,000,000 To 3,500,000', 
              '3500000-4000000' => '3,500,000 To 4,000,000', 
              '4000000-9900000' => '4,000,000 To 9,900,000', 
            ];
          ?>
          <div class="side-item">
            
            <?php foreach ($asking_price as $key => $value): ?>
            <div class="product-thumb clearfix">
              <div class="caption">
                <h4><a href="/Cars_for_sale?asking_price=<?php echo $key; ?>"><?php echo $value; ?></a></h4>
              </div>
            </div>
            <?php endforeach ?>
          </div>
          <h3 class="subtitle">New Arrivals</h3>
      <?php 
            $registration_year = [
              '2013' => '2013', 
              '2014' => '2014', 
              '2015' => '2015', 
              '2016' => '2016', 
              '2017' => '2017', 
              '2018' => '2018',
              '2019' => '2019', 
               
            ];
          ?>
          <div class="side-item">
            <?php foreach ($registration_year as $key => $value): ?>
              
            <div class="product-thumb clearfix">
              <div class="caption">
                <h4><a href="/Cars_for_sale?registration_year=<?php echo $key; ?>"><?php echo $value; ?></a></h4>
              </div>
            </div>
            <?php endforeach ?>
            
            
            
            
            
          </div>
        </aside>