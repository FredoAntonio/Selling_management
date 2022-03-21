<?php

namespace App\Http\Controllers\Venda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Services\ClienteService;
use App\Services\VendedorService;
use App\Services\VendaService;
use PDF;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\PedidoEmail;
use Illuminate\Support\Facades\Storage;
class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $clienteService;
    protected $vendedorService;
    protected $vendaService;
    public function __construct(ClienteService $clienteService, VendedorService $vendedorService, VendaService $vendaService)
    {


        $this->middleware(['auth']);
        $this->clienteService = $clienteService;
        $this->vendedorService = $vendedorService;
        $this->vendaService = $vendaService;
    }

    public function index()
    {

        $data['clientes'] = $this->clienteService->clienteAll();
        $data['data_atual'] = date('Y-m-d');
        $data['vendedor'] =  $this->vendedorService->vendedorLogado();

        return  Inertia::render('Venda/IndexVenda', $data);
    }

    public function vendasPorData(Request $request)
    {




        $vendas = $this->vendaService->vendasPorData($request->pesquisa);



        return Response()->json($vendas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function criar()
    {
        $data['vendedor'] =  $this->vendedorService->vendedorLogado();
        $data['ultima_venda'] = $this->vendaService->ultimaVendaId();

        return  Inertia::render('Venda/CriarVenda', $data);
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cadastrar(Request $request)
    {
        $venda = $request->venda;

        $mensagens = [
            //'required' => 'O :attribute é obrigatório!',
            'empresa_id.required' => 'A empresa é obrigatória!',
            //'empresa_id.gt' => 'A empresa é obrigatória!',
            'cliente_id.required' => 'O cliente é obrigatório!',
            // 'cliente_id.gt' => 'O cliente é obrigatório!',
            'vendedor_id.required' => 'O vendedor é obrigatório!',
            //'vendedor_id.gt' => 'O vendedor é obrigatório!',
            'prazo_pagamento.required' => 'O prazo de pagamento é obrigatório!',
            'data_entrega.required' => 'A data de entrega é obrigatória!',
            'data_entrega.date' => 'A data de entrega digitada é inválida!',
            //'data_entrega.after' => 'A data de entrega deve ser maior que a data atual!',
            'total.gt' => 'Por favor verifique o total de venda!',

            'forma_pagamento.required' => 'A forma de pagamento é obrigatória!'
        ];
        $validate = Validator::make($venda, [

            //'empresa_id' => ['required','gt:0'],
            'empresa_id' => ['required', 'numeric'],
            'cliente_id' => ['required', 'numeric'],
            'vendedor_id' => ['required', 'numeric'],
            'flag' => ['required', 'numeric'],
            'prazo_pagamento' => ['required', 'numeric'],
            'data_entrega' => ['required', 'date'],

            'forma_pagamento' => ['required', 'numeric'],
            'descontoTotal' => ['required', 'numeric'],
            //'total' => ['required','gt:0', 'numeric'],

        ], $mensagens);


        if ($validate->fails()) {


            return response()->json(['errors' => $validate->errors()], 422);
        } else {
            if (sizeOf($venda['produtos']) == 0) {
                return response()->json('Não é possível realizar uma venda sem produtos!', 201);
            } else {
                $venda = $this->vendaService->cadastrar($request->venda);


                return Response()->json($venda);
            }
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function enviarPedidoPorEmail(PedidoEmail $pedidoEmail)
    {

     Mail::to('iamcambundo@gmail.com')->send($pedidoEmail);

        return response()->json('Email enviado com sucesso!');
               
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function gerarDocPedido()
    {

        $pdf = PDF::loadView('documentos.vendas.pedido');
        //Storage::put('pdf/fatura.pdf', $pdf->output()); // grande solucao para guardar o pdf na pasta public
        //return PDF::loadFile(public_path().'/myfile.html')->save('/path-to/my_stored_file.pdf')->stream('download.pdf'); // pega o pdf e salva em uma pasta 


        return $pdf->stream('pedido.pdf');
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
