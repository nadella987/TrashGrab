@extends('layout.master')
@section('title', 'Detail Area')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="card-title text-dark mb-0"><strong>Detail Area</strong> </h2>
                    </div>
                    <div class="row">
                        <div class="col"> 
                            <strong>Kode Area</strong>
                            <p>{{ $area->kode_area }}</p>
                        </div>
                        <div class="col">
                            <strong>lokasi</strong>
                            <p>{{ $area->lokasi }}</p>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

