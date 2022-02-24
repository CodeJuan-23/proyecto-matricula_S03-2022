<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\v1\Padre;

class PadresController extends Controller
{
    
    function getAll()
    {
        $response=new \stdclass();
        $response->success=true;
        $padres=Padre::all();
        $response->data=$padres;
        return $response;
        return response()->json($response,200);
    }

    
    function getItem($id)
    {
        $response=new \stdclass();
        $response->success=true;
        $padres=Padre::find($id);
        $response->data=$padres;
        //return $response;
        return response()->json($response,200);
    }

    
    public function store(Request $request)
    {
        $response=new \stdClass();
        $response->success=true;

        $padre=new Padre;
        $padre->dni_padre=$request->dni_padre;
        $padre->nombres_padre=$request->nombres_padre;
        $padre->apellido_paterno_padre=$request->apellido_paterno_padre;
        $padre->apellido_materno_padre=$request->apellido_materno_padre;
        $padre->direccion_padre=$request->direccion_padre;
        $padre->distrito_padre=$request->distrito_padre;
        $padre->telefono_padre=$request->telefono_padre;
        $padre->celular_padre=$request->celular_padre;
        $padre->email_padre=$request->email_padre;
        $padre->save();

        
        $response->data=$padre;

        return response()->json($response,201);
    }

    
    function update(Request $request)
    {
        $response=new \stdClass();
        $response->success=true;

        $padre= Padre::find($request->id);

        $padre->dni_padre = $request->dni_padre;
        $padre->nombres_padre=$request->nombres_padre;
        $padre->apellido_paterno_padre=$request->apellido_paterno_padre;
        $padre->apellido_materno_padre=$request->apellido_materno_padre;
        $padre->direccion_padre=$request->direccion_padre;
        $padre->distrito_padre=$request->distrito_padre;
        $padre->telefono_padre=$request->telefono_padre;
        $padre->celular_padre=$request->celular_padre;
        $padre->email_padre=$request->email_padre;
        $padre->save();

        $response->data=$padre;

        return response()->json($padre,200);
    }


    function patch(Request $request)
    {
        $response=new \stdClass();
        $response->success=true;

        $padre= Padre::find($request->id);

        if(isset($request->dni_padre))
        $padre->dni_padre=$request->dni_padre;

        if(isset($request->nombres_padre))
        $padre->nombres_padre=$request->nombres_padre;

        if(isset($request->apellido_paterno_padre))
        $padre->apellido_paterno_padre=$request->apellido_paterno_padre;

        if(isset($request->apellido_materno_padre))
        $padre->apellido_materno_padre=$request->apellido_materno_padre;

        if(isset($request->direccion_padre))
        $padre->direccion_padre=$request->direccion_padre;

        if(isset($request->distrito_padre))
        $padre->distrito_padre=$request->distrito_padre;

        if(isset($request->telefono_padre))
        $padre->telefono_padre=$request->telefono_padre;

        if(isset($request->celular_padre))
        $padre->celular_padre=$request->celular_padre;

        if(isset($request->email_padre))
        $padre->email_padre=$request->email_padre;

        $padre->save();

        $response->data=$padre;

        return response()->json($padre,200);
    }

    
    function delete($id)
    {
        $response=new \stdClass();
        $response->success=true;

        $response_code;

        $padre= Padre::find($id);

        if($padre)
        {
            $padre->delete();
            $response_code=200;

        }
        else
        {
            $response->success=false;
            $response->errors=[];
            $response->errors[]="El elemento ya ha sido eliminado previamente";
            $response_code=400;
        }

        return response()->json($response,$response_code);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
