<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dataranapController;
use App\Http\Controllers\progressController;
use App\Http\Controllers\serahberkasController;
use App\Http\Controllers\datamrController;
use App\Http\Controllers\casemixController;
use App\Http\Controllers\masterController;
use App\Http\Controllers\msuserController;
use App\Http\Controllers\cmrekapdataController;
use App\Http\Controllers\master\codegrouperController;
use App\Http\Controllers\ruangan\listbillingController;
use App\Http\Controllers\mastersistem\msroleController;
use App\Http\Controllers\mastersistem\mstuserController;
use App\Http\Controllers\dashmanajController;
use App\Http\Controllers\dashmanajemennmuController;
use App\Http\Controllers\casemix\cmlistbillingController;
use App\Http\Controllers\kasir\selisihbillingController;
use App\Http\Controllers\ruangan\historicalbillingController;

Route::any('/', function () {
    return view('login');
});
//-----------umum
route::any('/login', [loginController::class, 'index'])->name('login');
route::any('/login/cekauth', [loginController::class, 'login'])->name('fungsilogin');
route::any('/logout', [loginController::class, 'logout'])->name('logout');
Route::group(['middleware' => ['auth', 'cek_login:0,1,3']], function () {
    route::get('/dashboard', [dashboardController::class, 'index'])->name('dash');
    route::get('/dashboard/dataset', [dashboardController::class, 'dataset'])->name('dataset');
    route::any('/dashboard/datasetdiagnosa', [dashboardController::class, 'datasetdiagnosa'])->name('datasetdiagnosa');
    
});
Route::group(['middleware' => ['auth', 'cek_login:0']], function () {
    route::any('/master/unit', [masterController::class, 'index'])->name('unit');
    route::post('/master/unit/edit', [masterController::class, 'edit'])->name('editunit');
    route::any('/master/unit/add', [masterController::class, 'add'])->name('addunit');
    route::any('/master/unit/update', [masterController::class, 'update'])->name('updateunit');
    route::any('/master/unit/delete', [masterController::class, 'delete'])->name('deleteunit');
    route::any('/master/sistem/roleuser', [msroleController::class, 'index'])->name('msrole');
    route::any('/master/sistem/roleuser/add', [msroleController::class, 'add'])->name('addrole');
    route::any('/master/sistem/roleuser/parsedata', [msroleController::class, 'parsingdata'])->name('parsedata');
    route::any('/master/sistem/roleuser/updaterole', [msroleController::class, 'updaterole'])->name('updaterole');
    route::any('/master/sistem/roleuser/deleterole', [msroleController::class, 'deleterole'])->name('deleterole');
    route::any('/master/sistem/user', [mstuserController::class, 'index'])->name('msuser');
    route::any('/master/sistem/user/selrole', [mstuserController::class, 'pilihrole'])->name('pilihrole');
    route::any('/master/sistem/user/selbranch', [mstuserController::class, 'pilihbranch'])->name('pilihbranch');
    route::any('/master/sistem/user/pilihunit', [mstuserController::class, 'pilihunit'])->name('pilihunit');
    route::any('/master/sistem/user/adduser', [mstuserController::class, 'adduser'])->name('adduser');
    route::any('/master/sistem/user/parsingdatauser', [mstuserController::class, 'parsingdatauser'])->name('parsingdatauser');
    route::any('/master/sistem/user/updateuser', [mstuserController::class, 'updateuser'])->name('updateuser');
    route::any('/master/sistem/user/deleteuser', [mstuserController::class, 'deleteuser'])->name('deleteuser');  
});

Route::group(['middleware' => ['auth', 'cek_login:3']], function () {
    route::any('/listbilling', [listbillingController::class, 'index'])->name('listbilling');  
    route::any('/listbilling/datasetlistbilling/', [listbillingController::class, 'datasetlistbilling'])->name('datasetlistbilling');  
    route::any('/listbilling/parsingdatapasbil', [listbillingController::class, 'parsingdatapasbil'])->name('parsingdatapasbil');  
    route::any('/listbilling/updateina', [listbillingController::class, 'updateina'])->name('updateina'); 
    route::any('/listbilling/insertina', [listbillingController::class, 'insertina'])->name('insertina'); 
    route::any('/listbilling/selkriteriakunj', [listbillingController::class, 'selkriteriakunj'])->name('selkriteriakunj');
    route::any('/listbilling/naikkelas', [listbillingController::class, 'naikkelas'])->name('naikkelas');
    route::any('/listbilling/batalnaikkelas', [listbillingController::class, 'batalnaikkelas'])->name('batalnaikkelas');
    route::any('/historicalbilling', [historicalbillingController::class, 'index']);
    route::any('/historicalbilling/dataset', [historicalbillingController::class, 'dataset']);
});

