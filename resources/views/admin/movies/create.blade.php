@extends('admin.layouts.document', ['title' => Str::title(__('app.movies'))])

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">@langTitle('app.new')</h3>
    </div>
    <form action="{{ route('admin.movies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="title">@langTitle('app.title')</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="@lang('app.title')">
            </div>

            <div class="form-group">
                <label for="release-date">@langTitle('app.release_date')</label>
                <input type="date" class="form-control" name="release_date" id="release-date" placeholder="@lang('app.release_date')">
            </div>

            <div class="form-group">
                <label for="description">@langTitle('app.description')</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="@lang('app.description')">
            </div>

            <div class="form-group">
                <label for="runtime">@langTitle('app.runtime')</label>
                <input type="number" class="form-control" max="1000" name="runtime" id="runtime" placeholder="@lang('app.runtime')">
            </div>

            <div class="form-group">
                <label for="rating">@langTitle('app.rating')</label>
                <input type="text" class="form-control" maxlength="5" name="rating" id="rating" placeholder="@lang('app.rating')">
            </div>
            <x-forms.multi-relation-select :tagName="'genres'" :relationItems="$genres" />

            <x-forms.multi-relation-select :tagName="'languages'" :relationItems="$languages" />

            <x-forms.multi-relation-select :tagName="'countries'" :relationItems="$countries" />

            <x-forms.multi-relation-select :tagName="'actors'" :relationItems="$actors" :optionDisplay="'fullName'" />

            <div class="form-group">
                <x-forms.image-input :label="'cover-image'" :inputName="'image'" :oldInputName="'old_cover_image'"/>
            </div>

            <div class="form-group">
                <x-forms.image-input :label="'images'" :inputName="'images[]'" :oldInputName="'old_images[]'"/>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">@langTitle('app.submit')</button>
        </div>
    </form>
</div>
@endsection
