<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Main::stranka');
$routes->get('komponenty/(:segment)', 'Main::detail/$1');
$routes->get('komponenty/detail/(:num)', 'Main::detailKomponent/$1');
$routes->get('taby', 'Main::taby');
$routes->get('kategorie/pridat', 'Main::pridat');
$routes->post('kategorie/pridat', 'Main::ulozit');
$routes->get('kategorie/editovat/(:num)', 'Main::editovat/$1');
$routes->post('kategorie/aktualizovat', 'Main::aktualizovat');
$routes->delete('kategorie/smazat/(:num)', 'Main::smazat/$1');
$routes->post('kategorie/smazat/(:num)', 'Main::smazat/$1');


