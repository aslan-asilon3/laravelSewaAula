@extends('layouts.app-admin')

@section('active','active')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Akun</h1>

    </div>

    <!-- Content Row -->
    <div class="row">


        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('adminkelolaakunupdate', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="font-weight-bold">GAMBAR</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                            <!-- error message untuk title -->
                            @error('image')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Nama</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="name" value="{{ old('name', $user->first()->name) }}" placeholder="Masukkan Nama User">

                            <!-- error message untuk title -->
                            @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->first()->email) }}" placeholder="Masukkan Email User">

                            <!-- error message untuk title -->
                            @error('email')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Status</label>
                            <input type="text" class="form-control @error('is_admin') is-invalid @enderror" name="is_admin" value="{{ old('is_admin', $user->first()->is_admin ) }}" placeholder="Masukkan Status User">

                            <!-- error message untuk title -->
                            @error('is_admin')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password', $user->first()->password) }}" placeholder="Masukkan Password User">

                            <!-- error message untuk title -->
                            @error('password')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form>
                </div>
            </div>
        </div>

    </div>


</div>

@endsection
