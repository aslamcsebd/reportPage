
<?php
	if(session_status()===PHP_SESSION_NONE) session_start();
	
 	class database {
        public $que;
        private $servername='localhost';
        private $username='root';
        private $password='';
        private $dbname='report';
        private $result=array();
        private $mysqli='';

        public function __construct(){
            $this->mysqli = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        }

        public function insert($table,$para=array()){
            $table_columns = implode(',', array_keys($para));
            $table_value = implode("','", $para);

            $sql="INSERT INTO $table($table_columns) VALUES('$table_value')";

            $result = $this->mysqli->query($sql);
        }
	}
?>