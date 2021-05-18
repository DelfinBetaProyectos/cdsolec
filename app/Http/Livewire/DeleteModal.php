<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{User, Company, Route, Vehicle, Category, Setting, Type, Carry, Expense};

class DeleteModal extends Component
{
  public $model;
  public $model_id;
  public $open = false;
  public $register;
  public $route;

  public function mount($model = '---', $model_id = 0)
  {
    $this->model = $model;
    $this->model_id = $model_id;

    if ($this->model == 'Usuario') {
      $this->register = User::find($this->model_id);
      $this->route = 'users.destroy';
    }

    if ($this->model == 'Categoria') {
      $this->register = Category::find($this->model_id);
      $this->route = 'categories.destroy';
    }

    if ($this->model == 'Compañía') {
      $this->register = Company::find($this->model_id);
      $this->route = 'companies.destroy';
    }

    if ($this->model == 'Ruta') {
      $this->register = Route::find($this->model_id);
      $this->route = 'routes.destroy';
    }

    if ($this->model == 'Configuración') {
      $this->register = Setting::find($this->model_id);
      $this->route = 'settings.destroy';
    }

    if ($this->model == 'Tipo') {
      $this->register = Type::find($this->model_id);
      $this->route = 'types.destroy';
    }

    if ($this->model == 'Vehículo') {
      $this->register = Vehicle::find($this->model_id);
      $this->route = 'vehicles.destroy';
    }

    if ($this->model == 'Viaje') {
      $this->register = Carry::find($this->model_id);
      $this->route = 'carries.destroy';
    }

    if ($this->model == 'Gasto') {
      $this->register = Expense::find($this->model_id);
      $this->route = 'expenses.destroy';
    }
  }

  public function render()
  {
    return view('livewire.delete-modal');
  }

  public function confirmDeletion()
  {
    $this->open = true;
  }
}