<?php

namespace App\Models;

use CodeIgniter\Model;

class PACAModel extends Model
{

    protected static $machine;

    public function getData($wh){
 
        switch($wh){
            case 'frozen':
                static::$machine = Setting::$PACARoom['Frozen'];
            break;
            case 'temp':
                static::$machine = Setting::$PACARoom['Temp'];
            break;
        }

        return array(
            'total' => $this->err_count(false),
            'crane' => $this->err_count('01:Crane'),
            'conveyor' => $this->err_count('02:Conveyor'),
            'date'=>date('d/m/Y', strtotime('-2 days'))
        );
    }

    private function err_count($q){
        $db = db_connect("tests");
        $sql  = "SELECT Machine ";
        $sql .= "FROM asrs_error_trans ";
        $sql .= "WHERE wh = 'paca' ";
        $sql .= "AND Transfer_Equipment IN (".implode(",", array_map(function($value) {return "'" . $value . "'";}, static::$machine)).") ";
        $sql .= "AND DATE(tran_date_time) = DATE_SUB(CURDATE(), INTERVAL 2 DAY)";

        if($q)
            $sql .= "AND Machine = '$q'";
        // return $sql;
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
