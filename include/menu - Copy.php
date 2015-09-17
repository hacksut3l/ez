<div id="menu" class="menu">
                <ul id="tiny">
                    <li><a href="../index.php">Home</a>
					<li><a href="../company">Company</a>
                        <ul>	
                            <li><a href="../company/aboutus.php">About Us</a></li>
                            <li><a href="../company/ourteam.php">Our Team</a></li>
                           <!-- <li><a href="../company/infrastructure.php">Infrastructure</a></li> -->
                            <li><a href="../company/partner-with-us.php">Partner with Us</a></li>
                            <li><a href="../company/global-clients.php">Global Clients</a></li>
							<li><a href="../company/careers.php">Careers</a></li>
							<li><a href="../contact">Contact</a></li>
                        </ul>
                     </li>
                    <li><a href="../services">Services</a>
                        <ul>	
                            <?php   
									require_once("../include/db_conn.php");
									$query="select DISTINCT menu_id,menu from main_menu";
									$fetch=mysql_query($query,$conn);
									while($data=mysql_fetch_array($fetch)){
									$menu=$data['menu'];
									$menu_id=$data['menu_id']; ?>
				
										<li><a href=''><?php echo $data['menu']; ?></a>
										<ul> 
										<?php	
											$sql="select DISTINCT submenu from sub_menu WHERE menu = '".$data['menu']."' ";
											$show=mysql_query($sql,$conn);
											while($rw=mysql_fetch_array($show)){
											$submenu = $rw['submenu'];
										?>
											
											<li><a href='../services/index.php?menu=<?php echo $data['menu']; ?>&submenu=<?php echo $rw['submenu']; ?>'><?php echo $rw['submenu']; ?></a>
												
										<?php } ?>
										</ul>
										</li>
		
						<?php } ?>    
                          
                        </ul>
                    </li>
                    <li><a href="../portfolio">Portfolio</a></li>
					<li><a href="../testimonials">Testimonials</a></li>
                    <!--<li><a href="../blog">Blog</a></li>-->
                    <li><a href="../contact">Contact</a></li>
                </ul>
            </div>