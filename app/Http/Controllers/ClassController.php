<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classmodel;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $class = Classmodel::all()->toArray();
        


        //$shop = Classmodel::all()->where('id', '=', 2);
        $class = Classmodel::all();
        return view('pages.homeclass',['class'=>$class]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.addclass');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Classmodel();
        $this->validate($request,
        [
            'classname' => "required|unique:classmodels,classname"
        ],[
            'classmodel.required' => 'Không bỏ trống Tên lớp',
            'classmodel.unique' => 'Tên lớp đã tồn tại',
        ]);
        
        $data->classname = $request->classname;
        $data->save();
        
        return redirect()->route('class.index')->with('notification','Thêm lớp thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $class = Classmodel::All()->where('id', '=', $id);
        
        return view('pages.showclass',['class'=>$class]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = Classmodel::find($id);
        return view('pages.editclass',['class'=>$class]);
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
        $class = Classmodel::find($id);
        //$id= $this->id;
        
        $this->validate($request,
        [
            'classname' => 'required',
            'classname' => "required|unique:classmodels,classname,$id"
        ],[
            'classname.required' => 'Không bỏ trống tên lớp',
            'classname.unique' => 'Lớp này đã tồn tại, vui lòng đặt tên khác'
        ]);
        
        $class->classname = $request->classname;
        $class->save();
        return redirect()->route('class.index',$id)->with('notification','Sữa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sv = Classmodel::find($id);
        $sv->delete();
        return redirect()->route('class.index')->with('notification','Xóa thành công!');
    }
}
