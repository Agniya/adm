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
		// ���� � ������������ � �������
		$this->check_session();
		//���� �� ������ � ������� => ���� � ����, ���� ������ $this->authorised = true, �� ������ $this->authorised = false;
		$this->a_m = new m_auth;
		if($this->authorised == false)$this->auth();	
	}
	public function check_session()
	{
		//���� ������������ ������ � ������� $this->authorised = true;
	}
	private function auth(){
		//���������� �����
		if($_SERVER['REQUEST_METHOD'] == 'GET')
			echo $this->make_view('v/auth.php',array('username'=>$this->username,
			'password'=>$this->password,'email'=>$this->email,'phone'=>$this->phone));
		else{
		//�������� ������
			$username = $_POST['username'];
			$password = $_POST['password'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
		//���������� ������ � ����	
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