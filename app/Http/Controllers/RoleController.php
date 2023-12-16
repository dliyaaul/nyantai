<?php

namespace App\Http\Controllers;

use App\DataTables\RoleDataTable;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseFormatSame;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create konfigurasi/roles')->only('create');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(RoleDataTable $dataTable)
    {
        $this->authorize('read konfigurasi/roles');
        // if (!FacadesGate::allows('read role')) {
        //     abort(403, 'unauthorized');
        // }
        return $dataTable->render('konfigurasi.role');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('konfigurasi.role-action', ['role' => new Role()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        Role::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Create data successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('konfigurasi.role-action', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {
        $role->name = $request->name;
        $role->guard_name = $request->guard_name;
        $role->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Update data successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Delete data successfully'
        ]);
    }
}
