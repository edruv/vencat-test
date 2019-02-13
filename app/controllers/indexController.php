<?php
	/**
	 *
	 */
	class IndexController extends Controller{
		private  $twig;
		function __construct(){
			$this->twig = parent::ftwig('index/');
		}

		public function index(){
			$resources = PATH_RESOURCES;
			echo $this->twig->render('index.twig',compact('resources'));
		}
		public function index2(){
			$resources = PATH_RESOURCES;
			echo $this->twig->render('index2.twig.html',compact('resources'));
		}

	}

?>
