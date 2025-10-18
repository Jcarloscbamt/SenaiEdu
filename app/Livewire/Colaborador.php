<?php

namespace App\Livewire;

use App\Models\Colaborador AS Colab; // Alias definido
use App\Models\Cargo;
use Livewire\Component;

class Colaborador extends Component
{
    public $colaboradores;
    public $cargos;

    public $nome;
    public $email;
    public $telefone;
    public $cargo_id;

    public $colaborador_id;
    public $isEdit = false;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'email' => 'required|email|unique:colaboradors,email',
        'telefone' => 'nullable|string|max:20',
        'cargo_id' => 'required|exists:cargos,id',
    ];

    public function mount()
    {
        $this->cargos = Cargo::all();
        $this->loadColaboradores();
    }

    public function loadColaboradores()
    {
        // Usar o alias Colab em vez de Colaborador
        $this->colaboradores = Colab::with('cargo')->latest()->get();
    }

    public function resetInput()
    {
        $this->nome = '';
        $this->email = '';
        $this->telefone = '';
        $this->cargo_id = '';
        $this->colaborador_id = null;
        $this->isEdit = false;
    }

    public function store()
    {
        $this->validate();

        // Usar o alias Colab
        Colab::create([
            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'cargo_id' => $this->cargo_id,
        ]);

        session()->flash('message', 'Colaborador criado com sucesso.');
        $this->resetInput();
        $this->loadColaboradores();
    }

    public function edit($id)
    {
        // Usar o alias Colab
        $colaborador = Colab::findOrFail($id);

        $this->colaborador_id = $colaborador->id;
        $this->nome = $colaborador->nome;
        $this->email = $colaborador->email;
        $this->telefone = $colaborador->telefone;
        $this->cargo_id = $colaborador->cargo_id;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:colaboradors,email,' . $this->colaborador_id,
            'telefone' => 'nullable|string|max:20',
            'cargo_id' => 'required|exists:cargos,id',
        ]);

        if ($this->colaborador_id) {
            // Usar o alias Colab
            $colaborador = Colab::find($this->colaborador_id);
            $colaborador->update([
                'nome' => $this->nome,
                'email' => $this->email,
                'telefone' => $this->telefone,
                'cargo_id' => $this->cargo_id,
            ]);

            session()->flash('message', 'Colaborador atualizado com sucesso.');
            $this->resetInput();
            $this->loadColaboradores();
        }
    }

    public function delete($id)
    {
        // Usar o alias Colab
        Colab::find($id)->delete();
        session()->flash('message', 'Colaborador deletado com sucesso.');
        $this->loadColaboradores();
    }

    public function render()
    {
        return view('livewire.colaborador')->layout('layouts.app');
    }
}