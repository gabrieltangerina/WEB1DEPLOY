<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Produto: ') }} {{ $produto->nome }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('produtos.update', $produto) }}">
                        @csrf
                        @method('PUT')

                        {{-- Campos do formulário: Nome, Descrição, Preço, Estoque --}}
                        <div>
                            <x-input-label for="nome" :value="__('Nome')" />
                            <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome', $produto->nome)" required autofocus />
                            <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="descricao" :value="__('Descrição')" />
                            <textarea id="descricao" name="descricao" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('descricao', $produto->descricao) }}</textarea>
                            <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="preco" :value="__('Preço')" />
                            <x-text-input id="preco" class="block mt-1 w-full" type="number" step="0.01" name="preco" :value="old('preco', $produto->preco)" required />
                            <x-input-error :messages="$errors->get('preco')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="estoque" :value="__('Estoque')" />
                            <x-text-input id="estoque" class="block mt-1 w-full" type="number" name="estoque" :value="old('estoque', $produto->estoque)" required />
                            <x-input-error :messages="$errors->get('estoque')" class="mt-2" />
                        </div>
                        {{-- Fim dos campos do formulário --}}


                        <div class="mt-4">
                            <x-input-label for="imagem" :value="__('Imagem (URL ou Caminho)')" />
                            <x-text-input id="imagem" class="block mt-1 w-full" type="text" name="imagem" :value="old('imagem', $produto->imagem)" />
                            <x-input-error :messages="$errors->get('imagem')" class="mt-2" />

                            @if ($produto->imagem)
                            <div class="mt-4">
                                <p class="text-sm text-gray-600 mb-1">Imagem Atual:</p>
                                <img src="{{ $produto->imagem }}" alt="Imagem Atual de {{ $produto->nome }}" class="h-48 md:h-56 lg:h-64 w-auto max-w-full sm:max-w-md object-contain rounded-lg border-2 border-gray-200 p-1 shadow-lg bg-white">
                            </div>
                            @endif
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Atualizar Produto') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>