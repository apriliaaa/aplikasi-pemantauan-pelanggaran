<x-app-layout>
    {{-- <div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
    <div>
        
    </div> --}}

    <div id="main">

        <header class="navbar navbar-expand navbar-light bg-primary mb-3">
            {{-- <div class="navbar navbar-light bg-primary"> --}}
            <a href="#" class="burger-btn d-block d-xl-none text-white">
                <i class="bi bi-justify fs-3"></i>
            </a>

            <h6 class="text-white mx-3">Daftar Pelanggaran</h6>
            {{-- </div> --}}
        </header>
        <div class="page-heading">
            <div class="page-title">

                {{-- <div class="row">
                     <div class="col-12 col-md-6 order-md-1 order-last">
                         <h3>Layout Dezfault</h3>
                     </div>
                     <div class="col-12 col-md-6 order-md-2 order-first">
                         <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                             <ol class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                 <li class="breadcrumb-item active" aria-current="page">Layout Default</li>
                             </ol>
                         </nav>
                     </div>
                 </div> --}}
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">Tambah Data</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dokumen.create') }}" method="POST">
                            @csrf
                            <div class="row g-2 d-flex ">

                                <div class="col-sm-6 ">
                                    <label for="" class="visually-hidden">Nama Dokumen</label>
                                    <input type="text" name="nama_item" class="form-control"
                                        placeholder="Masukkan nama dokumen disita">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-3">Save</button>
                                </div>
                        </form>
                        {{-- <form action="{{ route('dosen.data') }}" method="get">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="input-group">
                                    <div class="col-auto">
                                        <input type="search" name="search" class="form-control" id="search"
                                            placeholder="" value="{{ request('search') }}">
                                    </div>
                                    <button class="btn btn-success" type="submit">Cari</button>
                                </div>
                            </div>
                        </div>
                        </form> --}}
                        {{-- <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="programStudi">Program Studi</label>
                                    <select class="form-select" id="basicSelect">
                                        <option>IT</option>
                                        <option>Blade Runner</option>
                                        <option>Thor Ragnarok</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="basicInput">Nama Admin</label>
                                    <input type="text" class="form-control" id="basicInput" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="basicInput">E-mail</label>
                                    <small class="text-muted">eg.<i>someone@example.com</i></small>
                                    <input type="e-mail" class="form-control" id="basicInput" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">Password</label>
                                    <input type="text" class="form-control" id="basicInput" placeholder="">
                                </div>

                                <div class="col-sm-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-success me-1 mb-1">Save</button>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </section>

            <section class="section">
                <div class="row" id="table-bordered">
                    <div class="col-12">
                        <div class="card">
                            {{-- <div class="card-header">
                                <h4 class="card-title">Bordered table</h4>
                            </div> --}}
                            <div class="card-content">

                                {{-- <div class="card-body">
                                    <p class="card-text">Add <code>.table-bordered</code> for borders on all sides of the table
                                        and
                                        cells. For
                                        Inverse Dark Table, add <code>.table-dark</code> along with
                                        <code>.table-bordered</code>.
                                    </p>
                                </div> --}}
                                <!-- table bordered -->
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead class="text-center">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Item Disita</th>
                                                {{-- <th>Program Studi</th>
                                                <th>E-mail / Username</th>
                                                <th>Role</th> --}}
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dokumen as $item)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama_item }}</td>
                                                {{-- <td>{{ $item->program_studi->nama_prodi }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->role }}</td> --}}
                                                <td class="text-center">
                                                    {{-- <a class="btn btn-primary" href="#">
                                                        <i class="fa-solid fa-file-pen"></i>
                                                    </a> --}}
                                                    <form method="POST" action="{{ route('dokumen.delete', $item->id) }}">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button type="submit" class="btn btn-danger show-alert-delete-box" data-toggle="tooltip" title='Delete'>
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- {{ $pelanggaran->links() }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
</x-app-layout>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.show-alert-delete-box').click(function(event){
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: "Apakah anda ingin menghapus data ini?",
            text: "Jika anda menghapus data ini, data akan dihapus permanent.",
            icon: "warning",
            type: "warning",
            buttons: ["Tidak","Iya"],
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#8cd4f5',
            confirmButtonText: 'Hapus data!'
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
</script>