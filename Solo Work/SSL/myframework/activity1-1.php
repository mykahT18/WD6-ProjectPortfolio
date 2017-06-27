<?php

//------ Question 1 -------//
class SuperHero{

	function getInfo(){
		$name = "Mykah Taylor";
		$age = 26;
		$person = array($name, $age, 'name'=>$name,'age'=>$age);

		echo '<span>Question 2</span><br>';
		echo "1.) My name is $name and age is $age.<br>";

		echo '2.) My name is ' .$name. ' and age is ' .$age. '.<br>';

		echo '3.) My name is ' .$person[0]. ' and age is ' .$person[1]. '.<br>';

		echo '4.) My name is ' .$person['name']. ' and age is ' .$person['age']. '.<br>';

		$age = null;

		// Number 5.) isn't displaying anything because it is NULL.
		echo "5.) Setting the age to null displays this : " .$age ;
		var_dump($age);

		// Number 6.) isn't displaying anything because it is NULL.
		unset($name);
		echo "6.) Unset the name and it displays this : " .$name;
		// var_dump($name);
	}

	function grades($grade){
		echo '<br><span>Question 3</span><br>';
		$grade = round($grade);
		// var_dump($grade);
		if($grade > 0 && $grade < 100){
			if ($grade >= 90 && $grade <= 100){
				echo "Your have earned an A";
			}
			else if($grade >= 80 && $grade <= 89){
				echo "You have earned an B";
			}
			else if($grade >= 70 && $grade <= 79){
				echo "You have earned an C";
			}
			else if($grade >= 60 && $grade <= 69){
				echo "You have earned an D";
			}
			else if ($grade < 60){
				echo "You have earned an F";
			}
		}
		else{
			echo "The number is out of range! <br>";
		}
	}
}
//------ Instantiate Class -------//
$superman = new SuperHero();

//------ Question 2 -------// 
$superman->getInfo();

//------ Question 3 -------//
$superman->grades(89.9);

//------ Question 4 -------//
$colors = array("Red", "Pink", "Blue", "Baby Blue", "Green", "Lime", "Purple", "Violet", "Yellow", "Lemon");
$arrayLength = count($colors);
for($x = 0; $x < $arrayLength; $x++) {
    echo "Color ".$x. " is " .$colors[$x];
    echo "<br>";

}

?>