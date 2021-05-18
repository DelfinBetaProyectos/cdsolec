<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ModelEliminar extends Component
{
  public $detalle;
  public $model_id;
  public $open = false;
  public $route;
  public $method;


  public function mount($detalle = '---', $model_id = 0, $route = 404, $method='destroy')
  {    
    $this->detalle = $detalle;
    $this->model_id = $model_id;
    $this->route = $route;
    $this->method = $method;
  }

  public function render()
  {
    return view('livewire.model-eliminar');
  }

  public function confirmDeletion()
  {
    $this->open = true;
  }
}