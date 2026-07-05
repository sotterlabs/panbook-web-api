<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\AdminController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('print',[PrintController::class,'printExample'])->name('print.example');

Route::post('/product/list',[GeneralController::class, 'getProductList'])->name('product.list');
Route::get('/meat/list',[GeneralController::class, 'getMeatList'])->name('meat.list');
Route::get('/ingredients/list',[GeneralController::class, 'getIngredientsList'])->name('ingredients.list');
Route::get('/ingredients/list/two',[GeneralController::class, 'getIngredients2List'])->name('ingredients2.list');
Route::get('/promotions/list',[GeneralController::class, 'getPromotiones'])->name('promotions.list');
Route::get('/drinks/list',[GeneralController::class, 'getDrinksList'])->name('drinks.list');
Route::get('/clients/list',[GeneralController::class, 'getClientsList'])->name('clients.list');
Route::get('/sale/list',[GeneralController::class, 'getSaleList'])->name('sale.list');
Route::get('/mechada/equals/price',[GeneralController::class, 'getMechadaEqualsPrice'])->name('mechada.price1');
Route::get('/mechada/different/price',[GeneralController::class, 'getMechadaDifferentPrice'])->name('mechada.price2');
Route::get('/promo/equals/price',[GeneralController::class, 'getPromoIPrice'])->name('promo.equals.price');
Route::get('/promo/different/price',[GeneralController::class, 'getPromoDPrice'])->name('promo.different.price');
Route::get('/promo/individual/price',[GeneralController::class, 'getPromoIndPrice'])->name('promo.individual.price');
Route::get('/sale/total',[GeneralController::class, 'getTotalList'])->name('sale.total');
Route::post('/insert/temp',[GeneralController::class, 'insertTemp'])->name('insert.temp');
Route::post('/delete/item',[GeneralController::class, 'deleteItem'])->name('delete.item');
Route::post('/end/sale',[GeneralController::class, 'endSale'])->name('end.sale');
Route::get('/colaciones',[GeneralController::class, 'getColaciones'])->name('picza.colaciones');
Route::get('/extras',[GeneralController::class, 'getExtras'])->name('picza.extras');
Route::get('/pastas',[GeneralController::class, 'getPastas'])->name('picza.pastas');
Route::get('/precios',[GeneralController::class, 'getPrice'])->name('picza.precios');
Route::get('/precios/bebidas',[GeneralController::class, 'getPriceDrinks'])->name('picza.precios.bebidas');
Route::get('/precios/ingredients',[GeneralController::class, 'getIngredientsPrice'])->name('picza.precios.ingredientes');
Route::get('/precios/ingredients/two',[GeneralController::class, 'getIngredientsPrice2'])->name('picza.precios.ingredientes2');
Route::get('/precios/ingredients/fam',[GeneralController::class, 'getIngredientsPrice2fam'])->name('picza.precios.ingredientes2fam');
Route::get('/precios/ingredients/fam2',[GeneralController::class, 'getIngredientsPrice2famMitad'])->name('picza.precios.ingredientes2famMitad');
Route::get('/precios/colations',[GeneralController::class, 'getColationsPrice'])->name('picza.precios.colations');
Route::get('/precios/extras',[GeneralController::class, 'getExtrasPrice'])->name('picza.precios.extras');
Route::get('/precios/pastas',[GeneralController::class, 'getPastasPrice'])->name('picza.precios.pastas');
Route::get('/printers',[GeneralController::class, 'getPrinterIP'])->name('get.printer');
Route::post('/update/client',[GeneralController::class, 'updateClient'])->name('update.client');
Route::post('/create/client',[GeneralController::class, 'createClient'])->name('create.client');
Route::post('/update/ip',[GeneralController::class, 'updateIP'])->name('update.ip');
Route::get('/comanda/num',[GeneralController::class, 'getComandaNum'])->name('comanda.num');
Route::post('/comanda/update',[GeneralController::class, 'comandaNumUpdate'])->name('comanda.update');
Route::post('/comanda/reboot',[GeneralController::class, 'comandaNumReboot'])->name('comanda.reboot');
Route::get('/inventory',[GeneralController::class, 'getInventory'])->name('inventory.as');
Route::post('/update/bread',[GeneralController::class, 'updateInventorybread'])->name('update.bread');
Route::get('/drinks/table',[GeneralController::class, 'getDrinksTable'])->name('drinks.table');
Route::get('/plan/report', [AdminController::class, 'planReport'])->name('plan.report');
Route::get('/panb/res', [AdminController::class, 'panbookRes'])->name('panb.res');
Route::get('/pic/res', [AdminController::class, 'piczaRes'])->name('pic.res');
Route::get('/inv/res', [AdminController::class, 'inventario'])->name('inv.res');
Route::get('/borra/panb', [AdminController::class, 'borraPanb'])->name('borra.panb');
Route::get('/borra/picza', [AdminController::class, 'borraPicza'])->name('borra.picza');
Route::get('/panb/errased', [AdminController::class, 'panbookErrased'])->name('panb.errased');
Route::get('/picza/errased', [AdminController::class, 'piczaErrased'])->name('picza.errased');
Route::get('/users/all', [AdminController::class, 'users_list'])->name('users.all');
Route::post('/token/decode', [GeneralController::class, 'decodeToken'])->name('token');
