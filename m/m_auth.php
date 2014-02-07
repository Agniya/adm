<?
class m_auth
{
	public $content;
	public $css=array("style");
	public $scripts=array();
	
	public function __construct()
	{
		$this->db = new m_db;
	}
	// валидация данных
	public function validation($vars=array())
	{
		if(empty($vars))return false;
		foreach($vars as $k=>$v){
			$vars[$k]=mysql_real_escape_string(htmlspecialchars(trim($v)));
		}
		//Запрет пользователю использовать в своем имени любые символы, кроме букв русского и латинского алфавита, знака "_" (подчерк), пробела и цифр:
		if (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/",$vars['username'])){ echo 'error';}
		//Для поля ввода адреса e-mail разрешенные символы знаки "@" и ".", уберем русские буквы и пробел:
		if (preg_match("/[^(\w)|(\@)|(\.)]/",$vars['email'])){ echo 'error';}
		$vars['password']= $this->make_pswd($vars['password']);
		$vars['username']=substr($vars['username'],0,50);
		return $vars;
	}
	private function make_pswd($pswd)
	{
		$pswd = md5(md5($pswd));
		return $pswd;
	}
	//регистрация
	public function add_user($table,$vars=array()){
		if($this->validation($vars))
		$this->db->create_user($table,$this->validation($vars));
	}
	//авторизация
	public function check_user($table,$vars=array()){
		$vars = $this->validation($vars);
		if($vars){
			$user_data = $this->db->get_user($table,$vars['email']);
			if($user_data['password'] == $vars['password']){
				$uid=$this->make_userid();
				if($this->add_uid('authed',$uid,$user_data['id'])) $_SESSION['userid'] = $uid;					
			}
		}
		return $uid;
	}
	private function make_userid(){
		mt_srand((double)microtime()*1000000);
		$uid=mt_rand(1,1000000);
		return $uid;
	}
	//запись uid в таблицу с авторизованными
	private function add_uid($table,$uid,$id_user){
		if($this->db->add_uid($table,$uid,$id_user))return true;
	}
	//поиск uid
	private function check_uid($table,$uid){
		if($this->db->check_uid($table,$uid)) return true;
	}
	//разлогинить
	public function logout($uid){
	//	if(!$this->db->check_uid($table,$uid)) return false;
		//убрать из таблицы сессий 
		if($this->db->delete_uid('authed',$uid)){
			unset($_SESSION['userid']);
			session_destroy();
		}
	}
}