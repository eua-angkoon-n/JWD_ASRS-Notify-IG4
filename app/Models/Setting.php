<?php

namespace App\Models;

use CodeIgniter\Model;

class Setting extends Model
{
    public  static $PACARoom = array(
        'Frozen' => array ('0001', '0002', '0003', '0004', '0005', '0006', '0007', '0008', '0009', '0010', '0011', '0012', '0013', '0014', '0015', '0016', '0017', '0018', '0019', '0020', '0021', '1101', '1102', '1103', '1104', '1105', '1106', '1107', '1108', '1109', '1110'),
        'Temp' => array ('0022', '0023', '0024', '0025', '0026', '0027', '0028', '0029', '0030', '0031', '0032', '0033', '0034', '0035', '0036', '0037', '0038', '0039', '0040', '0041', '0042', '1201', '1202', '1203', '1204', '1205', '1206', '1207', '1208', '1209', '1210',)
    );

    public static $PCSMachine = array(
        'crane' => 'SRA',
        'conveyor' => 'A',
        'stv' => 'SLA',
        'stvb9' => 'SS'
    );
    
    public static $PACMMachine = array(
        'crane' => 'SRMA',
        'conveyor' => 'A',
        'stv' => 'SS'
    );

    public static $PACSMachine = array(
        'crane' => 'RMA',
        'conveyor' => '1',
        'stv' => 'SS'
    );

    public static $PACTMachine = array(
        'crane' => 'RMA',
        'conveyor' => array('1','D-'),
        'stv' => 'SS'
    );
}
