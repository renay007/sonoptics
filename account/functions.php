<?php // functions.php
$dbhost = 'localhost'; 
$dbname = 'sonoptics';
$dbuser = 'sonoptics'; 
$dbpass = 'resonance52'; 

function createsessions($result) 
{ 

	$salt1 = "aju^@"; 
	$salt2 = "b*k#$";	

    if(isset($_POST['remember'])) 
    { 
        //Add additional member to cookie array as per requirement 
        setcookie("email", sha1("$salt1".$result['email']."$salt2"), time()+60*60*24*100, "/"); 
        setcookie("username", sha1("$salt1".$result['username']."$salt2"), time()+60*60*24*100, "/"); 
        setcookie("password", sha1("$salt1".$result['password']."$salt2"), time()+60*60*24*100, "/"); 
				return; 
    } 
		else
		{
        setcookie("email", sha1("$salt1".$result['email']."$salt2"), time()+60*60*24, "/"); 
        setcookie("username", sha1("$salt1".$result['username']."$salt2"), time()+60*60*24, "/"); 
        setcookie("password", sha1("$salt1".$result['password']."$salt2"), time()+60*60*24, "/"); 
				return; 
		}
} 

function clearsessionscookies() 
{ 
    unset($_COOKIE['email']); 
    unset($_COOKIE['username']); 
    unset($_COOKIE['password']); 
     
    session_unset();     
    session_destroy();  

    if(isset($_POST['remmember'])) 
    { 
        setcookie("email", "", time()-60*60*24*$days, "/"); 
        setcookie("username", "", time()-60*60*24*$days, "/"); 
        setcookie("password", "", time()-60*60*24*$days, "/"); 
				return; 
    } 
		else
		{
        setcookie("email", "", time()-60*60*24, "/"); 
        setcookie("username", "", time()-60*60*24, "/"); 
        setcookie("password", "", time()-60*60*24, "/"); 
				return; 
		}
} 

function isGoodUser()
{
	if((isset($_COOKIE['email']) || isset($_COOKIE['username'])) && isset($_COOKIE['password'])){}
	else{header("location: login.php");}

}

function loadLocation()
{
	global $dbhost;
	global $dbname;
	global $dbuser;
	global $dbpass;
	global $info;

	 try   
	 {         
			$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser , $dbpass);
			$checkUserQuery = "SELECT *
												 FROM sonoptics.locations WHERE encryptedEmail = ?
												 ORDER BY time_stamp DESC";
											
			$checkUserStmt = $dbConnection->prepare($checkUserQuery);
			$values = array($info['encryptedEmail']);
			$checkUserStmt->execute($values);                                                                                                                               
			while($queryResult = $checkUserStmt->fetch(PDO::FETCH_ASSOC))
			{    
				$result[]=array("identifier"=>$queryResult['identifier'],
												"address"=>$queryResult['location_address'],
												"city"=>$queryResult['location_city'],
												"state"=>$queryResult['location_state'],                                                                                                      
												"zip_code"=>$queryResult['location_zipCode'],
												"good_device" =>$queryResult['good_device'],
												"bad_device" =>$queryResult['bad_device']
												);   
			}    
			$dbConnection = null;
		}         
		catch (PDOException $e)
		{         
			die("Error 001: Database Error");
		}         
							
		if(isset($result))
		{
			foreach($result as $location)
			{
				$id = explode(" ", $location['identifier']);
				$parameter = implode($id);
			?>   
					<div class="col-lg-6">
						<section class="panel">
							<header class="panel-heading"> 
								<span class="green-color">
									<a class="green-color" href="devices.php?loc=<?php echo strtolower($parameter)?>"><?php echo strtoupper($location['identifier'])?></a>
								</span>
								<span class="tools pull-right">
									<a class="fa fa-repeat box-refresh" href="javascript:;"></a>
									<a class="t-collapse fa fa-chevron-down" href="javascript:;"></a>
									<a class="t-close fa fa-times" href="javascript:;"></a>
								</span>
							</header>
						 <div class="panel-body" style="display: block;">
								<table class="table" style="
								border-collapse: separate;
								border-spacing: 36px;
								">
									<colgroup><col style="width:10%">
									</colgroup>
									<tbody>
										<tr style>
											<td id="quick-table-icon">
												<i class="fa fa-home" style="
												font-size: 1.6em;
												"></i>
											</td>
											<td id="quick-table-content"><?php echo $location['address'].", ".$location['city'].", ".$location['state']." ".$location['zip_code'];?>
											</td>
										</tr>
										<tr>
											<td id="quick-table-icon">
												<i class="fa fa-cogs" style="font-size: 1.6em;"></i>
											</td>
											<td id="quick-table-content"><?php echo $location['good_device']+$location['bad_device'];?>&nbsp;&nbsp;devices
											</td>
										</tr>
										<tr>
											<td id="quick-table-icon">
											<i class="fa fa-edit" style="
											font-size: 1.6em;"></i>
											</td>
											<td id="quick-table-content">
												<div style="float: left;"><?php echo $location['good_device'];?>&nbsp;&nbsp;
													<i class="fa fa-check-circle green-check"></i>
												</div>
												<div style="float: right;"><?php echo $location['bad_device'];?>&nbsp;&nbsp;                                                                                                     
													<i class="fa fa-times-circle red-x"></i>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</section>
					</div>
			<?php
			}
		}
}

