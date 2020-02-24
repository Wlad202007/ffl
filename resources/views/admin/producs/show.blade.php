@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.produc.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.producs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.produc.fields.id') }}
                        </th>
                        <td>
                            {{ $produc->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.produc.fields.name') }}
                        </th>
                        <td>
                            {{ $produc->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.produc.fields.author') }}
                        </th>
                        <td>
                            {{ $produc->author->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.producs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection