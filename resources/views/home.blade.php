@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card card-statistic-1">
                <div class="row">
                    <div class="col-6">
                        <div class="card-icon" style="width: 70%;height: 85%;font-size:50%">
                            <img src="{{ asset('assets/img/arsip.png') }}" alt="" width="200px" height="140px">
                        </div>
                     </div>
                    <div class="col-6">
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4 style="font-size: 30px">Total Arsip</h4>
                            </div>
                            <div class="card-body ml-2" style="font-size: 50px">
                                {{ $jumlah }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-6">
                <div class="row">
                    <div class="col-4">
                        <div class="card card-statistic-1">
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Admin</h4>
                                </div>
                                <div class="card-body">
                                    10
                                </div>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Admin</h4>
                                </div>
                                <div class="card-body">
                                    10
                                </div>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Admin</h4>
                                </div>
                                <div class="card-body">
                                    10
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                                <i class="far fa-newspaper"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>News</h4>
                                </div>
                                <div class="card-body">
                                    42
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                                <i class="far fa-file"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Reports</h4>
                                </div>
                                <div class="card-body">
                                    1,201
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div> --}}
    </div>
@endsection
