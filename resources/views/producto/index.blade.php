<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="producto-management"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Gestión de productos"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white mx-3">Productos</h6>
                            </div>
                        </div>
                        <div class=" me-3 my-3 text-end">
                            <a href="{{route('producto.create')}}"class="btn bg-gradient-dark mb-0" href="javascript:;"><i
                                    class="material-icons text-sm">add</i>&nbsp;&nbsp;Agregar producto</a>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                MARCA</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                TIPO</th>
                                            <th
                                                class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                NOMBRE</th>
                                           <!--  <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                FECHA DE CREACIÓN</th> -->
                                            <th
                                                class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                COSTO
                                            </th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($producto as $producto)
                                        <tr>
                                            <td>{{$producto->id}}</td>
                                            <td>{{$producto->marca}}</td>
                                            <td>{{$producto->tipo}}</td>
                                            <td>{{$producto->nombre}}</td>
                                            <td>{{$producto->costo}}</td>
                                            <td>
                                                <form action="{{route('producto.destroy',$producto->id)}}" method="POST">
                                                    <a href="{{route('producto.edit',$producto->id)}}" class="btn btn-primary">Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Borrar</button>
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
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>
