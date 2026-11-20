<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/tentang-kami', 'Home::about');
$routes->get('/produk-layanan', 'Home::products');
$routes->get('/kontak', 'Home::contact');
$routes->get('/gallery', 'Home::gallery');
$routes->get('/blog-detail', 'Home::blogDetail');
$routes->group('api/admin', static function ($routes) {
    // Authentication Login
    $routes->post('login', 'Admin\AuthController::login');
    $routes->post('logout', 'Admin\AuthController::logout', ['filter' => 'auth']);
    $routes->get('me', 'Admin\AuthController::me', ['filter' => 'auth']);

    $routes->group('', ['filter' => 'auth:admin'], static function ($routes) {
        // CRUD Blog
        $routes->get('blog', 'Admin\BlogController::index');
        $routes->get('blog/(:num)', 'Admin\BlogController::show/$1');
        $routes->post('blog', 'Admin\BlogController::create');
        $routes->put('blog/(:num)', 'Admin\BlogController::update/$1');
        $routes->patch('blog/(:num)', 'Admin\BlogController::update/$1');
        $routes->delete('blog/(:num)', 'Admin\BlogController::delete/$1');

        // CRUD Gallery
        $routes->get('gallery', 'Admin\GalleryController::index');
        $routes->get('gallery/(:num)', 'Admin\GalleryController::show/$1');
        $routes->post('gallery', 'Admin\GalleryController::create');
        $routes->put('gallery/(:num)', 'Admin\GalleryController::update/$1');
        $routes->patch('gallery/(:num)', 'Admin\GalleryController::update/$1');
        $routes->delete('gallery/(:num)', 'Admin\GalleryController::delete/$1');

        // CRUD Produk & Layanan
        $routes->get('products', 'Admin\ProductController::index');
        $routes->get('products/(:num)', 'Admin\ProductController::show/$1');
        $routes->post('products', 'Admin\ProductController::create');
        $routes->put('products/(:num)', 'Admin\ProductController::update/$1');
        $routes->patch('products/(:num)', 'Admin\ProductController::update/$1');
        $routes->delete('products/(:num)', 'Admin\ProductController::delete/$1');

        // CRUD Tentang Kami
        $routes->get('about', 'Admin\CompanyController::aboutIndex');
        $routes->get('about/(:num)', 'Admin\CompanyController::aboutShow/$1');
        $routes->post('about', 'Admin\CompanyController::aboutCreate');
        $routes->put('about/(:num)', 'Admin\CompanyController::aboutUpdate/$1');
        $routes->patch('about/(:num)', 'Admin\CompanyController::aboutUpdate/$1');
        $routes->delete('about/(:num)', 'Admin\CompanyController::aboutDelete/$1');

        // CRUD Profil Perusahaan
        $routes->get('company-profile', 'Admin\CompanyController::profileIndex');
        $routes->get('company-profile/(:num)', 'Admin\CompanyController::profileShow/$1');
        $routes->post('company-profile', 'Admin\CompanyController::profileCreate');
        $routes->put('company-profile/(:num)', 'Admin\CompanyController::profileUpdate/$1');
        $routes->patch('company-profile/(:num)', 'Admin\CompanyController::profileUpdate/$1');
        $routes->delete('company-profile/(:num)', 'Admin\CompanyController::profileDelete/$1');
    });
});
