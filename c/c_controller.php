<?
session_start();
class c_controller
{
	public $content='';
	public $css=array("style");
	public $scripts=array("jquery","selected");
	public $uid;
	public function __construct()
	{
		if(!isset($_SESSION['userid']))
		{
			header('Location:/auth');
		}
		else{ 
			$this->uid = $_SESSION['userid'];
			$this->render();
		}
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
	protected function parse_jsone($vars){
	//		var_dump($vars);
		$vars = str_replace( array('"','\\','{','}'),'',$vars);	
		$vars = str_replace('&quot;','',$vars);	
		$vars=explode(',',$vars);
		$a=array();
		for($i=0;$i<count($vars);$i++){
			$vars[$i] = explode(':',$vars[$i]);
			$a[$i][$vars[$i][0]] = $vars[$i][1];
		}
		return $a;
	}
}
