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

                <h5 class="text-white">Pelanggaran</h5>
            </div>
        </header>

        <div class="page-heading">
            {{-- <div class="page-title">
             </div> --}}

            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif

            <section class="section">
                <form action="{{ route('mahasiswa.save') }}" method="post">
                    @csrf

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Input Pelanggaran Mahasiswa</h4>
                        </div>
                        <div class="card-body">

                            <x-jet-validation-errors class="alert alert-danger" />

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Mahasiswa</label>
                                        <input type="text" name="name" class="form-control" id="basicInput"
                                            placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="basicInput">NIM</label>
                                        <input type="text" name="nim" class="form-control" id="basicInput"
                                            placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="basicInput">Dosen Penanggungjawab</label>
                                        {{-- <select class="form-select" name="id_user" id="id_user" disabled>
                                            <option value="{{ $id_user }}">{{ $nama_user }}</option>
                                        </select> --}}
                                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                        <input type="text" name="nama_dosen" class="form-control" id="basicInput"
                                            placeholder="" value="{{ Auth::user()->name }}" disabled readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="programStudi">Jenis Pelanggaran</label>
                                        <select class="form-select" id="id_pelanggaran" name="id_pelanggaran">
                                            <option value="">Pilih Jenis Pelanggaran</option>
                                            @foreach ($pelanggaran as $key)
                                            <option value="{{ $key->id }}">{{ $key->nama_pelanggaran }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="programStudi">Item Disita</label>
                                        <select class="form-select" id="id_item" name="id_item">
                                            <option value="">Pilih item disita</option>
                                            @foreach ($item as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Foto</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>

                             
                                    
                                </div>
                                <p>
                                {{-- <button type="button" onclick="startWebcam();">Start WebCam</button> --}}
                                {{-- <button type="button" onclick="stopWebcam();">Stop WebCam</button> 
                                    <button type="button" onclick="snapshot();">Take Snapshot</button>  --}}
                                </p>
                                <video class="d-none" onclick="snapshot(this);" width=400 height=400 id="video" autoplay></video>
                                <p class="d-none text-center" id="ss">Hasil Gambar : <p>
                                <canvas class="d-none mx-auto"  id="myCanvas" width="400" height="300"></canvas>  
                                <div class="col-12 text-center">
                                    <button type="button" class="btn btn-primary" onclick="startWebcam()">Buka Kamera</button>
                                    <button  type="button" class="btn btn-success" onclick="snapshot()">Ambil Gambar</button>
                                    <button  type="button" class="btn btn-danger" onclick="stopWebcam()">Stop</button>
                                </div>
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-success me-1 mb-1">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </section>
        </div>
</x-app-layout>


<script>
        let video;
      let webcamStream;
            
      function startWebcam() {
        document.getElementById('video').classList.remove('d-none')
        document.getElementById('video').classList.add('d-block')
        if (navigator.getUserMedia) {
           navigator.getUserMedia (

              // constraints
              {
                 video: true,
                 audio: false
              },

              // successCallback
              function(localMediaStream) {
                  video = document.querySelector('video');
                 video.srcObject=localMediaStream;
                 webcamStream = localMediaStream;
              },

              // errorCallback
              function(err) {
                 console.log("The following error occured: " + err);
              }
           );
        } else {
           console.log("getUserMedia not supported");
        }  
      }
            
      function stopWebcam() {
          webcamStream.stop();
      }
      //---------------------
      // TAKE A SNAPSHOT CODE
      //---------------------
      var canvas, ctx;

      function init() {
        // Get the canvas and obtain a context for
        // drawing in it
        canvas = document.getElementById("myCanvas");
        ctx = canvas.getContext('2d');
      }

      function snapshot() {
        document.getElementById('myCanvas').classList.remove('d-none')
        document.getElementById('myCanvas').classList.add('d-block')
        document.getElementById('ss').classList.remove('d-none')
        document.getElementById('ss').classList.add('d-block')
        init()
         // Draws current image from the video element into the canvas
        ctx.drawImage(video, 0,0, canvas.width, canvas.height);
      }
</script>