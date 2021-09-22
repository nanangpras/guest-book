@extends('home.layouts.home')
@section('content')

    <header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_2.jpg);"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>Joefrey &amp; Sheila</h1>
                            <h2>We Are Getting Married</h2>
                            <div class="simply-countdown simply-countdown-one"></div>
                            <p><a href="#fh5co-services" class="nav-link js-scroll-trigger btn btn-default btn-sm">Buku
                                    Tamu</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fh5co-services" class="fh5co-section-gray">
        <div class="container">

            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Buku Tamu</h2>
                    <p>Silahkan Isi Buku Tamu Berikut</p>
                </div>
            </div>

            <form id="bukutamu" method="POST" enctype="multipart/form-data">
                {{-- @csrf --}}
				{{-- {{ csrf_field() }} --}}
                {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="feature-left animate-box" data-animate-effect="fadeInLeft">
                            <span class="icon">
                                <i class="icon-user"></i>
                            </span>
                            <div class="feature-copy">
                                <h3>Nama Tamu</h3>
                                <input type="text" name="name" id="name" class="form-control">
                                <p>Boleh rombongan atau salah satu</p>
                            </div>
                        </div>

                        <div class="feature-left animate-box" data-animate-effect="fadeInLeft">
                            <span class="icon">
                                <i class="icon-address"></i>
                            </span>
                            <div class="feature-copy">
                                <h3>Alamat</h3>
                                <input type="text" name="address" id="address" class="form-control">
                                <p>Alamatmu ya</p>
                            </div>
                        </div>

                        <div class="feature-left animate-box" data-animate-effect="fadeInLeft">
                            <span class="icon">
                                <i class="icon-mail"></i>
                            </span>
                            <div class="feature-copy">
                                <h3>Ucapan untuk Pengantin</h3>
                                <textarea name="saying" id="saying" cols="2" rows="2" class="form-control"></textarea>
                                <p>Ucapan doa dan harapan ke pengantin ya</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6 animate-box">
                        <div class="fh5co-video fh5co-bg" id="my_camera"
                            style="background-image: url(images/img_bg_3.jpg); ">
                            <a href="https://vimeo.com/channels/staffpicks/93951774" class="popup-vimeo"><i
                                    class="icon-video2"></i></a>
                            <div class="overlay"></div>
                        </div>
                        {{-- <a href="javascript:void(take_snapshot())" class="btn btn-primary">Ambil foto</a> --}}
                        <input type="hidden" id="image" name="image" value="">
                        <div class="form-group">
                            <div id="my_result"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 animate-box">
                        <button id="simpan" type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
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

            var route = "{{ route('guest.insert') }}";
            var routeRedirect = "{{ route('alert') }}";
            $('#bukutamu').on('submit', function(event) {
                event.preventDefault();
                // alert(1);
                var image = '';
                var name = $('#name').val();
                var address = $('#address').val();
                var saying = $('#saying').val();
                Webcam.snap(function(data_uri) {
                    image = data_uri;
                });
                $.ajax({
                    type: 'POST',
                    url: route,
                    dataType: 'json',
                    // data: new FormData(this),
                    data: {
                        "_token": "{{ csrf_token() }}",
                        name : name,
                        address : address,
                        image : image,
                        saying : saying,
                    },

                    success: function(response) {
                        if (response.success) {
                            alert('berhasil upload');
                            // $('[name="name"]').val('');
                            // $('[name="address"]').val('');
                            // $('[name="saying"]').val('');
                            console.log(data.success);
                            window.location.href = routeRedirect;
                        } else {
                            alert('gagal upload');
                            console.log(response.error);
                        }
                    },
                    error: function(response) {
                        console.log(response.error);
                    }
                })

            });
        });
            
        
    </script>

@endpush
