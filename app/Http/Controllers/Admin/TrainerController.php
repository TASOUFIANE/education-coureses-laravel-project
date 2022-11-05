<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trainer;
use Image;
use Illuminate\Support\Facades\Storage;
class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['trainers'] = Trainer::all();
        return view('admin.trainer.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.trainer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate( [
            'name' => 'required|string|max:50',
            'phone'=>'nullable|numeric',
            'specialty'=>'required|string|max:100',
            'img'=>'required|image|mimes:jpeg,jpg,png',

        ]);
         $new_name=$data['img']->hashName();

         Image::make($data['img'])->resize(50,50)->save(public_path('uploads/trainers/'.$new_name));

         $data['img']=$new_name;

         Trainer::create($data);

        return redirect()->route('admin.trainer.index')->with(['success'=>'Trainer added successfully']);

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
        //
        $data['trainer'] = Trainer::findOrFail($id);
        return view('admin.trainer.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $data=$request->validate( [
            'name' => 'required|string|max:50',
            'phone'=>'nullable|integer',
            'specialty'=>'required|string|max:50',
            'img'=>'nullable|image|mimes:jpeg,jpg,png',

        ]);
        $old_name=Trainer::findOrFail($request->id)->img;

        if($request->hasFile('img')){

            Storage::disk('uploads')->delete('trainers/'.$old_name);

            $new_name=$data['img']->hashName();

            Image::make($data['img'])->resize(50,50)->save(public_path('uploads/trainers/'.$new_name));

            $data['img']=$new_name;
        }else{
           $data['img']=$old_name;
        }
        Trainer::findOrfail($request->id)->update($data);

        return redirect()->route('admin.trainer.index')->with(['success'=>'Trainer updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old_name=Trainer::findOrFail($id)->img;
        Storage::disk('uploads')->delete('trainers/'.$old_name);
        Trainer::findOrFail($id)->delete();
        return redirect()->route('admin.trainer.index')->with(['success'=>'Trainer deleted successfully']);
    }
}
