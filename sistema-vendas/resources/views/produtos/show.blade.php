<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes do Produto: ') }} {{ $produto->nome }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if($produto->imagem)
                    <div class="mb-4 flex justify-center">
                        <img src="{{ $produto->imagem }}" alt="{{ $produto->nome }}" class="max-w-xs w-75 h-75 rounded-lg shadow-md">
                    </div>
                    @else
                    <p class="mb-4 text-sm text-gray-500">Este produto não possui imagem.</p>
                    @endif

                    <h3 class="text-lg font-medium text-gray-900">{{ $produto->nome }}</h3>
                    <p class="mt-1 text-sm text-gray-600"><strong>Descrição:</strong> {{ $produto->descricao ?: 'N/A' }}</p>
                    <p class="mt-1 text-sm text-gray-600"><strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                    <p class="mt-1 text-sm text-gray-600"><strong>Estoque:</strong> {{ $produto->estoque }}</p>

                    <p class="mt-1 text-sm text-gray-500">Cadastrado em: {{ $produto->created_at->format('d/m/Y H:i') }}</p>
                    <p class="mt-1 text-sm text-gray-500">Última atualização: {{ $produto->updated_at->format('d/m/Y H:i') }}</p>

                    <div class="mt-6">
                        <a href="{{ route('produtos.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-400 active:bg-gray-600 focus:outline-none focus:border-gray-600 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Voltar para Lista
                        </a>
                        @auth
                        <a href="{{ route('produtos.edit', $produto) }}" class="ml-2 inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-400 active:bg-yellow-600 focus:outline-none focus:border-yellow-600 focus:ring ring-yellow-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Editar
                        </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>