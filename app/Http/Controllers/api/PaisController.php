<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pais;
use Illuminate\Support\Facades\Validator;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paises = DB::table('tb_pais')
        ->join('tb_municipio', 'tb_pais.pais_capi', '=', 'tb_municipio.muni_codi')
        ->select('tb_pais.*', 'tb_municipio.muni_nomb')
        ->get();
        return json_encode(['paises' => $paises]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'pais_nomb' => ['required', 'max:30', 'unique:tb_pais'],
            'pais_codi' => ['required', 'numeric', 'min:1'],
            'pais_capi' => ['required', 'max:30', 'unique']
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => 'se produjo un error en la validacion de la informacion.',
                'statusCode' => 400
            ]);
        }

        $pais = new Pais();
        $pais->pais_codi = $request->pais_codi; // Asignar el código ingresado por el usuario
        $pais->pais_nomb = $request->pais_nomb;
        $pais->pais_capi = $request->pais_capi;
        $pais->save();
        return json_encode(['pais' => $pais]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pais = Pais::find($id);
        if (is_null($pais)){
            return abort(404);
        }
        $municipios =DB::table('tb_municipio')
        ->orderBy('muni_nomb')
        ->get();
        return json_encode(['pais'=>$pais, 'municipios'=>$municipios]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pais = Pais::find($id);
        $pais->pais_nomb = $request->pais_capi;
        $pais->pais_capi = $request->pais_capi;
        $pais->save();
        return json_encode(['pais'=>$pais]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pais= Pais::find($id);
        $pais->delete();
        $paises = DB::table('tb_pais')
        ->join('tb_municipio','tb_pais.pais_capi','=','tb_municipio.muni_codi')
        ->select('tb_pais.*',"tb_municipio.muni_nomb")
        ->get();
        return json_encode(['paises'=>$paises, 'success' => true]);
    }
}
