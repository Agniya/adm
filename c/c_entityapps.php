<?
class c_entityapps extends c_controller
{
	public function __construct($entity,$action)
	{
		$this->db = new m_db;
		switch($action) {
			case "update":
				$this->update($entity,$this->db->select('apps',$entity));
				break;
			case "delete":
				$this->delete($entity,$this->db->select('apps',$entity));
				break;
			case "create":
				$this->create();
				break;
		}
		parent::__construct();
	}
	public function create(){
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$title='';
		$description='';
		$author='';	
		$this->content = $this->make_view('v/entityapps.php', array('title'=>$title,'description'=>$description,'author'=>$author));
		}else{
			$this->db->create_app('apps', array('title'=>$_POST['title'],'description'=>$_POST['description'],'author'=>$_POST['author']));
			header('Location:/apps');
			exit();
		}
	}
	private function update($entity,$vars){
		if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$title=$vars['title'];
		$description=$vars['description'];
		$author=$vars['author'];	
		$this->content = $this->make_view('v/entityapps.php', array('title'=>$title,'description'=>$description,'author'=>$author));
		}else{
			$this->db->update_app('apps',$entity,array('title'=>$_POST['title'],'description'=>$_POST['description'],'author'=>$_POST['author']));
			header('Location:/apps');
			exit();
		}
	}
	private function delete($entity,$vars){
		if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$title=$vars['title'];
		$description=$vars['description'];
		$author=$vars['author'];	
		$this->content = $this->make_view('v/entityapps.php', array('title'=>$title,'description'=>$description,'author'=>$author));
		}else{
			$this->db->delete_app('apps',$entity);
			header('Location:/apps');
			exit();
		}
	}
}