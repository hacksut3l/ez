<?php
	@session_start();

	if(isset($_SESSION['admin_username']))
	{
		include('config.php');
		include('include/inside_header.php');
		include('include/side_bar.php');
		
		$client_sql = "SELECT
							count(id) AS total_client
						FROM
							clients
						";
						
		$client_ex = mysql_query($client_sql);
		
		$is_client_present = @mysql_num_rows($client_ex);
		
		if($is_client_present > 0)
		{
			$client_value = mysql_fetch_assoc($client_ex);
		}
		else
		{
			$client_value['total_client'] = 0;
		}
		
		
		$director_sql = "SELECT
							count(id) AS total_director
						FROM
							directors
						";
						
		$director_ex = mysql_query($director_sql);
		
		$is_director_present = @mysql_num_rows($director_ex);
		
		if($is_director_present > 0)
		{
			$director_value = mysql_fetch_assoc($director_ex);
		}
		else
		{
			$director_value['total_director'] = 0;
		}
		
		
		$free_member_sql = "SELECT
								count(id) AS free_member_director
							FROM
								directors
							WHERE
								user_type = '1' AND manual_entry='0'
							";
						
		$free_member_ex = mysql_query($free_member_sql);
		
		$is_free_member_present = @mysql_num_rows($free_member_ex);
		
		
		if($is_free_member_present > 0)
		{
			$free_member_value = mysql_fetch_assoc($free_member_ex);
		}
		else
		{
			$free_member_value['free_member_director'] = 0;
		}
		$csv_member_sql = "SELECT
								count(id) AS csv_member_director
							FROM
								directors
							WHERE
								user_type = '1' AND manual_entry='1'
							";
						
		$csv_member_ex = mysql_query($csv_member_sql);
		
		$is_csv_member_present = @mysql_num_rows($csv_member_ex);
		
		if($is_csv_member_present > 0)
		{
			$csv_member_value = mysql_fetch_assoc($csv_member_ex);
		}
		else
		{
			$csv_member_value['csv_member_director'] = 0;
		}
		
		
		$standard_member_sql = "SELECT
								count(id) AS standard_member_director
							FROM
								directors
							WHERE
								user_type = '2'
							";							
		
						
		$standard_member_ex = mysql_query($standard_member_sql);
		
		$is_standard_member_present = @mysql_num_rows($standard_member_ex);
		
		if($is_standard_member_present > 0)
		{
			$standard_member_value = mysql_fetch_assoc($standard_member_ex);
		}
		else
		{
			$standard_member_value['standard_member_director'] = 0;
		}
		
		
		$premium_member_sql = "SELECT
								count(id) AS premium_member_director
							FROM
								directors
							WHERE
								user_type = '3'
							";
						
		$premium_member_ex = mysql_query($premium_member_sql);
		
		$is_premium_member_present = @mysql_num_rows($premium_member_ex);
		
		if($is_premium_member_present > 0)
		{
			$premium_member_value = mysql_fetch_assoc($premium_member_ex);
		}
		else
		{
			$premium_member_value['premium_member_director'] = 0;
		}
		
		
		$total_users = $client_value['total_client'] + $director_value['total_director'];
			
?>


<div class="content">
        
        <div class="header">
            <!--<div class="stats">
    <p class="stat"><span class="number">53</span>tickets</p>
    <p class="stat"><span class="number">27</span>tasks</p>
    <p class="stat"><span class="number">15</span>waiting</p>
</div>-->

            <h1 class="page-title">Dashboard</h1>
        </div>
        
                <ul class="breadcrumb">
            <li><a href="index.html">Home</a> <span class="divider">/</span></li>
            <li class="active">Dashboard</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

   <!-- <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Just a quick note:</strong> Hope you like the theme!
    </div>-->

    <div class="block">
        <a href="#page-stats" class="block-heading" data-toggle="collapse">Latest Stats</a>
        <div id="page-stats" class="block-body collapse in">

            <div class="stat-widget-container">
                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?php echo $total_users;?></p>
                        <p class="detail">Users</p>
                    </div>
                </div>

                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?php echo $client_value['total_client'];?></p>
                        <p class="detail">Clients</p>
                    </div>
                </div>

                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?php echo $director_value['total_director'];?></p>
                        <p class="detail">Funeral Directors</p>
                    </div>
                </div>
				<div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?php echo $csv_member_value['csv_member_director'];?></p>
                        <p class="detail">Pre-Populated Director</p>
                    </div>
                </div>

                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?php echo $free_member_value['free_member_director'];?></p>
                        <p class="detail">Basic Director</p>
                    </div>
                </div>
                
                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?php echo $standard_member_value['standard_member_director'];?></p>
                        <p class="detail">Standard Director</p>
                    </div>
                </div>

                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?php echo $premium_member_value['premium_member_director'];?></p>
                        <p class="detail">Premium Director</p>
                    </div>
                </div>
				<?php 						 //$current = date('Y-m-d');	
												$current ='2015-05-31';	
											  	$last= date("Y-m-t", strtotime($current));
											   
											   if($current==$last)
											   {
				?>
				  <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title">
						<a href="invoice/ex/index.php" target="_blank"><input type="button"  name="submit" value="Payment"  style="background:#000000; color:#FFFFFF; border:none; padding:10px;" /></a></p>
                        <p class="detail">Monthly Payment</p>
                    </div>
                </div>
				<?php
				
				} 
				
				?>
              

            </div>
        </div>
    </div>
</div>

<div class="row-fluid">
    <div class="block span6">
        <a href="#tablewidget" class="block-heading" data-toggle="collapse">Clients</a>
        <div id="tablewidget" class="block-body collapse in">
            <table class="table">
              <thead>
              
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email Id</th>
                </tr>
              </thead>
              <tbody>
              <?php
			  	$latest_client_sql = "SELECT 
										* 
									  FROM 
									  	clients 
										ORDER BY 
											id DESC
										LIMIT 4
									  ";
				//echo $latest_client_sql;exit;
									  
				$latest_client_ex = mysql_query($latest_client_sql);
				
				$ispresent_latest = @mysql_num_rows($latest_client_ex);
				
				if($ispresent_latest > 0)
				{
					while($latest = mysql_fetch_assoc($latest_client_ex))
					{
					
			  ?>
                        <tr>
                          <td><?php echo ucwords($latest['first_name']);?></td>
                          <td><?php echo ucwords($latest['last_name']);?></td>
                          <td><?php echo $latest['email'];?></td>
                        </tr>
               <?php
					}
				}
			   ?> 
              </tbody>
            </table>
            <p><a href="members/manage_clients.php">More...</a></p>
        </div>
    </div>
	
    <div class="block span6">
        <a href="#widget1container" class="block-heading" data-toggle="collapse">Directors</a>
        <div id="widget1container" class="block-body collapse in">
             <table class="table">
              <thead>
              
                <tr>
                  <th>Full Name</th>
                  <th>Business Name</th>
                  <th>Email Id</th>
                </tr>
              </thead>
              <tbody>
              <?php
			  	$latest_director_sql = "SELECT 
										* 
									  FROM 
									  	directors 
										ORDER BY 
											id DESC
										LIMIT 4
									  ";
				//echo $latest_client_sql;exit;
									  
				$latest_director_ex = mysql_query($latest_director_sql);
				
				$ispresent_latest_director = @mysql_num_rows($latest_director_ex);
				
				if($ispresent_latest_director > 0)
				{
					while($latest_director = mysql_fetch_assoc($latest_director_ex))
					{
					
			  ?>
                        <tr>
                          <td><?php echo ucwords($latest_director['full_name']);?></td>
                          <td><?php echo ucwords($latest_director['business_name']);?></td>
                          <td><?php echo $latest_director['email'];?></td>
                        </tr>
               <?php
					}
				}
			   ?> 
              </tbody>
            </table>
			<p><a href="members/manage_director.php">More...</a></p>
        </div>
    </div>
</div>

<div class="row-fluid">
    <div class="block span6">
        <div class="block-heading">
            <span class="block-icon pull-right">
                <a href="#" class="demo-cancel-click" rel="tooltip" title="Click to refresh"><i class="icon-refresh"></i></a>
            </span>

            <a href="#widget2container" data-toggle="collapse">History</a>
        </div>
        <div id="widget2container" class="block-body collapse in">
            <table class="table list">
              <tbody>
			  <?php 
			  $tran_history = "SELECT * FROM client_purchase_info ORDER BY id DESC LIMIT 4 ";
				$tran_history_ex = mysql_query($tran_history);
				$ispresent_history = @mysql_num_rows($tran_history_ex);		  
			  	if($ispresent_history > 0)
				{
					while($hist = mysql_fetch_assoc($tran_history_ex))
					{
			  ?>
                  <tr>
                      <td>
                          <p><i class="icon-user"></i><?php 
						$namesql="select * from clients where id=".$hist['client_id']."";
						$namesqlex=mysql_query($namesql);
						$cname = mysql_fetch_assoc($namesqlex);
						echo " ".$cname['first_name']." ".$cname['last_name'];
						  
						  ?></p>
                      </td>
                      <td>
                          <p>Amount: $<?php echo sprintf ("%.2f", $hist['order_amount']/100.0);?></p>
                      </td>
                      <td>
                          <p>Date: <?php echo date("d-m-Y", strtotime($hist['date']));?></p>
                          <a target="blank" href="view_transaction.php?tid=<?php echo $hist['id'];?>">View Transaction</a>
                      </td>
                  </tr>
				  <?php 
				  }
				 } 
				  ?>
              </tbody>
            </table>
            <p><a href="view_all_transaction.php">More...</a></p>

			</div>
    </div>
    <div class="block span6">
        <a href="#widget3container" class="block-heading" data-toggle="collapse">History of Directors</a>
        <div id="widget3container" class="block-body collapse in">
           <table class="table list">
              <tbody>
			  <?php 
				$tran_history_director = "SELECT * FROM director_member_info ORDER BY director_id DESC LIMIT 4 ";
				$tran_history_ex_director = mysql_query($tran_history_director);
				$ispresent_history_director = @mysql_num_rows($tran_history_ex_director);		  
			  	if($ispresent_history_director > 0)
				{
					while($hist_director = mysql_fetch_assoc($tran_history_ex_director))
					{
			  ?>
                  <tr>
                      <td>
                          <p><i class="icon-user"></i><?php 
					$namesql_director="select * from directors where id=".$hist_director['director_id']."";
						$namesqlex_director=mysql_query($namesql_director);
						$cname_director = mysql_fetch_assoc($namesqlex_director);
						echo " ".$cname_director['full_name'];
						  
						  ?></p>
                      </td>
                      <td>
                          <p>Amount: $<?php echo sprintf ("%.2f", $hist_director['order_amount']/100.0);?></p>
                      </td>
                      <td>
                          <p>Date: <?php echo date("d-m-Y", strtotime($hist_director['date']));?></p>
                          <a target="blank" href="view_transaction_director.php?tid=<?php echo $hist_director['director_id'];?>">View Transaction</a>
                      </td>
                  </tr>
				  <?php 
				  }
				 } 
				  ?>
              </tbody>
            </table>
            <p><a href="view_all_transaction_director.php">More...</a></p>
        </div>
    </div>
</div>


<?php
	include_once('include/footer.php');
}else{
	header('Location: login.php');
}
?>  