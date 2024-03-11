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

        $total = $this->err_count(false);
        if($total == 'nodata'){
            return array(
                'total' => $this->getLastUpdate($wh),
                'crane' => "No Data",
                'conveyor' => "No Data",
                'date'=>date('d/m/Y', strtotime('-2 days'))
            );
        } else {
            return array(
                'total' => $total,
                'crane' => $this->err_count('01:Crane'),
                'conveyor' => $this->err_count('02:Conveyor'),
                'date'=>date('d/m/Y', strtotime('-2 days'))
            );
        }

    }

    private function err_count($q){
        $db = db_connect();
        
        $builder = $db->table('asrs_error_trans')
                    ->select('Machine')
                    ->where('wh', 'paca')
                    ->whereIn('Transfer_Equipment', static::$machine)
                    ->where('DATE(tran_date_time)', 'DATE_SUB(CURDATE(), INTERVAL 2 DAY)', false); // เพิ่มเงื่อนไขโดยไม่ให้ CI ทำการ escape string

        // เช็คว่า $q ไม่ใช่ empty array และมีข้อมูลอยู่
        if ($q) {
            $builder->where('Machine', $q);
        }
        try{
            $query = $builder->get();
        
            $result = $query->getNumRows();

            if (!$q && $result == 0) {
                return 'nodata';
            }

            return $result;

        } catch (\PDOException $e){
            return "Database Error : " . $e->getMessage();
        } catch (\Exception $e){
            return "Error : " . $e->getMessage();
        } finally {
            $db->close();
        }
    }

    private function getLastUpdate($wh){
        $db = db_connect();

        try{
            $query = $db->table('asrs_error_attachment')
                    ->select('date')
                    ->where('wh', 'paca')
                    ->get();

            $row = $query->getRow(); // ดึงข้อมูล row จาก query

            if ($row) {
                return "Last Data Update: ".$row->date;
            } else {
                return "-"; // หรือค่าที่เหมาะสมเมื่อไม่พบข้อมูล
            }

        } catch (\PDOException $e){
            return "Database Error : " . $e->getMessage();
        } catch (\Exception $e){
            return "Error : " . $e->getMessage();
        } finally {
            $db->close();
        }
    }
}
