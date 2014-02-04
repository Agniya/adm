<?
session_start();
class c_auth 
{
	private $a_m;
	private $username='';
	private $password='';
	private $email='';
	private $phone='';
	public $authorised = true;
	
	public function __construct()
	{
		// ищем в пользователя в сессиях
		$this->check_session();
		//если не найден в сессиях => ищем в базе, если найден $this->authorised = true, не найден $this->authorised = false;
		$this->a_m = new m_auth;
		if($this->authorised == false)$this->auth();	
	}
	public function check_session()
	{
		//если пользователь найден в сессиях $this->authorised = true;
	}
	private function auth(){
		//показываем форму
		if($_SERVER['REQUEST_METHOD'] == 'GET')
			echo $this->make_view('v/auth.php',array('username'=>$this->username,
			'password'=>$this->password,'email'=>$this->email,'phone'=>$this->phone));
		else{
		//получаем данные
			$username = $_POST['username'];
			$password = $_POST['password'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
		//направляем запрос в базу	
		/*if true
			$this->authorised = true;
			$_SESSION['username'] = $username;
		*/
		/*
			else $this->authorised = false;
		*/
			header('Location:index.php');
			exit;
		}
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