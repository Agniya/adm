<?
class c_enum extends c_controller
{
	private $db;
	private $vars; //массив со значениями из базы по запрошенной сущности
	private $entity;
	
	public function __construct($entity)
	{
		$this->db = new m_db;
		$this->uid = $_SESSION['userid'];
		if(!isset($_SESSION['userid']))header('Location:/auth');
		switch($entity) {
			case "apps":
			$this->vars = $this->db->select_all('applications');
			break;
			case "users":
			$this->vars = $this->db->select_all_users();
			break;	
		}
		$this->select_enum($entity);
	}
	private function show_enum($entity){
		if(!empty($this->vars)){	
			if($entity == 'apps'){
				for($i=0;$i<count($this->vars);$i++){
					$v = $this->parse_jsone($this->vars[$i]['OS']);
					$str='';
					for($m=0;$m<count($v);$m++){
						foreach($v[$m] as $k=>$l){
							if($l == '1') $this->vars[$i]['OS'] = $k;
						}
					}
				}
				$categories = $this->db->select_all('category');
			}
		}
		$this->content = $this->make_view('v/'.$entity.'.php',array('categories'=>$categories,'vars'=>$this->vars));		
	}
	private function select_enum($entity){
		$url_parse = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
		$uri_parts = explode('/',trim($url_parse,' /'));
		if(isset($uri_parts[1])&&!empty($uri_parts[1])&&isset($uri_parts[2])&&!empty($uri_parts[2]))
		{
			$this->entityapps = new c_entityapps($uri_parts[0],$uri_parts[1],$uri_parts[2]);
		}
		else if($entity=='apps'&&$uri_parts[1]=='all'){
			$this->vars = $this->db->select_all('applications');
			$this->show_enum($entity);
			$this->render();
		}
		else if($entity=='apps'&&isset($uri_parts[1])&&!isset($uri_parts[2])){
			$this->vars = $this->db->select_cat('id_category','applications',$uri_parts[1]);
			$this->show_enum($entity);
			$this->render();
		}
		else{
			$this->show_enum($entity);
			$this->render();
		}		
	}
}