@extends('admin.layouts.admin')
@section('content')
<header class="blue accent-3 relative">
    <div class="container-fluid text-white">
        <div class="row p-t-b-10 ">
            <div class="col">
                <h4>
                    <i class="icon-user"></i>
                    Detail Tamu {{$guest->name}}
                </h4>
            </div>
        </div>
        <div class="row justify-content-between">
            <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                <li>
                    <a class="nav-link active" id="v-pills-all-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                        aria-controls="v-pills-all"><i class="icon icon-home2"></i>Detail Tamu</a>
                </li>
            </ul>
        </div>
    </div>
</header>
    <div class="container-fluid animatedParent animateOnce my-3">
        <div class="animated fadeInUpShort">
       <div class="tab-content" id="v-pills-tabContent">
           <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
               <div class="row">
                   <div class="col-md-3">
                       <div class="card ">

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><i class="icon icon-user text-primary"></i><strong class="s-12">Nama</strong> <span class="float-right s-12">{{$guest->name}}</span></li>
                            <li class="list-group-item"><i class="icon icon-address-card-o text-warning"></i><strong class="s-12">Alamat</strong> <span class="float-right s-12">{{$guest->address}}</span></li>
                            <li class="list-group-item"><i class="icon icon-web text-danger"></i> <strong class="s-12">Ucapan</strong> <span class="float-right s-12">{{$guest->saying}}</span></li>
                        </ul>
                        <a href="{{route('guest.index')}}" type="button" class="btn btn-secondary btn-sm">Kembali</a>
                       </div>
                   </div>
                   <div class="col-md-9">
                    
                       <div class="row">
                           <div class="col-lg-8">
                               <div class="card r-3">
                                   <div class="p-4">
                                    <div class="thumbnail">
                                          <img src="{{ asset('storage/image/' . $guest->image) }}" alt="Nature" style="width:100%">
                                      </div>
                                        
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
    <!--Add New Message Fab Button-->
    {{-- <a href="{{ route('guest.create') }}" class="btn-fab btn-fab-md fab-left fab-left-bottom-fixed shadow btn-primary"><i
            class="icon-add"></i></a> --}}

@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                responsive: true
            });

            new $.fn.dataTable.FixedHeader(table);
        });
    </script>
@endpush
