<?php

namespace App\Livewire;

use App\Models\Professor AS Colab; // Alias definido
use App\Models\Cargo;
use Livewire\Component;

class Professor extends Component
{
    public $colaboradores;
    public $cargos;

    public $cpf;
    public $data_nascimento;

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
        $this->cpf = '';
        $this->email = '';
        $this->telefone = '';
        $this->data_nascimento = '';
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
            'cpf' => $this->cpf,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'data_nascimento' => $this->data_nascimento,
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
        $this->cpf= $colaborador->cpf;
        $this->email = $colaborador->email;
        $this->telefone = $colaborador->telefone;
        $this->data_nascimento = $colaborador->data_nascimento;
        $this->cargo_id = $colaborador->cargo_id;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:11',
            'email' => 'required|email|unique:colaboradors,email,' . $this->colaborador_id,
            'telefone' => 'nullable|string|max:20',
            'data_nascimento' => 'required|string|max:255',
            'cargo_id' => 'required|exists:cargos,id',
        ]);

        if ($this->colaborador_id) {
            // Usar o alias Colab
            $colaborador = Colab::find($this->colaborador_id);
            $colaborador->update([
                'nome' => $this->nome,
                'cpf' => $this->cpf,
                'email' => $this->email,
                'telefone' => $this->telefone,
                'data_nascimento' => $this->data_nascimento,
                'cargo_id' => $this->cargo_id,
            ]);

            session()->flash('message', 'Professor atualizado com sucesso.');
            $this->resetInput();
            $this->loadColaboradores();
        }
    }

    public function delete($id)
    {
        // Usar o alias Colab
        Colab::find($id)->delete();
        session()->flash('message', 'Professor deletado com sucesso.');
        $this->loadColaboradores();
    }

    public function render()
    {
        return view('livewire.professor')->layout('layouts.app');
    }
}