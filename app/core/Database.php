<?php

    class Database 
    {
        private $db;

        public function __construct() {

            $this->db = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
        }

        function fetchSingle($sql, $bindData=null) {

            $sth = $this->db->prepare($sql);
            $sth->execute($bindData);
            return $sth->fetch();
        }

        function fetchAllAssoc($sql, $bindData=null) {

            $sth = $this->db->prepare($sql);
            $sth->execute($bindData);
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        }

        public function onlyExecute($sql, $bindData=null) {
                
            $sth = $this->db->prepare($sql);
            return $sth->execute($bindData);
        }
    }

?>
