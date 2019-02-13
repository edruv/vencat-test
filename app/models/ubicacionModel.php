<?php
	/**
	 *
	 */
	class ubicacionModel extends Model{

		function __construct()
		{
			parent::__construct();
		}

		public function holi($var){
			echo "holi model ".$var['uname'];
		}

		public function all(){
			$stmt = $this->db->prepare("SELECT * from ubicacion");
			$stmt->execute();
			$all = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $all;
		}

		public function getone($id){
			// print_r($id);
			$stmt = $this->db->prepare("SELECT * from ubicacion where id=:id");
			$stmt->execute(array(':id'=> $id));
			$ub = $stmt->fetch(PDO::FETCH_ASSOC);
			return $ub;
		}

		public function add($var){
			$add = $this->db->prepare("INSERT into ubicacion(ubicacion) values(:ubi)");
			return $add->execute(array(':ubi' => $var['uname']));

		}
	}

?>
