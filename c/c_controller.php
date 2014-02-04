<?
session_start();
class c_controller
{
	public $content='';
	public $css=array("style");
	public $scripts=array();
	
	public function __construct()
	{
		$auth = new c_auth();
		if($auth->authorised==true)
			$this->render();		
	}
	public function render()
	{
		$vars = array('css'=>$this->css,
			'scripts'=>$this->scripts,
			'content'=>$this->content);	
		$page = $this->make_view('v/main.php', $vars);				
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
