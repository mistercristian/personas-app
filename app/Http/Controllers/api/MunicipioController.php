<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Municipio;
use App\Models\Comuna;
use Illuminate\Support\Facades\Validator;


class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $municipios = DB::table('tb_municipio')
        ->join('tb_departamento', 'tb_municipio.depa_codi', '=', 'tb_departamento.depa_codi')
        ->select('tb_municipio.*', 'tb_departamento.depa_nomb')
        ->get();
        return json_encode(['municipios' => $municipios]);
    }   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'muni_nomb' => ['required', 'max:30', 'unique:tb_municipio,muni_nomb'],
            'depa_codi' => ['required', 'numeric', 'min:1']
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'se produjo un error en la validacion de la informacion.',
                'statusCode' => 400
            ]);
        }

        $municipio = new Municipio();
        $municipio->muni_nomb = $request->muni_nomb;
        $municipio->depa_codi = $request->depa_codi;
        $municipio->save();
        return json_encode(['municipio' => $municipio]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $municipio = Municipio::find($id);
        if (is_null($municipio)){
            return abort(404);
        }
        $departamentos = DB::table('tb_departamento')
        ->orderBy('depa_nomb')
        ->get();

        return json_encode(['municipio' => $municipio, 'departamentos' => $departamentos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $municipio = Municipio::find($id);
        $municipio->muni_nomb = $request->muni_nomb;
        $municipio->depa_codi = $request->depa_codi;
        $municipio->save();
        return json_encode(['municipio' => $municipio]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $municipio =Municipio::find($id);
        $municipio->delete();
        $municipios = DB::table('tb_municipio')
        ->join('tb_departamento', 'tb_municipio.depa_codi', '=', 'tb_departamento.depa_codi')
        ->select('tb_municipio.*', 'tb_departamento.depa_nomb')
        ->get();
        return json_encode(['municipio' => $municipio, 'success' => true]);
    }
}
