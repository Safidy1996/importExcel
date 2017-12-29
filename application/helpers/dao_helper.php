<?php

    function find($instance, $table, $where = NULL, $order=NULL, $type_order= "ASC", $limit = NULL, $offset = NULL, $group_by = NULL,$like = NULL) {
        $code =& get_instance();
        $query = $code->db->select("*")->from($table);
        

        if ($where !== NULL) $query->where($where);
        if($like !== NULL) {$query->like($like);}
        if ($group_by !== NULL) $query->group_by($group_by);
        if ($order !== NULL) {
            if (is_array($order)) {
                for ($i = 0; $i < count($order); $i++) {
                   $query->order_by($order[$i], $type_order);     
                }
            } else $query->order_by($order, $type_order);
        }
        if ($limit !== NULL && $offset !== NULL) $query->limit($offset, $limit);
        $temp = $query->get()->result();
        //var_dump($code->db->last_query());
        return $instance->toArray($temp);
    }

    function find_or_where($instance, $table, $where_or = NULL, $order=NULL, $type_order= "ASC", $limit = NULL, $offset = NULL, $group_by = NULL,$like = NULL) {
        $code =& get_instance();
        $query = $code->db->select("*")->from($table);
        

        if ($where_or !== NULL) $query->or_where($where_or);
        if($like !== NULL) {$query->like($like);}
        if ($group_by !== NULL) $query->group_by($group_by);
        if ($order !== NULL) {
            if (is_array($order)) {
                for ($i = 0; $i < count($order); $i++) {
                   $query->order_by($order[$i], $type_order);     
                }
            } else $query->order_by($order, $type_order);
        }
        if ($limit !== NULL && $offset !== NULL) $query->limit($offset, $limit);
        return $instance->toArray($query->get()->result());
    }


    function find_specific($instance, $sql, $binds = FALSE) {
        $code =& get_instance();
        $query = $code->db->query($sql, $binds);
        return $instance->toArray($query->result());
    }

    function update($instance, $table, $pk_table="id") {
        $code =& get_instance();
        $code->db->where($pk_table, $instance->__get($pk_table));
        $code->db->update($table, $instance->getFields());
    }

    function save_or_update($instance, $table, $pk_table="id", $db_transact=NULL) {
        $code =& get_instance();
        $db = $code->db;
        if($db_transact != NULL) $db = $db_transact;
        if($instance->__get($pk_table) != NULL) {
            $db->where($pk_table, $instance->__get($pk_table));
            $db->update($table, $instance->getFields());
        }
        else $db->insert($table, $instance->getFields());

    }

    function save($instance, $table) {
        try {
            $code =& get_instance();

            $code->db->insert($table, $instance->getFields());
//echo $code->db->last_query();
            $result = $insert_id = $code->db->insert_id();
            return $result;
        } catch(Exception $e) {
            throw $e;
        }
    }

    function delete($pk_table,$value, $table) {
        try {
            $code =& get_instance();
            $code->db->query('DELETE FROM '.$table.' where '.$pk_table.'='.$value);
            $error = $code->db->error();
            if(is_array($error) && $error["message"] != ""){
                throw new Exception("Impossible de supprimer. Parution déjà associée a un article", 1);
            }

        } catch(Exception $e) {
            throw $e;
        }
    }

    function lastInsertId($sequence) {
        $code =& get_instance();
        return $code->db->insert_id($sequence);
    }

    function countTable($nomTable,$colonne='*', $restrictions=NULL) {
        $code =& get_instance();
        $code->db->select("COUNT($colonne) AS nbre")->from($nomTable);
        if($restrictions !== NULL)
            $code->db->where($restrictions);
        $result = $code->db->get()->result();
        

        return $result[0]->nbre;
    }
    function countTable_or_where($nomTable,$colonne='*', $restrictions=NULL) {

        $code =& get_instance();

        $code->db->select("COUNT($colonne) AS nbre")->from($nomTable);

        if($restrictions !== NULL)
            $code->db->or_where($restrictions);

        $result = $code->db->get()->result();
        

        return $result[0]->nbre;
    }

    

    function arrayAssociatifToObjectTable($array,$classeName,$table){

        $length = count($array);

        if($length > 0){

            //Pour stocker le result
            $classArray = array();

            $classObject = new $classeName();


            $column_list = getColumnName($table);

            for ( $i = 0; $i<$length ; $i++) {

                $classArray[$i] = new $classeName();

                foreach ($column_list as $column_list_) {

                    $classArray[$i]->__set($column_list_->COLUMN_NAME,$array[$i]->__get($column_list_->COLUMN_NAME)); 
                }
            }

            return $classArray;

        }
        return array();
            
    }


    function getColumnName($table){

        $instance = & get_instance();

        $database = $instance->db->database;

        //Prend la liste de colonne d'une table

        //SELECT * FROM $database.INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$table' pour SQL SERVER
        $query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='$database' AND `TABLE_NAME`='$table'";

        $query_ = $instance->db->query($query);

        return $query_->result();
    }

    function separateNomColumnBase($column){
        $temp = explode("_", $column);
        $result = "";
        for ($i = 0 ; $i<count($temp) ; $i++) {
            $result = $result . " " . $temp[$i];
        }
        return camel_case($result);
    }

    function camel_case($column){
        return ucwords($column);
    }

    function getListWithComments($nomtable){

        $instance = & get_instance();

        $class = camel_case($nomtable);

        $class_ = new $class();

        $pk = $class_->__get("primary_key");

        $query = "select p.*, rv.commentaire as commentaire from ". $nomtable ." as p
           left join regle_non_valide as rnv on rnv.nomtable = '" . $nomtable . "' and rnv.id_class = p." . $pk . " 
           left join regle_validation rv on rv.id_regle_validation = rnv.id_regle_validation";

        //echo "<br>"."<br>"."<br>"."<br>".$query . "<br>"."<br>"."<br>";
        //$result = $instance->db->query($query)->result();

        return $class_->toArray($instance->db->query($query)->result());
    }

    function getListWithCommentsByidClass($nomtable,$id){

        $instance = & get_instance();

        $class = camel_case($nomtable);

        $class_ = new $class();

        $pk = $class_->__get("primary_key");

        $query = "select p.*, rv.commentaire as commentaire from ". $nomtable ." as p
           left join regle_non_valide as rnv on rnv.nomtable = '" . $nomtable . "' and rnv.id_class = p." . $pk . " 
           left join regle_validation rv on rv.id_regle_validation = rnv.id_regle_validation where ". $pk . "= " . $id;

        //echo "<br>"."<br>"."<br>"."<br>".$query . "<br>"."<br>"."<br>";
        //$result = $instance->db->query($query)->result();

        return $class_->toArray($instance->db->query($query)->result());
    }



