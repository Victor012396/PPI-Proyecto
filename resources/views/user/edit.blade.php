<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="user-management"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Editar usuario'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://img.freepik.com/premium-photo/smart-city-with-checkpoints-communication-network_28943-371.jpg?w=740');">
                <span class="mask  bg-gradient-primary  opacity-6"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Información del usuario</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        @if (session('status'))
                        <div class="row">
                            <div class="alert alert-success alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('status') }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10"
                                    data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        @endif
                        @if (Session::has('demo'))
                                <div class="row">
                                    <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                        <span class="text-sm">{{ Session::get('demo') }}</span>
                                        <button type="button" class="btn-close text-lg py-3 opacity-10"
                                            data-bs-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                        @endif
                        <form method='POST' action="{{ route('user.update',$user) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Nombre</label>
                                    <input type="text" name="name" value="{{old('name',$user->name)}}" class="form-control border border-2 p-2">
                                    @error('name')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                                
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Email</label>
                                    <input type="text" name="email" value="{{old('email',$user->email)}}" class="form-control border border-2 p-2" >
                                    @error('email')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                               
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Ubicación</label>
                                    <input type="text" name="location" value="{{old('location',$user->location)}}" class="form-control border border-2 p-2">
                                    @error('location')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Teléfono</label>
                                    <input type="number" name="phone" value="{{old('phone',$user->phone)}}" class="form-control border border-2 p-2">
                                    @error('phone')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Acerca de</label>
                                    <input type="text" name="about" value="{{old('about',$user->about)}}" class="form-control border border-2 p-2">
                                    @error('about')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn bg-gradient-dark">Guardar</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
