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
        /*create database db_test_insight_gestao;
        use db_test_insight_gestao;

        create table funcionarios(
            id int primary key auto_increment,
            nome varchar(100),
            salario numeric(8,2),
            cargo varchar (50)    
        );*/
        
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
            $funcionario = Funcionario::create($request->all());
            return response()->json(['data' => 'success', 'message'=> 'Funcionário criado com sucesso.']);
        }catch(Exception $e){
            return response()->json($e->getMessage());
        } 
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
        //
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
                return response()->json(['data' => 'erroe', 'message'=> 'Erro ao apagar funcionário.']);
            }
        }catch(Exception $e){
            return response()->json($e->getMessage());
        }

        
    }
}
