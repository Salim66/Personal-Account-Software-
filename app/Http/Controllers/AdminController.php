<?php

namespace App\Http\Controllers;

use App\Models\DailyExpense;
use App\Models\DailyIncome;
use App\Models\Investment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Admin Logout
     */
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    /**
     * Report Page
     */
    public function reportPage(){
        return view('report.page');
    }


    /**
     * Search Report
     */
    public function searchReport(Request $request){
        // return $request->all();
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $business_id = $request->business_id;

        // Investment
        $main_investment = 0;

        if($from_date == "Invalid date" && $business_id != null){
            $main_investment = Investment::where('business_id', $business_id)->sum('amount');
        }

        if($business_id != null && $from_date != "Invalid date"){
            $main_investment = Investment::where('business_id', $business_id)->whereBetween('created_at', [$from_date, $to_date])->sum('amount');

        }

        if($business_id == null && $from_date != "Invalid date") {
            $main_investment = Investment::whereBetween('created_at', [$from_date, $to_date])->sum('amount');
        }

        // Income
        $daily_income = 0;

        if($from_date == "Invalid date" && $business_id != null){
            $daily_income = DailyIncome::where('business_id', $business_id)->sum('amount');
        }

        if($business_id != null && $from_date != "Invalid date"){
            $daily_income = DailyIncome::where('business_id', $business_id)->whereBetween('created_at', [$from_date, $to_date])->sum('amount');

        }

        if($business_id == null && $from_date != "Invalid date") {
            $daily_income = DailyIncome::whereBetween('created_at', [$from_date, $to_date])->sum('amount');
        }

        // Expense
        $daily_expense = 0;

        if($from_date == "Invalid date" && $business_id != null){
            $daily_expense = DailyExpense::where('business_id', $business_id)->sum('amount');
        }

        if($business_id != null && $from_date != "Invalid date"){
            $daily_expense = DailyExpense::where('business_id', $business_id)->whereBetween('created_at', [$from_date, $to_date])->sum('amount');

        }

        if($business_id == null && $from_date != "Invalid date") {
            $daily_expense = DailyExpense::whereBetween('created_at', [$from_date, $to_date])->sum('amount');
        }




        $total_expense = $main_investment + $daily_expense;
        $profit = $daily_income - $total_expense;

        return response()->json([
            'main_investment' => $main_investment,
            'daily_income' => $daily_income,
            'daily_expense' => $daily_expense,
            'total_expense' => $total_expense,
            'profit' => $profit,
        ]);

    }


    /**
     * Total Overview
     */
    public function totalOverview(){

        $main_investment = Investment::sum('amount');
        $daily_income = DailyIncome::sum('amount');
        $daily_expense = DailyExpense::sum('amount');

        $total_expense = $main_investment + $daily_expense;
        $profit = $daily_income - $total_expense;

        return response()->json([
            'main_investment' => $main_investment,
            'daily_income' => $daily_income,
            'daily_expense' => $daily_expense,
            'total_expense' => $total_expense,
            'profit' => $profit,
        ]);

    }

}
