<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\{AdminCreateUserRequest, AdminUpdateUserRequest};
use App\Models\User;
use App\Queries\UserFilter;
use Bouncer;
use Illuminate\Http\Request;

class UserController extends Controller
{
  /**
   * Instantiate a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware(['auth', 'role:admin']);
  }

  /**
   * Display a listing of the resource.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Queries\UserFilter   $filters
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request, UserFilter $filters)
  {
    $roles = Bouncer::role()->all();

    if (isset($request->role)) {
      $users = User::query()
                    ->filterBy($filters, $request->only(['search', 'from', 'to']))
                    ->whereIs($request->role)
                    ->orderBy('first_name', 'ASC')
                    ->orderBy('last_name', 'ASC')
                    ->paginate();
    } else {
      $users = User::query()
                    ->filterBy($filters, $request->only(['search', 'from', 'to']))
                    ->orderBy('first_name', 'ASC')
                    ->orderBy('last_name', 'ASC')
                    ->paginate();
    }

    $users->appends($filters->valid());

    return view('admin.users.index')->with('users', $users)->with('roles', $roles);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $roles = Bouncer::role()->all();

    return view('admin.users.create')->with('roles', $roles);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\Users\AdminCreateUserRequest  $request
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function store(AdminCreateUserRequest $request, User $user)
  {
    $request->createProfile($user);

    return redirect()->route('users.index')->with('message', 'Usuario agregado con éxito.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function show(User $user)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function edit(User $user)
  {
    $roles = Bouncer::role()->all();

    return view('admin.users.edit', compact('user', 'roles'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\Users\AdminUpdateUserRequest  $request
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function update(AdminUpdateUserRequest $request, User $user)
  {
    $request->updateProfile($user);

    return redirect()->route('users.index')->with('message', 'Usuario actualizado con éxito.');
  }

  /**
   * Show the form for editing password the specified resource.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function password(User $user)
  {
    return view ('admin.users.password', compact('user'));
  }

  /**
   * Update password the specified resource in storage.
   *
   * @param  \App\Models\User  $user
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function passwordUpdate(Request $request, User $user)
  {
    $request->validate([
      'password' => 'required|min:8',
      'password_confirmation' => 'same:password|min:8'
    ], [
      'password.required' => 'Nueva contraseña requerida',
      'password.min' => 'La contraseña debe tener al menos 8 caracteres',
      'password_confirmation.same' => 'Las contraseñas no coinciden',
    ]);
    
    $user->update(['password' => bcrypt($request->password)]);

    return redirect()->route('users.index')->with('message', 'Contraseña cambiada con éxito.');
  }

  /**
   * Update Active.
   *
   * @param  \App\Models\User  $user
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function update_active(Request $request, User $user)
  {
    $user->update(['active' => $request->value]);

    return response()->json(['success' => 'true', 'message' => 'Active Updated']);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function destroy(User $user)
  {
    $user->delete();
    
    return redirect()->route('users.index')->with('message', 'Usuario eliminado con éxito.');
  }

  /**
   * Display a listing trashed of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function trash()
  {
    $users = User::onlyTrashed()->orderBy('first_name', 'ASC')->orderBy('last_name', 'ASC')->paginate();

    return view('admin.users.trash')->with('users', $users);
  }

  /**
   * Restore the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function restore(int $id)
  {
    $user = User::onlyTrashed()->where('id', $id)->first();
    
    $user->restore();

    return redirect()->back()->with('message', 'Usuario restaurado con éxito.');
  }

  /**
   * Delete the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function delete(int $id)
  {
    $user = User::onlyTrashed()->where('id', $id)->first();

    $user->forceDelete();

    return redirect()->back()->with('message', 'Usuario destruído con éxito.');
  }
}
