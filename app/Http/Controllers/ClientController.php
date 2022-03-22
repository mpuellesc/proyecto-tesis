<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Client\StoreRequest;
use App\Http\Requests\Client\UpdateRequest;
use App\Models\Profile;
use Throwable;
use Image as Intervention;


class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:clients.index',
            'permission:clients.create',
            'permission:clients.store',
            'permission:clients.show',
            'permission:clients.edit',
            'permission:clients.update',
            'permission:clients.destroy'
        ]);
    }
    public function index()
    {
        $clients = User::role('Client')->get();
        return view('admin.client.index', compact('clients'));
    }
    public function create()
    {
        return view('admin.client.create');
    }

    public function upload_image($image){
        $nombre = time().$image->getClientOriginalName();
        $formatted_image = Intervention::make($image);
        $formatted_image->fit(160, 65);
        $formatted_image->save(public_path('/image/'. $nombre));
        $ruta = '/image/'.$nombre;
        return $ruta;
    }

    public function store(StoreRequest $request)
    {
        $user = User::create($request->all())->assignRole('Client');
        $image = $request->file('file');
        $ruta = self::upload_image($image);
        $user->image()->create(['url' => $ruta]);
        
        if ($request->sale == 1) {
            return redirect()->back();
        }
        return redirect()->route('clients.index')->with('toast_success', '¡Cliente registrado con éxito!');
    }
    public function show(User $client)
    {
        $total_purchases = 0;
        foreach ($client->sales as $key =>  $sale) {
            $total_purchases+=$sale->total;
        }
        return view('admin.client.show', compact('client', 'total_purchases'));
    }
    public function edit(User $client)
    {
        return view('admin.client.edit', compact('client'));
    }
    public function update(UpdateRequest $request, User $client)
    {
        $client->update($request->all());
        $client->profile()->update([
            'dni'=>$request->dni,
            'ruc'=>$request->ruc,
            'phone'=>$request->phone,
            'address'=>$request->address,
        ]);
        if($request->hasFile('file')){
            $image = $request->file('file');
            $ruta = self::upload_image($image);
            $client->image()->update(['url' => $ruta]);
        }
        //$client->update_client($request->all());
        
        return redirect()->route('clients.index')->with('toast_success', '¡Cliente actualizado con éxito!');
    }

    public function update_client(Request $request, User $client){
        $client->update($request->get('id', 'name', 'surnames'));
        $client->profile()->update([
            'dni'=>$request->dni,
            'ruc'=>$request->ruc,
        ]);
        //$client->update_client($request);
        return back();
    }

    public function destroy(User $client)
    {
        try {
            $client->delete();
        } catch (Throwable $e) {
            report($e);
            return redirect()->back()->with('toast_error', '¡El cliente está asociado a otros registros!');
        }
        return redirect()->route('clients.index');
    }
}
