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
	}
	public function create_app($table,$values)
	{
		$query = "INSERT INTO " . $table .
                " (title, description,author) " .
                " VALUES (:title, :description, :author)";
        $stmnt = $this->pdo->prepare($query);
        $params = array(
            "title" => $values['title'],
			"description" => $values['description'],
			"author" => $values['author']
        );
        $stmnt->execute($params);
        return $this->pdo->lastInsertId();
	}
	public function update_app($table,$id,$values)
	{
   		$result = $this->pdo->prepare('UPDATE '.$table.' SET title=?, description=?, author=? WHERE id=?');
		$result->execute(array($values['title'], $values['description'], $values['author'],$id));
        if ($result->rowCount() < 1) {
           throw new Exception(
            "oops");
        }
        return true;
	}
	public function delete_app($table,$id)
	{
   		$query ="DELETE FROM ".$table.
		" WHERE id=:id";
		$stmt = $this->pdo->prepare($query);
		$params = array("id" => $id);		
		$stmt->execute($params);
		if ($stmt->rowCount() < 1) {
           throw new Exception(
            "oops");
		}
        return true;
	}
	public function select($table,$id)
	{
		$query = "SELECT * FROM " .$table .
        " WHERE id = :id";
		$stmt = $this->pdo->prepare($query);
        $params = array("id" => $id);
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