function loadDevices()
{
	global $dbhost;
	global $dbname;
	global $dbuser;
	global $dbpass;
	global $info;
	global $result;
	 try   
	 {         
			$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser , $dbpass);
			$checkUserQuery = "SELECT locations.identifier, locations.location_address, locations.location_city,
												    		locations.location_state, locations.location_zipCode, devices.device_id, 
														    devices.device_location, devices.device_note, devices.battery_level,
															  devices.beep_status, devices.device_status, devices.encryptedEmail
													FROM 
															  sonoptics.devices                  
													LEFT JOIN 
															  sonoptics.locations
													on 
															  devices.location_name = locations.location_name
													WHERE 
															  devices.encryptedEmail = ?
															  AND
																devices.location_name = ?
																AND locations.identifier IS NOT NULL
													ORDER BY devices.time_stamp DESC";	

			$checkUserStmt = $dbConnection->prepare($checkUserQuery);
			$values = array($info['encryptedEmail'], $_GET['loc']);
			$checkUserStmt->execute($values);                                                                                                                               
			while($queryResult = $checkUserStmt->fetch(PDO::FETCH_ASSOC))
			{    
				$result[]=array("identifier"=>$queryResult['identifier'],
												"address"=>$queryResult['location_address'],
												"city"=>$queryResult['location_city'],
												"state"=>$queryResult['location_state'],                                                                                                      
												"zip_code"=>$queryResult['location_zipCode'],
												"id"=>$queryResult['device_id'],
												"device_location"=>$queryResult['device_location'],
												"device_note"=>$queryResult['device_note'],
												"battery"=>$queryResult['battery_level'],
												"beep_status"=>$queryResult['beep_status'],
												"device_status"=>$queryResult['device_status']
												);   
			}    
			$dbConnection = null;
		}         
		catch (PDOException $e)
		{         
			die("Error 001: Database Error");
		}         
							
		if(isset($result))
		{
			$count = 1;
			foreach($result as $location)
			{
				$identifier              = explode(" ",$location['identifier']);
				$newID                   = array_map('strtolower', $identifier);
				$newID                   = array_map('ucfirst', $newID);
				$info['identifier']      = implode(" ", $newID);

				$deviceLocation        	 = explode(" ",$location['device_location']);
				$deviceLoc             	 = array_map('strtolower', $deviceLocation);
				$deviceLoc            	 = array_map('ucfirst', $deviceLoc);
				$info['device_location'] = implode(" ", $deviceLoc);
			?>  
							<div class="col-lg-6">
                  <section class="panel">
                    <header class="panel-heading"> 
                      <span class="green-color">Device <?php echo $count;?></span> 
                      <span class="tools pull-right">
                        <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                        <a class="t-collapse fa fa-chevron-down" href="javascript:;"></a>
                        <a class="t-close fa fa-times" href="javascript:;"></a>
                      </span>
                    </header>
                    <div class="panel-body" style="display: block;">                                                                                                              
                      <table class="table" style="border-collapse: separate;border-spacing: 36px;">
                        <colgroup><col style="width:10%"></colgroup>
                          <tbody>
                            <tr>
                              <td colspan="2" id="quick-table-icon">
                                <i class="fa fa-camera" style="font-size: 1.6em;"></i>
                              </td>
                              <td id="quick-table-content"><?php echo $info['device_location'];?>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="3" id="quick-table-content">
                                <div>
                                  <span class="icon bg-warning"
                                        style="border-radius: 100%;
                                               width: 30px;height: 30px;line-height: 30px;
                                               text-align: center;margin-right: 15px;font-size: 16px;   
                                               float: left;margin-bottom: 15px;">
                                    <i class="fa fa-warning"></i>
                                  </span>
                                  <span><?php echo $location['device_note'];?></span>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="3" id="quick-table-content">
                                <div style="display: inline-block;margin-right: 20%;">
                                  ID: <?php echo $location['id'];?>
                                </div>
                                <div style="display: inline-block;float: right;">
                                  History
                                </div>
                              </td>
                            </tr>
														<tr>
                              <td colspan="3" id="quick-table-content">
                                <div style="float: left;">Battery:
                                  <img src="img/Status-battery-4.png" alt="Battery" style="width:30px;height:20px;margin-bottom: 5px;margin-left: 2px;">
                                </div>
                                <div style="float: right;">
                                  <div class="onoffswitch<?php echo $count;?>">
                                    <input type="checkbox" name="onoffswitch<?php echo $count;?>"
																					 class="onoffswitch-checkbox<?php echo $count;?>" id="myonoffswitch<?php echo $count;?>">
                                      <label class="onoffswitch-label<?php echo $count;?>" for="myonoffswitch<?php echo $count;?>">
                                        <span class="onoffswitch-inner<?php echo $count;?>"></span>
                                        <span class="onoffswitch-switch<?php echo $count;?>"></span>
                                      </label>
                                  </div>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </section>
                  </div> <!-- End div col-lg-6 -->
									<style>
									.onoffswitch<?php echo $count;?> {
											position: relative; width: 58px;
											-webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
									}
									.onoffswitch-checkbox<?php echo $count;?> {
											display: none;
									}
									.onoffswitch-label<?php echo $count;?> {
											display: block; overflow: hidden; cursor: pointer;
											border: 2px solid #999999; border-radius: 12px;
									}
									.onoffswitch-inner<?php echo $count;?> {
											display: block; width: 200%; margin-left: -100%;
											-moz-transition: margin 0.3s ease-in 0s; -webkit-transition: margin 0.3s ease-in 0s;
											-o-transition: margin 0.3s ease-in 0s; transition: margin 0.3s ease-in 0s;
									}
									.onoffswitch-inner<?php echo $count;?>:before, .onoffswitch-inner<?php echo $count;?>:after {
											display: block; float: left; width: 50%; height: 17px; padding: 0; line-height: 17px;
											font-size: 14px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
											-moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
									}
									.onoffswitch-inner<?php echo $count;?>:before {
											content: "ON";
											padding-left: 10px;
											background-color: #34A7C1; color: #FFFFFF;
									}
									.onoffswitch-inner<?php echo $count;?>:after {
											content: "OFF";
											padding-right: 5px;
											background-color: #EEEEEE; color: #999999;
											text-align: right; 
									}
									.onoffswitch-switch<?php echo $count;?> {
											display: block; width: 19px; margin: -1px;                                                                                                                                    
											background: #FFFFFF;
											border: 2px solid #999999; border-radius: 12px;
											position: absolute; top: 0; bottom: 0; right: 37px;
											-moz-transition: all 0.3s ease-in 0s; -webkit-transition: all 0.3s ease-in 0s;
											-o-transition: all 0.3s ease-in 0s; transition: all 0.3s ease-in 0s;
									}
									.onoffswitch-checkbox<?php echo $count;?>:checked + .onoffswitch-label<?php echo $count;?> .onoffswitch-inner<?php echo $count;?> {
											margin-left: 0;
									}
									.onoffswitch-checkbox<?php echo $count;?>:checked + .onoffswitch-label<?php echo $count;?> .onoffswitch-switch<?php echo $count;?> {
											right: 0px; 
									}
									</style>
			<?php
					$count++;
			}
		}
}

