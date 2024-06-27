<?php
namespace app\Model;
class Connect
{
    private $host;
    private $user;
    private $pass;
    private $db;
    private $mysqli;


    public function __construct()
    {
        $this->host = "localhost";
        $this->user = "root";
        $this->pass = "";
        $this->db = "first_step_remastered";

        $this->mysqli = new \mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($this->mysqli->connect_errno) {
            echo "Failed to connect to Mysql:" . $this->mysqli->connect_error;
        }
    }

    public function conn()
    {
        return $this->mysqli;
    }

    public function __destruct()
    {
        if (is_resource($this->mysqli) && get_resource_type($this->mysqli) === 'mysql link') {
            $this->mysqli->close();
        }
    }

    public function clearStoredResults()
    {
        do {
            if ($res = $this->mysqli->store_result()) {
                $res->free();
            }
        } while ($this->mysqli->more_results() && $this->mysqli->next_result());
    }
}
