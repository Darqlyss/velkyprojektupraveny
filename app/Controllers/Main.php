<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Komponent;
use App\Models\NazevParametr;
use App\Models\Parametr;
use App\Models\TypKomponent;
use App\Models\Vyber;
use App\Models\Vyrobce;
use App\Models\TypPocitace;
use Config\MyConfig;

class Main extends BaseController
{

    var $komponent;
    var $nazevparametr;
    var $parametr;
    var $typkomponent;
    var $vyber;
    var $vyrobce;
    var $typpocitace;

    public function index()
    {

    }
    public function stranka()
    {
        $model = new TypKomponent;
        $this->data["komponenty"] = $model->findAll();

        return view('stranka', $this->data);
        
    }
    public function detail($url)
    {
        $typModel = new TypKomponent;
        $komponentModel = new Komponent;

        $typ = $typModel->where('url', $url)->first();

        $config = new MyConfig();
        $perPage = $config->perPage;

        $data["komponenty"] = $komponentModel
            ->where('typKomponent_id', $typ->idKomponent)
            ->paginate($perPage);

        $data["typ"] = $typ;
        $data['pager'] = $komponentModel->pager;
        $data['perPage'] = $perPage; 

    
        return view('komponenty', $data);
    }
    
    

    public function detailKomponent($id)
    {
        $komponentModel = new Komponent();
        $parametrModel = new Parametr();
    
        $data['komponent'] = $komponentModel
        ->select('mt_komponent.*, mt_vyrobce.vyrobce, mt_typkomponent.typKomponent, mt_typkomponent.url')
        ->join('mt_vyrobce', 'mt_komponent.vyrobce_id = mt_vyrobce.idVyrobce')
        ->join('mt_typkomponent', 'mt_komponent.typKomponent_id = mt_typkomponent.idKomponent')
        ->where('mt_komponent.id', $id)
        ->first();
    
 
        $data['parametry'] = $parametrModel
            ->select('mt_parametr.hodnota, mt_nazevparametr.nazev')
            ->join('mt_nazevparametr', 'mt_parametr.nazevParametr_id = mt_nazevparametr.id')
            ->where('mt_parametr.komponent_id', $id)
            ->findAll();
    
        return view('detailkomponent', $data);
    }



    public function taby()
    {
        $typModel = new TypKomponent;
        $komponentModel = new Komponent;
    

        $typy = $typModel->findAll();
    

    
        foreach ($typy as $typ) {
            $typ->komponenty = $komponentModel
                ->where('typKomponent_id', $typ->idKomponent)
                ->findAll();
        }

        return view('taby', ['typy' => $typy]);
    }
    
    public function pridat()
    {
        return view('kategorie/pridat');

    }

    public function ulozit()
    {
        $model = new TypKomponent();
        $data = [
            'typKomponent' => $this->request->getPost('nazev'), 
            'url' => $this->request->getPost('url'),
        ];
        
    
        $result = $model->save($data);
    
        $alertLib = new \App\Libraries\Alert();
        $alert = $alertLib->prepareMessage($result, 'dbAdd');
    
        $this->session->setFlashdata('alert', $alert);
    
        return redirect()->to(base_url('/'));
    }
    

    public function editovat($id)
{
    $model = new TypKomponent();
    $data['komponent'] = $model->find($id);

    return view('kategorie/editovat', $data);
}

public function aktualizovat()
{
    $model = new TypKomponent();

    $id = $this->request->getPost('idKomponent');
    $data = [
        'typKomponent' => $this->request->getPost('typKomponent'),
        'url' => $this->request->getPost('url')
    ];

    $result = $model->update($id, $data);

    $alertLib = new \App\Libraries\Alert();
    $alert = $alertLib->prepareMessage($result, 'dbEdit', $data['typKomponent']);
    $this->session->setFlashdata('alert', $alert);

    return redirect()->to(base_url('/'));
}


public function smazat($id = null)
{
    // Načtení modelu
    $model = new \App\Models\TypKomponent();

    // Smazání záznamu podle ID
    $result = $model->delete($id);

    // Načtení knihovny Alert
    $alertLib = new \App\Libraries\Alert();

    // Příprava zprávy
    $messageType = $result ? 'dbDeleteSuccess' : 'dbDeleteError';
    $alert = $alertLib->prepareMessage($result, $messageType, $id);

    // Nastavení flash zprávy
    $this->session->setFlashdata('alert', $alert);

    // Přesměrování zpět na seznam
    return redirect()->to(base_url('/'));
}


}
