<?php
include_once 'grouppage.php';
include_once 'includes.php';

if ( isset($_POST['method'])===true && empty($_POST['method'])===false ) {

$chat = new chatapp();
$method = trim($_POST['method']);
		
		if($method==='fetch') {
			$result = $chat->getmsg();
			$row1 = mysqli_fetch_array($result);
			if(empty($row1) === true) {

        		echo'No Chat To Display';
 
			}
			else {
				
   ?>

				<div class='grpmsg'> <a href='#' style="color:#123ef3"> &nbsp;&nbsp;&nbsp;<?php echo $row1['Name'] ;?> </a>:</br>&nbsp;&nbsp;<?php echo nl2br($row1['chat']); ?>  
				</div>
				<?php
				While($row = mysqli_fetch_array($result)) {
				?>
				<div class='grpmsg'> <a href='#' style="color:#124ef3">&nbsp;&nbsp;&nbsp; <?php echo $row['Name'] ;?> </a>:</br>&nbsp;&nbsp;<?php echo nl2br($row['chat']); ?>  
				</div>

				<?php

			}
		}
	}


else if ($method==='throw'  && empty($_POST['message'])===false) {
	

				$messg = trim($_POST['message']);
				if(empty($messg)===false) {
					$chat->putmsg($messg);
				}
		}
}
?>

