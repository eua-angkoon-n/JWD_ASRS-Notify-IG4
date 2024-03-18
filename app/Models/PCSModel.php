<?php

namespace App\Models;

use CodeIgniter\Model;

class PCSModel extends Model
{
    public function getData(){
        $r = array(
            'b8' => $this->getError('b8'),
            'b9' => $this->getError('b9'),
            'pacm' => $this->getError('pacm'),
            'pact' => $this->getError('pact'),
            'date'=> date('d/m/Y', strtotime('-2 days'))
        );
        return $r;
    }

    protected function getError($wh){
        switch($wh){
            case 'b8':
                $title    = 'PCS Building 8';
                $crane    = Setting::$PCSMachine['crane'];
                $conveyor = Setting::$PCSMachine['conveyor'];
                $stv      = Setting::$PCSMachine['stv'];
            break;
            case 'b9':
                $title    = 'PCS Building 9';
                $crane    = Setting::$PCSMachine['crane'];
                $conveyor = Setting::$PCSMachine['conveyor'];
                $stv      = Setting::$PCSMachine['stvb9'];
            break;
            case 'pacm':
                $title    = 'PACM';
                $crane    = Setting::$PACMMachine['crane'];
                $conveyor = Setting::$PACMMachine['conveyor'];
                $stv      = Setting::$PACMMachine['stv'];
            break;
            case 'pact':
                $title    = 'PACT';
                $crane    = Setting::$PACTMachine['crane'];
                $conveyor = Setting::$PACTMachine['conveyor'];
                $stv      = Setting::$PACTMachine['stv'];
            break;
        }
        $total = $this->err_count(false, $wh);
        if($total == 'nodata'){
            return array(
                'title' => $title,
                'total' => $this->getLastUpdate($wh),
                'crane' => "No Data",
                'conveyor' => "No Data",
                'stv' => "No Data"
            );
        } else {
            return array(
                'title' => $title,
                'total' => $total,
                'crane' => $this->err_count($crane, $wh),
                'conveyor' => $this->err_count($conveyor, $wh),
                'stv' => $this->err_count($stv, $wh),
            );

        }
    }

    private function err_count($q, $wh){
        $db = db_connect();

        $builder = $db->table('asrs_error_trans')
                      ->select('Machine')
                      ->where('wh', $wh)
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

            $queryLog = $db->table('asrs_error_trans')
                ->select('tran_date_time')
                ->where('wh',$wh)
                ->orderBy('tran_date_time', 'desc')
                ->limit(1)
                ->get();

            $lastDate = $queryLog->getLastRow();

            if ($row) {
                return "Last Data Error: ".date("d.M.Y H:i:s", strtotime($lastDate->tran_date_time))."<br><h5>Update At: $row->date </h5>";
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