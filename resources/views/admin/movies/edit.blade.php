@extends('admin.layouts.document')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Keisti filmą [<?= ($movie->title ?? ''); ?>][<?= ($movie->id ?? ''); ?>]</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('admin.movies.update', $movie) }}" method="POST">
        @method('put')
        @csrf
        <input type="hidden" name="id" value="<?= ($movie->id ?? ''); ?>">
        <div class="card-body">
            <div class="form-group">
                <label for="title">Pavadinimas</label>
                <input type="text" class="form-control" name="title" value="<?= ($movie->title ?? ''); ?>" id="title" placeholder="Pavadinimas">
            </div>

            <div class="form-group">
                <label for="release-date">Data</label>
                <input type="date" class="form-control" name="release_date" value="<?= ($movie->release_date ?? ''); ?>" id="release-date" placeholder="Data">
            </div>

            <div class="form-group">
                <label for="description">Aprašymas</label>
                <input type="text" class="form-control" name="description" value="<?= ($movie->description ?? ''); ?>" id="description" placeholder="Aprašymas">
            </div>

            <div class="form-group">
                <label for="runtime">Trukmė</label>
                <input type="number" class="form-control" max="1000" name="runtime" value="<?= ($movie->runtime ?? ''); ?>" id="runtime" placeholder="Trukmė">
            </div>

            <div class="form-group">
                <label for="rating">Reitingas</label>
                <input type="text" class="form-control" maxlength="5" name="rating" value="<?= ($movie->rating ?? ''); ?>" id="rating" placeholder="Reitingas">
            </div>

            <div class="form-group">
                <label for="image">Nuotrauka</label>
                <input type="text" class="form-control" name="image" value="<?= ($movie->image ?? ''); ?>" id="image" placeholder="Nuotrauka">
            </div>


            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection