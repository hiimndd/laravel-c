<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use App\Models\Classmodel;

class classhome extends Controller
{
    public function cancelregister($id,$classid){
        
        $sv = Classmodel::find($classid);
        $sv->student()->detach($id);
        return redirect()->route('class.show', $classid)->with('notification','Xóa thành công!');
        


    }
}
