<?php

	require_once ROOT.PATH_FOLDER.PATH_MODELS.'ubicacionModel.php';

	class ubicacionController extends Controller{
		private $twig;
		public $model;
		function __construct(){
			$this->twig = parent::ftwig('ubic/');
			$this->model = new ubicacionModel();
		}

		public function index(){
			$title = 'Ubicaciones';
			$resources = PATH_RESOURCES;

			$ubicall = $this->model->all();
			echo $this->twig->render('index.twig',compact('resources','title','ubicall'));
		}

		public function crear(){
			$title = 'Nueva Ubicacion';

			$resources = '../'.PATH_RESOURCES;
			$create = 'add';
			echo $this->twig->render('add.twig',compact('resources','title','create'));
		}

		public function add($request_params){
			$title = 'Nueva Ubicacion';
			$resources = '../'.PATH_RESOURCES;
			$create = 'add';

			if (!self::verefy($request_params)) {
					if ($this->model->add($request_params)) {
					$alert = array('type' => 'success', 'message' => "La ubicacion \"<strong>".$request_params['uname']."</strong>\" se agrego exitosamente");
					echo $this->twig->render('add.twig',compact('resources','title','create','alert'));
				}
				else {
					$alert = array('type' => 'danger', 'message' => "<strong>Error</strong>! Se produjo un error interno al intentar agergar la ubicacion \"".$request_params['uname']."\"");
					echo $this->twig->render('add.twig',compact('resources','title','create','alert'));
				}
			}else {
				$alert = array('type' => 'warning', 'message' => "<strong>Error</strong>! no se ingreso ningun campo");
				echo $this->twig->render('add.twig',compact('resources','title','create','alert'));
			}
		}

		public function getone($id){
			// $ubic = $this->model->getone($id);
			// print_r(json_encode($this->model->getone($id)));
			$ubic = $this->model->getone($id['id']);
			echo json_encode($ubic);
		}

		public function verefy($rp){
			return empty($rp['uname']);
		}
	}

?>
