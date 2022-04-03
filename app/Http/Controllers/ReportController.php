<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Income;
use App\Models\Expense;
use Auth;

class ReportController extends Controller{

  public function __construct(){
    $this->middleware('auth');
  }

  public function index(){
    $allIncome=Income::where('income_status',1)->orderBy('income_id','DESC')->get();
    $allExpense=Expense::where('expense_status',1)->orderBy('expense_id','DESC')->get();
    return View('admin.report.index',compact('allIncome','allExpense'));
  }

  public function current(){
    $today=Carbon::now();
    $year=date("Y", strtotime($today));
    return $month=date("F", strtotime($today));
  }

}
