<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\kanbancardTool;
use App\Http\Controllers\finanace;

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
// admin route 

Route::prefix('admin')->group(function (){
    Route::get('/login',[AdminController::class, 'Index'])->name('login_from');
    Route::get('/login/owner',[AdminController::class, 'Login'])->name('admin.login');
    Route::get('/dashbord',[AdminController::class, 'Dashbord'])->name('admin.dashbord');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/index', function () {
        return view('index/home');
    })->name('index');

    Route::get('/', function () {
        return view('index/home');
    });

    //task
    Route::get('/Task', [TaskController::class, 'index'])->name('Task');
    Route::get('/Task-shedule', [TaskController::class, 'taskShedule'])->name('Task-shedule');
    Route::post('/taskSheadule', [TaskController::class, 'taskSheadule'])->name('taskSheadule');
    Route::post('/deleteTask', [TaskController::class, 'deleteTask'])->name('deleteTask');
    Route::post('/changeStstus', [TaskController::class, 'changeStstus'])->name('changeStstus');
    Route::get('/Task-monitor', [TaskController::class, 'TaskMonitor'])->name('Task-monitor');


    //kanban card
    Route::get('/kanban', [kanbancardTool::class, 'kanban'])->name('kanban');    
    Route::get('/kanban-cards', [kanbancardTool::class, 'kanbanCards'])->name('kanban-cards');
    Route::post('/save-progress ', [kanbancardTool::class, 'saveprogress'])->name('save-progress '); 
    
    //finnace manager
    Route::get('/finance', [finanace::class, 'index'])->name('finance');
    Route::get('/income', [finanace::class, 'income'])->name('income');
    Route::get('/expence', [finanace::class, 'expence'])->name('expence');
    Route::post('/incomeExpencesSave', [finanace::class, 'incomeExpencesSave'])->name('incomeExpencesSave'); 
    Route::post('/deleteIncomExpences', [finanace::class, 'deleteIncomExpences'])->name('deleteIncomExpences'); 
    Route::post('/editIncomExpences', [finanace::class, 'editIncomExpences'])->name('editIncomExpences'); 
    Route::get('/incomeExpencesReoprt', [finanace::class, 'incomeExpencesReoprt'])->name('incomeExpencesReoprt'); 
    
});


require __DIR__.'/auth.php';
