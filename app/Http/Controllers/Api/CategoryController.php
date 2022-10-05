<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $categories = Lista::all();
        $categories = DB::select('select * from categories');
        return response()->json(['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 404);
        }

        try {
            $category =  DB::insert('insert into categories (name,created_at,updated_at) values (?,?,?)', [$data['name'], now(), now()]);
            return response()->json([$category], 201);
        } catch (\Exception $e) {
            return response()->json(["Error " => $e->getMessage()], 404);
        }

        // Lista::create($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $list = Lista::find($id);
        $list = DB::select('select * from categories where id = ?', [$id]);

        return response()->json(['data' => $list[0]], 200);
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
        // $list = Lista::find($id);
        $data = $request->all();
        // dd($request->all());
        $validator = Validator::make($data, [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 404);
        }

        try {
            DB::update('update categories set name = ?, updated_at = ? where id = ?', [$data['name'], now(), $id]);
            return response()->json(["message" => "Operación Realizada con éxito"], 200);
        } catch (\Exception $e) {
            return response()->json(["Error " => $e->getMessage()], 404);
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
            $deleted = DB::table('categories')->where('id', $id)->delete();
            return response()->json(["message" => "Operación Realizada con éxito"], 200);
        } catch (\Exception $e) {
            return response()->json(["Error " => $e->getMessage()], 404);
        }
    }

    public function categoryClient(Request $request)
    {
        $categories = DB::table('categories')
            ->leftJoin('clients', 'categories.id', '=', 'clients.category_id')
            ->select('categories.*', 'clients.name as client')
            ->get();

        return response()->json(['categories' => $categories]);
    }
}
