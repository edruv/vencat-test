<?php

class loginController extends Controller{
	private $twig;
	function __construct(){
		$this->twig = parent::ftwig('login/');
	}

	public function index(){
		$resources = PATH_RESOURCES;

		echo $this->twig->render('login.twig',compact('resources'));
	}
}


?>
