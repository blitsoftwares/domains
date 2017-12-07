<?php

namespace Blit\Domains\Http\Controllers;

use App\Http\Controllers\Controller;
use Blit\Domains\Models\Domain;
use Illuminate\Http\Request;

class DomainsController extends Controller {

    public function index()
    {
        $domains = Domain::orderBy('name')->paginate(10);

        return view('BlitDomains::domains.index')
            ->with('domains',$domains);
    }

    public function create()
    {
        return view('BlitDomains::domains.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        Domain::create($input);

        return redirect(route('domains.index'));
    }

    public function edit(Domain $domain)
    {
        return view('BlitDomains::domains.edit')
            ->with('domain', $domain);
    }

    public function update(Request $request, Domain $domain)
    {
        $domain->update($request->all());

        return redirect(route('domains.index'));
    }

    public function destroy($id)
    {
        $domain = Domain::find($id);
        if($domain)
        {
            $domain->delete();
        }

        return redirect(route('domains.index'));
    }

}