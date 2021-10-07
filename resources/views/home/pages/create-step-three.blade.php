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

            <form id="bukutamu" method="POST" action="{{ route('guest.step.three.post') }}">
                @csrf
                {{-- {{ csrf_field() }} --}}
                {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
                <div class="row form-group">
                    <div class="col-md-12">
                        <div class="feature-center animate-box">
                            <span class="icon">
                                <i class="icon-user"></i>
                            </span>
                            <div class="feature-copy">
                                <h3>Selfi</h3>
                                <div class="fh5co-video fh5co-bg" id="my_camera"
                                    style="background-image: url(images/img_bg_3.jpg); ">
                                    
                                </div>
                                <input type="hidden" id="image" name="image" value="">
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="feature-copy" id="my_result"></div>
                        </div>
                        <div style="padding-top: 20px;">
                            <a href="javascript:void(take_snapshot())" class="btn btn-primary">Ambil foto</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                            <a href="{{ route('guest.step.two') }}" id="simpan" class="btn btn-secondary">Back</a>
                            <button id="simpan" type="submit" class="btn btn-primary">Next</button>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-12">
                        <div class="feature-center animate-box" data-animate-effect="fadeInLeft">
                            <div class="feature-copy">
                                <div class="fh5co-video fh5co-bg" id="my_camera"
                                    style="background-image: url(images/img_bg_3.jpg); ">
                                    
                                </div>
                                <a href="javascript:void(take_snapshot())" class="btn btn-primary">Ambil foto</a>
                                <input type="hidden" id="image" name="image" value="">
                                <div class="form-group">
                                    <div id="my_result"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </form>

        </div>
    </div>
@endsection
@push('after-scripts')
    <script src="{{ asset('config/webcam.min.js') }}"></script>
    
    <script>
        $(document).ready(function(){

            Webcam.set({
                width: 550,
                height: 450,
                dest_width: 320,
                dest_height: 240,
                image_format: 'png',
                jpeg_quality: 90,
                force_flash: false,
                flip_horiz: true
            });

            Webcam.attach('#my_camera');

        });
            
        function take_snapshot() {
        Webcam.snap( function(data_uri, canvas, context) {
            document.getElementById('my_result').innerHTML = '<img src="'+data_uri+'"/>';
            var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');
            document.getElementById('image').value = raw_image_data;
            console.log(raw_image_data);
        } );
    }
    </script>

@endpush
