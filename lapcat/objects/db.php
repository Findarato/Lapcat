<?Php
    class db{
       
        public $Queries = 0; //count how many are executed
        public $Lastsql = ""; //store the last query
        public $Resid;
        public $Error = array(); //Will store 2 entries, the query that failed and the error
	public $Lastid = 0;
	public $Cache_all = false; //This will force all queries to be cache queries.

        //Define the database connection information
        private $config = array(); //config values in associat
        private $linkid = 0; //store the link id.
        private $dbase = "lapcat";
        private $user = "lapcat";
        private $password = "tacpal";
        private $host = "localhost";

        function getInstance(){
            static $instance;
            if(!isset($instance)){
                $object= __CLASS__;
                $instance=new $object;
            }
            return $instance;
        }
               
        function db(){//connection object
            $this -> connect($this -> user,$this -> password,$this -> dbase,$this -> host);
        }
        function Count_res(){//count the results
			if(empty($this->Error)){return mysql_num_rows($this -> Resid);}else{return 0;}
        }
		function Query($sql,$cache=false){
		if($this -> linkid != 0){
			//mysql_ping($this -> linkid);
			if($this -> Cache_all === true || $cache === true){
				if(strpos(strtolower($sql),"select") == 0){
					str_replace("select","SELECT SQL_CACHE",strtolower($sql));
				}
			}
			if($this -> Cache_all === true){$sql = "SQL_CACHE ".$sql;} //Adds the cache keywords
			$return = mysql_query($sql,$this -> linkid) or $return = FALSE;
				$this -> Resid = $return;
			$this -> Resid = $return;
			$this -> Lastsql = $sql;
			if(!$return){//set the error values
				$this -> Error["Query"] = $this -> Lastsql;
				$this -> Error["Error"] = mysql_error();
			}else { $this -> Error = array(); 
				$this -> Queries++;
				if(strpos(strtolower($sql),"insert") == 0){//this was an insert
					$this -> Lastid = mysql_insert_id($this -> linkid);	}
			} //make sure to reset the error to empty
			return $return;
		}
	}
		public function Fetch($type,$force = FALSE){ return $this->Format($type,$force);} // to be more like mysql
 		function Format($type,$force = false){
			$return = "";
			if(count($this -> Error) == 2){//there is an error
				return "There was an error with the query"; 
			}else{
				switch($type){
					case "assoc":
						$return = mysql_fetch_assoc($this -> Resid); 
					break;
					case "row":
						$return = mysql_fetch_row($this -> Resid);
					break;
					case "assoc_array":
						while($line = mysql_fetch_assoc($this -> Resid)){ $return[] = $line; }
					break;
					case "row_array":
						while($line = mysql_fetch_row($this -> Resid)){ $return[] = $line; }
					break;
					default:
						$return = "broke";
					break;
				}
				if(count($return)==0) {$return = array();}
				return $return;
			}
 		}
        function connect($user,$password,$db,$host){//connection object
            $this -> linkid = mysql_connect($host,$user,$password);
                mysql_select_db($db,$this -> linkid);               
        }
		public function Mysql_clean($array){//will clean all values of the array
			$holderArray=array();//holder array
			foreach ($array as $key => $value){
				if(is_array($value)){
					foreach ($value as $v_Key=>$v_Value){
						$holderArray[$key][$v_Key]=mysql_real_escape_string($v_Value);
					}
				}else{$holderArray[$key] = mysql_real_escape_string($value);}
			}
			return $holderArray;
		}
		function escape_str($item){//take an array and escape it
			$return=mysql_real_escape_string($item);
            return $return;
        }
    }
?>
