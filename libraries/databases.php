<?php

    class Database{
        public $host=DB_host;
        public $username=DB_user;
        public $password=DB_password;
        public $name=DB_name;

        public $link;
        public $error;
        /*
         * class construct
         */
        public function __construct()
        {
            //call connect function
            $this->connect();

        }
        /*
        * class connector
        */
        private function connect(){
            $this->link=new mysqli($this->host,$this->username,$this->password,$this->name);

            if(!$this->link){
                $this->error="connection failed: ".$this->link->connect_error;
                return false;
            }
        }
        /*
        * select
        */
        public function select($query)
        {
            $result =$this->link->query($query) or die($this->link->error.__LINE__);
            if ($result->num_rows>0){
                return $result;
            }else{
                return false;
            }
        }
        /*
       * insert
       */
        public function insert($query)
        {
            $insert_row =$this->link->query($query) or die($this->link->error.__LINE__);
            if ($insert_row){
                header("location: ../index.php?msg=".urlencode('record added'));
                exit();
            }else{
                die('Error :( '.$this->link->errno.' ) '.$this->link->error);
            }
        }
        /*
       * update
       */
        public function update($query)
        {
            $update_row =$this->link->query($query) or die($this->link->error.__LINE__);
            if ($update_row){
                header("location: ../index.php?msg=".urlencode('record updated'));
                exit();
            }else{
                die('Error :( '.$this->link->errno.' ) '.$this->link->error);
            }
        }
        /*
     * delete
     */
        public function delete($query)
        {
            $delete_row =$this->link->query($query) or die($this->link->error.__LINE__);
            if ($delete_row){
                header("location: ../index.php?msg=".urlencode('record deleted'));
                exit();
            }else{
                die('Error :( '.$this->link->errno.' ) '.$this->link->error);
            }
        }

    }
?>



<!--
            CREATE TABLE `blog`.`posts` ( `id` INT(11) NOT NULL AUTO_INCREMENT ,
             `category` INT(11) NOT NULL ,
            `title` VARCHAR(255) NOT NULL ,
            `body` TEXT NOT NULL , `auther` VARCHAR(255) NOT NULL ,
            `tags` VARCHAR(255) NOT NULL ,
            `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
              PRIMARY KEY (id),
              UNIQUE KEY (id)) ENGINE = InnoDB;*/-->
