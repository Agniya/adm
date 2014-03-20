<?
session_start();
class c_controller
{
	public $content='';
	public $css=array("style","style_mine","datepicker","updates","dist/css/bootstrap.min");
	public $scripts=array("jquery","selected","jquery.min","bootstrap.min","bootstrap-datepicker","charCounter");
	public $uid;
	public function __construct()
	{
		if(!isset($_SESSION['userid']))
		{
			header('Location:/auth');
		}
		else{ 
			$this->uid = $_SESSION['userid'];
			$this->render('v/main.php');
		}
	}
	public function render($fileName)
	{
		$vars = array('css'=>$this->css,
			'scripts'=>$this->scripts,
			'content'=>$this->content,'uid'=>$this->uid );	
		$page = $this->make_view(/*'v/index.php'*/$fileName, $vars);				
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
