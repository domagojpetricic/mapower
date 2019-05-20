@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">reports</div>

                <div class="card-body">
                    @foreach ($reports as $report)
                    <li> {{ $report->id }}, {{ $report->name }}, {{ $report->operator_id }}, {{ $report->description }}, {{ $report->latitude }}, {{ $report->longitude }}</li>
                    @endforeach

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
