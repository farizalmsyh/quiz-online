@extends('layouts.app')
@section('content')
<!-- Page Heading -->
<main class="content">
    <div class="container-fluid p-0">
        <!-- Content Row -->
        <div class="row">
            <!-- Content Column -->
            <div class="col-12 mb-4">
                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <a href="{{ route('user.create') }}" class="float-right btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-plus fa-sm text-white mr-1"></i> Tambah</a>
                        <h4 class="m-0 font-weight-bold text-primary">Daftar Pengguna</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $key => $value)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->role_name }}</td>
                                        <td>
                                            <div class="dropdown no-arrow">
                                                <button class="btn btn-info btn-circle dropdown-toggle" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{route('user.edit',[$value->id])}}">Edit</a>
                                                @if($value->id != Auth::id())
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteModal" data-id="{{$value->id}}">Delete</a>
                                                @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus data?</h5>
                <a href="#" class="text-danger text-decoration-none" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </a>
            </div>
            <div class="modal-body">Pilih "Hapus" jika ingin menghapus data.</div>
            <form class="modal-footer" action="{{ route('user.delete') }}" method="POST">
                @csrf
                <input type="hidden" name="id" id="delUserId">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button class="btn btn-primary" type="submit">Hapus</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
@endsection
