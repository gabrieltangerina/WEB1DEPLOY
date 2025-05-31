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

                    {{-- Seção da Imagem do Produto --}}
                    @if ($venda->produto)
                    <div class="mb-6 flex flex-col items-center"> {{-- Container para centralizar o conteúdo (label e imagem/placeholder) --}}
                        <p class="block font-medium text-sm text-gray-700 mb-2">Imagem do Produto:</p>
                        @if ($venda->produto->imagem)
                        <img src="{{ $venda->produto->imagem }}"
                            alt="{{ $venda->produto->nome }}"
                            class="h-48 md:h-56 lg:h-64 w-auto max-w-full sm:max-w-md object-contain rounded-lg border-2 border-gray-200 p-1 shadow-lg bg-white">
                        {{-- Tamanhos responsivos para altura, w-auto para manter proporção, max-width para não ficar excessivamente largo --}}
                        @else
                        {{-- Placeholder se o produto existe mas não tem imagem --}}
                        <div class="h-48 md:h-56 lg:h-64 w-full max-w-full sm:max-w-md flex items-center justify-center bg-gray-100 border-2 border-gray-200 rounded-lg text-gray-500 shadow-md">
                            Produto sem imagem
                        </div>
                        @endif
                    </div>
                    @else
                    {{-- Mensagem se o produto associado à venda não for encontrado --}}
                    <div class="mb-6 text-center">
                        <p class="text-sm text-gray-500">Produto não encontrado para esta venda.</p>
                    </div>
                    @endif

                    {{-- Detalhes da Venda --}}
                    <p class="mt-1 text-sm text-gray-700"><strong>ID da Venda:</strong> {{ $venda->id }}</p>
                    <p class="mt-1 text-sm text-gray-600"><strong>Produto:</strong> {{ $venda->produto->nome ?? 'N/A' }}</p>
                    <p class="mt-1 text-sm text-gray-600"><strong>Quantidade Vendida:</strong> {{ $venda->quantidade }}</p>
                    <p class="mt-1 text-sm text-gray-600"><strong>Preço Unitário do Produto:</strong> R$ {{ number_format($venda->produto->preco ?? 0, 2, ',', '.') }}</p>
                    <p class="mt-1 text-sm text-gray-600"><strong>Valor Total da Venda:</strong> R$ {{ number_format(($venda->produto->preco ?? 0) * $venda->quantidade, 2, ',', '.') }}</p>
                    <p class="mt-1 text-sm text-gray-600"><strong>Data da Venda:</strong> {{ \Carbon\Carbon::parse($venda->data_venda)->format('d/m/Y') }}</p>
                    <p class="mt-1 text-xs text-gray-500">Registrada em: {{ $venda->created_at->format('d/m/Y H:i') }}</p>
                    <p class="mt-1 text-xs text-gray-500">Última atualização: {{ $venda->updated_at->format('d/m/Y H:i') }}</p>


                    <div class="mt-8 border-t pt-6"> {{-- Aumentei margem e adicionei borda superior --}}
                        <a href="{{ route('vendas.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-400 active:bg-gray-600 focus:outline-none focus:border-gray-600 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" /> {{-- Ícone de voltar --}}
                            </svg>
                            Voltar para Lista
                        </a>
                        @auth
                        <a href="{{ route('vendas.edit', $venda) }}" class="ml-3 inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-400 active:bg-yellow-600 focus:outline-none focus:border-yellow-600 focus:ring ring-yellow-300 disabled:opacity-25 transition ease-in-out duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" /> {{-- Ícone de editar --}}
                            </svg>
                            Editar
                        </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>