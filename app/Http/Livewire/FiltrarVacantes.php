<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;

class FiltrarVacantes extends Component
{

    public $termino, $categoria, $salario;

    public function leerDatosFormulario()
    {
        //pasar los valores de este componente hacia el componente padre, el padre HomeVacantes.php tiene un listener para escuchar el emit
        $this->emit('terminosBusqueda', $this->termino, $this->categoria, $this->salario);
    }

    public function render()
    {

        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.filtrar-vacantes', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
