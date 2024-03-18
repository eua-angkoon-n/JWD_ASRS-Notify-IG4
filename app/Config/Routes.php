<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/pcsb8', 'ColdChainSite::pcsb8');
$routes->get('/pcsb9', 'ColdChainSite::pcsb9');

$routes->get('/pacafrozen', 'ColdChainSite::pacafrozen');
$routes->get('/pacatemp', 'ColdChainSite::pacatemp');

$routes->get('/pacm', 'ColdChainSite::pacm');
$routes->get('/pacs', 'ColdChainSite::pacs');
$routes->get('/pact', 'ColdChainSite::pact');

$routes->get('/pcs', 'ColdChainSite::pcs');
$routes->get('/paca', 'ColdChainSite::paca');