<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\PolitesseController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

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
    return view('accueil');
});

Route::get('/bonjour', [PolitesseController::class, 'helloEveryone']);
Route::get('/au-revoir', [PolitesseController::class, 'goodBye']);
Route::get('/bonjour/{name}', [PolitesseController::class, 'helloSomeone']);

Route::get('/a-propos', [AboutController::class, 'index']);
Route::get('/a-propos/{user}', [AboutController::class, 'show']);

Route::get('/exercice/categories', function () {
    return view('exercice.categories', [
        'categories' => Category::all()
    ]);
});

Route::get('/exercice/categories/creer', function () {
    // Le modèle Category correspond à la table categories...
    $category = Category::create([
        'name' => 'Test'
    ]);

    return redirect('/exercice/categories');
});

Route::get('/exercice/categories/{id}', function ($id) {
    dump($id);
    $category = Category::find($id);

    return $category->name;
});
