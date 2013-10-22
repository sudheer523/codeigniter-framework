<?php

	class Pagedb extends CI_Model
	{
		public function __construct() {
			parent::__construct();
		}
	 
		public function record_count() {
			return $this->db->count_all("user1");
		}
	 
		public function fetch_countries($limit, $start) {
			//$this->db->limit($limit, $start);
			//$query = $this->db->get("user1");
			$q='SELECT * FROM (SELECT *, ROW_NUMBER() OVER (ORDER BY name) as row FROM sys.databases ) a WHERE row >'.$start.' and row <='. $limit;
			$this->db->query($q);
	 
			//if ($query->num_rows() > 0) 
			//{
				foreach ($query->result() as $row)
				{
					$data[] = $row;
				}
				return $data;
			//}
			return false;
	   }
	}
?>