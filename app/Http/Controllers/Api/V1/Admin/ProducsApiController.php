<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProducRequest;
use App\Http\Requests\UpdateProducRequest;
use App\Http\Resources\Admin\ProducResource;
use App\Produc;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProducsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('produc_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProducResource(Produc::with(['author'])->get());
    }

    public function store(StoreProducRequest $request)
    {
        $produc = Produc::create($request->all());

        return (new ProducResource($produc))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Produc $produc)
    {
        abort_if(Gate::denies('produc_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProducResource($produc->load(['author']));
    }

    public function update(UpdateProducRequest $request, Produc $produc)
    {
        $produc->update($request->all());

        return (new ProducResource($produc))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Produc $produc)
    {
        abort_if(Gate::denies('produc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $produc->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
