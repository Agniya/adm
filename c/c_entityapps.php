<?
session_start();
class c_entityapps extends c_controller
{
	public function __construct($entity,$action)
	{
		$this->db = new m_db;
		$this->uid = $_SESSION['userid'];
		switch($action) {
			case "update":
				$this->update($entity,$this->db->select('applications',$entity));
				break;
			case "delete":
				$this->delete($entity,$this->db->select('applications',$entity));
				break;
			case "create":
				$this->create();
				break;
		}
		parent::__construct();
	}
	public function create(){
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$this->content = $this->make_view('v/entityapps.php', array('headline'=>'new app',
		'uid'=>$this->uid));
		}else{
			if($this->db->check_uid('authed',$_POST['uid']))
			{
				$vars = $_POST;
				if(file_exists($_FILES['file']['tmp_name'])){
					$vars['file']=$_FILES['file']['tmp_name'];
				}	
				$vars = $this->prepare_data($vars);	
			//	var_dump($vars);
				$this->db->create('applications', $vars);
				header('Location:/apps');
				exit();
			}
		}
	}
	private function update($entity,$vars){
		if($_SERVER['REQUEST_METHOD'] == 'GET'){
			$vars['OS'] = json_decode($vars['OS']); 
			$vars['CPU'] = json_decode($vars['CPU']); 
			$this->content = $this->make_view('v/entityapps.php', 
			array('headline'=>'edit app','vars'=>$vars,'uid'=>$this->uid));
		}else{
			if($this->db->check_uid('authed',htmlspecialchars(trim($_POST['uid']))))
			{
				unset($_POST['uid'],$_POST['submit'],$_POST['file'],$_POST['OS'],$_POST['CPU']);
				$vars = $_POST;
				if(file_exists($_FILES['file']['tmp_name'])){$vars['file']=$_FILES['file']['tmp_name'];}	
				$vars = $this->prepare_data($vars);
				$this->db->update('applications',$entity,$vars);
				header('Location:/apps');
				exit();
			}
		}
	}
	private function delete($entity,$vars){
		if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$title=$vars['title'];
		$description=$vars['description'];
		$author=$vars['author'];	
		$this->content = $this->make_view('v/entityapps.php', array('title'=>$title,'description'=>$description,'author'=>$author,'uid'=>$this->uid));
		}else{
			if($this->db->check_uid('authed',htmlspecialchars(trim($_POST['uid']))))
			{
				$this->db->delete('applications',$entity);
				header('Location:/apps');
				exit();
			}
		}
	}
	private function prepare_data($vars){
		if(isset($vars['file'])) {
			$up_file=pathinfo($vars['file']);
			$ext = $up_file['extension'];
			$extens=array('html');
			if(in_array($ext,$extens)){
				if(move_uploaded_file($vars['file'], '/docs/tmp_name'.$ext))
				$file_path = '/docs/tmp_name'.$ext;
			}else{ 
				unlink($vars['file']);
			}
		}
			$os = array('10.6'=>'0','10.7'=>'0','10.8'=>'0');
			if(isset($vars['OS'])){
				foreach($os as $k=>$v){if($k == $vars['OS']) $os[$k] = 1;}
			}
			$cpu = array('32'=>'0','64'=>'0');
			if(isset($vars['CPU'])){
				for($i=0;$i<count($vars['CPU']);$i++){
					foreach($cpu as $k=>$v){if($k == $vars['CPU'][$i]) $cpu[$k] = 1;}
				}
			}
			$vars['file'] = $file_path;
			$vars['OS'] = json_encode($os);
			$vars['CPU'] = json_encode($cpu);
			var_dump($vars['OS']);
			unset($vars['uid'],$vars['submit']);
		return $vars;
	}
}