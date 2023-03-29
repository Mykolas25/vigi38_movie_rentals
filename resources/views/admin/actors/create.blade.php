@extends('admin.layouts.document', ['title' => Str::title(__('app.actors'))])

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">@langTitle('app.new')</h3>
    </div>
    <form action="{{ route('admin.actors.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="first-name">@langTitle('app.first_name')</label>
                <input type="text" class="form-control" name="first_name" id="first-name" placeholder="@lang('first_name')">
            </div>

            <div class="form-group">
                <label for="last-name">@langTitle('app.last_name')</label>
                <input type="text" class="form-control" name="last_name" id="last-name" placeholder="@lang('last_name')">
            </div>

            <div class="form-group">
                <label for="date-of-birth">@langTitle('app.date_of_birth')</label>
                <input type="date" class="form-control" name="date_of_birth" id="date-of-birth" placeholder="@lang('date_of_birth')">
            </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">@langTitle('app.submit')</button>
        </div>
    </form>
</div>
@endsection
