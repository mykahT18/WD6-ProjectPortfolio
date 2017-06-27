<?
class components extends AppController{

	public function __construct(){}

	function index(){
		$data = '<link rel="stylesheet" href="../assets/css/carousel.css">';
		$this->getView("header",array("pagename"=>"components"));
		$this->GenerateNav('components');
		$this->getView("components", $data);
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
}

?>