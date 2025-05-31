<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Venda ID: ') }} {{ $venda->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Bloco para exibir erros de validação e sessão --}}
                    @if ($errors->any())
                    <div class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded" role="alert">
                        <p class="font-bold">Por favor, corrija os erros abaixo:</p>
                        <ul class="mt-2 list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded" role="alert">
                        <p>{{ session('error') }}</p>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('vendas.update', $venda) }}">
                        @csrf
                        @method('PUT')

                        {{-- Seção da Imagem do Produto Atual --}}
                        @if ($produtoAtualDaVenda)
                        <div class="mb-6 flex flex-col items-center"> {{-- Container para centralizar --}}
                            <p class="block font-medium text-sm text-gray-700 mb-2">Imagem do Produto Atual:</p>
                            @if ($produtoAtualDaVenda->imagem)
                            <img src="{{ $produtoAtualDaVenda->imagem }}"
                                alt="{{ $produtoAtualDaVenda->nome }}"
                                class="h-48 md:h-56 lg:h-64 w-auto max-w-full sm:max-w-md object-contain rounded-lg border-2 border-gray-200 p-1 shadow-lg bg-white">
                            {{-- h-40 (160px), max-w-xs (320px) para não ficar muito largo --}}
                            @else
                            {{-- Placeholder se o produto existe mas não tem imagem --}}
                            <div class="h-40 w-full max-w-xs flex items-center justify-center bg-gray-100 border-2 border-gray-200 rounded-lg text-gray-500 shadow-md">
                                Este produto não possui imagem
                            </div>
                            @endif
                        </div>
                        @else
                        {{-- Mensagem se o produto original da venda não for encontrado --}}
                        <div class="mb-6 text-center">
                            <p class="block font-medium text-sm text-gray-700 mb-2">Imagem do Produto Atual:</p>
                            <div class="h-40 w-full max-w-xs flex items-center justify-center bg-gray-100 border-2 border-gray-200 rounded-lg text-gray-500 shadow-md">
                                Produto original não encontrado
                            </div>
                        </div>
                        @endif


                        <div class="mt-4">
                            <x-input-label for="produto_id" :value="__('Produto')" />
                            <select id="produto_id" name="produto_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                <option value="">Selecione um produto</option>
                                @foreach ($produtosParaSelecao as $produtoOption)
                                <option value="{{ $produtoOption->id }}" {{ old('produto_id', $venda->produto_id) == $produtoOption->id ? 'selected' : '' }}>
                                    @if($produtoAtualDaVenda && $produtoAtualDaVenda->id == $produtoOption->id)
                                    {{ $produtoOption->nome }} (Est. atual: {{ $produtoOption->estoque }} / Disp. antes da venda: {{ $estoqueAparenteProdutoAtual }})
                                    @else
                                    {{ $produtoOption->nome }} (Estoque: {{ $produtoOption->estoque }})
                                    @endif
                                </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('produto_id')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="quantidade" :value="__('Quantidade Vendida')" />
                            <x-text-input id="quantidade" class="block mt-1 w-full" type="number" name="quantidade" :value="old('quantidade', $venda->quantidade)" required min="1" />
                            <x-input-error :messages="$errors->get('quantidade')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="data_venda" :value="__('Data da Venda')" />
                            <x-text-input id="data_venda" class="block mt-1 w-full" type="date" name="data_venda" :value="old('data_venda', $venda->data_venda)" required />
                            <x-input-error :messages="$errors->get('data_venda')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-6 border-t pt-6">
                            <a href="{{ route('vendas.show', $venda) }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4" style="margin-right: 10px;">
                                Cancelar
                            </a>

                            <x-primary-button>
                                {{ __('Atualizar Venda') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>