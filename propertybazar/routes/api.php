<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ApiController;
use App\Http\Controllers\api\UserManageController;
use App\Http\Controllers\api\OfferController;
use App\Http\Controllers\api\RequireController;
use App\Http\Controllers\api\BrokerController;
use App\Http\Controllers\api\HotDealController;
use App\Http\Controllers\api\LoanController;
use App\Http\Controllers\api\NewsController;
use App\Http\Controllers\api\EventController;
use App\Http\Controllers\api\MyRequireController;
use App\Http\Controllers\api\AgentController;
use App\Http\Controllers\api\BuilderController;
use App\Http\Controllers\api\LeadController;
use App\Http\Controllers\api\BookMarkController;













/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register',[ApiController::class,'register'])->name('register');
Route::post('login',[ApiController::class,'login'])->name('login');
Route::get('regUsers', [ApiController::class, 'getUsers']);
Route::post('user/update/{user_id}',[ApiController::class, 'userupdate']);


Route::post('logout',[ApiController::class, 'logout']);




Route::post('Userupdate', [UserManageController::class, 'Userupdate']);

Route::post('add-offers', [OfferController::class,'offerStore']);
//Route::post('update-offers', [OfferController::class,'offerUpdate']);
Route::get('getOffers', [OfferController::class,'offers']);



Route::post('requirements', [RequireController::class,'requireStore']);
Route::get('getRequirements', [RequireController::class,'getRequirements']);

Route::get('broker/offers', [RequireController::class, 'BrokerOfferIndex']);





Route::post('brokers', [BrokerController::class,'brokerStore']);
Route::get('getBrokers', [BrokerController::class,'getBrokers']);



//Route::get('deals', [HotDealController::class, 'dealIndex']);
Route::post('deals', [HotDealController::class, 'dealStore']);
Route::get('getDeals', [HotDealController::class, 'getDeals']);






Route::get('getHome-Loan', [LoanController::class, 'getLoans']);
Route::post('home-loan', [LoanController::class, 'homeStore']);

Route::get('/client', [ClientController::class, 'index']);
Route::post('client', [LoanController::class, 'clientStore']);





Route::get('getNews', [NewsController::class, 'news']);
Route::post('news', [NewsController::class, 'newsStore']);



Route::post('events/{user_id}', [EventController::class, 'eventAdd']);
Route::get('getEvents', [EventController::class,'events']);


Route::post('users', [EventController::class, 'addUser']);
Route::get('getUsers', [EventController::class, 'getUsers']);


// My Require
Route::get('/myrequires', [MyRequireController::class, 'getDescription']);
Route::post('/myrequires', [MyRequireController::class, 'store']);

//Agent
Route::post('agents', [AgentController::class, 'agentStore']);
Route::get('getAgents', [AgentController::class, 'getAgents']);

//Builder

Route::get('getBuilders', [BuilderController::class, 'getBuilders']);

Route::post('builders', [BuilderController::class, 'builderStore']);

//Lead

Route::get('leads', [LeadController::class,'index']);
Route::get('leads/{lead}', [LeadController::class,'show']);



Route::get('/getBookmarks', [BookMarkController::class, 'getBookmark']);
Route::post('/bookmarks/{user_id}', [BookMarkController::class, 'addToBookmark']);