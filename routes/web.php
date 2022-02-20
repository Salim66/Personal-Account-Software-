<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\DailyExpenseController;
use App\Http\Controllers\DailyIncomeController;
use App\Http\Controllers\MainInvestmentController;
use App\Models\DailyExpense;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Admin Logout
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Business All Routes
Route::get('/add-business-name', [BusinessController::class, 'addBusinessNamePage'])->name('add.business.name');
Route::post('/store-business-name', [BusinessController::class, 'businessStore'])->name('business.store');
Route::get('/edit-business-name/{id}', [BusinessController::class, 'businessEdit'])->name('business.edit');
Route::post('/update-business-name/{id}', [BusinessController::class, 'businessUpdate'])->name('business.update');
Route::get('/delete-business-name/{id}', [BusinessController::class, 'businessDelete'])->name('business.delete');

// Main Investment All Routes
Route::get('/add-main-investment', [MainInvestmentController::class, 'addMainInvestmentPage'])->name('add.main.investment');
Route::post('/store-main-investment', [MainInvestmentController::class, 'investmentStore'])->name('investment.store');
Route::get('/edit-main-investment/{id}', [MainInvestmentController::class, 'investmentEdit'])->name('investment.edit');
Route::post('/update-main-investment', [MainInvestmentController::class, 'investmentUpdate'])->name('investment.update');
Route::post('/delete-main-investment', [MainInvestmentController::class, 'investmentDelete'])->name('investment.delete');

// Daily Expense All Routes
Route::get('/add-dailey-expense', [DailyExpenseController::class, 'addDailyExpensePage'])->name('add.daily.expense');
Route::post('/store-dailey-expense', [DailyExpenseController::class, 'expenseStore'])->name('expense.store');
Route::get('/edit-dailey-expense/{id}', [DailyExpenseController::class, 'expenseEdit'])->name('expense.edit');
Route::post('/update-dailey-expense', [DailyExpenseController::class, 'expenseUpdate'])->name('expense.update');
Route::post('/delete-dailey-expense', [DailyExpenseController::class, 'expenseDelete'])->name('expense.delete');

// Daily Income All Routes
Route::get('/add-dailey-income', [DailyIncomeController::class, 'addDailyIncomePage'])->name('add.daily.income');
Route::post('/store-dailey-income', [DailyIncomeController::class, 'incomeStore'])->name('income.store');
Route::get('/edit-dailey-income/{id}', [DailyIncomeController::class, 'incomeEdit'])->name('income.edit');
Route::post('/update-dailey-income', [DailyIncomeController::class, 'incomeUpdate'])->name('income.update');
Route::post('/delete-dailey-income', [DailyIncomeController::class, 'incomeDelete'])->name('income.delete');
