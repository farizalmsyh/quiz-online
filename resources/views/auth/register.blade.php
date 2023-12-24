<!DOCTYPE html>
<html lang="en">

<head>
    
    <!-- Meta -->
    @include('layouts.dev.meta')

    <title>Sign Up | Testify</title>

    <!-- Styles -->
    @include('layouts.dev.link')

</head>

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Selamat Datang</h1>
                            <p class="lead">
                                Silahkan Sign Up untuk melanjutkan
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Nama</label>
                                            <input id="name" class="form-control form-control-lg @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Masukan Nama Anda" />
                                            @error('name')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Masukan Email Anda" />
                                            @error('email')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" type="password" name="password" placeholder="Masukan Password Anda" required autocomplete="new-password"/>
                                            @error('password')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Konfirmasi Password</label>
                                            <input id="password-confirm" class="form-control form-control-lg" type="password" name="password_confirmation" placeholder="Masukan Kembali Password Anda"  required autocomplete="new-password"/>
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-block btn-lg btn-primary my-3">Sign up</button>
                                            <a href="{{route('login')}}" class="text-decoration-none">Sudah memiliki akun ? Login</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Script -->
    @include('layouts.dev.script')

</body>

</html>