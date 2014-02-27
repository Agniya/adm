<?
session_start();
class c_entityapps extends c_controller
{
	public function __construct($entity_type,$entity,$action)
	{
		$this->db = new m_db;
		$this->uid = $_SESSION['userid'];
		if(!$this->uid) header('Location:/auth');
		switch($entity_type) {
			case "apps":
			$this->entity_type='apps';
			$this->tb='applications';
			$this->view = 'v/entityapps.php';
			$this->headline = 'app';
			break;
			case "users":
			$this->entity_type='users';
			$this->tb='users';
			$this->view = 'v/entityusers.php';
			$this->headline = 'user';
			break;
		}
		switch($action) {
			case "update":
				$this->update($entity,$this->db->select_type('id',$this->tb,$entity));
				break;
			case "delete":
				$this->delete($entity,$this->db->select_type('id',$this->tb,$entity));
				break;
			case "create":
				$this->create();
				break;
		}
		parent::__construct();
	}
	public function create(){
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		if($this->entity_type=='users')$vars['type']=$this->db->select_all('type');
		$this->content = $this->make_view($this->view, array('headline'=>'new '.$this->headline,
		'uid'=>$this->uid, 'vars'=>$vars));
		}else{
			if($this->db->check_uid('authed',$_POST['uid']))
			{
				$vars = $_POST;
				unset($_POST['uid'],$_POST['submit']);
				$vars = $this->prepare_data($vars);	
				$this->db->create($this->tb, $vars);
				header('Location:/'.$this->entity_type);
				exit();
			}
		}
	}
	private function update($entity,$vars){
		if($_SERVER['REQUEST_METHOD'] == 'GET'){
		if($this->entity_type=='apps'){
			$vars['OS'] = $this->parse_jsone($vars['OS']);
			$vars['CPU'] = $this->parse_jsone($vars['CPU']);
		}
		else if($this->entity_type=='users')
		{
			$vars['user_type'] = $vars['type'];
			$vars['type']=$this->db->select_all('type');
		}
			$this->content = $this->make_view($this->view, 
			array('headline'=>'edit '.$this->headline,'vars'=>$vars,'uid'=>$this->uid));
		}else{
			if($this->db->check_uid('authed',htmlspecialchars(trim($_POST['uid']))))
			{
				$vars = $_POST;
				$vars = $this->prepare_data($vars);
				$this->db->update($this->tb,$entity,$vars);
				header('Location:/'.$this->entity_type);
				exit();
			}
		}
	}
	private function delete($entity,$vars){
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		if($this->entity_type=='apps'){
			$vars['OS'] = $this->parse_jsone($vars['OS']);
			$vars['CPU'] = $this->parse_jsone($vars['CPU']);
		}
		else if($this->entity_type=='users')
		{
			$vars['user_type'] = $vars['type'];
			$vars['type']=$this->db->select_all('type');
		}
		$this->content = $this->make_view($this->view, 
		array('headline'=>'delete '.$this->headline,'vars'=>$vars,'uid'=>$this->uid));
		}else{
			if($this->db->check_uid('authed',htmlspecialchars(trim($_POST['uid']))))
			{
				$this->db->delete($this->tb,$entity);
				header('Location:/'.$this->entity_type);
				exit();
			}
		}
	}
	private function prepare_data($vars){
		if(count($_FILES['file'])>0) {
			$extens_i=array('png','gif','jpg');
			$extens_f=array('html');//расширение html для теста
			$filename_i = 'ico/';
			$filename_f = 'file/';
			if(!file_exists($filename_i)) mkdir($filename_i, 0700, true);
			if(!file_exists($filename_f)) mkdir($filename_f, 0700, true);
			
			for($i=0;$i<count($_FILES['file']);$i++)
			{
				$file = pathinfo($_FILES['file']['name'][$i]);
				$ext = $file['extension'];
				if(in_array($ext,$extens_i)){
					if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $filename_i.$_FILES['file']['name'][$i]))
						$vars['icon'] = $filename_i.$_FILES['file']['name'][$i];
					else
						unlink($_FILES['file'][$i]);
				}else if(in_array($ext,$extens_f)){
					if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $filename_f.$_FILES['file']['name'][$i]))
						$vars['file'] = $filename_f.$_FILES['file']['name'][$i];
					else
						unlink($_FILES['file'][$i]);
				}
			}
			
		}	
		if(isset($vars['OS'])&&isset($vars['CPU']))
		{
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
				$vars['OS'] = json_encode($os);
				$vars['CPU'] = json_encode($cpu);
		}
			unset($vars['uid'],$vars['submit']);
		return $vars;
	}
}