<?php
function loadItems() {
	require("databaseHandler.php");
	require('items.php');
	$itemArray = array();
	$sql = "SELECT * FROM items;";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);

	if($resultCheck > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$obj = new Item($row['itemId'], $row['itemName'], $row['itemPrice'], $row['picLoc'], $row['availability'], $row['description']);
			array_push($itemArray, $obj);
		}
	}
	return $itemArray;
}

function loadItem($item_id) {
	require("databaseHandler.php");
	require('items.php');
	$sql = "SELECT * FROM items WHERE itemId=".$item_id.";";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck > 0) {
		$row = mysqli_fetch_assoc($result);
		$fetchedItem = new Item($row['itemId'], $row['itemName'], $row['itemPrice'], $row['picLoc'], $row['availability'], $row['description']);
	}
	return $fetchedItem;
}
?>
