<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Nova Venda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

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

                    @if (session('warning'))
                    <div class="mb-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded" role="alert">
                        <p>{{ session('warning') }}</p>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('vendas.store') }}">
                        @csrf
                        <div class="mt-4">
                            <x-input-label for="produto_id" :value="__('Produto')" />
                            <select id="produto_id" name="produto_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                <option value="">Selecione um produto</option>
                                @foreach ($produtos as $produto)
                                <option value="{{ $produto->id }}" {{ old('produto_id') == $produto->id ? 'selected' : '' }}>
                                    {{ $produto->nome }} (Estoque: {{ $produto->estoque }})
                                </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('produto_id')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="quantidade" :value="__('Quantidade Vendida')" />
                            <x-text-input id="quantidade" class="block mt-1 w-full" type="number" name="quantidade" :value="old('quantidade', isset($venda) ? $venda->quantidade : 1)" required min="1" />
                            <x-input-error :messages="$errors->get('quantidade')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="data_venda" :value="__('Data da Venda')" />
                            <x-text-input id="data_venda" class="block mt-1 w-full" type="date" name="data_venda" :value="old('data_venda', date('Y-m-d'))" required />
                            <x-input-error :messages="$errors->get('data_venda')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Salvar Venda') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>