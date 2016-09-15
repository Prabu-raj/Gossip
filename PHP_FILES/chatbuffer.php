<?php
include_once 'chatpage.php';
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

				<div class='chatmsg'> <a href='#'> <?php echo $row1['Name'] ;?> </a>:</br><?php echo nl2br($row1['Chat']); ?>  
				</div>
				<?php
				While($row = mysqli_fetch_array($result)) {
				?>
				<div class='chatmsg'> <a href='#'> <?php echo $row['Name'] ;?> </a>:</br><?php echo nl2br($row['Chat']); ?>  
				</div>

				<?php

			}
		}
	}


else if ($method==='throw'  && empty($_POST['message'])===false) {
		//echo $messg;

				$messg = trim($_POST['message']);
				if(empty($messg)===false) {
					$chat->putmsg($messg);
				}
		}
}
?>

