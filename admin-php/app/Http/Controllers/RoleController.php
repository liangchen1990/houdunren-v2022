<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function index()
    {
        return RoleResource::collection(Role::all());
    }

    public function store(StoreRoleRequest $request, Role $role)
    {
        $role->name = $request->name;
        $role->title = $request->title;
        $role->save();
        return new RoleResource($role);
    }

    public function show(Role $role)
    {
        return new RoleResource($role);
    }


    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->fill($request->input())->save();
        return new RoleResource($role);
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return response(['message' => '删除成功']);
    }
}
