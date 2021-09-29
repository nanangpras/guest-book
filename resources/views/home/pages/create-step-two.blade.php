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

            <form id="bukutamu" method="POST" action="{{route('guest.step.two.post')}}">
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
                                <h3>Ucapan untuk Pengantin</h3>
                                <textarea name="saying" id="saying" cols="2" rows="2" class="form-control" required>{{{ $guest->saying ?? '' }}}</textarea>
                                <p>Ucapan doa dan harapan ke pengantin ya</p>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                        <a href="{{route('guest.step.one')}}" id="simpan" class="btn btn-secondary">Back</a>
                        <button id="simpan" type="submit" class="btn btn-primary">Next</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