function devices_header()
{
	global $dbhost;
	global $dbname;
	global $dbuser;
	global $dbpass;
	global $info;
	 try   
	 {         
			$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser , $dbpass);
			$checkUserQuery = "SELECT *
												 FROM sonoptics.locations WHERE encryptedEmail = ? AND location_name = ?
												 ORDER BY time_stamp DESC";
											
			$checkUserStmt = $dbConnection->prepare($checkUserQuery);
			$values = array($info['encryptedEmail'], $_GET['loc']);
			$checkUserStmt->execute($values);                                                                                                                               
			while($queryResult = $checkUserStmt->fetch(PDO::FETCH_ASSOC))
			{    
				$result[]=array("identifier"=>$queryResult['identifier'],
												"address"=>$queryResult['location_address'],
												"city"=>$queryResult['location_city'],
												"state"=>$queryResult['location_state'],                                                                                                      
												"zip_code"=>$queryResult['location_zipCode']
												);   
			}    
			$dbConnection = null;
		}         
		catch (PDOException $e)
		{         
			die("Error 001: Database Error");
		}         
							
		if(isset($result))
		{
			foreach($result as $location)
			{
				$identifier              = explode(" ",$location['identifier']);
				$newID                   = array_map('strtolower', $identifier);
				$newID                   = array_map('ucfirst', $newID);
				$info['identifier']      = implode(" ", $newID);

				echo $info['identifier']." - ".$location['address'].", ".$location['city'].", ".$location['state']." ".$location['zip_code'];
				break;
			}
		}
}
?>  
