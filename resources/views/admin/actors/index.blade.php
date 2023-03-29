@extends('admin.layouts.document')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ Str::ucfirst(trans('app.actors')) }}</h3>
                    <a href="{{ route('admin.actors.create') }} " class="btn btn-app">
                        <i class="fas fa-plus"></i> {{ Str::ucfirst(trans('app.new')) }}
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="admin-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{ Str::ucfirst(trans('app.first_Name')) }}</th>
                                <th>{{ Str::ucfirst(trans('app.last_name')) }}</th>
                                <th>{{ Str::ucfirst(trans('app.date_of_birth')) }} </th>
                                <th>{{ Str::ucfirst(trans('app.created_at')) }}</th>
                                <th>{{ Str::ucfirst(trans('app.updated_at')) }}</th>
                                <th>{{ Str::ucfirst(trans('app.actions')) }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($models as $model)
                                <tr>
                                    <td>{{ $model->id ?? '' }} </td>
                                    {{-- <td>
                                    <img width="100" src="{{ ($model->image ?? '')}} ">
                                </td> --}}
                                    <td> {{ $model->first_name ?? '' }} </td>
                                    <td> {{ $model->last_name ?? '' }} </td>
                                    <td> {{ $model->date_of_birth ?? '' }} </td>
                                    <td> {{ $model->created_at ?? '' }} </td>
                                    <td> {{ $model->updated_at ?? '' }} </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href='{{ route('admin.actors.edit', $model) }} ' type="button"
                                                class="btn btn-info">Keisti</a>
                                            <button type="button" class="btn btn-info dropdown-toggle dropdown-icon"
                                                data-toggle="dropdown" aria-expanded="false">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                                <a onclick="event.preventDefault()" class="dropdown-item delete"
                                                    href="{{ route('admin.actors.destroy', $model) }} ">Naikinti</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <th>ID</th>
                                <th>{{ Str::ucfirst(trans('app.first_Name')) }}</th>
                                <th>{{ Str::ucfirst(trans('app.last_name')) }}</th>
                                <th>{{ Str::ucfirst(trans('app.date_of_birth')) }} </th>
                                <th>{{ Str::ucfirst(trans('app.created_at')) }}</th>
                                <th>{{ Str::ucfirst(trans('app.updated_at')) }}</th>
                                <th>{{ Str::ucfirst(trans('app.actions')) }}</th>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
