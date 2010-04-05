<?Php
    class db{
       
        public $Lastsql = ""; //store the last query
        public $Error = array(); //Will store 2 entries, the query that failed and the error
		public $Cache_all = false; //This will force all queries to be cache queries.
		public $Prefix = "";

		//Standard LAPCAT code adjustments
		public $a_Error = array(); //store the last query
		public $v_Lastsql = ""; //store the last query
		public $v_Resid = 0; //store the last query
		public $v_Lastid = 0;
		public $v_Queries = 0; //count how many are executed
		
        //Define the database connection information
        private $config = array(); //config values in associat
        private $linkid = 0; //store the link id.
        private $dbase = "lapcat";
        private $user = "lapcat";
        private $password = "ETNXPRRHcTAZsXQy";
        private $host = "localhost";
		//Define the database connection information
		private $prefixString = "{prefix}";
		private $storeResults = array(); //Store query results for later in the rendering.
		function getInstance(){
			static $instance;
			if(!isset($instance)){
				$object= __CLASS__;
				$instance=new $object;
			}
			return $instance;
		}
		/**
		 * @since 1.0
		 * Simple constructor
		 * @return 
		 */				
		function db(){//connection object
			$this -> linkid = mysql_connect($this->host,$this->user,$this->password);
				mysql_select_db($this->dbase,$this -> linkid);	
			//$this -> connect();
		}
		/**
		 * 
		 * Used to override the database connection 
		 * 
		 * @return Void
		 * @param string $user (Database Username)
		 * @param string $password (Database Password)
		 * @param string $host (Database Host)
		 * @param string $dbase (Name of the database you wish to connect to)
		 */
		public function Connect ($user,$password,$host,$dbase){ //allow for new connections to be made
				$this->user = $user;
				$this->password= $password;
				$this->host = $host;
				$this->dbase= $dbase;
				$this -> linkid = mysql_connect($this->host,$this->user,$this->password);
				mysql_select_db($this->dbase,$this -> linkid);	
		}
		/**
		 * Changes the Database the queries are run against
		 * 
		 * @since 2.0
		 * @return 
		 * @param object $dbName
		 */
		public function Selectdb($dbName){mysql_select_db($dbName,$this->linkid);}
		/**
		 * Counts the amount of rows returned
		 * 
		 * @since 1.0
		 * @return int
		 */
		public function Count_res(){return mysql_num_rows($this -> v_Resid);	}
		public function f_Count_res(){return $this->Count_res;}
		/**
		 * Runs the query passed to it.
		 * @since 1.0
		 * @return int|string|bool (You should never get back true, its just a catch all)
		 * @param string $sql[optional] not really optional.  Will just run a blank query.  Useful for testing
		 * @param bool $cache[optional] defaults to false
		 */
		public function f_Query($sql = "",$cache = false){$this->Query($sq,$cache);}
		public function Query($sql = "",$cache = false){
			if($this -> linkid != 0){
				//mysql_ping($this -> linkid);
				$sql = $this->prefixParse($sql); //Lets check to see if the prefix string is being used
				if($this -> Cache_all === true || $cache === true){
					if(strpos(strtolower($sql),"select") == 0){
						str_replace("select","SELECT SQL_CACHE",strtolower($sql));
					}
				}
				$return = mysql_query($sql,$this -> linkid) or $return = 0;
				$this -> v_Resid = $return;
				$this -> Lastsql = $sql;
				$this -> v_Lastsql = $sql;
				if(!$return){//set the error values
					$this -> Error["Query"] = $this -> Lastsql;
					$this -> Error["Error"] = mysql_error();
					$this -> a_Error["Query"] = $this -> Lastsql;
					$this -> a_Error["Error"] = mysql_error();
					$return = "There was an error with your sql";
				}else { $this -> Error = array(); 
					$this -> v_Queries++;
					if(strpos(strtolower($sql),"insert") == 0){//this was an insert
						$this -> v_Lastid = mysql_insert_id($this -> linkid);	}
				}
				return true; //Something always has to be returned
			}
		}
		/**
		 * Fetch and Format do the same thing, Fetch is just a wrapper for Format to be more MySQL/PHP standard
		 * 
		 * @since 1.5
		 * @see function Format
		 * @return string
		 * @param string $type
		 * @param bool $force[optional]
		 */
		public function f_Fetch($type,$force = FALSE){ return $this->Format($type,$force);} // to be more like mysql
		public function Fetch($type,$force = FALSE){ return $this->Format($type,$force);} // to be more like mysql
		/**
		 * Used to save stored resluts.  Can be dangerous and should be used with caution.
		 * @return int|string
		 * @param mixed $results
		 * @param string $index[optional]
		 */
		public function Store_results($results,$index=""){
			if($index==""){
				if($this->storeResults[] = $results){return count($this->storeresults);}else{return false;}	
			}else{
				if($this->storeResults[$index] = $results){return $index;}else{return false;}
			}
		}
		/**
		 * Gets the results 
		 * @return mixed the array of results stored.  Could be a string as well its all up to the user
		 * @param int|string $id
		 */
		public function Get_results($id){
			if(array_key_exists($id,$this->storeResults)){return $this->storeResults[$id];}else{return false;}
		}
		/**
		 * A clean up of the stored results
		 * @return bool Incase of need to validate
		 */
		public function Clear_savedresults(){ if($this->storeresults = array()){return true;} return false;}
		/**
		 * Format takes the Query (if it was successful) and then turns it into an Array, associative or indexed (assoc/row/assoc_array/row_array) 
		 * 
		 * @since 1.0
		 * @return mixed
		 * @param string $type
		 * @param bool $force[optional]
		 */
		public function Format($type,$force = false){
			$return = "";
			if(count($this -> Error) == 2){//there is an error
				return "There was an error with the query"; 
			}else{
				switch(strtolower($type)){
					case "assoc":
						if($this -> Count_res() == 1 || $force === true)
							$return = mysql_fetch_assoc($this -> v_Resid); 
						else					
							while($line = mysql_fetch_assoc($this -> v_Resid)){ $return[] = $line; }
					break;
					case "row":
						if($this -> Count_res() == 1 || $force === true){
							$return = mysql_fetch_row($this -> v_Resid);
						}else{
							while($line = mysql_fetch_row($this -> v_Resid)){ $return[] = $line; }
						}
						if($this->Count_res() > 0){
							if(count($return) == 1) {$return = $return[0];} //make sure its more than one
						}
					break;
					case "assoc_array":
						while($line = mysql_fetch_assoc($this -> v_Resid)){
							$return[] = $line; 
						}
					break;
					case "row_array":
						while($line = mysql_fetch_row($this -> v_Resid)){ $return[] = $line; }
						if(count($return[0])==1){
							foreach($return as $r){
								$newArray[]=$r[0];
							}
							$return = $newArray;
						}
					break;
					default:
						$return = "broke";
					break;
				}
				if(count($return)==0) {$return = array();}
				return $return;
			}
 		}
		public function f_Format($type,$force = FALSE){ return $this->Format($type,$force);} // to be more like mysql
		/**
		 * Used to clean and escape a string for entering into a SQL query
		 * 
		 * @since 1.5
		 * @return string
		 * @param string $item
		 */
		public function Escape_str($item){foreach ($item as $key=>$i){$return[] = "'".mysql_real_escape_string($i)."'";	}return $return;}
		/**
		 * Used to clean and escape an Array for entering into a SQL query
		 * 
		 * @since 1.5
		 * @return string
		 * @param mixed $array
		 */
		public function Mysql_clean($array){
			$holderArray=array();
			foreach ($array as $key => $value){
				if(is_array($value)){
					$holderArray[$key] = $this->Mysql_clean($value);	
				}else{
					$holderArray[$key] = mysql_real_escape_string($value);
				}
			}	return $holderArray;
		}
		/**
		 * Cleans a string.  More robust than the 2 above
		 * 
		 * @return array,string The cleaned up version of what was passed to it
		 * @param array,str $str[optional] what is to be cleaned
		 * @param array string $html[optional] tags to be removed
		 */
		public function Clean($str = '', $html = false) {
			if (empty($str)) return;
		
			if (is_array($str)) {
				foreach($str as $key => $value) $str[$key] = $this->clean($value, $html);
			} else {
				if (get_magic_quotes_gpc()){ $str = stripslashes($str);}else{$str = addslashes($str);}
		
				if (is_array($html)) $str = strip_tags($str, implode('', $html));
				elseif (preg_match('|<([a-z]+)>|i', $html)) $str = strip_tags($str, $html);
				elseif ($html !== true) $str = strip_tags($str);
		
				$str = trim($str);
			}
		
			return $str;
		}
		/**
		 * Returns the SQL query with the prefix variable string exchanged for the prefix
		 * 
		 * @since 2.0
		 * @return string
		 * @param string $sql
		 */
		private function prefixParse($sql){	return str_replace($this->prefixString,$this->Prefix,$sql);}
    }
?>
