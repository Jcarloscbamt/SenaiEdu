<?php

namespace App\Livewire;
use App\Models\Turma AS TM;
use Livewire\Component;

class Turma extends Component
{
    public $isEdit;
    public $turmas;
    public $message;
    public $nome;
    public $data;
    public $id;
    protected $rules = [
        'nome' => 'required|string|max:255'        
    ];

    public function render()
    {
        return view('livewire.turma')->layout('layouts.app');
    }

    public function mount(){
        $this->carregaTurmas();
    }

    public function carregaTurmas()
    {
        $this->turmas = TM::all();
    }


    public function limparCampos()
    {
        $this->nome = '';
        $this->data = '';
        $this->isEdit = false;
    }

    public function store() //Metodo para realizar INSERT
    {
        $this->validate();
        TM::create([
            'nome' => $this->nome,
            'data' => $this->data,
        ]);

        session()->flash('message', 'Feriado criado com sucesso!');
        $this->limparCampos();
        $this->carregaTurmas();
    }

    public function edit($id)
    {
        // Usar o alias Colab
        $turmas = TM::findOrFail($id);

        $this->id = $turmas->id;
        $this->nome = $turmas->nome;
        $this->data = $turmas->data;
        $this->isEdit = true;
    }

    public function update()
        {
            $this->validate([
                'nome' => 'required|string|max:255',
                'data' => 'required|string|max:255',
                 ]);

             if ($this->id) {
            // Usar o alias Colab
            $turmas = TM::find($this->id);
            $turmas->update([
                'nome' => $this->nome,
                'data' => $this->data,
                
            ]);

            session()->flash('message', 'turma atualizado com sucesso.');
            $this->limparCampos();
            $this->carregaTurmas();
        }
    



    }

     public function delete($id)
    {
        // Usar o alias Colab
        TM::find($id)->delete();
        session()->flash('message', 'turma deletado com sucesso.');
        $this->carregaTurmas();
    }



}