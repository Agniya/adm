<?
class m_db
{
	protected $pdo;
	private static $instance;	
	public static function Instance()
	{
		if (self::$instance == null)
			self::$instance = new db_struct();
		return self::$instance;
	}
	public function __construct()
	{
		try {
			$this->pdo = new PDO(DB_PDODRIVER . ":host=" . DB_HOST .
			";dbname=" . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
		} catch (PDOException $e) {
			trigger_error("Error: Failed to establish connection to database.");
			exit;
		}
		$this->create_apps();
		$this->create_users();
		$this->create_authed();
	}
	public function create_apps()
	{
		$sql = "
		 CREATE TABLE IF NOT EXISTS `applications` ( 
		   `id` INT PRIMARY KEY AUTO_INCREMENT,
		   `title` varchar(40) NOT NULL, 
		   `icon` varchar(40) NOT NULL, 
		   `OS` varchar(250) NOT NULL, 
		   `CPU` varchar(250) NOT NULL, 
		   `version` varchar(40) NOT NULL DEFAULT '', 
		   `bundle_id` varchar(40) NOT NULL DEFAULT '',
			`renovation` varchar(40) NOT NULL DEFAULT '',
			`price` varchar(40) NOT NULL DEFAULT '',
			`license` varchar(40) NOT NULL DEFAULT '',
			`author` varchar(40) NOT NULL,
			`site` varchar(40) NOT NULL DEFAULT '',
			`file` varchar(40) NOT NULL DEFAULT '',
			`link` varchar(40) NOT NULL DEFAULT '',
			`description` varchar(250) NOT NULL DEFAULT '',
			`novelty` varchar(250) NOT NULL DEFAULT '',
			`release_notes` varchar(250) NOT NULL DEFAULT '',
			`sys_notes` varchar(250) NOT NULL DEFAULT '',
			`comments` varchar(250) NOT NULL DEFAULT ''		
		    )"; 
		$result = $this->pdo->prepare($sql); 
		$result->execute();
	}	
	public function create_users()
	{
		$sql = "
		 CREATE TABLE IF NOT EXISTS `users` ( 
		   `id` INT PRIMARY KEY AUTO_INCREMENT,
		   `username` varchar(40) NOT NULL,
		   `password` varchar(40) NOT NULL,
		   `email` varchar(40) NOT NULL,
		   `phone` varchar(40) NOT NULL
		 )"; 
		$result = $this->pdo->prepare($sql); 
		$result->execute();   
	}
	public function create_authed()
	{
		$sql = "
		 CREATE TABLE IF NOT EXISTS `authed` ( 
		   `id` INT PRIMARY KEY AUTO_INCREMENT,
		   `id_user` INT NOT NULL,
		   `uid` INT NOT NULL
		 )"; 
		$result = $this->pdo->prepare($sql); 
		$result->execute();   
	}
	public function get_user($table,$email)
	{
		$query = "SELECT * FROM " .$table .
        " WHERE email = :email";
		$stmt = $this->pdo->prepare($query);
        $params = array("email" => mysql_real_escape_string($email));
		$stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return (empty($result)) ? false : $result;
	}
	public function add_uid($table,$uid,$id_user){
		$query = "INSERT INTO " . $table .
                " (id_user, uid) " .
                " VALUES (:id_user, :uid)";
        $stmnt = $this->pdo->prepare($query);
        $params = array(
            "id_user" => mysql_real_escape_string($id_user),
			"uid" => mysql_real_escape_string($uid)
	    );
        $stmnt->execute($params);
        return $this->pdo->lastInsertId();
	}
	public function check_uid($table,$uid){
		$query = "SELECT * FROM " .$table .
        " WHERE uid = :uid";
		$stmt = $this->pdo->prepare($query);
        $params = array("uid" => mysql_real_escape_string($uid));
		$stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return (empty($result)) ? false : $result;
	}
	public function delete_uid($table,$uid){
		$query ="DELETE FROM ".$table.
		" WHERE uid=:uid";
		$stmt = $this->pdo->prepare($query);
		$params = array("uid" => mysql_real_escape_string($uid));		
		$stmt->execute($params);
        return true;
	}
	public function create($table,$values)
	{
		$a = array_keys($values);
		for($i=0;$i<count($a);$i++){
			$a[$i] = ':'.$a[$i];
		}
		$val = implode(',',$a);
		$query = "INSERT INTO " . $table."(".implode(',',array_keys($values)).") 
		VALUES (".$val. ")";
		$s = $this->pdo->prepare($query);
		$params = array();
		foreach($values as $k=>$v){
			$params[$k]=mysql_real_escape_string(((trim($values[$k]))));
		}
		$s->execute($params);
		return $this->pdo->lastInsertId();
	}
	public function update($table,$id,$values)
	{
 		$a = array_keys($values);
		for($i=0;$i<count($a);$i++){
			$a[$i] = $a[$i].'=?';
		}
		$query = 'UPDATE '.$table.' SET '.implode(',',$a).' WHERE id=?';
		$result = $this->pdo->prepare($query );
		$params=array();
		foreach($values as $k=>$v){
			array_push($params,mysql_real_escape_string(htmlspecialchars(trim($values[$k]))));
		}
		array_push($params,mysql_real_escape_string((htmlspecialchars(trim($id)))));
		$result->execute($params);
        return true;
	}
	public function delete($table,$id)
	{
   		$query ="DELETE FROM ".$table.
		" WHERE id=:id";
		$stmt = $this->pdo->prepare($query);
		$params = array("id" => mysql_real_escape_string($id));		
		$stmt->execute($params);
        return true;
	}
	public function select($table,$id)
	{
		$query = "SELECT * FROM " .$table .
        " WHERE id = :id";
		$stmt = $this->pdo->prepare($query);
        $params = array("id" => mysql_real_escape_string($id));
		$stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return (empty($result)) ? false : $result;
	}
	public function select_all($table)
	{
		$query = "SELECT * FROM " .$table;
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
      	$result = $stmt->fetchAll();
        return (empty($result)) ? false : $result;
	}
}