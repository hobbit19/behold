<?php 

class DB {
    public $db = null;
    
    function connect() {
        $this->db = new SQLite3('/pineapple/components/infusions/behold/data');
    }

    function db() {
        $this->connect();
        return $this->db;
    }
    function query($sql) {
       return $this->db()->query($sql);
    }
    function get_rows($sql) {
        $rows = [];
        $result = $this->db()->query('SELECT * FROM clients');
        while ($row = $result->fetchArray()) {
            array_push($rows, $row);
        }
        return $rows;
    }
    function get_scalar($sql) {
        $result = $this->db()->query($sql);
        $row = $result->fetchArray();
        return $row[0];
    }

    function clients() {
        return $this->get_rows('SELECT * FROM clients');
    }
    function client_count() {
        return $this->get_scalar('SELECT COUNT(*) FROM clients');
    }
    function delete_clients($id=null) {
        if ($id == null) {
            $this->db()->query('DELETE FROM clients;');
        } else {
            $this->db()->query("DELETE FROM clients WHERE id=$id");
        }
    }

    function new_client($ip_address) {
        $this->query("INSERT INTO clients (ip_address) VALUES('$ip_address')");

    }

}

?>

