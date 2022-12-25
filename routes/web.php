<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use LDAP\Result;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Ejercicio 1

Route::get('/ejercicio1', function () {
    return "GET OK";
});

Route::post('/ejercicio1', function () {
    return "POST OK";
});


Route::get('/contacts', function () {
    return Response::view('/contacts');
});

Route::post('/contacts', function (Request $request) {
    return Response::json(["message" => "hola"]);
});

Route::post('/ejercicio2/a', function (Request $request) {
    return Response::json($request);
});

Route::post('/ejercicio2/b', function (Request $request) {
    if (($request->get('price')) < 0) {
        return Response::json(["message" => "Price can't be less than 0"])->setStatusCode(422);
    }
    else
    return Response::json($request);
});

Route::post('/ejercicio2/c', function (Request $request) {
    if ($request->query('discount') == "SAVE5") {
        $price = $request->get('price') * 0.95;
        $discount = 5;
        return Response::json([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $price,
            'discount' => $discount
        ]);
    }
    if ($request->query('discount') == "SAVE10") {
        $price = $request->get('price') * 0.90;
        $discount = 10;
        return Response::json([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $price,
            'discount' => $discount
        ]);
    }
    if ($request->query('discount') == "SAVE15") {
        $price = $request->get('price') * 0.85;
        $discount = 15;
        return Response::json([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $price,
            'discount' => $discount
        ]);
    }
    else {
        $discount = 0;
        return Response::json([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'discount' => $discount
        ]);
    }
    
});