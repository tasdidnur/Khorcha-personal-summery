<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\IncomeExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use App\Models\Income;
use Carbon\Carbon;
use Session;
use Auth;
use PDF;

class IncomeController extends Controller{

  public function __construct(){
    $this->middleware('auth');
  }

  public function index(){
    $all=Income::where('income_status',1)->orderBy('income_id','DESC')->get();
    return View('admin.income.main.all',compact('all'));
  }

  public function add(){
    return view('admin.income.main.add');
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
    $slug=uniqid('INC');
    $creator=Auth::user()->id;
    $insert=Income::insert([
      'income_title'=>$request['title'],
      'incate_id'=>$request['category'],
      'income_date'=>$request['date'],
      'income_amount'=>$request['amount'],
      'income_creator'=>$creator,
      'income_slug'=>$slug,
      'created_at'=>Carbon::now()->toDateTimeString(),
    ]);

    if($insert){
      Session::flash('success','Successfully add income information.');
      return redirect('dashboard/income/add');
    }else{
      Session::flash('error','Opps! please try again.');
      return redirect('dashboard/income/add');
    }

  }

  public function update(){

  }

  public function softdelete(){
    $id=$_POST['modal_id'];
    $softDel=Income::where('income_status',1)->where('income_id',$id)->update([
      'income_status'=>'0',
    ]);
    if($softDel){
      Session::flash('success','Successfully Delete income information.');
      return redirect('dashboard/income');
    }else{
      Session::flash('error','Opps! please try again.');
      return redirect('dashboard/income');
    }
  }

  public function restore(){
    $id=$_POST['modal_id'];
    $restore=Income::where('income_status',0)->where('income_id',$id)->update([
      'income_status'=>'1',
    ]);
    if($restore){
      Session::flash('success','Successfully restore income information.');
      return redirect('dashboard/recycle/income');
    }else{
      Session::flash('error','Opps! please try again.');
      return redirect('dashboard/recycle/income');
    }
  }

  public function delete(){
    $id=$_POST['modal_id'];
    $delete=Income::where('income_status',0)->where('income_id',$id)->delete();
    if($delete){
      Session::flash('success','Successfully permanently delete income information.');
      return redirect('dashboard/recycle/income');
    }else{
      Session::flash('error','Opps! please try again.');
      return redirect('dashboard/recycle/income');
    }
  }

  public function export(){
        return Excel::download(new IncomeExport, 'income.xlsx');
    }

  public function pdf(){
    $all=Income::where('income_status',1)->orderBy('income_id','DESC')->get();
    $pdf = PDF::loadView('admin.income.main.pdf', compact('all'));
    return $pdf->download('income.pdf');
  }

}
