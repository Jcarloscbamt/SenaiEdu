<div class="max-w-4xl mx-auto mt-8 px-4">
    <h2 class="text-2xl font-semibold mb-6">Cadastro de Cargos</h2>

    {{-- Mensagem de sucesso --}}
    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded">
            {{ session('message') }}
        </div>
    @endif

    {{-- Formulário --}}
    <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">
        <div class="mb-4">
            <input type="text"
                   wire:model="nome"
                   class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nome') border-red-500 @enderror"
                   placeholder="Nome do cargo">

            @error('nome') 
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                {{ $isEdit ? 'Atualizar' : 'Salvar' }}
            </button>

            @if($isEdit)
                <button type="button"
                        wire:click="resetInput"
                        class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
                    Cancelar
                </button>
            @endif
        </div>
    </form>

    <hr class="my-8">

    {{-- Tabela --}}
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="p-3 border-b">ID</th>
                    <th class="p-3 border-b">Nome do Cargo</th>
                    <th class="p-3 border-b">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cargos as $cargo)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">{{ $cargo->id }}</td>
                        <td class="p-3">{{ $cargo->nome }}</td>
                        <td class="p-3 space-x-2">
                            <button wire:click="edit({{ $cargo->id }})"
                                    class="inline-block px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 transition text-sm">
                                Editar
                            </button>

                            <button wire:click="delete({{ $cargo->id }})"
                                    class="inline-block px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition text-sm">
                                Excluir
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
