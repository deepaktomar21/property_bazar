<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\HomeController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\RequireController;
use App\Http\Controllers\BrokerController;
use App\Http\Controllers\HotDealController;
use App\Http\Controllers\HomeLoanController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MyRequireController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\BuilderController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\broker\BrokerDashBoardController;
use App\Http\Controllers\buyer\BuyerDashBoardController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\requirement\RequirementDashBoardController;
use App\Http\Controllers\seller\SellerDashBoardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.login');
});


Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => 'admin.guest'], function () {

        Route::get('/register', [UserController::class, 'index'])->name('admin.register');

        Route::post('/user_registered', [UserController::class, 'create'])->name('registered');


        Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('/authenticate', [AdminLoginController::class, 'authenticate'])->name('authenticate');
    });

    Route::group(['middleware' => 'admin.auth'], function () {

        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

        Route::get('/logout', [HomeController::class, 'logout'])->name('admin.logout');
    });


    Route::get('/select', [UserController::class, 'select'])->name('admin.user.select');
    Route::get('admin.select.create', [UserController::class, 'create'])->name('admin.select.create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/select/edit/{id}', [UserController::class, 'edit'])->name('admin.edit');
    Route::post('/select/edit/{id}', [UserController::class, 'update'])->name('admin.update');

    Route::get('select/{id}/delete', [UserController::class, 'destroy'])->name('admin.delete');
    Route::get('{select}/show', [UserController::class, 'show'])->name('admin.show');


    Route::get('/selected-user', [UserController::class, 'deleteAll'])->name('admin.deleteAll');



    // Offer/scheme

    // Display the list of offers
    Route::get('/offer', [OfferController::class, 'offerIndex'])->name('admin.offer.list');

    // Show the form to create a new offer
    Route::get('/offer/create', [OfferController::class, 'create'])->name('admin.offer.create');

    // // Store a new offer
    Route::post('/offer/create', [OfferController::class, 'offerstore'])->name('admin.offer.store');

    // Show the form to edit an existing offer
    Route::get('/offer/edit/{id}', [OfferController::class, 'offeredit'])->name('admin.offer.edit');

    // Update an existing offer
    Route::put('/offer/edit/{id}', [OfferController::class, 'offerupdate'])->name('admin.offer.update');

    // Delete an existing offer
    Route::get('/offer/{id}/delete', [OfferController::class, 'offerdestroy'])->name('admin.offer.delete');

    // Show the details of an existing offer
    Route::get('/offer/{id}/show', [OfferController::class, 'offershow'])->name('admin.offer.show');

    //Requirements

    Route::get('/inventory', [RequireController::class, 'showList'])->name('admin.require.list');
    Route::get('/inventory/create', [RequireController::class, 'create'])->name('admin.require.create');
    Route::post('/inventory/create', [RequireController::class, 'requireStore'])->name('admin.require.store');
    Route::get('/inventory/edit/{id}', [RequireController::class, 'requireEdit'])->name('admin.require.edit');
    Route::post('/inventory/edit/{id}', [RequireController::class, 'requireUpdate'])->name('admin.require.update');

    Route::get('require/{id}/delete', [RequireController::class, 'requireDestroy'])->name('admin.require.delete');
    //Route::get('{offer}/show' ,[OfferController::class,'offershow'])->name('admin.offer.show');
    Route::get('/requireshow/{id}/show', [RequireController::class, 'requireShow'])->name('admin.require.show');

    //Brokers

    Route::get('/broker', [BrokerController::class, 'showIndex'])->name('admin.broker.list');
    Route::get('admin.broker.create', [BrokerController::class, 'create'])->name('admin.broker.create');
    Route::post('create', [BrokerController::class, 'brokerStore'])->name('admin.broker.store');
    Route::get('/broker/edit/{id}', [BrokerController::class, 'brokerEdit'])->name('admin.broker.edit');
    Route::post('/broker/edit/{id}', [BrokerController::class, 'brokerUpdate'])->name('admin.broker.update');

    Route::get('broker/{id}/delete', [BrokerController::class, 'brokerDestroy'])->name('admin.broker.delete');
    Route::get('/brokershow/{id}/show', [BrokerController::class, 'brokerShow'])->name('admin.broker.show');



    //HotDeals

    Route::get('/hotdeal', [HotDealController::class, 'showDeal'])->name('admin.hotdeals.list');
    Route::get('/hotdeal/create', [HotDealController::class, 'create'])->name('admin.hotdeals.create');
    Route::post('/hotdeal/store', [HotDealController::class, 'dealStore'])->name('admin.hotdeals.store');
    Route::get('/hotdeal/edit/{id}', [HotDealController::class, 'dealEdit'])->name('admin.hotdeals.edit');
    Route::patch('/hotdeal/update/{id}', [HotDealController::class, 'updateStatus'])->name('admin.hotdeals.updateStatus');
    Route::get('/hotdeal/delete/{id}', [HotDealController::class, 'dealDestroy'])->name('admin.hotdeals.delete');
    Route::get('/hotdeal/show/{id}', [HotDealController::class, 'dealShow'])->name('admin.hotdeals.show');
    Route::get('/hotdeal/delete-multiple', [HotDealController::class, 'deleteAll'])->name('admin.hotdeals.deleteMultiple');


    Route::get('/home_loans', [HomeLoanController::class, 'homeIndex'])->name('admin.home_loan.list');
    Route::get('/home_loans/apply', [HomeLoanController::class, 'apply'])->name('admin.home_loan.create');
    Route::post('/home_loans/store', [HomeLoanController::class, 'homeStore'])->name('admin.home_loan.store');
    Route::get('/home_loans/edit/{id}', [HomeLoanController::class, 'homeEdit'])->name('admin.home_loan.edit');
    Route::post('/home_loans/update/{id}', [HomeLoanController::class, 'homeUpdate'])->name('admin.home_loan.update');
    Route::get('/home_loans/delete/{id}', [HomeLoanController::class, 'homeDestroy'])->name('admin.home_loan.delete');
    Route::get('/home_loans/show/{id}', [HomeLoanController::class, 'homeShow'])->name('admin.home_loan.show');



    Route::get('/clients', [ClientController::class, 'clientIndex'])->name('admin.client.list');
    Route::get('/clients/add', [ClientController::class, 'clientAdd'])->name('admin.client.create');
    Route::post('/clients/store', [ClientController::class, 'clientStore'])->name('admin.client.store');
    Route::get('/clients/edit/{id}', [ClientController::class, 'clientEdit'])->name('admin.client.edit');
    Route::post('/clients/update/{id}', [ClientController::class, 'clientUpdate'])->name('admin.client.update');
    Route::get('/clients/delete/{id}', [ClientController::class, 'clientDestroy'])->name('admin.client.delete');
    Route::get('/clients/show/{id}', [ClientController::class, 'clientShow'])->name('admin.client.show');

    Route::get('/news', [NewsController::class, 'newsIndex'])->name('admin.news.list');
    Route::get('/news/add', [NewsController::class, 'newsAdd'])->name('admin.news.create');
    Route::post('/news/store', [NewsController::class, 'newsStore'])->name('admin.news.store');
    Route::get('/news/edit/{id}', [NewsController::class, 'newsEdit'])->name('admin.news.edit');
    Route::put('/news/update/{id}', [NewsController::class, 'newsUpdate'])->name('admin.news.update');
    Route::get('/news/delete/{id}', [NewsController::class, 'newsDestroy'])->name('admin.news.delete');
    Route::get('/news/show/{id}', [NewsController::class, 'newsShow'])->name('admin.news.show');

    // Event

    Route::get('/event', [EventController::class, 'eventIndex'])->name('admin.event.list');
    Route::get('/event/create', [EventController::class, 'eventCreate'])->name('admin.event.create');
    Route::post('/event/store', [EventController::class, 'eventStore'])->name('admin.event.store');
    Route::get('/event/edit/{id}', [EventController::class, 'eventEdit'])->name('admin.event.edit');
    Route::put('/event/update/{id}', [EventController::class, 'eventUpdate'])->name('admin.event.update');
    Route::get('/event/delete/{id}', [EventController::class, 'eventDestroy'])->name('admin.event.delete');
    Route::get('/event/show/{id}', [EventController::class, 'eventShow'])->name('admin.event.show');



    //My Require

    Route::get('/myrequire', [MyRequireController::class, 'myrequireIndex'])->name('admin.myrequire.list');
    Route::get('/myrequire/create', [MyRequireController::class, 'myrequireAdd'])->name('admin.myrequire.create');
    Route::post('/myrequire/store', [MyRequireController::class, 'myrequireStore'])->name('admin.myrequire.store');
    // Route::get('/myrequire/edit/{id}', [EventController::class, 'eventEdit'])->name('admin.event.edit');
    // Route::put('/myrequire/update/{id}', [EventController::class, 'eventUpdate'])->name('admin.event.update');
    Route::get('/myrequire/delete/{id}', [MyRequireController::class, 'myrequireDestroy'])->name('admin.myrequire.delete');
    Route::get('/myrequire/show/{id}', [MyRequireController::class, 'myrequireShow'])->name('admin.myrequire.show');

    // Agents

    Route::get('/agent', [AgentController::class, 'agentIndex'])->name('admin.agent.list');
    //Route::get('/agent/create' ,[AgentController::class,'agentCreate'])->name('admin.agent.create');
    Route::post('/agent', [AgentController::class, 'agentStore'])->name('admin.agent.store');
    //   Route::get('/select/edit/{id}', [UserController::class, 'edit'])->name('admin.edit');
    //  Route::post('/select/edit/{id}', [UserController::class, 'update'])->name('admin.update');

    Route::get('agent/{id}/delete', [AgentController::class, 'agentDestroy'])->name('admin.agent.delete');
    Route::get('/agent/{id}/show', [AgentController::class, 'agentShow'])->name('admin.agent.show');

    // Builder

    Route::get('/builder', [BuilderController::class, 'builderIndex'])->name('admin.builder.list');
    Route::post('/builder', [BuilderController::class, 'builderStore'])->name('admin.builder.store');
    Route::get('/builder/{id}/delete', [BuilderController::class, 'builderDestroy'])->name('admin.builder.delete');
    Route::get('/builder/{id}/show', [BuilderController::class, 'builderShow'])->name('admin.builder.show');



    //bookmark
    Route::get('/bookmark', [BookmarkController::class, 'bookmarkIndex'])->name('admin.bookmark.list');
    Route::post('/bookmark', [BookmarkController::class, 'bookmarkStore'])->name('admin.bookmark.store');
    Route::get('/bookmark/{id}/delete', [BookmarkController::class, 'bookmarkDestroy'])->name('admin.bookmark.delete');
    Route::get('/bookmark/{id}/show', [BookmarkController::class, 'bookmarkShow'])->name('admin.bookmark.show');



    // Register User Agent Builder Owner Seller Buyer

    Route::get('/register', [RegisterController::class, 'regIndex'])->name('admin.userregister.list');
    //Route::post('/register', [RegisterController::class, 'store'])->name('admin.userregister.create');
    Route::get('/register/{id}', [RegisterController::class, 'regShow'])->name('admin.userregister.show');
    Route::delete('/register/{id}', [RegisterController::class, 'regDestroy'])->name('admin.userregister.delete');
    //Route::delete('/register', [RegisterController::class, 'deleteAll'])->name('admin.deleteAll');


    //Buyer

    Route::get('/buyerregister', [RegisterController::class, 'buyerIndex'])->name('admin.userregister.buyerlist');
    //Route::post('/register', [RegisterController::class, 'store'])->name('admin.userregister.create');
    Route::get('/buyerregister/{id}', [RegisterController::class, 'buyerShow'])->name('admin.userregister.buyershow');
    Route::delete('/buyerregister/{id}', [RegisterController::class, 'buyerDestroy'])->name('admin.userregister.buyerdelete');
    //Route::delete('/register', [RegisterController::class, 'deleteAll'])->name('admin.deleteAll');


    //Seller

    Route::get('/sellerregister', [RegisterController::class, 'sellerIndex'])->name('admin.userregister.sellerlist');
    //Route::post('/register', [RegisterController::class, 'store'])->name('admin.userregister.create');
    Route::get('/sellerregister/{id}', [RegisterController::class, 'sellerShow'])->name('admin.userregister.sellershow');
    Route::delete('/sellerregister/{id}', [RegisterController::class, 'sellerDestroy'])->name('admin.userregister.sellerdelete');
    //Route::delete('/register', [RegisterController::class, 'deleteAll'])->name('admin.deleteAll');

    //Owner
    Route::get('/ownerregister', [RegisterController::class, 'ownerIndex'])->name('admin.userregister.ownerlist');
    //Route::post('/register', [RegisterController::class, 'store'])->name('admin.userregister.create');
    Route::get('/ownerregister/{id}', [RegisterController::class, 'ownerShow'])->name('admin.userregister.ownershow');
    Route::delete('/ownerregister/{id}', [RegisterController::class, 'ownerDestroy'])->name('admin.userregister.ownerdelete');
    //Route::delete('/register', [RegisterController::class, 'deleteAll'])->name('admin.deleteAll');

    // Agent
    Route::get('/agentregister', [RegisterController::class, 'agentIndex'])->name('admin.userregister.agentlist');
    //Route::post('/register', [RegisterController::class, 'store'])->name('admin.userregister.create');
    Route::get('/agentregister/{id}', [RegisterController::class, 'agentShow'])->name('admin.userregister.agentshow');
    Route::delete('/agentregister/{id}', [RegisterController::class, 'agentDestroy'])->name('admin.userregister.agentdelete');
    //Route::delete('/register', [RegisterController::class, 'deleteAll'])->name('admin.deleteAll');

    // Builder
    Route::get('/builderregister', [RegisterController::class, 'builderIndex'])->name('admin.userregister.builderlist');
    //Route::post('/register', [RegisterController::class, 'store'])->name('admin.userregister.create');
    Route::get('/builderregister/{id}', [RegisterController::class, 'builderShow'])->name('admin.userregister.buildershow');
    Route::delete('/builderregister/{id}', [RegisterController::class, 'builderDestroy'])->name('admin.userregister.builderdelete');
    //Route::delete('/register', [RegisterController::class, 'deleteAll'])->name('admin.deleteAll');


    Route::get('notificationindex', [NotificationController::class, 'index'])->name('notificationindex');
    // Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // Route::get('/broker/dashboard', [BrokerController::class, 'dashboard'])->name('broker.dashboard');
    // Route::get('/seller/dashboard', [SellerController::class, 'dashboard'])->name('seller.dashboard');
    // Route::get('/buyer/dashboard', [BuyerController::class, 'dashboard'])->name('buyer.dashboard');
    // Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');

});


