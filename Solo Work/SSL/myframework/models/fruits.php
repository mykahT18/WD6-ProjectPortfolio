<?

class fruits{
	public function __construct($parent){
		$this->db = $parent->db;
	}
	function select($sql, $value=array()){
		$this->sql = $this->db->prepare($sql);
		$result = $this->sql->execute($value);
		$data = $this->sql->fetchAll();
		return $data;
	}
	function add($sql,$value=array()){
		$this->sql = $this->db->prepare($sql);
		$result = $this->sql->execute($value);
	}
	function delete($sql, $value=array()){
		$this->sql = $this->db->prepare($sql);
		$result = $this->sql->execute($value);
	}
	function update($sql, $value=array()){
		$this->sql = $this->db->prepare($sql);
		$result = $this->sql->execute($value);
	}
}

?>