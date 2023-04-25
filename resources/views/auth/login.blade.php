@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card" style="background-color: #a4c2f4; border-radius: 50px">
                    <div class="text-center">
                        <!-- Imagen -->
                        <img src="https://i.ibb.co/jwWm9RD/Mecaservicio.png" alt="Mecaservicio" width="250" height="250">
                    </div>
                    <br>
                    <h3 class="text-center"><b>Mecaservicos AVV</b></h3>
                    <br>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-2">
                                <label for="tnum" class="col-md-1 col-form-label text-md-end"></label>

                                <div class="col-md-10">
                                    <input id="tnum" type="text" class="form-control @error('tnum') is-invalid @enderror" name="tnum" value="{{ old('tnum') }}"
                                           placeholder="Usuario" required autofocus>

                                    @error('tnum')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row mb-2">
                                <label for="contrasenia" class="col-md-1 col-form-label text-md-end"></label>

                                <div class="col-md-10">
                                    <input id="contrasenia" type="password" class="form-control @error('contrasenia') is-invalid @enderror" name="contrasenia"
                                           placeholder="Contraseña" required>

                                    @error('contrasenia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row mb-0 text-center">
                                <div class="">
                                    <button type="submit" class="btn btn-outline-primary text-black" style="width: 200px;">
                                        {{ __('Ingresar') }}
                                    </button>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
