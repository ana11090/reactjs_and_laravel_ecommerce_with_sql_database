<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthenticationController;
use App\Http\Controllers\User\ForgetController;
use App\Http\Controllers\User\ResetController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RecomandationController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

//Login Route
Route::post('/login', [AuthenticationController::class, 'Login']);
Route::post('/register', [AuthenticationController::class, 'Register']);

// Forget Password Routes 
Route::post('/forgotpassword',[ForgetController::class, 'ForgetPassword']);
Route::post('/resetpassword',[ResetController::class, 'ResetPassword']);

// Current User Route 
Route::get('/user',[UserController::class, 'User'])->middleware('auth:api');

// Visitator Details
Route::get('/session/details',[SessionController::class, 'SessionDetails']);

// Contact Get information from ReactJS
Route::post('/postcontact',[ContactController::class, 'ContactUserGetInfo']);
Route::post('/design/own',[ContactController::class, 'DesignYourOwnAPI']);

// Products 
Route::get('/all/products',[ProductController::class, 'AllProductsAPI']);

Route::get('/all/rings',[ProductController::class, 'AllRingsAPI']);
Route::get('/all/earrings',[ProductController::class, 'AllEarringsAPI']);
Route::get('/all/necklace',[ProductController::class, 'AllNecklaceAPI']);
Route::get('/all/bracelet',[ProductController::class, 'AllBraceletAPI']);
Route::get('/all/tiara',[ProductController::class, 'AllTiaraAPI']);
Route::get('/all/set',[ProductController::class, 'AllSetAPI']);
Route::get('/all/bookmark',[ProductController::class, 'AllBookmarkAPI']);

Route::get('/table/{id}',[ProductController::class, 'TableProductsAPI']);
Route::get('/products/details/{id}',[ProductController::class, 'ProductsDetailsAPI']);
Route::get('/products/reccomandation/{id}',[RecomandationController::class, 'RecomandationAPI']);
//Inventory
Route::get('/sizes',[ProductController::class, 'InventoryAPI']);

//Wishlist
Route::post('/wishlist',[WishlistController::class, 'AddWishlist']);
Route::post('/wishlist/outofstock',[WishlistController::class, 'OutOfStock']);
Route::get('/wishlist/view/{id}',[WishlistController::class, 'ViewWishlistAPI']);
//Cart
Route::post('/addtocart',[CartController::class, 'AddToCartAPI']);
Route::get('/clientcart/{id}',[CartController::class, 'FinalCartViewAPI']);
Route::get('/prices',[CartController::class, 'PricesAPI']);
Route::post('/piece/minus/{id}',[CartController::class, 'PieceMinusAPI']);
Route::post('/piece/plus/{id}',[CartController::class, 'PiecePlusAPI']);
Route::post('/delete/cart/{id}',[CartController::class, 'DeleteProductCartAPI']);
Route::post('/confirm/cart/{id}',[CartController::class, 'ConfirmOrderCartAPI']);

//discount
Route::get('/discounts',[CartController::class, 'GetDiscountsAPI']);
Route::post('/discounts/{id}',[CartController::class, 'CartDiscountsAPI']);

//ClientAccountAPI
Route::get('/client',[ClientController::class, 'ClientAccountAPI']);
Route::get('/client/cart/orders/{id}',[ClientController::class, 'OrdersAPI']);
Route::get('/client/cart/returns/{id}',[ClientController::class, 'ReturnsRequestAPI']);
Route::get('/client/cart/orders/view/{id}',[ClientController::class, 'ViewOrderAPI']);
Route::get('/client/return/orders/view/{id}',[ClientController::class, 'ReturnsAPI']);
Route::post('/order/request/{id}',[ClientController::class, 'ReturnRequestAPI']);

//Client personal info
Route::post('/editpersonal',[ClientController::class, 'EditClientPersonalInfo']);

//Client reviews
Route::post('/add/review/{id}',[ClientController::class, 'AddReview']);
Route::get('/view/review/product/{id}',[ClientController::class, 'ProductReviews']);

//rings
    //shape
