<!DOCTYPE html>
<html>
<body>
<h1>My 20062024 page</h1>
<?php

class RndEmployee{
	public $name;
	public $position;
	public $salary;
	public $location;
	public $work_days;
	public $start_date;
	public $end_date;
 
 	function __construct($name, $position, $salary, $location, $work_days, $start_date, $end_date){
                $this->name = $name;
                $this->position = $position;
                $this->salary = $salary;
                $this->salary = $salary;
                $this->location = $location;
                $this->work_days = $work_days;
                $this->start_date = $start_date;
        }
        function hire($name, $position, $salary, $location, $work_days, $start_date, $end_date){
                $this->name = $name;
                $this->position = $position;
                $this->salary = $salary;
                $this->salary = $salary;
                $this->location = $location;
                $this->work_days = $work_days;
                $this->start_date = $start_date;
        }
	function fire($name, $end_date){
		$this->name = $name;
		$this->position = 0;
		$this->salary = 0;
		$this->salary = 0;
		$this->location = 0;
                $this->work_days = 0;
		$this->start_date = 0;
		$this->end_date = $end_date;
	}
	// Setters for all properties
	function set_name($name){
		$this->name = $name;
	}
	function set_position($position){
		$this->position = $position;
	}
	function set_salary($salary){
		$this->salary = $salary;
	}
	function set_location($location){
		$this->location = $location;
	}
	function set_work_days($work_days){
		$this->work_days = $work_days;
	}
	function set_start_date($start_date){
		$this->start_date = $start_date;
	}
	function set_end_date($end_date){
		$this->end_date = $end_date;
	}
	
	// Getters for all properties
	function get_name() {
		return $this->name;
	}
	function get_position() {
		return $this->position;
	}
	function get_salary(){
		return $this->salary;
	}
	function get_location(){
		return $this->location;
	}
	function get_work_days(){
		return $this->work_days;
	}
	function get_start_date(){
		return $this->start_date;
	}
	function get_end_date(){
		return $this->end_date;
	}



}

class Developer extends RndEmployee {
	function message(){
		echo "This is a message from Developer $name<br>";
	}

}
class Tester extends RndEmployee {
}
class SystemAdmin extends RndEmployee {
}

$x = new Developer("John", "Backend", "333", "TLV", "1-5", "01012024", "01012025");
$x->message();
echo "name of <br>".$x->get_name();

?>
</body>
</html>

