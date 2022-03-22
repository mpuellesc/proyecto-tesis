<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\ChangePasswordRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Image as Intervention;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:users.index',
            'permission:users.create',
            'permission:users.store',
            'permission:users.show',
            'permission:users.edit',
            'permission:users.update',
            'permission:users.destroy',
            'permission:web.update_client',
            'permission:web.update_password',
        ]);
    }
    
    public function index()
    {
        $users = User::with('roles')->
        get();
        return view('admin.user.index', compact('users'));
    }
    public function create()
    {
        $roles = Role::get();
        return view('admin.user.create', compact('roles'));
    }

    public function upload_image($image){
        $nombre = time().$image->getClientOriginalName();
        $formatted_image = Intervention::make($image);
        $formatted_image->fit(160, 65);
        $formatted_image->save(public_path('/image/'. $nombre));
        $ruta = '/image/'.$nombre;
        return $ruta;
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        $user->update(['password'=> Hash::make($request->password)]);
        $user->roles()->sync($request->get('roles'));
        $image = $request->file('file');
        $ruta = self::upload_image($image);
        $user->image()->create(['url' => $ruta]);
        return redirect()->route('users.index')->with('toast_success', '¡Usuario creado con éxito!');
    }
    public function show(User $user)
    {
        $total_purchases = 0;
        foreach ($user->sales as $key =>  $sale) {
            $total_purchases+=$sale->total;
        }
        $total_amount_sold = 0;
        foreach ($user->purchases as $key =>  $purchase) {
            $total_amount_sold+=$purchase->total;
        }
        return view('admin.user.show', compact('user', 'total_purchases', 'total_amount_sold'));
    }
    public function edit(User $user)
    {
        $roles = Role::get();
        return view('admin.user.edit', compact('user', 'roles'));
    }
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->get('roles'));
        return redirect()->route('users.index')->with('toast_success', '¡Usuario actualizado con éxito!');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('toast_success', '¡Usuario eliminado con éxito!');
    }
    public function update_client(Request $request, User $user){
        $user->update_client($request);
        return back();
    }
    public function update_password(ChangePasswordRequest $request, User $user){
        $user->update([
            'password' => Hash::make($request->password)
        ]);
        return back();
    }
}
