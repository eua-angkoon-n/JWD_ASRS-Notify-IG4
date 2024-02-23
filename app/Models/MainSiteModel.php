<?php

namespace App\Models;

use CodeIgniter\Model;

class MainSiteModel extends Model
{
    protected static $wh;

    public function getData($wh){
        static::$wh = $wh;
        switch($wh){
            case 'b8':
                $crane    = Setting::$PCSMachine['crane'];
                $conveyor = Setting::$PCSMachine['conveyor'];
                $stv      = Setting::$PCSMachine['stv'];
            break;
            case 'b9':
                $crane    = Setting::$PCSMachine['crane'];
                $conveyor = Setting::$PCSMachine['conveyor'];
                $stv      = Setting::$PCSMachine['stvb9'];
            break;
            case 'pacm':
                $crane    = Setting::$PACMMachine['crane'];
                $conveyor = Setting::$PACMMachine['conveyor'];
                $stv      = Setting::$PACMMachine['stv'];
            break;
            case 'pacs':
                $crane    = Setting::$PACSMachine['crane'];
                $conveyor = Setting::$PACSMachine['conveyor'];
                $stv      = Setting::$PACSMachine['stv'];
            break;
        }

        return array(
            'total' => $this->err_count(false),
            'crane' => $this->err_count($crane),
            'conveyor' => $this->err_count($conveyor),
            'stv' => $this->err_count($stv),
            'date'=>date('d/m/Y', strtotime('-2 days'))
        );
    }

    private function err_count($q){
        $db = db_connect("tests");
        $sql  = "SELECT Machine ";
        $sql .= "FROM asrs_error_trans ";
        $sql .= "WHERE wh = '".static::$wh."' ";
        $sql .= "AND DATE(tran_date_time) = DATE_SUB(CURDATE(), INTERVAL 2 DAY)";
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
