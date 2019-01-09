<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Storage;
use App\Slide;
class SLideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_slide = DB::table('slide')->get();
        
        return view('slide.index')
            ->with('danhsachslide', $ds_slide);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'sl_hinh' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048',
            // Cú pháp dùng upload nhiều file
            //'sp_hinhanhlienquan.*' => 'file|image|mimes:jpeg,png,gif,webp|max:2048'
        ]);
        
        $slide=new Slide();
        $slide->sl_ma=$request->sl_ma;
        $slide->sl_ten=$request->sl_ten;
        
        $slide->sl_noiDung=$request->sl_noiDung;
        $slide->sl_link=$request->sl_link;

        if($request->hasFile('sl_hinh'))
        {
            $file = $request->sl_hinh;

            // Lưu tên hình vào column sp_hinh
            $slide->sl_hinh = $file->getClientOriginalName();
            
            // Chép file vào thư mục "photos"
            $fileSaved = $file->storeAs('public/photos', $slide->sl_hinh);
        }
        $slide->save();
        Session::flash('alert-info','Thêm thành công!');
        return redirect()->route('danhsachslide.index');
    
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
        $slide = Slide::where("sl_ma", $id)->first();
        return view('slide.edit')->with('slide', $slide);
    
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
        $validation = $request->validate([
            'slide_hinh' => 'file|image|mimes:jpeg,png,gif,webp|max:2048',
            // Cú pháp dùng upload nhiều file
            //'sp_hinhanhlienquan.*' => 'image|mimes:jpeg,png,gif,webp|max:2048'
        ]);

        $slide = Slide::where("sl_ma",  $id)->first();
        $slide->sl_ten = $request->sl_ten;
        $slide->sl_noiDung = $request->sl_noiDung;
        $slide->sl_link = $request->sl_link;
        if($request->hasFile('sl_hinh'))
        {
            // Xóa hình cũ để tránh rác
            Storage::delete('public/photos/' . $slide->sl_hinh);

            // Upload hình mới
            // Lưu tên hình vào column sp_hinh
            $file = $request->sl_hinh;
            $slide->sl_hinh = $file->getClientOriginalName();
            
            // Chép file vào thư mục "photos"
            $fileSaved = $file->storeAs('public/photos', $slide->sl_hinh);
        }
        $slide->save();

        Session::flash('alert-info', 'Cập nhật thành công!');
        return redirect()->route('danhsachslide.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::where("sl_ma",  $id)->first();
        if(empty($slide) == false)
        {
            // DELETE các dòng liên quan trong table `HinhAnh`
            //foreach($sp->hinhanhlienquan()->get() as $hinhAnh)
            //{
                // Xóa hình cũ để tránh rác
               // Storage::delete('public/photos/' . $hinhAnh->ha_ten);

                // Xóa record
               // $hinhAnh->delete();
            //}

            // Xóa hình cũ để tránh rác
            Storage::delete('public/photos/' . $slide->sl_hinh);
        }

        $slide->delete();

        Session::flash('alert-info', 'Xóa thành công!');
        return redirect()->route('danhsachslide.index');
    }
}
