<?php
ini_set('diaplay_error', 1);
require_once "./vendor/twig/twig/lib/Twig/Autoloader.php";
require_once "./models/model.php";
class Home {
	public $twig;
	public $model;
	public function __construct() {
		Twig_Autoloader::register();
		$this->twig = new Twig_Environment( new Twig_Loader_Filesystem("views/templates"));
		$this->model=new Model();
		$this->twig->addExtension(new Twig_Extension_Debug());
	}
	public function welcome(){
		$tpl = $this->twig->loadTemplate("welcome.tpl");
		$tpl->display(array());
	}
	public function bugs_display()
	{
		$per_page=3;
		$start=0;
		$num_items=$this->model->no_of_rows();	
		$total_pages = ceil($num_items/$per_page);
		$on_page = floor($num_items/ $per_page) + 1;
		$flag =$this->model->flags();
		$project=$this->model->project();
		$category=$this->model->category();
		$reported_by=$this->model->reported_by();
		$priority =$this->model->priority();
		$bugs_data=$this->model->bugs_data();
		$tpl = $this->twig->loadTemplate("bugs_page1.tpl");
		$tpl->display(array("bugs_data"=>$bugs_data,"flag"=>$flag,"project"=>$project,
		"num_items"=>$num_items,"per_page"=>$per_page,"total_pages"=>$total_pages,"on_page"=>$on_page,
		"category"=>$category,"reported_by"=>$reported_by,"priority"=>$priority));
	}
	public function comments($q)
	{
		$comments=$this->model->comments($q);
		$tpl = $this->twig->loadTemplate("comments.tpl");
		$tpl->display(array("comments"=>$comments));
	}
	public function filter($q,$s)
	{
		$filters;
		switch ($s) {
			case 'project':
				$filters = $this -> model -> filters($q,$s);
				break;
			case 'reported_by':
				$filters = $this -> model -> filters($q,$s);
				break;
			case 'category':
				$filters = $this -> model -> filters($q,$s);
				break; 
			case 'priority':
				$filters = $this -> model -> filters($q,$s);
				break;
			 default:
				 break;
		}
		$tpl = $this->twig ->loadTemplate("bugs_page_filtering.tpl");
		$tpl-> display(array("filters" => $filters));
	}
	public function update($q)
	{
		$data_id=$this->model->bugs_data_Id($q);
		$tpl= $this->twig->loadTemplate("update_bugs.tpl");
		$tpl->display(array("bugs"=>$data_id));
	 }
	 public function update_bugs($data,$q)
	 {
	 	$result=$this->model->update_bugs($data,$q);
		return $result;
	 }
}
	
	
	