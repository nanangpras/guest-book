@extends('admin.layouts.admin')
@section('content')
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-user"></i>
                        Tamu
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link active" id="v-pills-all-tab" data-toggle="pill" href="#v-pills-all" role="tab"
                            aria-controls="v-pills-all"><i class="icon icon-home2"></i>All Tamu</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="tab-content my-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel"
                aria-labelledby="v-pills-all-tab">
                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="card r-0 shadow">
                            <div class="table-responsive">
                                <form>
                                    <table id="example" class="table table-striped table-hover r-0">
                                        <thead>
                                            <tr class="no-b">
                                                <th>Nama</th>
                                                <th>Ucapan</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($guest as $item)
                                                <tr>
                                                    <td>
                                                        <div class="avatar avatar-md mr-3 mt-1 float-left">
                                                            <span class="avatar-letter avatar-letter-a  avatar-md circle">
                                                                <img src="{{ asset('storage/image/' . $item->image) }}"
                                                                    alt="">
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <div>
                                                                <strong>{{ $item->name }}</strong>
                                                            </div>
                                                            <small>{{ $item->address }}</small>
                                                        </div>
                                                    </td>
                                                    <td>{{ $item->saying }}</td>
                                                    <td>
                                                        <a href="#"><i class="icon-eye mr-3"></i></a>
                                                        <a href="#"><i class="icon-pencil"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </form>
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
