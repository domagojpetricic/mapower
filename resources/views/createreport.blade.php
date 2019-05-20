@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Report a problem:</div>

                <div class="card-body">
                    <form action="{{ route('report.action') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Name: </label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="operator_id">Operator ID:</label>
                            <input type="text" name="operator_id" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description: </label>
                            <textarea name="description" cols="30" rows="10"  class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="status">Status:(0/1) </label>
                            <input type="text" name="status" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="latitude">Latitude: </label>
                            <input type="text" name="latitude" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="longitude">Longitude: </label>
                            <input type="text" name="longitude" class="form-control" required>
                        </div>

                        <div class="form group">
                            <p class="text-center">
                                <button class="btn btn-primary btn-lg" type="submit">
                                    Report a problem
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection