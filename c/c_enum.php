<?
class c_enum extends c_controller
{
	private $db;
	private $vars; //массив со значениями из базы по запрошенной сущности
	private $entity;
	
	public function __construct($entity)
	{
		$this->db = new m_db;
		$this->vars = $this->db->select_all($entity);
		$this->select_enum();
	}
	private function show_enum(){
		$this->content = $this->make_view('v/apps.php',array('vars'=>$this->vars));		
	}
	private function select_enum(){
		$url_parse = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
		$uri_parts = explode('/',trim($url_parse,' /'));
		if(isset($uri_parts[1])&&!empty($uri_parts[1])&&isset($uri_parts[2])&&!empty($uri_parts[2]))
		{
			if($uri_parts[0]=='apps')
				$this->entityapps = new c_entityapps($uri_parts[1],$uri_parts[2]);
		}
		else{
			$this->show_enum();
			$this->render();
		}		
	}
}