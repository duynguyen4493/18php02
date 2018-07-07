<?php

	class Human
	{
		var $name;
		var $old = 30;
		var $yearBirth;
		var $phone;
		function register()
		{
			return 'dang ki';
		}
		function getInformation() {
			echo 'lay thong tin';
		}
		function eat() {
			echo 'an com';
		}

		function work() {
			echo 'lam viec';
		}
		private function getPassport() {
			echo 'lay so CMND';
		}
	}
	
	/**
	 * 
	 */
	class Student extends Human
	{
		function learning() {
			return 'sinh vien hoc bai';
		}
		function eat() {
			echo 'sinh vien dang an';
		}
	}
	$student = new Student;
	echo "bay gio " . $student->learning();
	echo '<br>';
	$human = new Human;
	echo "xin moi " . $human->register();
?>