Route::get('/all/rings/shape',[ProductController::class, 'AllShapeRingsAPI']);
Route::get('/all/rings/shape/princess',[ProductController::class, 'AllPrincessRingsAPI']);
Route::get('/all/rings/shape/marquise',[ProductController::class, 'AllMarquiseRingsAPI']);
Route::get('/all/rings/shape/round',[ProductController::class, 'AllRoundRingsAPI']);
Route::get('/all/rings/shape/cushion',[ProductController::class, 'AllCushionRingsAPI']);
Route::get('/all/rings/shape/pearl',[ProductController::class, 'AllPearlRingsAPI']);
Route::get('/all/rings/shape/nevette',[ProductController::class, 'AllNevetteRingsAPI']);
Route::get('/all/rings/shape/square',[ProductController::class, 'AllSquareRingsAPI']);
Route::get('/all/rings/shape/brilian',[ProductController::class, 'AllBrilianRingsAPI']);
Route::get('/all/rings/shape/scrison',[ProductController::class, 'AllScrisonRingsAPI']);
Route::get('/all/rings/shape/emerald',[ProductController::class, 'AllEmeraldRingsAPI']);
Route::get('/all/rings/shape/radiant',[ProductController::class, 'AllRadiantRingsAPI']);
Route::get('/all/rings/shape/oval',[ProductController::class, 'AllOvalRingsAPI']);
Route::get('/all/rings/shape/asscher',[ProductController::class, 'AllAsscherRingsAPI']);
Route::get('/all/rings/shape/other',[ProductController::class, 'AllOtherRingsAPI']);

    //material
Route::get('/all/rings/material/gold',[ProductController::class, 'GoldRingsAPI']);
Route::get('/all/rings/material/whitegold',[ProductController::class, 'WhiteGoldRingsAPI']);
Route::get('/all/rings/material/silver',[ProductController::class, 'SilverRingsAPI']);
Route::get('/all/rings/material/platinum',[ProductController::class, 'PlatinumRingsAPI']);

    //stone
Route::get('/all/rings/diamont',[ProductController::class, 'DiamondRingsAPI']);
Route::get('/all/rings/gemstone',[ProductController::class, 'GemstoneRingsAPI']);
Route::get('/all/rings/without/stone',[ProductController::class, 'WithoutStoneRingsAPI']);

    //band
Route::get('/all/rings/band/simple',[ProductController::class, 'SimpleBandAPI']);
Route::get('/all/rings/band/bead',[ProductController::class, 'BeadBandAPI']);
Route::get('/all/rings/band/channel',[ProductController::class, 'ChannelBandAPI']);
Route::get('/all/rings/band/rension',[ProductController::class, 'RensionBandAPI']);
Route::get('/all/rings/band/bar',[ProductController::class, 'BarBandAPI']);
Route::get('/all/rings/band/other',[ProductController::class, 'OtherBandRingsAPI']);

    //material
Route::get('/all/rings/lock/gold',[ProductController::class, 'GoldRingsAPI']);
Route::get('/all/rings/lock/whitegold',[ProductController::class, 'WhiteGoldRingsAPI']);
Route::get('/all/rings/lock/silver',[ProductController::class, 'SilverRingsAPI']);
Route::get('/all/rings/lock/platinum',[ProductController::class, 'PlatinumRingsAPI']);

    //special
Route::get('/all/rings/special/engagement',[ProductController::class, 'EngagementRingsAPI']);
Route::get('/all/rings/special/wedding',[ProductController::class, 'WeddingRingsAPI']);
Route::get('/all/rings/special/promise',[ProductController::class, 'PromiseRingsAPI']);
Route::get('/all/rings/gifts',[ProductController::class, 'EngagementRingsAPI']);

    //collection
Route::get('/all/rings/collection/Tarot',[ProductController::class, 'TarotRingsAPI']);
Route::get('/all/rings/collection/Mystic',[ProductController::class, 'MysticRingsAPI']);
Route::get('/all/rings/collection/folklore',[ProductController::class, 'FolkloreRingsAPI']);

//earrings
    //shape
Route::get('/all/earrings/shape',[ProductController::class, 'AllShapeEarringsAPI']);
Route::get('/all/earrings/shape/princess',[ProductController::class, 'AllPrincessEarringsAPI']);
Route::get('/all/earrings/shape/marquise',[ProductController::class, 'AllMarquiseEarringsAPI']);
Route::get('/all/earrings/shape/round',[ProductController::class, 'AllRoundEarringsAPI']);
Route::get('/all/earrings/shape/cushion',[ProductController::class, 'AllCushionEarringsAPI']);
Route::get('/all/earrings/shape/pearl',[ProductController::class, 'AllPearlEarringsAPI']);
Route::get('/all/earrings/shape/nevette',[ProductController::class, 'AllNevetteEarringsAPI']);
Route::get('/all/earrings/shape/square',[ProductController::class, 'AllSquareEarringsAPI']);
Route::get('/all/earrings/shape/brilian',[ProductController::class, 'AllBrilianEarringsAPI']);
Route::get('/all/earrings/shape/scrison',[ProductController::class, 'AllScrisonEarringsAPI']);
Route::get('/all/earrings/shape/emerald',[ProductController::class, 'AllEmeraldEarringsAPI']);
Route::get('/all/earrings/shape/radiant',[ProductController::class, 'AllRadiantEarringsAPI']);
Route::get('/all/earrings/shape/oval',[ProductController::class, 'AllOvalEarringsAPI']);
Route::get('/all/earrings/shape/asscher',[ProductController::class, 'AllAsscherEarringsAPI']);
Route::get('/all/earrings/shape/other',[ProductController::class, 'AllOtherEarringsAPI']);

    //material
