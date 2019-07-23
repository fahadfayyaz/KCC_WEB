     
   <div class="page-content">
    <div class="content">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
        <h2><?php echo $title; ?></h2> 
        </div>
        <!-- END PAGE TITLE -->
        <!-- BEGIN PlACE PAGE CONTENT HERE -->
        <div class="col-md-14">
            <div class="grid simple ">
                <div class="grid-body no-border">
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#" id="activeAll" class="btn btn-primary tip" data-toggle="tooltip" title="Active Selected"><i class="fa fa-eye"></i></a>
                            <a href="#" id="deactiveAll" class="btn btn-primary tip" data-toggle="tooltip" title="Deactive Selected"><i class="fa fa-eye-slash"></i></a>
                            <a href="#" id="deleteAll" class="btn btn-primary tip" data-toggle="tooltip" title="Delete Selected"><i class="fa fa-trash"></i></a>
                            <a href="/admin/cars_for_sale/add" class="btn btn-primary tip" data-toggle="tooltip" title="Create"><i class="fa fa-plus"></i></a>
                        </div>
                           <?php echo form_open('', ['name' => 'formSearch', 'id' => 'formSearch', 'method' => 'get']); ?>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="per_page" onchange="javascript:document.forms['formSearch'].submit()" class="form-control">
                                            <option value="15" <?php echo ($this->input->get('per_page') == '15') ? 'selected' : null ?>>15</option>
                                            <option value="25" <?php echo ($this->input->get('per_page') == '25') ? 'selected' : null ?>>25</option>
                                            <option value="50" <?php echo ($this->input->get('per_page') == '50') ? 'selected' : null ?>>50</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="text" name="q" class="form-control" placeholder="Search" value="<?php echo $this->input->get('q') ?>">
                                        <span class="input-group-btn">
                                                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search" aria-hidden="true"></i></button>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>

                    </div>
                        
                    <br>
                        <?php if ($sales): ?>

                        <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width:1%">
                                     <div class="checkbox check-default">
                                        <input id="checkbox10" type="checkbox" value="1" class="checkall">
                                        <label for="checkbox10"></label>
                                    </div>
                                </th>
                                <th style="width:20%">manufacturer_name</th>
                                <th style="width:20%">Model code</th>
                                <th style="width:20%">Asking price</th>
                                <th style="width:20%">Car Image</th>
                                <th style="width:10%">Status</th>
                                <th style="width:10%">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php foreach ($sales as $sale): ?>

                            <tr>
                                <td>
                                   <div class="checkbox check-default">
                                        <input name="checkall" id="checkbox<?php echo $sale->car_for_sale_Id; ?>" type="checkbox" value="<?php echo $sale->car_for_sale_Id; ?>">
                                        <label for="checkbox<?php echo $sale->car_for_sale_Id; ?>"></label>
                                    </div>
                                </td>
                                <td><?php echo $sale->manufacturer_name; ?><br><br>
                                    <?php $spec = $this->feature->spec_all($sale->car_for_sale_Id); ?>
                                    <?php if($spec) : ?>
                                        <a href="/admin/car_features/edit/<?php echo $spec->car_feature_id; ?>" class="tip" data-toggle="tooltip" title="Edit Features"><i class="fa fa-edit"></i></a> | 
                                    <?php else : ?>
                                        <a href="/admin/car_features/add/<?php echo $sale->car_for_sale_Id; ?>" class="tip" data-toggle="tooltip"  title="Add Features"><i class="fa fa-plus"></i></a> | 
                                    <?php endif ?>
                                     <a href="/admin/product_gallery/add/<?php echo $sale->car_for_sale_Id; ?>" class="tip" data-toggle="tooltip" title="Add Gallery"><i class="fa fa-image"></i></a>

                                </td>
                                <td><?php echo $sale->model_code ?></td>
                                <td><?php echo $sale->asking_price; ?></td>
                                <td align="center">
                                    <img src="/uploads/<?php echo $sale->car_img; ?>" width="100" alt="<?php echo $sale->manufacturer_name; ?>" class="img-thumbnail">
                                </td>
                                 <td>
                                    <?php if ($sale->status == 'DEACTIVE'): ?>
                                        <a href="/admin/cars_for_sale/status/<?php echo $sale->car_for_sale_Id; ?>" class="singleStatus"><span class="label label-important">Deactive</span></a>
                                    <?php else: ?>
                                        <a href="/admin/cars_for_sale/status/<?php echo $sale->car_for_sale_Id; ?>" class="singleStatus"><span class="label label-info">Active</span></a>
                                    <?php endif ?>
                                 </td>
                                <td>
                                    <a href="/admin/cars_for_sale/edit/<?php echo $sale->car_for_sale_Id; ?>" class="label label-info"> <i class="fa fa-edit"></i></a>
                                    <a href="/admin/cars_for_sale/delete/<?php echo $sale->car_for_sale_Id; ?>" class="label label-important singleDelete"> <i class="fa fa-trash-o"></i></a>    
                                </td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>

                      <?php echo $this->pagination->create_links(); ?> 
                      
                    <?php else: ?>
                        <div class="alert alert-info">
                            <strong>Info!</strong> No Record Found!
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <!-- END PLACE PAGE CONTENT HERE -->
    </div>
</div>



<script>
    $(document).ready(function() {
        // SINGLE STATUS AJAX HERE.
        $(".singleStatus").on('click', function(e) {
            e.preventDefault(); //disable your link functionality

            var href = $(this).attr('href');
            var self = $(this);

            self.html("<img src='/assets/admin/img/ajax-loader.gif'>");
            $.get(href, function(response) {
                if (response == 'DEACTIVE') 
                    self.html("<span class='label label-important'>Deactive</span>");
                else
                    self.html("<span class='label label-info'>Active</span>");
            });
        }); 

        // SINGLE DELETE AJAX HERE.
        $(".singleDelete").on('click', function(e) {
            e.preventDefault(); 
            
            if (confirm("Are you Pakka to delete this")) 
            {
                var href = $(".singleDelete").attr('href');
                var self = $(this);

                self.html("<img src='/assets/admin/img/ajax-loader.gif'>");
                $.get(href, function(response) {
                    if (response == 1) 
                    {
                        self.closest('tr').css('background-color', 'red').fadeOut(1000);
                        self.remove();
                    }
                });
            }
            else
            {
                return false;
            }           
        });


        $("#activeAll").on('click', function(e) {
           e.preventDefault(); //disable your link functionality
           var checkall = [];
            $.each($("input[name='checkall']:checked"), function(){            
                checkall.push($(this).val());
            });

            $.ajax({
                url: '/admin/cars_for_sale/activeall',
                type: 'get',
                dataType: 'json',
                data: { checkall: checkall},
                success: function(response){
                   if (response == 1) {
                    location.reload(true);
                   }
                }
            });
 
        });

        $("#deactiveAll").on('click', function(e) {
           e.preventDefault(); //disable your link functionality
           
           var checkall = [];
            $.each($("input[name='checkall']:checked"), function(){            
                checkall.push($(this).val());
            });

            $.ajax({
                url: '/admin/cars_for_sale/deactiveall',
                type: 'get',
                dataType: 'json',
                data: { checkall: checkall},
                success: function(response){
                    if (response == 1) {
                    location.reload(true);
                   }
                }
            });
        });

        




    });
</script>
