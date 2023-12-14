@extends('layouts.master')

@section('content')
<div class="main-content">
    <div class="title">
        Konfigurasi
    </div>
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Roles</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart" height="642" width="1388"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Statistics</h4>
                    </div>
                    <div class="card-body">
                        <div class="progress-wrapper">
                            <h4>Progress 25%</h4>
                            <div class="progress progress-bar-small">
                                <div class="progress-bar progress-bar-small" style="width: 25%" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                        <div class="progress-wrapper">
                            <h4>Progress 45%</h4>
                            <div class="progress progress-bar-small">
                                <div class="progress-bar progress-bar-small bg-pink" style="width: 45%" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                        <canvas id="myChart2" height="842" width="1388"></canvas>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection