<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\tbl_users;
use App\Models\angularUser_tbl;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\livewire;
use App\Models\multiphoto;
use Excel;
use PDF; 
use App\Imports\UserImport;
use App\Exports\UserExport;
use Illuminate\Support\Facades\DB;
class PaginationCon extends Controller
{
      

    public function PaginatLoginCon(Request $req){
         //return  DB::table('users')->where('email',$req->username)->get(); exit;
        $user= User::where('email', $req->username)->first();
            if (!$user || !Hash::check($req->password, $user->password)) {
                return redirect('PaginatLogin')->with('message','These credentials do not match our records.');
            } else {
                session()->put('user_name',$user->name);
                session()->put('user_email',$user->email);
                return redirect('PaginationDataFatch');
            }
    }
 
    public function Paginatlogout(Request $r){
        if (session()->has('user_email')) {
            session()->pull('user_name', null);
            session()->pull('user_email', null);
            // $r->session()->forget('user_name');
            // $r->session()->forget('user_email');
        }
        return redirect('PaginatLogin');
    }

    public function PaginatLogin(){
           return view('PaginatLogin');
    }
   

    public function importForm(Request $request){   
        Excel::import(new UserImport,$request->file('XLFile'));
        return redirect('PaginationDataFatch')->with('return_msg','Records Imported Successfully..');
    }

    public function exportUsersXl()
    {
        return Excel::download(new UserExport,'usersList.xlsx');
        // return Excel::download(new UserExport,'usersList.xlsx',\Maatwebsite\Excel\Excel::XLSX);
    }
    public function exportUsersCSV() 
    {  
       return Excel::download(new UserExport,'usersList.csv');
    }
   public function exportUsersPDF() 
    { 
       $data = tbl_users::orderBy('id', 'DESC')->get(); 
       $pdf = PDF::loadView('Paginatpdf', ['collection'=>$data,'i'=>1]);
       return $pdf->download('userDetails.pdf');
    }
 

//insert, delete, update, view start    
    public function DataFatch(){ 
            $data = tbl_users::orderBy('id', 'ASC')->paginate(5); 
            return view('Pagination',['datacollection'=>$data,'i'=>1]);
        
    }   

    public function addData(Request $req){
                $newUser = new tbl_users; 
                $newUser->name=$req->name;
                $newUser->email=$req->email;
                $newUser->address=$req->Address;
                $newUser->files="";
                $newUser->save();
                $last_id = $newUser->id;
            if ($req->hasFile('photo')) {
                $fileName = $req->file('photo')->getClientOriginalName();
                $file_extension = $req->file('photo')->extension();
                $file_size = $req->file('photo')->getSize();
                //$req->file('photo')->store('public/uploadFiles/');
                $file_Newname = rand(11111, 99999)."_".$file_size.".".$file_extension;
                $req->file('photo')->storeAs('public/uploadFiles/',$file_Newname);
                $userPhoto = tbl_users::find($last_id);
                $userPhoto->files=$file_Newname;
                $result= $userPhoto->save();
                if($result){
                    return redirect('PaginationDataFatch')->with('return_Inmsg','Data has been saved..');
                } else {
                    return redirect('PaginationDataFatch')->with('return_Inmsg','Upload Failed..!!');
                }
            } 
    }
    public function addAngular_data(Request $req){
        return $req; exit;
                $newUser = new angularUser_tbl; 
                $newUser->name=$req->name;
                $newUser->email=$req->email;
                $newUser->password=$req->password;
                $result = $newUser->save();
                $last_id = $newUser->id;
             if($result){ 
                    return response()->json([
                    'last_id' =>$last_id,
                    'status_code' => 200,
                    'massage' => 'Create Successfully..',
                    ]);
                } else {
                    return response()->json([
                    'status_code' => 400,
                    'massage' => 'Failed To Upload..',
                    ]);
                }
                
    }  
    public function viewAngular_data(){
            $angulardata = angularUser_tbl::orderBy('id', 'DESC')->get(); 
            if($angulardata){
                    return response()->json([
                    'Alldata' =>$angulardata,
                    'status_code' => 200,
                    'massage' => 'Records Successfully Fatched..',
                    ]);
                } else {
                    return response()->json([
                    'status_code' => 400,
                    'massage' => 'Failed To Fatched..',
                    ]);
                }
                
    } 
    

    public function Datadelete($id){
        if (!(session()->has('user_email'))) {
            return redirect('Paginatlogout');
        } else {
            $res=tbl_users::where('id',$id)->delete();
            if($res){
                return redirect('PaginationDataFatch')->with('return_msg','Delete Successful..');
            } else {
                return redirect('PaginationDataFatch')->with('return_msg','Delete Failed..!!');
            }
        }
    }

        
    public function Dataedit($Eid){
        if (!(session()->has('user_email'))) {
            return redirect('Paginatlogout');
        } else {
            $Edata=tbl_users::find($Eid);
            return view('PaginateditPage',['Editdata'=>$Edata]);
        }
    } 
 
