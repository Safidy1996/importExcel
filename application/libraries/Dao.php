<?php
class Dao {
    private $code;

    public function __construct() {
    }

    public function find($instance, $table, $where = NULL, $order=NULL, $type_order= "ASC", $limit = NULL, $offset = NULL, $group_by = NULL) {
        $code =& get_instance();
        $query = $code->db->select("*")->from($table);
        if ($where !== NULL) $query->where($where);
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

    public function find_specific($instance, $sql, $binds = FALSE) {
        $code =& get_instance();
        $query = $code->db->query($sql, $binds);
        return $instance->toArray($query->result());
    }

    public function update($instance, $table, $pk_table) {
        $code =& get_instance();
        $code->db->where($pk_table, $instance->__get("id"));
        $code->db->update($table, $instance->getFields());
    }

    public function save_or_update($instance, $table, $pk_table, $db_transact=NULL) {
        $code =& get_instance();
        $db = $code->db;
        if($db_transact != NULL) $db = $db_transact;
        if($instance->__get("id") != NULL) {
            $db->where($pk_table, $instance->__get("id"));
            $db->update($table, $instance->getFields());
        }
        else $db->insert($table, $instance->getFields());
    }

    public function save($instance, $table) {
        try {
            $code =& get_instance();
            $code->db->insert($table, $instance->getFields());
        } catch(Exception $e) {
            throw $e;
        }
    }

    public function lastInsertId($sequence) {
        $code =& get_instance();
        return $code->db->insert_id($sequence);
    }

    public function count($nomTable, $restrictions=NULL) {
        $code =& get_instance();
        $code->db->select("COUNT(*) AS nbre")->from($nomTable);
        if($restrictions !== NULL)
            $code->db->where($restrictions);
        $result = $code->db->get()->result();
        return $result[0]->nbre;
    }
}
