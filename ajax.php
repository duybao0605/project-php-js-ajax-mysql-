<?php
	include 'connect.php';
	session_start();
	$id = $_POST['id']; 
	$sql = "SELECT * from `products` where `id` = '$id' ";
	$rs = $con->query($sql);
	$arr = mysqli_fetch_assoc($rs);
	
	
		$item = [
		'id'=>$arr['id'],
		'title'=>$arr['title'],
		'price'=>$arr['price'],
		'img'=>$arr['img'],
		'quantity'=>1
		];	

		if ($_POST['add'] == true) {
			# code...
			if (isset($_SESSION['cart'][$id])) {
				$_SESSION['cart']['id']['quantity']+=1;
			}else{
				$_SESSION['cart'][$id] = $item;
			}
		}
	 

	
	
	// up
	if ($_POST['up'] == true) {
		# code...
		$id = $_POST['id']; 
		$_SESSION['cart'][$id]['quantity'] = $_POST['value'];
	}
	// down
	if ($_POST['down'] == true) {
		# code...
		$_SESSION['cart'][$id]['quantity'] = $_POST['value'];

		if ($_SESSION['cart'][$id]['quantity'] < 1) {
			# code...
			unset($_SESSION['cart'][$id]);
		}
	}
	// delete
	if ($_POST['delete'] == true) {
		# code...
		unset($_SESSION['cart'][$id]);

	}


	


?>