    public function Update(Request $reqt){
            $data = tbl_users::find($reqt->UpdateId);
            $data->name=$reqt->name;
            $data->email=$reqt->email;
            $data->address=$reqt->Address;
            $textResult = $data->save();
            if ($reqt->hasFile('Ephoto')) {
                $fileName = $reqt->file('Ephoto')->getClientOriginalName();
                $file_extension = $reqt->file('Ephoto')->extension();
                $file_size = $reqt->file('Ephoto')->getSize();
                $file_Newname = rand(11111, 99999)."_".$file_size.".".$file_extension;
                $reqt->file('Ephoto')->storeAs('public/uploadFiles/',$file_Newname);
                $userEPhoto = tbl_users::find($reqt->UpdateId);
                $userEPhoto->files=$file_Newname;
                $updateResult= $userEPhoto->save();
                if($updateResult){
                    return redirect('PaginationDataFatch')->with('return_msg','Update Successfull..');
                } else {
                    return redirect('PaginationDataFatch')->with('return_msg','Update Failed..!!');
                } 
            } else {
                if($textResult){
                    return redirect('PaginationDataFatch')->with('return_msg','Update Successfull..');
                } else {
                    return redirect('PaginationDataFatch')->with('return_msg','Update Failed..!!');
                }
            }
    }
//insert, delete, update, view end


//multiples row insert, delete, update, view start
    public function PaginationMrow(){
         if (!(session()->has('user_email'))) {
            return redirect('Paginatlogout'); 
        } else {
        $data = tbl_users::orderBy('id', 'desc')->paginate(5);
        return view('PaginationMrow',['datacollection'=>$data,'i'=>1]);
        }
    }

    public function multirowInsert(Request $request)
    {
         if (!(session()->has('user_email'))) {
            return redirect('Paginatlogout');
        } else {
        $name = $request->name;  
        $email = $request->email;  
        $address = $request->address; 
        $files ="null";
            for($i=0; $i<count($name); $i++ ){
                $saveData = [
                'name' => $name[$i], 
                'email' => $email[$i],  
                'address' => $address[$i],
                'files' => $files[$i],   
            ];
            $result =tbl_users::insert($saveData);
            }
            if($result){
                    return redirect('PaginationDataFatch')->with('return_msg','Data has been saved..');
                } else {
                    return redirect('PaginationDataFatch')->with('return_msg','Upload Failed..!!');
                }
        }
    }

    public function multidelete(Request $request){
        $ids=$request->deleteIds;
        tbl_users::whereIn('id',$ids)->delete();
        return response()->json([
            'success'=>'Delete Successfully..',
            'status'=>201,
        ]);
    }
 
   public function EditMultiDataview(Request $request)
   {
       if (!(session()->has('user_email'))) {
            return redirect('Paginatlogout');
        } else {
            return $EditDataview = tbl_users::whereIn('id', $request->editIds)->get();
        }
   }

   public function updateMultiData(Request $request)
   {
       if (!(session()->has('user_email'))) {
            return redirect('Paginatlogout');
        } else {
            $idss = $request->editids;
            foreach($idss as $item => $value){
                $dataUp = [
                    'name'=>$request->name[$item],
                    'email'=>$request->email[$item],
                    'address'=>$request->address[$item],
                ];
                $update = tbl_users::where('id',$idss[$item])->first();
                $result = $update->update($dataUp);
            }
            if($result){
                return redirect('PaginationDataFatch')->with('return_msg','Data has been updated..');
            } else {
                return redirect('PaginationDataFatch')->with('return_msg','Update Failed..!!');
            }
        }
   }
//multiples row insert, delete, update, view end



//multiples photo insert start    
public function viewmultiPhotoPage()
{
    if (!(session()->has('user_email'))) {
            return redirect('Paginatlogout');
        } else {
        $mdata =tbl_users::rightjoin('multiphotos','tbl_users.id','=','multiphotos.contentid')
        ->select('multiphotos.id as mid','multiphotos.contentid as contentid','multiphotos.files as files','multiphotos.path as path','tbl_users.name as user_name','tbl_users.email as user_email','tbl_users.address as user_address','tbl_users.files as user_files')
        ->get();
        return view('PaginationmultiPhoto',['mdata'=>$mdata,'i'=>1]);
        }
}

public function getSelectids(Request $request)
{ 
    return $dataAll=tbl_users::all();
}
 
public function InertmultiPhoto(Request $request)
{
    if (!(session()->has('user_email'))) {
            return redirect('Paginatlogout');
        } else {
            if($request->hasFile('photos')){
                foreach($request->file('photos') as $key => $file) {
                $fileName = $file->getClientOriginalName();
                $extension = $file->extension();
                $size =  $file->getSize();
                $file_Rname = rand(11111, 99999)."_".$size.".".$extension;   
                $path = $file->storeAs('public/multiuploadFiles',$file_Rname);
                $files[] = $file_Rname;
                $pathr[] = $path;
                }
                $contentid = $request->contentid;
                for($i=0; $i<count($request->contentid); $i++){
                $Datasave = [
                        'files' => $files[$i], 
                        'path' => $pathr[$i],  
                        'contentid' => $contentid[$i],
                    ];
                $result = multiphoto::insert($Datasave);
                }
                if($result){
                    return redirect('viewPhotoPage')->with('return_msgMulti','Data has been saved..');
                } else {
                    return redirect('viewPhotoPage')->with('return_msgMulti','Upload Failed..');
                }
             }    
        }
}

                
//multiples photo insert end




public function chechkdata(Request $request)
{
 $res=tbl_users::get();
  return response()->json([
                'data' => $res,
                'status_code' => 200,
            ]);
}










}
 