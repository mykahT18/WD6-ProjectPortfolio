<?

class profile extends AppController{

	public function __construct(){
		if(@$_SESSION["loggedin"] && @$_SESSION["loggedin"]==1){
			
		}else{
			header("Location:/welcome");
		}
	}

	function index(){
		$this->getView("header", array('pagename' => 'profile'));
		$this->GenerateNav("profile");
		$this->getView("navigation");
		$this->getView("profile",array('pagename' => 'profile', "style"=> '<link rel="stylesheet" href="../assets/css/carousel.css">'));

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
	function update(){
		if($_FILES['img']['name'] != ""){
			$imageFileType = pathinfo("./assets/".$_FILES['img']['name'], PATHINFO_EXTENSION);

			if(file_exists("./assets/".$_FILES['img']['name'])){
				echo "Sorry, file exists";
			}else{

				if($imageFileType != 'jpg' && $imageFileType != 'png'){

					echo "Sorry this file is not allowed";
				}else{

					if(move_uploaded_file($_FILES['img']['tmp_name'],"./assets/".$_FILES['img']['name'] )){

						echo "File has been uploaded";
					}else{

						echo "Error uploading your file";
					}
				}
			}
		}
	// header("Location:/profile?msg=File Uploaded");
	}

}
?>