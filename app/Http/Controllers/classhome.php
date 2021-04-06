<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class classhome extends Controller
{
    public function cancelregister($id,$classid){
        echo $classid;
        echo $id;
        // $sv = Classmodel::find(1);
        
        // $sv->student()->detach($id);
        // return redirect()->route('class.index',)->with('notification','Xóa thành công!');



        // $shop = Classmodel::all()->where('id', '=', 2);
    }
}
