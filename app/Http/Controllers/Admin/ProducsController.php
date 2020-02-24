<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProducRequest;
use App\Http\Requests\StoreProducRequest;
use App\Http\Requests\UpdateProducRequest;
use App\Produc;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProducsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('produc_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $producs = Produc::all();

        return view('admin.producs.index', compact('producs'));
    }

    public function create()
    {
        abort_if(Gate::denies('produc_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $authors = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.producs.create', compact('authors'));
    }

    public function store(StoreProducRequest $request)
    {
        $produc = Produc::create($request->all());

        return redirect()->route('admin.producs.index');
    }

    public function edit(Produc $produc)
    {
        abort_if(Gate::denies('produc_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $authors = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $produc->load('author');

        return view('admin.producs.edit', compact('authors', 'produc'));
    }

    public function update(UpdateProducRequest $request, Produc $produc)
    {
        $produc->update($request->all());

        return redirect()->route('admin.producs.index');
    }

    public function show(Produc $produc)
    {
        abort_if(Gate::denies('produc_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $produc->load('author');

        return view('admin.producs.show', compact('produc'));
    }

    public function destroy(Produc $produc)
    {
        abort_if(Gate::denies('produc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $produc->delete();

        return back();
    }

    public function massDestroy(MassDestroyProducRequest $request)
    {
        Produc::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
