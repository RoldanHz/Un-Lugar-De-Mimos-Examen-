<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


#Rutas de Admin (Backend)

$routes->get('UnLugarDeMimos/login','');


#Rutas para Admin
$routes->get('UnLugarDeMimos/admin/inicio', 'Principal::inicio');

$routes->get('UnLugarDeMimos/basededatos', 'Principal::verBD');

#-------------------
#Mostrar 
$routes->get('UnLugarDeMimos/admin/vistas/clientes/mostrar', 'Admin\Cliente::mostrarcliente');
#Insertar
$routes->get('UnLugarDeMimos/admin/vistas/clientes/agregar', 'Admin\Cliente::agregarcliente');
$routes->post('UnLugarDeMimos/admin/vistas/clientes/agregar', 'Admin\Cliente::agregarcliente');
#Buscar
$routes->get('UnLugarDeMimos/admin/vistas/clientes/buscar', 'Admin\Cliente::buscarcliente');
#ditar
$routes->get('UnLugarDeMimos/admin/vistas/clientes/editar/(:num)',  'Admin\Cliente::editarcliente/$1');
#Eliminar desde Mostrar
$routes->get('UnLugarDeMimos/clientes/eliminar/(:num)', 'Admin\Cliente::eliminarcliente/$1');
#Insetar modificaciones desde Editar
$routes->post('UnLugarDeMimos/actclientes','Admin\Cliente::actualizarcliente');


#-------------------
$routes->get('UnLugarDeMimos/admin/vistas/cuidados/mostrar', 'Admin\Cuidado::mostrarcuidado');
 $routes->get('UnLugarDeMimos/admin/vistas/cuidados/agregar', 'Admin\Cuidado::agregarcuidado');
$routes->post('UnLugarDeMimos/admin/vistas/cuidados/agregar', 'Admin\Cuidado::agregarcuidado');
$routes->get('UnLugarDeMimos/admin/vistas/cuidados/buscar',  'Admin\Cuidado::buscarcuidado');
$routes->get('UnLugarDeMimos/admin/vistas/cuidados/editar/(:num)',  'Admin\Cuidado::editarcuidado/$1');
$routes->get('UnLugarDeMimos/cuidados/eliminar/(:num)', 'Admin\Cuidado::eliminarcuidado/$1');
$routes->post('UnLugarDeMimos/actcuidado','Admin\Cuidado::actualizarcuidado');
#-------------------
$routes->get('UnLugarDeMimos/admin/vistas/dietas/mostrar', 'Admin\Dieta::mostrardieta');
$routes->get('UnLugarDeMimos/admin/vistas/dietas/agregar', 'Admin\Dieta::agregardieta');
$routes->post('UnLugarDeMimos/admin/vistas/dietas/agregar', 'Admin\Dieta::agregardieta');
$routes->get('UnLugarDeMimos/admin/vistas/dietas/buscar',  'Admin\Dieta::buscardieta');
$routes->get('UnLugarDeMimos/admin/vistas/dietas/editar/(:num)',  'Admin\Dieta::editardieta/$1');
$routes->get('UnLugarDeMimos/dietas/eliminar/(:num)', 'Admin\Dieta::eliminardieta/$1');
$routes->post('UnLugarDeMimos/actdieta','Admin\Dieta::actualizardieta');
#-------------------
$routes->get('UnLugarDeMimos/admin/vistas/especies/mostrar', 'Admin\Especie::mostrarespecie');
$routes->get('UnLugarDeMimos/admin/vistas/especies/agregar', 'Admin\Especie::agregarespecie');
$routes->post('UnLugarDeMimos/admin/vistas/especies/agregar', 'Admin\Especie::agregarespecie');
$routes->get('UnLugarDeMimos/admin/vistas/especies/buscar',  'Admin\Especie::buscarespecie');
$routes->get('UnLugarDeMimos/admin/vistas/especies/editar/(:num)',  'Admin\Especie::editarespecie/$1');
$routes->get('UnLugarDeMimos/especies/eliminar/(:num)', 'Admin\Especie::eliminarespecie/$1');
$routes->post('UnLugarDeMimos/actespecie','Admin\Especie::actualizarespecie');
#-------------------
$routes->get('UnLugarDeMimos/admin/vistas/mascotas/mostrar', 'Admin\Mascota::mostrarmascota');
$routes->get('UnLugarDeMimos/admin/vistas/mascotas/agregar', 'Admin\Mascota::agregarmascota');
$routes->post('UnLugarDeMimos/admin/vistas/mascotas/agregar', 'Admin\Mascota::agregarmascota');
$routes->get('UnLugarDeMimos/admin/vistas/mascotas/buscar',  'Admin\Mascota::buscarmascota');
$routes->get('UnLugarDeMimos/admin/vistas/mascotas/editar/(:num)',  'Admin\Mascota::editarmascota/$1');
$routes->get('UnLugarDeMimos/mascotas/eliminar/(:num)', 'Admin\Mascota::eliminarmascota/$1');
$routes->post('UnLugarDeMimos/actmascota','Admin\Mascota::actualizarmascota');
#-------------------
$routes->get('UnLugarDeMimos/admin/vistas/razas/mostrar', 'Admin\Raza::mostrarraza');
$routes->get('UnLugarDeMimos/admin/vistas/razas/agregar', 'Admin\Raza::agregarraza');
$routes->post('UnLugarDeMimos/admin/vistas/razas/agregar', 'Admin\Raza::agregarraza');
$routes->get('UnLugarDeMimos/admin/vistas/razas/buscar', 'Admin\Raza::buscarraza');
$routes->get('UnLugarDeMimos/admin/vistas/razas/editar/(:num)',  'Admin\Raza::editarraza/$1');
$routes->get('UnLugarDeMimos/razas/eliminar/(:num)', 'Admin\Raza::eliminarraza/$1');
$routes->post('UnLugarDeMimos/actraza','Admin\Raza::actualizarraza');
#-------------------
$routes->get('UnLugarDeMimos/admin/vistas/veterinarios/mostrar', 'Admin\Veterinario::mostrarveterinario');
$routes->get('UnLugarDeMimos/admin/vistas/veterinarios/agregar', 'Admin\Veterinario::agregarveterinario');
$routes->post('UnLugarDeMimos/admin/vistas/veterinarios/agregar', 'Admin\Veterinario::agregarveterinario');
$routes->get('UnLugarDeMimos/admin/vistas/veterinarios/buscar',  'Admin\Veterinario::buscarveterinario');
$routes->get('UnLugarDeMimos/admin/vistas/veterinarios/editar/(:num)',  'Admin\Veterinario::editarveterinario/$1');
$routes->get('UnLugarDeMimos/veterinarios/eliminar/(:num)', 'Admin\Veterinario::eliminarveterinario/$1');
$routes->post('UnLugarDeMimos/actveterinario','Admin\Veterinario::actualizarveterinario');





#Rutas para Cliente
$routes->get('UnLugarDeMimos/cliente/inicio', 'Cliente::inicio');


