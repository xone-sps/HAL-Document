<?php

namespace App\Http\Controllers;
use App\user;
use App\Document_type;
use App\Department;
use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
  protected $uploadPath = '/files/';
  protected $uploadImagePath = '/assets/images/';

  public function dashboard(){
   return view('admin.dashboard');
 }
 public function user(){
  $users = User::orderBy('id','desc')->paginate(10);
  $departments = Department::orderBy('id', 'desc')->get();
  return view('admin.user.index',compact('users', 'departments'));
}
public function SaveUser(Request $request){
  $this->validate($request,[
    'name' => 'required',
    'last_name' => 'required',
    'email' => 'required|email|unique:users',
    'password' => 'required',
    'phone' =>'required',
    'confirm_password' => 'same:password',
  ]);

  $save = new User;
  $save->name=$request->name;
  $save->last_name=$request->last_name;
  $save->email=$request->email;
  $save->phone=$request->phone;
  $save->department_id = $request->department;
  $save->password = Hash::make($request->password);
  $save->save();
  return back();

}

public function DeleteUser($id){
 $delete=User::find($id);
 $delete->delete();
 return back();
}

public function document(){
  $doctypes = Document_type::orderBy('id','desc')->get();
  $documents = Document::orderBy('id','desc')->paginate(10);
  return view('admin.document.index',compact('documents','doctypes'));
}
public function SaveDocument(Request $request){
     // dd($request->all());
  $this->validate($request, [
    'name'=>'required',
    'file' => 'required|max:200000|mimes:pdf,doc,docx,xlsx,pptx,xls',
  ]);
  $file = $request->file('file');
  $fileExt = strtolower($file->getClientOriginalExtension());
  $imgOriginalName = $file->getClientOriginalName();
  $img_filename = md5(uniqid('upload_file', true)) . '_uploaded.' . $fileExt;
  $location = public_path($this->uploadPath);
  $file->move($location, $img_filename);

    // $image = $request->file('image');
    // $fileExtr = strtolower($file->getClientOriginalExtension());
    // $imagOriginlName = $file->getClientOriginalExtension();
    // $imaage = md5($imagOriginlName).microtime() . '_upload.'. $fileExtr;
    // $location = public_path($this->uploadImagePath);
    // $file->move($location,$image);

  $document = new Document();
  $document->name=$request->name;
  $document->description=$request->description;
  $document->image='wqwqw';
    // $document->status=['enable'];
    // $document->size=['size'];
    // $document->user_id=[1];
    // $document->doctype_id=[1];
  $document->file=$img_filename;
  $document->doctype_id=$request->doctype;
  $document->save();
  return back();

}

public function UpdateDocument(Request $request,$id){
// dd($request->all());
  $this->validate($request, [
    'name'=>'required',
    
  ]);

  if($request->hasfile('file')){

    $file = $request->file('file');
    $fileExt = strtolower($file->getClientOriginalExtension());
    $imgOriginalName = $file->getClientOriginalName();
    $img_filename = md5(uniqid('upload_file', true)) . '_uploaded.' . $fileExt;
    $location = public_path($this->uploadPath);
    $file->move($location, $img_filename);
    unlink(public_path($this->uploadPath) . $request->old_file);
    
    $document = Document::findOrfail($id);
    $document->name=$request->name;
    $document->description=$request->description;
    $document->image='wqwqw';
    // $document->status=['enable'];
    $document->file=$img_filename;
    $document->doctype_id=$request->doctype;
    $document->save();

  } else{
    
    $document = Document::findOrfail($id);
    $document->name=$request->name;
    $document->description=$request->description;
    $document->image='wqwqw';
    // $document->status=['enable'];
    $document->doctype_id=$request->doctype;
    $document->save();
  }
  return back();
}


public function DeleteDocument($id){
  $document = Document::findOrfail($id);
  try {
    unlink(public_path($this->uploadPath) . $document->file);
  } catch (Exception $e) {
    
  }
  $document->delete();
  return back();
}

// Document type
public function doctype(){
  $doctypes =Document_type::orderBy('id','desc')->paginate(3);
  return view('admin.doc_type.index',compact('doctypes'));
}

public function SaveDoctype(Request $request){
 $this->validate($request, [
  'doctype_name' => 'required'
]);
 $save = new Document_type();
 $save->name=$request->doctype_name;
 $save->save();
 return back();
}

public function UpdateDocType(Request $request,$id){
  $this->validate($request,[
    'doctype_name'=>'required'
  ]);

  $update = Document_type::find($id);
  $update->name=$request->doctype_name;
  $update->save();
  return back();

}

public function DeleteDoctype($id){
  $delete = Document_type::find($id);
  $delete->delete();
  return back();
}

public function getDepartment(){
  $departments = Department::orderBy('id','desc')->paginate(3);

  return view('admin.department.index',compact('departments'));
}
public function SaveDepartment(Request $request){
  $this->validate($request,[
    'department_name'=>'required'
  ]);
  $save = new Department();
  $save->name=$request->department_name;
  $save->save();
  return back();
}

public function UpdateDepartment(Request $request,$id){
  $this->validate($request,[
    'department_name'=>'required'
  ]);
  $update= Department::findOrfail($id);
  $update->name=$request->department_name;
  $update->save();
  return back();

}

public function DeleteDepartment($id){
  $delete = Department::findOrFail($id);
  $delete->delete();
  return back();
}
}



