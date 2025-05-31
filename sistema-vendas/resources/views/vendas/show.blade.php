<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes da Venda ID: ') }} {{ $venda->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <p class="mt-1 text-sm text-gray-600"><strong>Produto:</strong> {{ $venda->produto->nome ?? 'N/A' }}</p>
                    <p class="mt-1 text-sm text-gray-600"><strong>Quantidade Vendida:</strong> {{ $venda->quantidade }}</p>
                    <p class="mt-1 text-sm text-gray-600"><strong>Preço Unitário do Produto (Exemplo):</strong> R$ {{ number_format($venda->produto->preco ?? 0, 2, ',', '.') }}</p>
                    <p class="mt-1 text-sm text-gray-600"><strong>Valor Total da Venda (Exemplo):</strong> R$ {{ number_format(($venda->produto->preco ?? 0) * $venda->quantidade, 2, ',', '.') }}</p> {{-- NOVO - VALOR TOTAL --}}
                    <p class="mt-1 text-sm text-gray-600"><strong>Data da Venda:</strong> {{ \Carbon\Carbon::parse($venda->data_venda)->format('d/m/Y') }}</p>

                    <div class="mt-6">
                        <a href="{{ route('vendas.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-400 active:bg-gray-600 focus:outline-none focus:border-gray-600 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Voltar para Lista
                        </a>
                        @auth
                        <a href="{{ route('vendas.edit', $venda) }}" class="ml-2 inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-400 active:bg-yellow-600 focus:outline-none focus:border-yellow-600 focus:ring ring-yellow-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Editar
                        </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>