<?php
use App\Http\Controllers\Type\controller\TypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Sector\controller\SectorController;
use App\Http\Controllers\Occupation\controller\OccupationController;
use App\Http\Controllers\User\controller\UserController;
use App\Http\Controllers\Admin\controller\AdminController;
use App\Http\Controllers\User\controller\StoreUserController;
use App\Http\Controllers\Authenticate\controller\AuthenticatedController;
use App\Http\Controllers\DetailFather\controller\DetailFatherController;
use App\Http\Controllers\DetailMother\controller\DetailMotherController;
use App\Http\Controllers\MedicalHistory\controller\MedicalHistoryController;
use App\Http\Controllers\DentalHistory\controller\DentalHistoryController;
use App\Http\Controllers\Payment\controller\PaymentController;
use App\Http\Controllers\Location\controller\LocationController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('authenticate',[AuthenticatedController::class, 'login']);

Route::group(['middleware'=>'jwt'],function(){
    Route::get('sectors',[SectorController::class, 'index']);
    Route::get('occupations',[OccupationController::class,'index']);
    Route::get('users',[UserController::class,'index']);
    Route::get('admins',[AdminController::class, 'index']);
    Route::get('user/detail/{id}',[UserController::class, 'userDetail']);
    Route::get('admin/detail/{id}',[AdminController::class, 'adminDetail']);
    Route::post('user/store', [StoreUserController::class ,'storeUser']);
    Route::put('detail-father',[DetailFatherController::class,'update']);
    Route::put('detail-mother/{user}',[DetailMotherController::class,'update']);
    Route::put('medical_history/{user}',[MedicalHistoryController::class,'update']);
    Route::get('medical_history/{user}',[MedicalHistoryController::class,'medicalHistoryDetail']);
    Route::put('dental_history/{user}',[DentalHistoryController::class,'update']);
    Route::get('dental_history/{user}',[DentalHistoryController::class,'dentalHistoryDetail']);
    Route::get('type_pays',[TypeController::class,'index']);
    //pays
    Route::post('store/pay',[PaymentController::class,'registerPay']);
    Route::get('get/pays/{user}',[PaymentController::class,'getPays']);
    Route::delete('delete/payment/{user}/pay/{pay}',[PaymentController::class,'deletePay']);
    Route::put('location',[LocationController::class,'update']);
    Route::put('sector',[SectorController::class,'update']);

});
