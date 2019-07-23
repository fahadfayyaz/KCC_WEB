    
    $(document).ready(function($) {
        // SINGLE STATUS AJAX
        $(".singleStatus").on('click', function(event) {
            event.preventDefault(); //DISABLE FOR LINK FUNCTIONALITY.
            var href = $(this).attr('href');
            var self = $(this);
            
            self.html('<img src="/assets/admin/img/ajax-loader.gif">');

            $.get(href, function(response) {
                if (response == 'ACTIVE') 
                    self.html('<span class="label label-info">Active</span>');
                else
                    self.html('<span class="label label-important">Dective</span>');
            });
        });
        
        // SINGLE DELETE AJAX
        $(".singleDelete").on('click', function(event) {
            event.preventDefault();
            if (confirm("Are you PAKKA to delete this?")) 
            {
                var href = $(this).attr('href');
                var self = $(this);
                self.html('<img src="/assets/admin/img/ajax-loader.gif">');
                $.get(href, function(response) {
                    if (response == 1) 
                    {
                        self.closest('tr').css('background-color', 'red').fadeOut(1000);
                        self.remove();
                    }
                });
            }
            else
                return false;
        });

        // ACTIVE ALL STATUS AJAX
        $("#activeAllStatus").on('click', function(event) {
        	event.preventDefault();
        	if ($(".chkParam:checked").length > 0 ) 
        	{
        		var formSerials = $("#formViewAjax").serialize();
        		$.post('/admin/brand/active_all_status', formSerials, function(response) {
        			if (response > 0) 
        				window.location.href =  "/admin/brand";
        		});
        	}
        	else
        		alert("Select atleast one!");
        });

        // DEACTIVE ALL STATUS AJAX
        $("#deactiveAllStatus").on('click', function(event) {
        	event.preventDefault();
        	if ($(".chkParam:checked").length > 0 ) 
        	{
        		var formSerials = $("#formViewAjax").serialize();
        		$.post('/admin/brand/deactive_all_status', formSerials, function(response) {
        			if (response > 0) 
        				window.location.href =  "/admin/brand";
        		});
        	}
        	else
        		alert("Select atleast one!"); 
        });

         // DELETE ALL STATUS AJAX
        $("#deleteAll").on('click', function(event) {
        	event.preventDefault();
        	if ($(".chkParam:checked").length > 0 ) 
        	{
        		if (confirm("Are you really PAKKA to delet this?")) 
        		{
	        		var formSerials = $("#formViewAjax").serialize();
	        		$.post('/admin/brand/delete_all', formSerials, function(response) {
	        			if (response > 0) 
	        				window.location.href =  "/admin/brand";
	        		});
        		}
        		else
        			return false;
        	}
        	else
        		alert("Select atleast one!");
        });
    });