Route::get('/broker/dashboard', [BrokerDashBoardController::class, 'dashboard'])->name('broker.dashboard');
Route::get('/broker/logout', [BrokerDashBoardController::class, 'logout'])->name('broker.logout');


//Broker-Management

Route::get('/broker/management', [BrokerDashBoardController::class, 'BrokerList'])->name('broker.management');
Route::get('/broker/management/{id}/show', [BrokerDashBoardController::class, 'BrokerShow'])->name('broker.management.show');



///Broker-offer
Route::get('/broker/offers', [BrokerDashBoardController::class, 'BrokerOfferIndex'])->name('broker.offers');
Route::get('/broker/offers/{id}/show', [BrokerDashBoardController::class, 'BrokerOfferShow'])->name('broker.offers.show');


///Broker-requiremenet
Route::get('/broker/requirements', [BrokerDashBoardController::class, 'BrokerRequirementIndex'])->name('broker.requirements');
Route::get('/broker/requirements/{id}/show', [BrokerDashBoardController::class, 'BrokerRequirementShow'])->name('broker.requirements.show');






//Buyer-dashboard-panel
Route::get('/buyer/dashboard', [BuyerDashBoardController::class, 'dashboard'])->name('buyer.dashboard');
Route::get('/buyer/logout', [BuyerDashBoardController::class, 'logout'])->name('buyer.logout');

