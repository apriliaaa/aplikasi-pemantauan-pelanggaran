<x-guest-layout>



    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
    @endif
    <div class="col-10 col-md-8 col-lg-5">
        <form method="POST" action="{{ route('login') }}">
            @csrf


            <div class="card ">
                <div class="card-body p-4">
                    <div class="text-center w-75 mx-auto">
                        <div class="p-2 border border-5 rounded-circle logo mx-auto overflow-hidden w-25 h-25 mb-4">
                            <img class="w-100" src="/image/logo_unpam.png" alt="">
                        </div>
                    </div>
                    <x-jet-validation-errors class="alert alert-danger" />
                    <main class="form-signin ">
                        {{-- <div>
                                    <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />
                </div> --}}
                <form>
                    <div class="form-floating mb-3">
                        <input class="form-control border" id="floatingInput" placeholder="E-mail" type="email"
                            name="email" :value="old('email')"  autofocus>
                        <label for="floatingInput"><i class="fa-solid fa-user fa-xs px-2"></i> E-mail</label>

                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control border" id="floatingPassword" placeholder="Password"
                            name="password"  autocomplete="current-password">
                        <label for="floatingPassword"><i class="fa-solid fa-lock fa-xs px-2"></i> Password</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary mt-4 fw-bolder" type="submit">Login</button>

                </form>
                </main>
            </div>
    </div>

    </form>
    </div>
</x-guest-layout>