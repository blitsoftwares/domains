<?php

namespace Blit\Domains\Http\Controllers;

use App\Http\Controllers\Controller;
use Blit\Domains\Models\Domain;
use Blit\Domains\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller {

    public function index($id)
    {
        $domain = Domain::find($id);
        $permissions = Permission::orderBy('name')->paginate(10);

        return view('BlitDomains::permissions.index', compact('domain'))
            ->with('permissions',$permissions);
    }

    public function create($id)
    {
        $domain = Domain::find($id);
        return view('BlitDomains::permissions.create', compact('domain'));
    }

    public function store(Request $request, $domain_id)
    {
        $input = $request->all();

        $domain = Domain::find($domain_id);

        Permission::firstOrCreate([
            'domain_id' => $domain->id,
            'name' => $domain->slug . '.' .$input['name'],
            'description' => $input['description']
        ]);

        return redirect(route('permissions.index', [$domain_id]));
    }

    public function edit($domain_id, Permission $permission)
    {

        $domain = Domain::find($domain_id);

        return view('BlitDomains::permissions.edit', compact('permission'))
            ->with('domain', $domain);
    }

    public function update(Request $request, $domain_id, $id)
    {

        $input = $request->all();
        $domain = Domain::find($domain_id);
        $permission = Permission::where('domain_id', $domain_id)->where('id', $id)->first();

        if($permission){
            $permission->name =  $domain->slug . '.' .$input['name'];
            $permission->description =  $input['description'];
            $permission->save();
        }

        return redirect(route('permissions.index', $domain_id));
    }

    public function destroy($domain_id, $id)
    {
        $permission = Permission::where('domain_id', $domain_id)->where('id', $id)->first();

        if($permission)
        {
            $permission->delete();
        }

        return redirect(route('permissions.index', [$domain_id]));
    }

}