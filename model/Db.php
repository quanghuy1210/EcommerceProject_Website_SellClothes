<?php
class Db extends PDO
{
    private $num_row;
    protected $db = array();
    private $pdo;
    public function __construct()
    {
        $this->num_row=0;
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=webshop;charset=utf8", "root", "");
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
    public function them($table,$data)
	{
		$keys = implode(",",array_keys($data));
		$value = ":".implode(", :",array_keys($data));
		
		$sql = "INSERT INTO $table ($keys) VALUES($value)";
		$con = $this->pdo->prepare($sql);
		foreach($data as $k =>$v){
			$con->bindValue($k,$v);
		}
		return $con->execute();
	}
	
	public function sua($table,$data,$er)
	{
		$updatekey = NULL;
		foreach($data as $k =>  $v){
			$updatekey .="$k=:$k,";
		}
		$updatekey = rtrim($updatekey, ',');

		$sql = "UPDATE $table set $updatekey where $er";
		$con = $this->pdo->prepare($sql);

		foreach($data as $key=>$value){
			$con->bindValue(":$key",$value);
		}
		return $con->execute();
	}
	public function xoa($table,$er,$limit = 1)
	{
		$sql = "DELETE FROM $table WHERE $er LIMIT $limit";
		return $this->pdo->exec($sql);
	}

    public function query($sql, $param=array(), $mode = PDO::FETCH_ASSOC)
    {
        $con = $this->pdo->prepare($sql);
		if(count($param)>0)
		{
			$con->execute($param);
        }
		else
		$con->execute();
		$this->num_row= $con->rowCount();
		return $con->fetchAll($mode);
    }
    public function insert($sql,$param=array(),$mode=PDO::FETCH_ASSOC)
	{
		
		$stmt=$this->pdo->prepare($sql);
		if(count($param)>0)
		{
			$stmt->execute($param);
		}
		else
		$stmt->execute();
		$this->num_row=$stmt->rowCount();
		return $this->pdo->lastInsertId();
		
	}
	public function getQuery($query, $params) 
	{
		$keys = array();
	
		# build a regular expression for each parameter
		foreach ($params as $key => $value) {
			if (is_string($key)) {
				$keys[] = '/:'.$key.'/';
			} else {
				$keys[] = '/[?]/';
			}
		}
	
		$query = preg_replace($keys, $params, $query, 1, $count);
	
		#trigger_error('replaced '.$count.' keys');
	
		return $query;
	}
	public function getNumRow()
	{
		return $this->num_row;	
	}
}
