<?

class about extends AppController{

	function __construct($parent){
		$this->parent = $parent;
		// $this->showList();
	}
	function index(){

		$data = $this->parent->getModel("fruits")->select("select * from fruit_table");
		$this->getView("header",array("pagename"=> "about"));

		$this->GenerateNav();
		$this->getView("about", $data);
		$this->getView("footer");
	}
	function GenerateNav($page="welcome"){
		$menu = array(
			"home"=>"/", 
			"api"=>"/api", 
			"contact"=>"/welcome/getContact",
			"components"=>"/components",
			"About"=>"/about",
			"login"=> "/welcome/getLogin"
			);
		$this->getView("navigation", $menu, $page);
	}
	function showList(){

		$data = $this->parent->getModel("fruits")->select("select * from fruit_table");
		$this->getView("header",array("pagename"=> "about"));
		$this->getView("about", $data);
		// $this->getView("footer");
	}
	function showAddForm(){
		$this->getView("header",array("pagename"=> "about"));
		$this->GenerateNav();
		$this->getView("addForm");
		$this->getView("footer");
	}
	function addAction(){

		$this->parent->getModel("fruits")->add("insert into fruit_table (name) values (:name)", array(":name"=>$_REQUEST["name"]));

		header("Location: /about");
	}
	function showEdit(){
		$this->getView("header",array("pagename"=> "about"));
		$this->GenerateNav();
		$data = $this->parent->getModel("fruits")->select("select * from fruit_table where id= :id", array(":id"=>$this->parent->urlPathParts[2]));
		$this->getView("editForm", $data);
		$this->getView("footer");
	}
	function edit(){
		$this->parent->getModel("fruits")->update("update fruit_table set name= :name where id= :id", array(":name"=>$_REQUEST["name"], ":id"=>$this->parent->urlPathParts[2]));

		header("Location: /about");
	}
	function delete(){
		$this->parent->getModel("fruits")->delete("delete from fruit_table where id= :id", array(":id"=>$this->parent->urlPathParts[2]));
		header("Location: /about");
	}


}

?>