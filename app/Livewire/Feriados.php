<?php

namespace App\Livewire;

use App\Models\Feriado;
use Livewire\Component;

class Feriados extends Component
{
    public $nome;
    public $data;
    public $feriado_id;
    public $isEdit = false;
    public $feriados;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'data' => 'required|date',
    ];

    public function mount()
    {
        $this->loadFeriados();
    }

    public function loadFeriados()
    {
        $this->feriados = Feriado::latest()->get();
    }

    public function resetInput()
    {
        $this->nome = '';
        $this->data = '';
        $this->feriado_id = null;
        $this->isEdit = false;
    }

    public function store()
    {
        $this->validate();

        Feriado::create([
            'nome' => $this->nome,
            'data' => $this->data,
        ]);

        session()->flash('message', 'Feriado criado com sucesso!');
        $this->resetInput();
        $this->loadFeriados();
    }

    public function edit($id)
    {
        $feriado = Feriado::findOrFail($id);
        $this->feriado_id = $feriado->id;
        $this->nome = $feriado->nome;
        $this->data = $feriado->data;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->feriado_id) {
            $feriado = Feriado::find($this->feriado_id);
            $feriado->update([
                'nome' => $this->nome,
                'data' => $this->data,
            ]);

            session()->flash('message', 'Feriado atualizado com sucesso!');
            $this->resetInput();
            $this->loadFeriados();
        }
    }

    public function delete($id)
    {
        Feriado::find($id)->delete();
        session()->flash('message', 'Feriado deletado com sucesso!');
        $this->loadFeriados();
    }

    public function render()
    {
        return view('livewire.feriados')->layout('layouts.app');
    }
}
