 <x-app-layout>
     {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
     </h2>
     </x-slot>

     <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                 <x-jet-welcome />
             </div>
         </div>
     </div> --}}
     <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
     </div>
     </div>
     <div id="main">
        <header class="mb-3">
            <div class="navbar navbar-light bg-primary">
                <a href="#" class="burger-btn d-block d-xl-none text-white">
                    <i class="bi bi-justify fs-3"></i>
                </a>
    
                <h5 class="text-white">Grafik Mahasiswa Pelanggar Tata Tertib</h5>
            </div>
        </header>

         <div class="page-heading">
             {{-- <div class="page-title">
                 <div class="row">
                     <div class="col-12 col-md-6 order-md-1 order-last">
                         <h3>Layout Dezfault</h3>
                         <p class="text-subtitle text-muted">The default layout </p>
                     </div>
                     <div class="col-12 col-md-6 order-md-2 order-first">
                         <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                             <ol class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                 <li class="breadcrumb-item active" aria-current="page">Layout Default</li>
                             </ol>
                         </nav>
                     </div>
                 </div>
             </div> --}}

             <section class="section">
                {{-- <div class="row">
                    <div class="col-md-9"> --}}
                        <div class="card">
                            <div class="card-header">
                                <h4>Line Area Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="area"></div>
                            </div>
                        </div>
                    {{-- </div> --}}
                    {{-- </div> --}}
             </section>

             <section class="section">
                <div class="card">
                    <div class="card-body">
                        <div class="p">Total pelanggaran pada minggu ini sebanyak 145 mahasiswa</div>
                    </div>
                </div>
             </section>

             {{-- <section class="section">
                 <div class="card">
                     <div class="card-header">
                         <h4 class="card-title">Default Layout</h4>
                     </div>
                     <div class="card-body">
                         Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, commodi? Ullam quaerat
                         similique iusto
                         temporibus, vero aliquam praesentium, odit deserunt eaque nihil saepe hic deleniti? Placeat
                         delectus
                         quibusdam ratione ullam!
                     </div>
                 </div>
             </section> --}}
         </div>

         <footer>
             <div class="footer clearfix mb-0 text-muted">
                 {{-- <div class="float-start">
                     <p>2021 &copy; Mazer</p>
                 </div>
                 <div class="float-end">
                     <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                             href="http://ahmadsaugi.com">A. Saugi</a></p>
                 </div> --}}
             </div>
         </footer>
     </div>
     </div>
 </x-app-layout>