Route::group(['middleware' => ['auth', 'cek_login:2']], function () {
    route::any('master/codegrouper', [codegrouperController::class, 'index'])->name('codegrouper');
    route::any('master/codegrouper/selicd10', [codegrouperController::class, 'selicd10'])->name('selicd10');
    route::any('master/codegrouper/selicd9', [codegrouperController::class, 'selicd9'])->name('selicd9');
    route::any('casemix/listbilling', [cmlistbillingController::class, 'index'])->name('viewcasemix');
    route::any('casemix/selbranch', [cmlistbillingController::class, 'pilihunit'])->name('cmpilihunit');
    route::any('casemix/datatable', [cmlistbillingController::class, 'datatable'])->name('cmdatatable');
    route::any('casemix/parsingdatapasbil', [cmlistbillingController::class, 'parsingdatapasbil'])->name('cmparsingdatapasbil');  
    route::any('casemix/updateina', [cmlistbillingController::class, 'updateina'])->name('cmupdateina'); 
    route::any('casemix/insertina', [cmlistbillingController::class, 'insertina'])->name('cminsertina'); 
    route::any('casemix/selkriteriakunj', [cmlistbillingController::class, 'selkriteriakunj'])->name('cmselkriteriakunj');
});

Route::group(['middleware' => ['auth', 'cek_login:0,2,3']], function () {
route::any('master/codegrouper', [codegrouperController::class, 'index'])->name('codegrouper');
route::any('master/codegrouper/selicd10', [codegrouperController::class, 'selicd10'])->name('selicd10');
route::any('master/codegrouper/selicd9', [codegrouperController::class, 'selicd9'])->name('selicd9');
route::any('master/codegrouper/kls_rwt', [codegrouperController::class, 'kls_rwt'])->name('kls_rwt');
route::any('master/codegrouper/add', [codegrouperController::class, 'savegrouper'])->name('savegrouper');
route::any('master/codegrouper/parsingdatagrouper', [codegrouperController::class, 'parsingdatagrouper'])->name('parsingdatagrouper');
route::any('master/codegrouper/updatedatamaster', [codegrouperController::class, 'updatedatamaster'])->name('updatedatamaster');
route::any('master/codegrouper/deletecodegrouper', [codegrouperController::class, 'deletecodegrouper'])->name('deletecodegrouper');
});
Route::group(['middleware' => ['auth', 'cek_login:2,4']], function () {
    route::get('/dashmanajemenrs', [dashmanajController::class, 'index'])->name('dashmanajemenrs');
    route::any('/dashmanajemenrs/datasetmrs', [dashmanajController::class, 'dataset'])->name('datasetmrs');
    route::any('/dashmanajemenrs/pilihunit', [dashmanajController::class, 'pilihunit'])->name('pilihunitmanaj');
    route::any('/dashmanajemenrs/pilihkategorichart', [dashmanajController::class, 'pilihchart'])->name('pilihchartmanaj');
    route::any('/dashmanajemenrs/datasetdiagnosamanaj', [dashmanajController::class, 'datasetdiagnosa'])->name('datasetdiagnosamanaj');
});
Route::group(['middleware' => ['auth', 'cek_login:5']], function () {
    route::get('/dashmanajemennmu', [dashmanajemennmuController::class, 'index'])->name('dashmanajemennmu');
    route::any('/dashmanajemennmu/datasetmnmu', [dashmanajemennmuController::class, 'dataset'])->name('datasetmnmu');
    route::any('/dashmanajemennmu/selbranch', [dashmanajemennmuController::class, 'pilihbranch'])->name('pilihbranchnmu');
    route::any('/dashmanajemennmu/pilihunit', [dashmanajemennmuController::class, 'pilihunit'])->name('pilihunitnmu');
    route::any('/dashmanajemennmu/notifikasi', [dashmanajemennmuController::class, 'notifikasi'])->name('notifikasi');
    route::any('/dashmanajemenrs/datasetdiagnosamanajnmu', [dashmanajemennmuController::class, 'datasetdiagnosa'])->name('datasetdiagnosamanajnmu');
});
Route::group(['middleware' => ['auth', 'cek_login:6']], function () {
    route::get('/tampilanawal', [selisihbillingController::class, 'index'])->name('indexkasir');
    route::get('/selisihbilling', [selisihbillingController::class, 'menukasir'])->name('selisihbilling');
});





// role user : 3 ruangan, 2 casemix, 0 admin, 4 manaj rs, 5 manaj nmu, 6 kasir