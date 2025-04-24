<?php

namespace Config;
use CodeIgniter\Config\BaseConfig;

class MyConfig extends BaseConfig 
{
        public $perPage = 5;

        public $alertMessage = [
                'dbAddError' => 'Záznam se nepřidal',
                'dbEditError' => 'Záznam se neaktualizoval',
                'dbDelError' => 'Záznam se nesmazal',
                'dbAddSuccess' => 'Záznam byl přidán do databáze',
                'dbEditSuccess' => 'Záznam {name} se aktualizoval',
                'dbDelSuccess' => 'Záznam byl smazán'



            ];
}


