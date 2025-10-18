<?php

namespace App\Livewire;

use App\Models\Cargo;
use Livewire\Component;

class ColaboradorCargo extends Component
{
    public $cargos;       // lista para exibir
    public $nome;         // campo do cargo
    public $cargo_id;     // para editar
    public $isEdit = false;

    protected $rules = [
        'nome' => 'required|string|max:255|unique:cargos,nome',
    ];

    public function mount()
    {
        $this->loadCargos();
    }

    public function loadCargos()
    {
        $this->cargos = Cargo::latest()->get();
    }

    public function resetInput()
    {
        $this->nome = '';
        $this->cargo_id = null;
        $this->isEdit = false;
    }

    public function store()
    {
        $this->validate();

        Cargo::create([
            'nome' => $this->nome,
        ]);

        session()->flash('message', 'Cargo criado com sucesso.');
        $this->resetInput();
        $this->loadCargos();
    }

    public function edit($id)
    {
        $cargo = Cargo::findOrFail($id);
        $this->cargo_id = $cargo->id;
        $this->nome = $cargo->nome;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate([
            'nome' => 'required|string|max:255|unique:cargos,nome,' . $this->cargo_id,
        ]);

        if ($this->cargo_id) {
            $cargo = Cargo::find($this->cargo_id);
            $cargo->update([
                'nome' => $this->nome,
            ]);

            session()->flash('message', 'Cargo atualizado com sucesso.');
            $this->resetInput();
            $this->loadCargos();
        }
    }

    public function delete($id)
    {
        Cargo::find($id)->delete();
        session()->flash('message', 'Cargo deletado com sucesso.');
        $this->loadCargos();
    }

    public function render()
    {
        return view('livewire.colaborador-cargo')->layout('layouts.app');
    }
}
