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
            case 'pact':
                $crane    = Setting::$PACTMachine['crane'];
                $conveyor = Setting::$PACTMachine['conveyor'];
                $stv      = Setting::$PACTMachine['stv'];
            break;
        }

        $total = $this->err_count(false);
        if($total == 'nodata'){
            return array(
                'total' => $this->getLastUpdate($wh),
                'crane' => "No Data",
                'conveyor' => "No Data",
                'stv' => "No Data",
                'date'=>date('d/m/Y', strtotime('-2 days'))
            );
        } else {
            return array(
                'total' => $total,
                'crane' => $this->err_count($crane),
                'conveyor' => $this->err_count($conveyor),
                'stv' => $this->err_count($stv),
                'date'=>date('d/m/Y', strtotime('-2 days'))
            );

        }

    }

    private function err_count($q){
        $db = db_connect();

        $builder = $db->table('asrs_error_trans')
                      ->select('Machine')
                      ->where('wh', static::$wh)
                      ->where('DATE(tran_date_time)', 'DATE_SUB(CURDATE(), INTERVAL 2 DAY)', false); // เพิ่มเงื่อนไขโดยไม่ให้ CI ทำการ escape string
        if ($q) {
            if (is_array($q)) {
                $builder->groupStart(); // เริ่มกลุ่มเงื่อนไข OR
                foreach ($q as $value) {
                    $builder->like('Machine', $value, 'after'); // สร้างเงื่อนไข LIKE สำหรับค่าใน $q
                    $builder->orLike('Machine', $value, 'after'); // เพิ่มเงื่อนไข LIKE ด้วย OR
                }
                $builder->groupEnd(); // จบกลุ่มเงื่อนไข OR
            } else {
                $builder->like('Machine', $q, 'after'); // สร้างเงื่อนไข LIKE สำหรับค่าใน $q
            }
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
                    ->where('wh', $wh)
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