//Buyer-management

Route::get('/buyer/management', [BuyerDashBoardController::class, 'BuyerList'])->name('buyer.management');
Route::get('/buyer/management/{id}/show', [BuyerDashBoardController::class, 'BuyerShow'])->name('buyer.management.show');



///Buyer-offer
Route::get('/buyer/offers', [BuyerDashBoardController::class, 'BuyerOfferIndex'])->name('buyer.offers');
Route::get('/buyer/offers/{id}/show', [BuyerDashBoardController::class, 'BrokerOfferShow'])->name('buyer.offers.show');


///Buyer-requirements
Route::get('/buyer/requirements', [BuyerDashBoardController::class, 'BuyerRequirementIndex'])->name('buyer.requirements');
Route::get('/buyer/requirements/{id}/show', [BuyerDashBoardController::class, 'BuyerRequirementShow'])->name('buyer.requirements.show');









//seller-dashboard-panel
Route::get('/seller/dashboard', [SellerDashBoardController::class, 'dashboard'])->name('seller.dashboard');
Route::get('/seller/logout', [SellerDashBoardController::class, 'logout'])->name('seller.logout');

//seller-management

Route::get('/seller/management', [SellerDashBoardController::class, 'BuyerList'])->name('seller.management');
Route::get('/seller/management/{id}/show', [SellerDashBoardController::class, 'BuyerShow'])->name('seller.management.show');



///seller-offer
Route::get('/seller/offers', [SellerDashBoardController::class, 'BuyerOfferIndex'])->name('seller.offers');
Route::get('/seller/offers/{id}/show', [SellerDashBoardController::class, 'BrokerOfferShow'])->name('seller.offers.show');
