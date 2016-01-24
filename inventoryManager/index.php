<?php 
include('../model/database.php');


$action = filter_input(INPUT_POST,	'action');
	if($action === NULL)	{
		$action = filter_input(INPUT_GET, 'action');
			if($action === NULL){
				$action = 'list_inventory';
			}
	}

if($action == 'list_inventory'){
	include('inventory_list.php');
}

?>












