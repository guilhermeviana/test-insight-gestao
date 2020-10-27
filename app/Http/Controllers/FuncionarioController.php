<?php

namespace App\Http\Controllers;

use App\Http\Requests\FuncionarioRequest;
use App\Models\Funcionario;
use Exception;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        $funcionarios = Funcionario::all();
        return response()->json($funcionarios);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FuncionarioRequest $request)
    {
        try{
            Funcionario::updateOrCreate(
                ['id' => $request->id],
                ['nome' => $request->nome, 'salario' => $request->salario, 'cargo' => $request->cargo]
            );
            return response()->json(['data' => 'success', 'message'=> 'Solicitação realizada com sucesso.']);
        }catch(Exception $e){
            return response()->json($e->getMessage());
        } 
    }

     /**
     * Edit a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $funcionario = Funcionario::find($id);
            return response()->json($funcionario);
        }catch(Exception $e){
            return response()->json($e->getMessage());
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
        try{
            if(Funcionario::find($id)->delete()){
                return response()->json(['data' => 'success', 'message'=> 'Funcionário apagado com sucesso.']);
            }else{
                return response()->json(['data' => 'error', 'message'=> 'Erro ao apagar funcionário.']);
            }
        }catch(Exception $e){
            return response()->json($e->getMessage());
        }

        
    }
}