Route::get('/all/earrings/material/gold',[ProductController::class, 'GoldEarringsAPI']);
Route::get('/all/earrings/material/whitegold',[ProductController::class, 'WhiteGoldEarringsAPI']);
Route::get('/all/earrings/material/silver',[ProductController::class, 'SilverEarringsAPI']);
Route::get('/all/earrings/material/platinum',[ProductController::class, 'PlatinumEarringsAPI']);

    //stone
Route::get('/all/earrings/diamont',[ProductController::class, 'DiamondEarringsAPI']);
Route::get('/all/earrings/gemstone',[ProductController::class, 'GemstoneEarringsAPI']);
Route::get('/all/earrings/without/stone',[ProductController::class, 'WithoutStoneEarringsAPI']);

    //lock
Route::get('/all/earrings/lock/hinged',[ProductController::class, 'HingedEarringsAPI']);
Route::get('/all/earrings/lock/latch',[ProductController::class, 'LatchEarringsAPI']);
Route::get('/all/earrings/lock/cuff',[ProductController::class, 'CuffEarringsAPI']);
Route::get('/all/earrings/lock/another',[ProductController::class, 'AnotherLockEarringsAPI']);
Route::get('/all/earrings/lock/fish',[ProductController::class, 'FishEarringsAPI']);

    //collection
Route::get('/all/earrings/collection/Tarot',[ProductController::class, 'TarotEarringsAPI']);
Route::get('/all/earrings/collection/Mystic',[ProductController::class, 'MysticEarringsAPI']);
Route::get('/all/earrings/collection/folklore',[ProductController::class, 'FolkloreEarringsAPI']);

//necklaces
    //shape
Route::get('/all/necklaces/shape',[ProductController::class, 'AllShapeNecklacesAPI']);
Route::get('/all/necklaces/shape/princess',[ProductController::class, 'AllPrincessNecklacesAPI']);
Route::get('/all/necklaces/shape/marquise',[ProductController::class, 'AllMarquiseNecklacesAPI']);
Route::get('/all/necklaces/shape/round',[ProductController::class, 'AllRoundNecklacesAPI']);
Route::get('/all/necklaces/shape/cushion',[ProductController::class, 'AllCushionNecklacesAPI']);
Route::get('/all/necklaces/shape/pearl',[ProductController::class, 'AllPearlNecklacesAPI']);
Route::get('/all/necklaces/shape/nevette',[ProductController::class, 'AllNevetteNecklacesAPI']);
Route::get('/all/necklaces/shape/square',[ProductController::class, 'AllSquareNecklacesAPI']);
Route::get('/all/necklaces/shape/brilian',[ProductController::class, 'AllBrilianNecklacesAPI']);
Route::get('/all/necklaces/shape/scrison',[ProductController::class, 'AllScrisonNecklacesAPI']);
Route::get('/all/necklaces/shape/emerald',[ProductController::class, 'AllEmeraldNecklacesAPI']);
Route::get('/all/necklaces/shape/radiant',[ProductController::class, 'AllRadiantNecklacesAPI']);
Route::get('/all/necklaces/shape/oval',[ProductController::class, 'AllOvalNecklacesAPI']);
Route::get('/all/necklaces/shape/asscher',[ProductController::class, 'AllAsscherNecklacesAPI']);
Route::get('/all/necklaces/shape/other',[ProductController::class, 'AllOtherNecklacesAPI']);

    //material
Route::get('/all/necklaces/material/gold',[ProductController::class, 'GoldNecklacesAPI']);
Route::get('/all/necklaces/material/whitegold',[ProductController::class, 'WhiteGoldNecklacesAPI']);
Route::get('/all/necklaces/material/silver',[ProductController::class, 'SilverNecklacesAPI']);
Route::get('/all/necklaces/material/platinum',[ProductController::class, 'PlatinumNecklacesAPI']);

    //stone
Route::get('/all/necklaces/diamont',[ProductController::class, 'DiamondNecklacesAPI']);
Route::get('/all/necklaces/gemstone',[ProductController::class, 'GemstoneNecklacesAPI']);
Route::get('/all/necklaces/without/stone',[ProductController::class, 'WithoutStoneNecklacesAPI']);

        //special
Route::get('/all/necklaces/special/gift',[ProductController::class, 'GiftNecklacesAPI']);
    
        //collection
Route::get('/all/necklaces/collection/Tarot',[ProductController::class, 'TarotNecklacesAPI']);
Route::get('/all/necklaces/collection/Mystic',[ProductController::class, 'MysticNecklacesAPI']);
Route::get('/all/necklaces/collection/folklore',[ProductController::class, 'FolkloreNecklacesAPI']);