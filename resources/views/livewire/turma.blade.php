
<div class="max-w-xl mx-auto mt-12 p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-xl font-semibold mb-4 text-center">Cadastro de turma</h2>

    {{-- Alerta de sucesso --}}
    @if (session()->has('message'))
        <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-800 rounded text-center text-sm">
            {{ session('message') }}
        </div>
    @endif

    {{-- Formulário --}}
    <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="space-y-4">
        <input type="text"
               wire:model="nome"
               class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nome') border-red-500 @enderror"
               placeholder="Nome da turma">
        @error('nome')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
        @enderror

        <input type="date"
               wire:model="data"
               class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500 @error('data') border-red-500 @enderror">

        @error('data')
            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
        @enderror

        <div class="flex justify-center gap-2">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition text-sm">
                {{ $isEdit ? 'Atualizar' : 'Salvar' }}
            </button>

            @if($isEdit)
                <button type="button"
                        wire:click="resetInput"
                        class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition text-sm">
                    Cancelar
                </button>
            @endif
        </div>
    </form>

    <hr class="my-4">

    {{-- Tabela --}}
    <div class="overflow-x-auto">
        <table class="w-full text-sm border-collapse text-center">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="p-2 border-b">ID</th>
                    <th class="p-2 border-b">Turma</th>
                    <th class="p-2 border-b">Data</th>
                    <th class="p-2 border-b">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($turmas as $turma)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-2">{{ $turma->id }}</td>
                        <td class="p-2">{{ $turma->nome }}</td>
                        <td class="p-2">{{ \Carbon\Carbon::parse($turma->data)->format('d/m/Y') }}</td>
                        <td class="p-2 flex justify-center gap-1">
                            <button wire:click="edit({{ $turma->id }})"
                                class="px-2 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 text-xs">
                                Editar
                            </button>
                            <button wire:click="delete({{ $turma->id }})"
                                class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-xs">
                                Excluir
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
