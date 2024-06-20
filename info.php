<!DOCTYPE html>
<html>
<body>
<h1>My 20062024 page</h1>
<?php

abstract class Car {
	public $name;
	public function __construct($name) {
		$this->name = $name;
	}
	abstract public function intro() : string;
}

class Audi extends Car {
	public function intro() : string {
		return "Choose german quality! I'm an $this->name!";
	}
}
class Volvo extends Car {
	public function intro() : string {
		return "I'm a $this->name";
	}
}
$audi = new Audi("Audi");
echo $audi->intro();
echo "<br>";

$volvo = new Volvo("Volvo");
echo $volvo->intro();
echo "<br>";



?>
	</body>
</html>

