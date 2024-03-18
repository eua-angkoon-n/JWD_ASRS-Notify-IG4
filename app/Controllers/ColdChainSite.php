<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\MainSiteModel;
use App\Models\PACAModel;
use App\Models\PCSModel;

class ColdChainSite extends BaseController
{
    public function index()
    {
        //
    }

    public function pcs(){
        $model = new PCSModel();
        $data['data'] = $model->getData();

        $data['content'] = view('ccsite/pcs', $data);
        return view('index', $data);
    }

    public function paca(){
        $model = new PACAModel();
        $data['data'] = $model->getData();

        $data['content'] = view('ccsite/paca', $data);
        return view('index', $data);
    }

    public function pcsb8(){
        $model = new MainSiteModel();
        $data['count'] = $model->getData('b8');
        $data['title'] = "PCS B8";

        $data['content'] = view('ccsite/main', $data);
        return view('index', $data);
    }

    public function pcsb9(){
        $model = new MainSiteModel();
        $data['count'] = $model->getData('b9');
        $data['title'] = "PCS B9";

        $data['content'] = view('ccsite/main', $data);
        return view('index', $data);
    }

    public function pacafrozen(){
        $model = new PACAModel();
        $data['count'] = $model->getData('frozen');
        $data['title'] = "PACA Frozen";

        $data['content'] = view('ccsite/paca', $data);
        return view('index', $data);
    }

    public function pacatemp(){
        $model = new PACAModel();
        $data['count'] = $model->getData('temp');
        $data['title'] = "PACA Temp Control";

        $data['content'] = view('ccsite/paca', $data);
        return view('index', $data);
    }

    public function pacm(){
        $model = new MainSiteModel();
        $data['count'] = $model->getData('pacm');
        $data['title'] = "PACM";

        $data['content'] = view('ccsite/main', $data);
        return view('index', $data);
    }

    
    public function pacs(){
        $model = new MainSiteModel();
        $data['count'] = $model->getData('pacs');
        $data['title'] = "PACS";

        $data['content'] = view('ccsite/main', $data);
        return view('index', $data);
    }

    public function pact(){
        $model = new MainSiteModel();
        $data['count'] = $model->getData('pact');
        $data['title'] = "PACT";

        $data['content'] = view('ccsite/main', $data);
        return view('index', $data);
    }
}
