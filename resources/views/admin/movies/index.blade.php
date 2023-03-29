@extends('admin.layouts.document', ['title' => Str::title(__('app.movies'))])

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">@langTitle('app.list')</h3>
                <span class='header-actions'>
                    <a href="{{ route('admin.movies.create') }} " class="btn btn-app new-resource">
                        <i class="fas fa-plus"></i> @langTitle('app.new')
                    </a>
                </span>
            </div>
            <div class="card-body">
                <table id="admin-table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>@langTitle('app.image')</th>
                            <th>@langTitle('app.title')</th>
                            <th>@langTitle('app.date')</th>
                            <th>@langTitle('app.description')</th>
                            <th>@langTitle('app.runtime')</th>
                            <th>@langTitle('app.rating')</th>
                            <th>@langTitle('app.genres')</th>
                            <th>@langTitle('app.actors')</th>
                            <th>@langTitle('app.created_at')</th>
                            <th>@langTitle('app.updated_at')</th>
                            <th>@langTitle('app.actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($models as $model)
                        <tr>
                            <td>{{ ($model->id ?? '')}} </td>
                            <td>
                                <img width="100" src="{{ asset('storage/images/'.($model->image ?? " noimage.jpg"))}} ">
                                </td>
                                <td> {{ ($model->title ?? '') }} </td>
                                <td> {{ ($model->release_date ?? '') }} </td>
                                <td> {{ ($model->description ?? '') }} </td>
                                <td> {{ ($model->runtime ?? '') }} </td>
                                <td> {{ ($model->rating ?? '') }} </td>
                                <td>
                                     @foreach($model->genres as $genre)
                                        {{$genre->name ?? ''}}
                                     @endforeach
                                </td>
                                <td>
                                     @foreach($model->actors as $actor)
                                        <a href=" {{route('admin.actors.edit', $actor)}}">
                                {{$actor->fullName ?? ''}}
                                </a>
                                @endforeach
                            </td>
                            <td> {{ ($model->created_at ?? '') }} </td>
                            <td> {{ ($model->updated_at ?? '') }} </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.movies.edit', $model) }}" type="button"
                                        class="btn btn-info">@langTitle('app.edit')</a>
                                    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon"
                                        data-toggle="dropdown" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a onclick="event.preventDefault()" class="dropdown-item delete"
                                            href="{{ route('admin.movies.destroy', $model) }}">
                                            @langTitle('app.delete')
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>@langTitle('app.image')</th>
                            <th>@langTitle('app.title')</th>
                            <th>@langTitle('app.date')</th>
                            <th>@langTitle('app.description')</th>
                            <th>@langTitle('app.runtime')</th>
                            <th>@langTitle('app.rating')</th>
                            <th>@langTitle('app.genres')</th>
                            <th>@langTitle('app.actors')</th>
                            <th>@langTitle('app.created_at')</th>
                            <th>@langTitle('app.updated_at')</th>
                            <th>@langTitle('app.actions')</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
