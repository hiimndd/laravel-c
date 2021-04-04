<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::all()->toArray();
        return view('pages.home',['student'=>$student]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Student();
        $this->validate($request,
        [
            'hoten' => 'required',
            'mssv' => "required|unique:students,mssv",
            'ngaysinh' => 'required'
        ],[
            'hoten.required' => 'Không bỏ trống tên sinh viên',
            'mssv.required' => 'Không bỏ trống mã số sinh viên',
            'mssv.unique' => 'Trùng mã sinh viên',
            'ngaysinh.required' => 'Không bỏ trống ngày sinh'
        ]);
        
        
        $data->hoten = $request->hoten;
        $data->mssv = $request->mssv;
        $data->ngaysinh = $request->ngaysinh;
        $data->save();
        
        return redirect()->route('home.index')->with('notification','Thêm thành công!');
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
        return view('pages.edit',['sv'=>$sv]);
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
        return redirect()->route('home.edit',$id)->with('notification','Sữa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sv = Student::find($id);
        $sv->delete();
        return redirect()->route('home.index')->with('notification','Xóa thành công!');
    }
}
