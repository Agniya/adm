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
					$vars['file']=$_FILES['file']['name'];
				}	
				$vars = $this->prepare_data($vars);	
				$this->db->create('applications', $vars);
				header('Location:/apps');
				exit();
			}
		}
	}
	private function parse_jsone($vars){
		$vars = str_replace( array('"','\\','{','}'),'',$vars);	
		$vars=explode(',',$vars);
		$a=array();
		for($i=0;$i<count($vars);$i++){
			$vars[$i] = explode(':',$vars[$i]);
			$a[$i][$vars[$i][0]] = $vars[$i][1];
		}
		return $a;
	}
	private function update($entity,$vars){
		if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$vars['OS'] = $this->parse_jsone($vars['OS']);
		$vars['CPU'] = $this->parse_jsone($vars['CPU']);
		
			$this->content = $this->make_view('v/entityapps.php', 
			array('headline'=>'edit app','vars'=>$vars,'uid'=>$this->uid));
		}else{
			if($this->db->check_uid('authed',htmlspecialchars(trim($_POST['uid']))))
			{
				unset($_POST['uid'],$_POST['submit'],$_POST['file'],$_POST['OS'],$_POST['CPU']);
				$vars = $_POST;
				if(file_exists($_FILES['file']['tmp_name'])){$vars['file']=$_FILES['file']['name'];}	
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
			//расширение html для теста
			$extens=array('html');
			if(in_array($ext,$extens)){
				if(move_uploaded_file($vars['file'], '/docs/tmp_name'.$ext))
				$file_path = '/docs/tmp_name'.$ext;
			}else{ 
				unlink($vars['file']);
			}
		}
			$os = array('10.6 Snow Leopard'=>'0','10.7 Lion'=>'0','10.8 Mountain Lion'=>'0');
			if(isset($vars['OS'])){
				foreach($os as $k=>$v){if($k == $vars['OS']) $os[$k] = 1;}
			}
			$cpu = array('32-bit CPU support'=>'0','64-bit CPU support'=>'0');
			if(isset($vars['CPU'])){
				for($i=0;$i<count($vars['CPU']);$i++){
					foreach($cpu as $k=>$v){if($k == $vars['CPU'][$i]) $cpu[$k] = 1;}
				}
			}
			$vars['file'] = $file_path;
			$vars['OS'] = json_encode($os);
			$vars['CPU'] = json_encode($cpu);
			unset($vars['uid'],$vars['submit']);
		return $vars;
	}
}