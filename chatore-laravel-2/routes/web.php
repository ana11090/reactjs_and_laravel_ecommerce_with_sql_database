<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\PricingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\User\AuthenticationController;
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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
//     Route::get('/product/add', [ProductController::class, 'AddProduct']) ->name('add.product');
// })->name('dashboard');


Route::get('/product/add', [ProductController::class, 'AddProduct']) ->name('add.product');
Route::get('/product/state', [ProductController::class, 'AllProduct']) ->name('state.product');
Route::get('/logout', [AuthenticationController::class, 'Logout']) ->name('user.logout');
Route::get('/product/addinfo/{id}', [ProductController::class, 'AddInfo']);
Route::post('/product/addinfo/earings', [ProductController::class, 'AddInfoStoreEarings'])->name('store.info');
Route::post('/product/addinfo/rings', [ProductController::class, 'AddInfoStoreRings'])->name('store.info.rings');
Route::post('/product/addinfo/bracelets', [ProductController::class, 'AddInfoStoreBracelets'])->name('store.info.bracelets');
Route::post('/product/addinfo/necklaces', [ProductController::class, 'AddInfoStoreNecklaces'])->name('store.info.necklaces');
Route::post('/product/addinfo/tiaras', [ProductController::class, 'AddInfoStoreTiaras'])->name('store.info.tiaras');
Route::get('/product/earings/inventory/', [ProductController::class, 'AddInventoryEarings'])->name('add.earings');
Route::get('/product/delete/{id}', [ProductController::class, 'DeleteProduct'])->name('delete.product');
Route::get('/product/inactive/{id}', [ProductController::class, 'InactiveProduct'])->name('inactive.product');
Route::get('/product/active/{id}', [ProductController::class, 'ActiveProduct'])->name('active.product');
Route::get('/product/view', [ProductController::class, 'ViewProductsProduct'])->name('view.product');
Route::get('/product/edit/{id}', [ProductController::class, 'EditProduct'])->name('edit.product');
Route::get('/product/edit/rings/{id}', [ProductController::class, 'EditProductRings']);
Route::post('/product/edit/rings/update/{id}', [ProductController::class, 'EditProductRingsUpdate']);


//pricing
Route::get('/product/price/', [PricingController::class, 'ProductsPricing'])->name('price.products');
Route::get('/product/price/group', [PricingController::class, 'ProductsPricingProduct'])->name('price.products.product');
Route::get('/product/price/metal', [PricingController::class, 'ProductsPricingMetal'])->name('price.products.metal');
Route::get('/product/price/mainStone', [PricingController::class, 'ProductsPricingMainStone'])->name('price.products.mainStone');
Route::post('/product/price/edit', [PricingController::class, 'EditProductsPricing'])->name('edit.pricing.product');
Route::get('/discount', [PricingController::class, 'Discount'])->name('discount');
Route::post('/add/discount', [PricingController::class, 'AddDiscount'])->name('add.discount');
Route::get('discount/delete/{id}', [PricingController::class, 'DeleteDiscount']);

Route::post('/product/price/group/edit', [PricingController::class, 'EditGroupPricing'])->name('edit.pricing.group');
Route::post('/product/price/group/metal/edit', [PricingController::class, 'EditGroupPricingMetal'])->name('edit.pricing.group.metal');
Route::post('/product/price/group/gr/edit', [PricingController::class, 'EditGroupPricingGr'])->name('edit.pricing.group.metal.gr');
Route::post('/product/price/group/mainStone/edit', [PricingController::class, 'EditGroupPricingMainStone'])->name('edit.pricing.group.mainStone');
// contact messages
Route::get('/messages/clients',[ContactController::class, 'ContactMessages'])->name('see.contact');
Route::get('/send/email',[ContactController::class, 'SendEmail'])->name('send.email');
Route::post('/send/email/request',[ContactController::class, 'SendEmailRequest']);
//reviews
Route::get('/reviews/products',[ContactController::class, 'Reviews'])->name('see.reviews');

//orders
Route::get('/orders/pending',[CartController::class, 'PendingOrders'])->name('orders.pending');
Route::get('/orders/pending/confirmation/{id}',[CartController::class, 'PendingOrdersConfirmation']);
Route::get('/orders/view/{id}',[CartController::class, 'ViewOrders']);
Route::get('/orders/pending/confirmation/pending/{id}',[CartController::class, 'PendingOrdersConfirmationTableDetailsRequest']);

//orders - processing
Route::get('/orders/processing',[CartController::class, 'ProcessingOrders'])->name('orders.processing');
Route::get('/orders/processing/confirmation/{id}',[CartController::class, 'ProcessingOrdersConfirmation']);
Route::get('/orders/processing/view/{id}',[CartController::class, 'ViewProcessingOrders']);
Route::get('/orders/processing/confirmation/processing/{id}',[CartController::class, 'ProcessingOrdersConfirmationTableDetails']);

//orders - completed
Route::get('/orders/completed',[CartController::class, 'CompletedOrders'])->name('orders.completed');
Route::get('/orders/completed/view/{id}',[CartController::class, 'ViewCompletedOrders']);

//inventory
Route::get('/inventory/view',[ProductController::class, 'ViewInventory'])->name('view.inventory');
Route::get('view/product/inventory/{id}',[ProductController::class, 'ViewInventoryProduct']);
Route::post('/inventory/add',[ProductController::class, 'AddInventory'])->name('add.inventory');