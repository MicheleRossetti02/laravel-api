<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        # code...
$data= $request->all();

// dd($data);
$new_lead=new Lead();
$new_lead->fill($data);
$new_lead->save();

Mail::to('michelerossetti02@gmail.com')->send(new NewContact($new_lead));
// $validator = Validator::make($data,[
//     'name'=>'required',
//     'email'=>'required',
//     'message'=>'required',

// ]);
// if($validator->fails()){
//     return response()->json([
//         'success'=> false,
//         'errors'=>$validator->errors(),
//     ]);
// }


    }

}
