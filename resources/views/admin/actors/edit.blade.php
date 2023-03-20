@extends('admin.layouts.document')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Keisti aktorių [{{ ($actor->fullName ?? '')  }}][{{ $actor->id ?? '' }}]</h3>
        </div>
        <form action="{{ route('admin.actors.update', $actor) }}" method="POST">
            @method('put')
            @csrf
            <input type="hidden" name="id" value="{{ $actor->id ?? '' }}">
            <div class="card-body">
                <div class="form-group">
                    <div class="form-group">
                        <label for="first-name">Vardas</label>
                        <input type="text" class="form-control" name="first_name" id="first-name"
                            value="{{ $actor->first_name ?? '' }}" placeholder="Vardas">
                    </div>

                    <div class="form-group">
                        <label for="last-name">Pavardė</label>
                        <input type="text" class="form-control" name="last_name" id="last-name"
                            value="{{ $actor->last_name ?? '' }}" placeholder="Pavardė">
                    </div>
                </div>

                <div class="form-group">
                    <label for="date-of-birth">Data</label>
                    <input type="date" class="form-control" name="date_of_birth"
                        value="{{ $actor->date_of_birth ?? '' }}" id="date-of-birth" placeholder="Gimimo data">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
