<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Services\CidadeService;
use App\Services\ClienteService;
use Illuminate\Support\Facades\Validator;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $clienteService;
    protected $cidadeService;
    public function __construct(ClienteService $clienteService, CidadeService $cidadeService)
    {   $this->middleware(['auth']); 
        $this->clienteService = $clienteService;
        $this->cidadeService = $cidadeService;
    }
 
    public function index()
    {
      
        return  Inertia::render('Cliente/IndexCliente', [
            'clientes' => $this->clienteService->clienteAll()
        ]); 
    }

    public function clienteAll()
    {
        $clientes=$this->clienteService->clienteAll();
        return response()->json($clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function criar()
    {
        return Inertia::render('Cliente/CriarCliente', [
            'cidades' => $this->cidadeService->cidadesAll()
        ]);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cadastrar(Request $request)
    {

        $validacao=$request->cliente;
       
        $mensagens = [
             'cnpj.required' => ' Por favor digite o cnpj',
             'rz_social.required' => 'Por favor digite a razão social',
             'nome_fantasia.required' => 'Por favor selecione o nome fantasia',
             'inscricao_estadual.required' => 'Por favor digite a inscricao estadual',
             'cep.required' => 'Por favor digite o CEP',
             'cidade.required' => 'Por favor digite a cidade',
             'endereco.required' => 'Por favor digite o endereço',
             'endereco_bairro.required' => 'Por favor digite o bairro',
             'endereco_compl.required' => 'Por favor digite o endereço completo',
             'email.required' => 'Por favor digite o email',
             'contato.required' => 'Por favor digite o contato',
             'endereco_numero.required' => 'Por favor digite o numero',
             'email.email' => 'Por favor digite um email valido',
              
               
         ];
         
         $validate= Validator::make($validacao, [
 
          'cnpj'=> ['required'],
          'rz_social' => ['required'],
          'nome_fantasia'=> ['required'],
          'inscricao_estadual'=> ['required'],
          'cep'=> ['required', 'max:12'],
          'cidade'=> ['required','numeric'],
          'endereco'=> ['required','min:3'],
          'endereco_bairro'=> ['required','min:3'],
          'endereco_compl'=> ['required','min:5'],
          'email'=> ['required','email'],
          'contato'=> ['required'],
          'obs'=> ['nullable','min:2'],
          'endereco_numero'=> ['required'],
         
 
      ],$mensagens);
 
     
         if ($validate->fails()) {

          return response()->json(['errors'=>$validate->errors()],422);
 
      }
      
        try{

            $cliente = $this->clienteService->cadastrar($request->cliente);
            if($cliente){
               
                return response()->json('Cliente cadastrado com sucesso!');
            }

        }catch(\Illuminate\Database\QueryException $e){

           return response()->json("Não foi possível cadastrar o cliente", 201);
                      // return Response()->json($e->getMessage());    
                    
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
        //
    }
}
