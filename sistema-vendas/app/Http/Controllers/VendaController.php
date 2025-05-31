<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller
{
    public function index()
    {
        $vendas = Venda::with('produto')->latest()->paginate(10);
        return view('vendas.index', compact('vendas'));
    }

    public function create()
    {

        $produtos = Produto::where('estoque', '>', 0)->orderBy('nome')->get();
        if ($produtos->isEmpty()) {
            return redirect()->route('produtos.index')->with('warning', 'Não há produtos com estoque disponíveis para venda.');
        }
        return view('vendas.create', compact('produtos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
            'data_venda' => 'required|date',
        ]);

        try {
            DB::beginTransaction();

            $produto = Produto::findOrFail($request->produto_id);
            $quantidadeVendida = (int)$request->quantidade;

            if ($produto->estoque < $quantidadeVendida) {
                DB::rollBack();
                return back()->withErrors(['quantidade' => 'Estoque insuficiente para o produto ' . $produto->nome . '. Disponível: ' . $produto->estoque])->withInput();
            }

            Venda::create([
                'produto_id' => $produto->id,
                'quantidade' => $quantidadeVendida,
                'data_venda' => $request->data_venda,
            ]);

            $produto->decrement('estoque', $quantidadeVendida);

            DB::commit();
            return redirect()->route('vendas.index')->with('success', 'Venda registrada com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Erro ao registrar venda: ' . $e->getMessage())->withInput();
        }
    }

    public function show(Venda $venda)
    {
        $venda->load('produto');
        return view('vendas.show', compact('venda'));
    }

    public function edit(Venda $venda)
    {

        $produtoAtualDaVenda = Produto::find($venda->produto_id);
        $produtosParaSelecao = Produto::orderBy('nome')->get();
        $estoqueAparenteProdutoAtual = $produtoAtualDaVenda ? $produtoAtualDaVenda->estoque + $venda->quantidade : 0;

        return view('vendas.edit', compact('venda', 'produtosParaSelecao', 'produtoAtualDaVenda', 'estoqueAparenteProdutoAtual'));
    }

    public function update(Request $request, Venda $venda)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
            'data_venda' => 'required|date',
        ]);

        try {
            DB::beginTransaction();

            $produtoAnterior = Produto::findOrFail($venda->produto_id);
            $quantidadeAnterior = $venda->quantidade;

            $novoProduto = Produto::findOrFail($request->produto_id);
            $novaQuantidade = (int)$request->quantidade;


            $produtoAnterior->increment('estoque', $quantidadeAnterior);


            if ($novoProduto->estoque < $novaQuantidade) {

                $produtoAnterior->decrement('estoque', $quantidadeAnterior);
                DB::rollBack();
                return back()->withErrors(['quantidade' => 'Estoque insuficiente para o produto ' . $novoProduto->nome . '. Disponível: ' . $novoProduto->estoque])->withInput();
            }


            $novoProduto->decrement('estoque', $novaQuantidade);


            $venda->update([
                'produto_id' => $novoProduto->id,
                'quantidade' => $novaQuantidade,
                'data_venda' => $request->data_venda,
            ]);

            DB::commit();
            return redirect()->route('vendas.index')->with('success', 'Venda atualizada com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('error', 'Erro ao atualizar venda: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(Venda $venda)
    {
        try {
            DB::beginTransaction();

            $produto = Produto::find($venda->produto_id);

            if ($produto) {
                $produto->increment('estoque', $venda->quantidade);
            }

            $venda->delete();

            DB::commit();
            return redirect()->route('vendas.index')->with('success', 'Venda excluída com sucesso e estoque estornado!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('vendas.index')->with('error', 'Erro ao excluir venda: ' . $e->getMessage());
        }
    }
}
