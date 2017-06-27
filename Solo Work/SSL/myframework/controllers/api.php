<?

class api extends AppController{

	function __construct(){
		
		
	}

	function index(){
		$this->getView("header");
		$this->GenerateNav("api");
		$this->getView("api",array("style"=> '<link rel="stylesheet" href="../assets/css/carousel.css">'));
		$this->getView("footer");
	}
	function Ajax(){
		$query = $_REQUEST['query'];
      	
      	$url = 'https://www.googleapis.com/books/v1/volumes?q='.$query.'=lite&key=AIzaSyBUiHCeRGYU4v9wZpK-Rn39Sved22hlNeo';

      	$ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST =>2
        ));

        $result = curl_exec($ch);
        curl_close($ch);
        echo $result;
	}
	function GenerateNav($page= "welcome"){
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