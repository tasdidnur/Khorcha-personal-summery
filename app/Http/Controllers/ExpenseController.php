<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Expense;
use Carbon\Carbon;
use Session;
use Auth;

class ExpenseController extends Controller{

  public function __construct(){
    $this->middleware('auth');
  }

  public function index(){
    $all=Expense::where('expense_status',1)->orderBy('expense_id','DESC')->get();
    return view('admin.expense.main.all',compact('all'));
  }

  public function add(){
    return view('admin.expense.main.add');
  }

  public function edit(){

  }

  public function view(){

  }

  public function insert(Request $request){
    $this->validate($request,[
      'title'=>'required',
      'category'=>'required',
      'date'=>'required',
      'amount'=>'required',
    ],[
      'title.required'=>'Please enter income title!',
      'category.required'=>'Please select income category!',
      'date.required'=>'Please enter income date!',
      'amount.required'=>'Please enter income amount!',
    ]);
    $slug=uniqid('EXP');
    $creator=Auth::user()->id;
    $insert=Expense::insert([
      'expense_title'=>$request['title'],
      'expcate_id'=>$request['category'],
      'expense_date'=>$request['date'],
      'expense_amount'=>$request['amount'],
      'expense_creator'=>$creator,
      'expense_slug'=>$slug,
      'created_at'=>Carbon::now()->toDateTimeString(),
    ]);

    if($insert){
      Session::flash('success','Successfully add Expense information.');
      return redirect('dashboard/expense/add');
    }else{
      Session::flash('error','Opps! please try again.');
      return redirect('dashboard/expense/add');
    }

  }

  public function update(){

  }

  public function softdelete(){

  }

  public function restore(){

  }

  public function delete(){

  }

}
