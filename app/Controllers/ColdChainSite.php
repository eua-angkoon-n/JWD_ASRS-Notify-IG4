<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PCSB8Model;
use CodeIgniter\HTTP\ResponseInterface;

class ColdChainSite extends BaseController
{
    public function index()
    {
        //
    }

    public function pcsb8(){
        $model = new PCSB8Model();
        $data['count'] = $model->getData();
        $data['title'] = "PCS B8";

        $data['content'] = view('ccsite/pcsb8', $data);
        return view('index', $data);
    }
}
