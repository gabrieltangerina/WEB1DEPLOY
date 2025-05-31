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
                    <form method="POST" action="{{ route('vendas.update', $venda) }}">
                        @csrf
                        @method('PUT')

                        <div class="mt-4">
                            <x-input-label for="produto_id" :value="__('Produto')" />
                            <select id="produto_id" name="produto_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                <option value="">Selecione um produto</option>
                                @foreach ($produtos as $produto)
                                <option value="{{ $produto->id }}" {{ old('produto_id', $venda->produto_id) == $produto->id ? 'selected' : '' }}>
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
                            <x-text-input id="data_venda" class="block mt-1 w-full" type="date" name="data_venda" :value="old('data_venda', $venda->data_venda)" required />
                            <x-input-error :messages="$errors->get('data_venda')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
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