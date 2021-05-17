<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DestroyModal extends Component
{
  public $model;
  public $model_id;
  public $open = false;
  public $route;

  public function mount($model = '---', $model_id = 0)
  {
    $this->model = $model;
    $this->model_id = $model_id;

    if ($this->model == 'Usuario') { $this->route = 'users.delete'; }
    if ($this->model == 'Categoria') { $this->route = 'categories.delete'; }
    if ($this->model == 'Configuración') { $this->route = 'settings.delete'; }
    if ($this->model == 'Compañía') { $this->route = 'companies.delete'; }
    if ($this->model == 'Ruta') { $this->route = 'routes.delete'; }
    if ($this->model == 'Tipo') { $this->route = 'types.delete'; }
    if ($this->model == 'Vehículo') { $this->route = 'vehicles.delete'; }
    if ($this->model == 'Viaje') { $this->route = 'carries.delete'; }
    if ($this->model == 'Gasto') { $this->route = 'expenses.destroy'; }
  }

  public function render()
  {
    return view('livewire.destroy-modal');
  }

  public function confirmDestroy()
  {
    $this->open = true;
  }
}
