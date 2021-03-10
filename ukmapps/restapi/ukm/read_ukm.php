<?php
require_once('../config/koneksi.php');

		try {
			$sql="select * from ukm order by kode_ukm asc";
			$ss = $dbh->prepare($sql);
			$ss->execute();
			$data=$ss->fetchAll(PDO::FETCH_OBJ);
			$size=$ss->rowCount();
			if($size > 0){
				$json['ukm']=$data;
				$json['message'] = "Success Load Bimbel";
				$json['success'] = true;
				echo json_encode($json);
				
			} else{
				$json['message']='Error Load Bimbel';
				$json['success'] = false;
				
				echo json_encode($json);
			}

		} catch(PDOException $e){
			$json["success"] = false;
			$json["message"] = $e->getMessage();
			echo json_encode($json);
		}
	
?> 