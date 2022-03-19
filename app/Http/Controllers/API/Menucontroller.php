<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class Menucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data  = Menu::getMenu()->paginate(3); 
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi =$request->validate([
            'menu'=>'required',
            'parent_id'=>'required',
            'foto'=>'file|mimes:png,jpg',
            
        ]);
        try {
            $filename = time().$request->file('foto')->getClientOriginalName();
            $path = $request->file('foto')->storeAs('uplaods/menu',$filename);
            $validasi['foto'] = $path;
            $response = Menu::create($validasi);
            return response()->json([
                'success' => true,
                'message' => 'success',
                'data' => $response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Err',
                'errors' => $e->getMessage()
            ]);
        }
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
        $validasi =$request->validate([
            'menu'=>'required',
            'parent_id'=>'required',
            'foto'=>'',
            'deskripsi'=>'',
            'url'=>'',
            'status'=>'',
            'urut'=>'',
            
        ]);
        try {
            if($request->file('foto')){
                $filename = time().$request->file('foto')->getClientOriginalName();
                $path = $request->file('foto')->storeAs('uplaods/menu',$filename);
                $validasi['foto'] = $path;
            }
           $menu = Menu::find($id);
           $menu->update($validasi);
            return response()->json([
                'success' => true,
                'message' => 'success',
               // 'data' => $response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Err',
                'errors' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $menu = Menu::find($id);
            $menu->delete();
            return response()->json([
                'success' => true,
                'message' => 'success'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Err',
                'errors' => $e->getMessage()
            ]);
        }
        
    }
}
