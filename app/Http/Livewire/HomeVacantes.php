<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacantes extends Component
{

    public $termino, $categoria, $salario;

    //escuchamos los emit del componente hijo FiltrarVacantes.php que trae la informacion del formulario de busqueda, si se ecuentra manda ejecutar la funcion buscar
    protected $listeners = ['terminosBusqueda' => 'buscar'];



    public function buscar($termino, $categoria, $salario)
    {
        $this->termino = $termino;
        $this->categoria = $categoria;
        $this->salario = $salario;
    }


    public function render()
    {

        //$vacantes = Vacante::all();

        //se ejecuta la budsqueda si el parametro termino tiene un valor, en caso de tener, se ejecuta la funcion
        $vacantes = Vacante::when($this->termino, function ($query) {
            $query->where('titulo', 'LIKE', "%" . $this->termino . "%");
        })
        //busca el termino en el campo de empresa
        ->when($this->termino, function ($query) {
            $query->orWhere('empresa', 'LIKE', "%" . $this->termino . "%");
        })
        //busca la categoria
        ->when($this->categoria, function ($query) {
            $query->where('categoria_id', $this->categoria);
        })
        //busca el salario
        ->when($this->salario, function ($query) {
            $query->where('salario_id', $this->salario);
        })
        //regresamos el resultado paginado
        ->paginate(20);


        return view('livewire.home-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
