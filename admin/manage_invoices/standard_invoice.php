<?php
	ob_start();
	@session_start();
	
	if(isset($_SESSION['admin_username']))
	{
		include('../include/inside_header.php');
		include('../include/side_bar.php');	
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url;?>admin/stylesheets/jquery.datetimepicker.css"/>

<script src="<?php echo base_url;?>admin/lib/jquery.datetimepicker.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo base_url;?>js/Old_Include_Js/jquery-ui-1.8.23.custom.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url;?>css/Old_Include_Css/jquery-ui-1.8.23.custom.css" />

<script>
$(document).ready(function()
{

    var BASE_URL = '<?php echo base_url;?>';

     function loading_show(){
        $('#loading').html("<img src='"+BASE_URL+"images/loader.gif'/>").fadeIn('fast');
    }
    function loading_hide(){
        $('#loading').fadeOut('fast');
    } 

    $( "#director" ).autocomplete({
                    
        source: function(request, response) {

            var name = request.term;
            loading_show();     
        
            $.ajax({
                url :BASE_URL+"admin/get_directors.php",
                data : "type="+2+"&name="+request.term,
                dataType: "json",
                type : "POST",
                success : function(data)
                {
                    loading_hide();
                    group=[];
                    label=[];
                    $.each(data,function(i,v){
                        group.push({
                        label:$(v).attr('groups'),
                        value:$(v).attr('id')
                    })
                })
                
            response(group);
                }
            });
        },
        select: function (event,ui){
            
            $('#director').val(ui.item.label);
            $('#director_id').val(ui.item.value);

            return false;
        },
        minLength: 2
    });

	
	
	$('#datetimepicker2').datetimepicker({
	 timepicker:false,
	 format:'Y-m-d'
	});
	
	$('#datetimepicker4').datetimepicker({
	 timepicker:false,
	 format:'Y-m-d'
	});


    $('.download_invoice').click(function(){

        var from_date = $('.from_date').val();
        var to_date = $('.to_date').val();
        var director = $('#director_id').val();

        if(from_date != '' && to_date != '' && director != ''){
            loading_show();
            $.ajax({
                url :BASE_URL+"admin/tcpdftest/ex/download_invoice.php",
                data : "from_date="+from_date+"&to_date="+to_date+"&director="+director+"&type=1",
                type : "POST",
                success : function(data)
                {
                    loading_hide();
                    if(data == '1'){

                    }
                    else if(data == '2'){
                        alert('This director had not recieved any lead');
                    }
                    else{
                        window.location.href = BASE_URL+'admin/download.php?filename='+data;
                    }
                }
            });

        }
        else{
            alert('All fields are mandatory');
        }

        


    });


    $('.send_invoice').click(function(){

        var from_date = $('.from_date').val();
        var to_date = $('.to_date').val();
        var director = $('#director_id').val();
		
        if(from_date != '' && to_date != '' && director != ''){
            loading_show();
            $.ajax({
                url :BASE_URL+"admin/tcpdftest/ex/download_invoice.php",
                data : "from_date="+from_date+"&to_date="+to_date+"&director="+director+"&type=2",
                type : "POST",
				
                success : function(data)
                {
                    loading_hide();
                    if(data == '3'){
                        alert('Sorry some error occurred while sending mail');
                    }
                    else{
					
                        alert('Invoice Sent');
                    }
                    
                }
            });
        }
        else{
            alert('All fields are mandatory');
        }


    });

	

});
</script>

<style type="text/css">
           
            #loading{
                width: 100%;
                position: fixed;
                top: 100px;
                left: 385px;
                /*margin-top:300px;*/
            }
            #container1 .pagination ul li.inactive,
            #container1 .pagination ul li.inactive:hover{
                background-color:#ededed;
                color:#bababa;
                border:1px solid #bababa;
                cursor: default;
            }
            #container1 .data ul li{
                list-style: none;
                font-family: verdana;
                margin: 5px 0 5px 0;
                color: #000;
                font-size: 13px;
            }

            #container1 .pagination{
                float: right;
                margin-bottom: 20px;
                width: 68%;
            }
            #container1 .pagination ul li{
                list-style: none;
                float: left;
                border: 1px solid #006699;
                padding: 2px 6px 2px 6px;
                margin: 0 3px 0 3px;
                font-family: arial;
                font-size: 14px;
                color: #006699;
                font-weight: bold;
                background-color: #f2f2f2;
            }
            #container1 .pagination ul li:hover{
                color: #fff;
                background-color: #006699;
                cursor: pointer;
            }
            .go_button
            {
            background-color:#f2f2f2;border:1px solid #006699;color:#cc0000;padding:2px 6px 2px 6px;cursor:pointer;position:absolute;margin-top:-1px;
            }
            .total
            {
            float:right;font-family:arial;color:#999;
            }

        </style>


<div class="content">

    <div id="loading"></div>

        
        <div class="header">
            
            <h1 class="page-title">Manage Invoice</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="">Manage Invoice</a> <span class="divider">/</span></li>
            <li class="active">Generate Invoice</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
 
<div class="well">
    
    <form action="" method="post" enctype="multipart/form-data">  
        <input type="hidden" value="<?php echo $_REQUEST['id']?>" name="userid">
        <p>
        	<label>Date From :</label> 
                <input type="text" id="datetimepicker2" name="from_date" required autocomplete="off" class="from_date"/>
        </p>
        
         <p>
        	<label>Date To :</label> 
                <input type="text" id="datetimepicker4" name="to_date" required autocomplete="off" class="to_date"/>
        </p>
        
        <p>
            <label>Select Director :</label> 
                <input type="text" id="director" name="director" required />
        </p>
        

        <input type="hidden" value="" id="director_id"> 

       <input type="button" value="Send Invoice" name="send" class="btn btn-primary send_invoice">
       <input type="button" value="Download Invoice" name="download" class="btn btn-primary download_invoice">
    	
    </form>
    
    
</div>



<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button class="btn btn-danger" data-dismiss="modal">Delete</button>
    </div>
</div>

<?php	
	include_once('../include/footer.php');
		
}
else
{
	header('Location:../login.php');
}
?>
                    
        