@extends('admin.layouts.admin')

@section('title', 'Dashboard')
@section('content')
<div class="container-fluid animatedParent animateOnce my-3">
    <div class="animated fadeInUpShort">
        <div class="card">
            <div class="card-header white">
                <h6> 6 Tamu Baru Saja </h6>
            </div>
            <div class="card-body p-0">
                <div class="lightSlider" data-item="6" data-item-xl="4" data-item-md="2" data-item-sm="1"
                    data-pause="7000" data-pager="false" data-auto="true" data-loop="true">
                    @foreach ($guest as $item)
                    <div class="p-5">
                        <span class="s-48 font-weight-lighter text-primary round">
                            {{-- <img src="{{ asset('template/assets/img/dummy/u1.png') }}" alt="user"> --}}
                            <img src="{{ asset('storage/image/'.$item->image) }}" alt="user">
                        </span>
                        <br>
                        <div class="text-center">
                            <h5 class="font-weight-normal">{{$item->name}}</h5>
                            <span class="text-primary">
                                {{$item->saying}}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="d-flex row row-eq-height my-3">
            <div class="col-md-8">
                <div class="row row-eq-height">
                    <!-- Social Widget Start -->
                    <!-- Social Widget End -->
                    <!-- Product Widget Start -->

                    {{-- Today Incomae --}}
                    <div class="col-md-6">
                        <div class="card my-3">
                            <div class="white">
                                <div class="card">
                                    <div class="card-header bg-primary text-white b-b-light">
                                        <div class="row justify-content-end">
                                            <div class="col">
                                                <ul id="myTab4" role="tablist"
                                                    class="nav nav-tabs card-header-tabs nav-material nav-material-white float-right">
                                                    <li class="nav-item">
                                                        <a class="nav-link active show" id="tab1" data-toggle="tab"
                                                            href="#v-pills-tab1" role="tab" aria-controls="tab1"
                                                            aria-expanded="true" aria-selected="true">Today</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body no-p">
                                        <div class="tab-content">
                                            <div class="tab-pane animated fadeIn show active" id="v-pills-tab1"
                                                role="tabpanel" aria-labelledby="v-pills-tab1">
                                                <div class="bg-primary text-white lighten-2">
                                                    <div class="pt-5 pb-2 pl-5 pr-5">
                                                        <h5 class="font-weight-normal s-14">Jumlah Tamu Datang</h5>
                                                        <span class="s-48 font-weight-lighter text-primary">
                                                        {{$countguest}}<small> tamu</small></span>
                                                        <div class="float-right">
                                                            <span class="icon icon-money-bag s-48"></span>
                                                        </div>
                                                    </div>
                                                    <canvas width="378" height="94" data-chart="spark"
                                                        data-chart-type="line" data-dataset="[[28,530,200,430]]"
                                                        data-labels="['a','b','c','d']" data-dataset-options="[
                                                { borderColor:  'rgba(54, 162, 235, 1)', backgroundColor: 'rgba(54, 162, 235,1)'},
                                                ]">
                                                    </canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Today income end --}}
                    </div>
                </div>
            </div>

        </div>
        <div class="row">

        </div>
    </div>
</div>
@endsection
