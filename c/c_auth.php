<?
session_start();
class c_auth 
{
	private $a_m;
	private $content = '';
	public $username='';
	public $password='';
	public $email='';
	public $phone='';
	public $uid;	
	public function __construct()
	{
		$this->a_m = new m_auth;
		$this->index();
	}
	private function index(){
		//echo $this->a_m->make_view('v/auth_index.php');
		$url_parse = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
		$uri_parts = explode('/',trim($url_parse,' /'));
		if(isset($uri_parts[1])&&!empty($uri_parts[1]))
		{
			switch($uri_parts[1]) {
				case "login":
				$this->login();
				break;
				case "signup":
				$this->signup();
				break;
				case "logout":
				$this->logout($uri_parts[2]);
				break;
				default:
				$controller = new c_auth;
			}
		}
		$this->render();
	}
	private function login(){
		if($_SERVER['REQUEST_METHOD'] == 'GET'){
			$this->content = $this->make_view('v/auth_login.php', array('username'=>$this->username,
			'password'=>$this->password,'email'=>$this->email,'phone'=>$this->phone));
		}else{
			$this->uid = $this->a_m->check_user('users',array('username'=>$_POST['username'],
			'password'=>$_POST['password'],'email'=>$_POST['email'],'phone'=>$_POST['phone']));
			if($this->uid){
				header('Location:/');
				exit();
			}
		}	
	}
	private function signup(){
		if($_SERVER['REQUEST_METHOD'] == 'GET'){
			$this->content = $this->make_view('v/auth_signup.php', array('username'=>$this->username,
			'password'=>$this->password,'email'=>$this->email,'phone'=>$this->phone));
		}else{
			if($this->a_m->add_user('users',array('username'=>$_POST['username'],
			'password'=>$_POST['password'],'email'=>$_POST['email'],'phone'=>$_POST['phone']))){
				header('Location:/');
				exit();
			}
		}
	}
	private function logout($uid){
		if($this->a_m->logout($uid)){
			header('Location:/');
				exit();
		}
	}
	//вывод форм
	public function render()
	{
		$vars = array('css'=>$this->css,
			'scripts'=>$this->scripts,
			'content'=>$this->content);	
		$page = $this->make_view('v/auth_index.php', $vars);				
		echo $page;
	}
	public function make_view($fileName, $vars = array())
	{
		if(!empty($vars)){
			foreach ($vars as $k => $v)
			{
				$$k = $v;
			}
		}
		ob_start();
		include "$fileName";
		return ob_get_clean();	
	}	
}