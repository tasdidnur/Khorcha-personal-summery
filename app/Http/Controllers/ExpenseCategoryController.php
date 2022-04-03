<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ExpenseCategory;
use Carbon\Carbon;
use Session;
use Auth;

class ExpenseCategoryController extends Controller{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(){
    $all=ExpenseCategory::where('expcate_status',1)->orderBy('expcate_id','DESC')->get();
    return view('admin.expense.category.all',compact('all'));
  }

  public function add(){
    return view('admin.expense.category.add');
  }

  public function edit($slug){
    $data=ExpenseCategory::where('expcate_status',1)->where('expcate_slug',$slug)->firstOrFail();
    return view('admin.expense.category.edit',compact('data'));
  }

  public function view($slug){
    $data=ExpenseCategory::where('expcate_status',1)->where('expcate_slug',$slug)->firstOrFail();
    return view('admin.expense.category.view',compact('data'));
  }

  public function insert(Request $request){
    $this->validate($request,[
      'name'=>'required|max:100|unique:expense_categories,expcate_name',
    ],[
      'name.required'=>'Please enter expense category name!',
      'name.unique'=>'Expense Category name has already been taken!'
    ]);
    $slug=Str::slug($request['name'],'-');
    $creator=Auth::user()->id;
    $insert=ExpenseCategory::insert([
      'expcate_name'=>$request['name'],
      'expcate_remarks'=>$request['remarks'],
      'expcate_creator'=>$creator,
      'expcate_slug'=>$slug,
      'created_at'=>Carbon::now()->toDateTimeString(),
    ]);
    if($insert){
      Session::flash('success','Successfully added expense category information.');
      return redirect('dashboard/expense/category/add');
    }else{
      Session::flash('error','Opps try again!');
      return redirect('dashboard/expense/category/add');
    }
  }

  public function update(Request $request){
    $id=$request['id'];
    $this->validate($request,[
      'name'=>'required|max:100|unique:expense_categories,expcate_name,'.$id.',expcate_id',
    ],[
      'name.required'=>'Please enter expense category name!',
      'name.unique'=>'Expense Category name has already been taken!'
    ]);
    $slug=Str::slug($request['name'],'-');
    $editor=Auth::user()->id;
    $update=ExpenseCategory::where('expcate_status',1)->where('expcate_id',$id)->update([
      'expcate_name'=>$request['name'],
      'expcate_remarks'=>$request['remarks'],
      'expcate_editor'=>$editor,
      'expcate_slug'=>$slug,
      'updated_at'=>Carbon::now()->toDateTimeString(),
    ]);

    if($update){
      Session::flash('success','Successfully added expense category information.');
      return redirect('dashboard/expense/category/view/'.$slug);
    }else{
      Session::flash('error','Opps try again!');
      return redirect('dashboard/expense/category/add/'.$slug);
    }
  }

  public function softdelete(){

  }

  public function restore(){

  }

  public function delete(){

  }

}
