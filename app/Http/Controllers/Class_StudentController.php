<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use App\Models\Classmodel;

class Class_StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class = Classmodel::all();
        return view('pages.registerclass',['class'=>$class]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $this->validate($request,
        [
            'mssv' => "required",
            'classname' =>'required'

        ],[
            
            'mssv.required' => 'Không bỏ trống mã số sinh viên',
            'classname.required' => 'Hãy chọn tên lớp học'
        ]);
        $mssv = Student::All()->where('mssv', '=', $request->mssv);
        if(count($mssv) == 0){
            return redirect()->route('classhome.create')->with('notificationer','Mã sinh viên chưa được đăng ký');
        }

        $ma = 0;
            foreach ($mssv as $row) {
                $ma = $row->id;
            }
        $data = Student::find($ma);
        $data->classmodel()->syncWithoutDetaching([$request->classname]);
        return redirect()->route('class.show',$request->classname)->with('notification','Đăng ký thành công');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sv = Student::find($id)->toArray();
        return view('pages.editclasshome',['sv'=>$sv]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sv = Student::find($id);
        //$id= $this->id;
        
        $this->validate($request,
        [
            'hoten' => 'required',
            'mssv' => "required|unique:students,mssv,$id",
            'ngaysinh' => 'required'
        ],[
            'hoten.required' => 'Không bỏ trống tên sinh viên',
            'mssv.required' => 'Không bỏ trống mã số sinh viên',
            'mssv.unique' => 'Trùng mã sinh viên',
            'ngaysinh.required' => 'Không bỏ trống ngày sinh'
        ]);
        
        $sv->hoten = $request->hoten;
        $sv->mssv = $request->mssv;
        $sv->ngaysinh = $request->ngaysinh;
        $sv->save();
        return redirect()->route('class.show',$id)->with('notification','Sữa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
   
    }
}
