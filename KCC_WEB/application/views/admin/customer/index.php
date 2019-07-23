   <div class="page-content">
    <div class="content">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h2><?php echo $title ?> </h2>
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
                            <a href="/admin/customer/add" class="btn btn-primary tip" data-toggle="tooltip" title="Create"><i class="fa fa-plus"></i></a>
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
                    <?php if ($customers): ?>
                       <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width:1%">
                                    <div class="checkbox check-default">
                                        <input id="checkbox" type="checkbox" class="checkall">
                                        <label for="checkbox"></label>
                                    </div>
                                </th>
                                <th style="width:30%">Name</th>
                                <th style="width:25%">Contact No</th>
                                <th style="width:30%">Email Address</th>
                                <th style="width:15%">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($customers as $customer) : ?>
                            <tr>
                                <td>
                                     <div class="checkbox check-default">
                                        <input name="checkall" id="checkbox<?php echo $customer->customer_id; ?>" type="checkbox" value="<?php echo $customer->customer_id; ?>">
                                        <label for="checkbox<?php echo $customer->customer_id; ?>"></label>
                                    </div>
                                </td>
                                <td><?php echo $customer->customer_name; ?></td>
                                <td><?php echo $customer->contact_no; ?></td>
                                <td><?php echo $customer->email_address; ?></td>
                                
                                <td>
                                    <a href="/admin/customer/edit/<?php echo $customer->customer_id; ?>" class="label label-info"> <i class="fa fa-edit"></i></a>
                                    <a href="/admin/customer/delete/<?php echo $customer->customer_id;?>" class="label label-important singleDelete"> <i class="fa fa-trash-o"></i></a>    
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

        $("#deleteAll").on('click', function(e) {
           e.preventDefault(); //disable your link functionality
           
           var checkall = [];
            $.each($("input[name='checkall']:checked"), function(){            
                checkall.push($(this).val());
            });

            $.ajax({
                url: '/admin/customer/delete_all',
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