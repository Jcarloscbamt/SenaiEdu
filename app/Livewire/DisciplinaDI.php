<?php

namespace App\Livewire;

use App\Models\Disciplina;
use Livewire\Component;

class DisciplinaDI extends Component
{
    public $disciplina;       // lista para exibir
    public $nome;         // campo do cargo
    public $disciplina_id;     // para editar
    public $isEdit = false;

    protected $rules = [
        'nome' => 'required|string|max:255|unique:disciplinas,nome',
    ];

    public function mount()
    {
        $this->loadDisciplina();
    }

    public function loadDisciplina()
    {
        $this->disciplina = Disciplina::latest()->get();
    }

    public function resetInput()
    {
        $this->nome = '';
        $this->disciplina_id = null;
        $this->isEdit = false;
    }

    public function store()
    {
        $this->validate();

        Disciplina::create([
            'nome' => $this->nome,
        ]);

        session()->flash('message', 'Disciplina criado com sucesso.');
        $this->resetInput();
        $this->loadDisciplina();
    }

    public function edit($id)
    {
        $disciplina = Disciplina::findOrFail($id);
        $this->disciplina_id = $disciplina->id;
        $this->nome = $disciplina->nome;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate([
            'nome' => 'required|string|max:255|unique:disciplinas,nome,' . $this->disciplina_id,
        ]);

        if ($this->disciplina_id) {
            $disciplina = Disciplina::find($this->disciplina_id);
            $disciplina->update([
                'nome' => $this->nome,
            ]);

            session()->flash('message', 'Disciplina atualizado com sucesso.');
            $this->resetInput();
            $this->loadDisciplina();
        }
    }

    public function delete($id)
    {
        Disciplina::find($id)->delete();
        session()->flash('message', 'Disciplina deletado com sucesso.');
        $this->loadDisciplina();
    }

    public function render()
    {
        return view('livewire.disciplina')->layout('layouts.app');
    }
}
