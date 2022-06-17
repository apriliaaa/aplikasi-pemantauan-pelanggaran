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

            <h6 class="text-white mx-3">Laporan</h6>
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
                    {{-- <div class="card-header">
                        <h4 class="card-title">Create Admin</h4>
                    </div> --}}
                    <div class="card-body d-flex">
                        <div class="col">
                            <form action="#" method="get">
                                {{-- <div class="col-md-6"> --}}
                                <div class="input-group">
                                    <div class="col-auto">
                                        <select class="form-select" name="search" id="search">
                                            <option value="">Pilih Program Studi</option>
                                            @foreach ($program_studi as $prodi)
                                            <option value="{{ $prodi->id }}">{{ $prodi->nama_prodi }}</option>
                                            @endforeach
                                        </select>
                                        {{-- <input type="search" name="search" class="form-control" id="search" placeholder="" value="{{ request('search') }}">
                                        --}}
                                    </div>
                                    <button class="btn btn-success" type="submit">Cari</button>
                                </div>
                                {{-- </div> --}}

                            </form>
                        </div>

                        <a href="#" target="_blank" class="btn btn-primary">Cetak <i class="fa-solid fa-print"></i></a>

                    </div>
                </div>
            </section>

            <section class="section">
                <div class="row" id="table-bordered">
                    <div class="col-12">
                        <div class="card">
                            {{-- <div class="card-header">
                                {{ $admin->links() }}
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
                                            <th>Jenis Pelanggaran</th>
                                            <th>Jumlah Pelanggaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no=1 
                                        @endphp 
                                        @foreach ($pelanggaran as $item)
                                        <tr>
                                            <td class="text-center">{{ $no }}</td>
                                            <td>{{ $item->pelanggaran->nama_pelanggaran }}</td>
                                            {{-- masih belum bisa --}}
                                            <td>{{ $item->jumlah }}</td>
                                            {{-- <td>{{ $item->program_studi->nama_prodi }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->role }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-primary" href="{{ route('admin.edit', $item->id) }}">
                                                    <i class="fa-solid fa-file-pen"></i>
                                                </a>
                                                <a class="btn btn-danger" href="{{ route('admin.delete', $item->id) }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </td> --}}
                                        </tr>
                                        @php
                                            $no++
                                        @endphp
                                        @endforeach

                                    </tbody>
                                </table>
                                {{-- {{ $admin->appends(['search' => request()->query('search')])->links() }} --}}
                            </div>
                        </div>


                    </div>


                </div>
        </div>

        </section>
    </div>
</x-app-layout>