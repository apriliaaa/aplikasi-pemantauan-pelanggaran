<x-app-layout>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
    </div>
    <div id="main">
        <header class="mb-3">
            <div class="navbar navbar-light bg-primary">
                <a href="#" class="burger-btn d-block d-xl-none text-white">
                    <i class="bi bi-justify fs-3"></i>
                </a>

                <h5 class="text-white">Edit Data Admin</h5>
            </div>
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

            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif

            <section class="section">
                <form action="{{ route('admin.update', $admin->id) }}" method="post">
                    @csrf

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Admin</h4>
                        </div>
                        <div class="card-body">

                            <x-jet-validation-errors class="alert alert-danger" />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="programStudi">Program Studi</label>
                                        <select class="form-select" id="id_prodi" name="id_prodi">
                                            <option disabled value>Pilih Program Studi</option>
                                            <option value="{{ $admin->id_prodi }}">{{ $admin->program_studi->nama_prodi }}</option>

                                            @foreach ($program_studi as $key=>$item)
                                                <option value="{{ $item->id }}">{{ $item->nama_prodi }}</option>
                                            @endforeach
                                        </select>                               
                                    </div>

                                    <div class="form-group">
                                        <label for="basicInput">Nama Admin</label>
                                        <input type="text" name="name" class="form-control" id="basicInput" placeholder="" value="{{ $admin->name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">E-mail</label>
                                        <small class="text-muted">eg.<i>someone@example.com</i></small>
                                        <input type="e-mail" name="email" class="form-control" id="basicInput" placeholder="" value="{{ $admin->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="basicInput">Role</label>
                                        <input type="text" name="role" class="form-control" id="basicInput" placeholder="" value="{{ $admin->role }}">
                                    </div>

                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Save Edit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
    
    

</x-app-layout>