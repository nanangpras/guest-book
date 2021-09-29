@extends('home.layouts.home')
@section('content')
    <div id="fh5co-services" class="fh5co-section-gray">
        <div class="container">

            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Buku Tamu</h2>
                    <p>Silahkan Isi Buku Tamu Berikut</p>
                </div>
            </div>

            <form id="bukutamu" method="POST" action="{{ route('guest.step.one.post') }}">
                @csrf
                {{-- {{ csrf_field() }} --}}
                {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="feature-left animate-box" data-animate-effect="fadeInLeft">
                            <span class="icon">
                                <i class="icon-user"></i>
                            </span>
                            <div class="feature-copy">
                                <h3>Nama Tamu</h3>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $guest->name ?? '' }}" required>
                                <p>Boleh rombongan atau salah satu</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="feature-left animate-box" data-animate-effect="fadeInLeft">
                            <span class="icon">
                                <i class="icon-user"></i>
                            </span>
                            <div class="feature-copy">
                                <h3>Alamat Tamu</h3>
                                <input type="text" name="address" id="address" class="form-control" value="{{ $guest->address ?? '' }}" required>
                                <p>Boleh rombongan atau salah satu</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                            <button id="simpan" type="submit" class="btn btn-primary">Next</button>
                        </div>
                    </div>
            </form>

        </div>
    </div>
@endsection
