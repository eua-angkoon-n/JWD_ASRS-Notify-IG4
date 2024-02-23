<?php

namespace App\Models;

use CodeIgniter\Model;

class PCSB8Model extends Model
{

    protected static $crane = "SRA";
    protected static $conveyor = "A";
    protected static $stv = "SLA";
    public function getData(){
        // return "asasd";
        return array(
            'total' => $this->err_count(false),
            'crane' => $this->err_count(static::$crane),
            'conveyor' => $this->err_count(static::$conveyor),
            'stv' => $this->err_count(static::$stv)
            
        );
    }

    private function err_count($q){
        $db = db_connect("tests");
        $sql  = "SELECT Machine ";
        $sql .= "FROM asrs_error_trans ";
        $sql .= "WHERE wh = 'b8' ";
        $sql .= "AND tran_date_time BETWEEN '2024-01-02 00:00:00' AND '2024-01-18 00:00:00' ";
        if($q)
            $sql .= "AND Machine LIKE '$q%'";

        try{

            $query = $db->query($sql);
            
            $result = $query->getNumRows();
            
            return $result;

        } catch (\PDOException $e){
            return "Database Error : " . $e->getMessage();
        } catch (\Exception $e){
            return "Error : " . $e->getMessage();
        } finally {
            $db->close();
        }
    }
}
