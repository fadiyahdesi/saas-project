@extends('adminlte::auth.register')

@section('auth_body')
    <form action="{{ route('company.register') }}" method="post">
        @csrf

        {{-- Company Name field --}}
        <div class="input-group mb-3">
            <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror"
                   value="{{ old('company_name') }}" placeholder="Nama Perusahaan" autofocus>
            <div class="input-group-append">
                <div class="input-group-text"><span class="fas fa-building"></span></div>
            </div>
            @error('company_name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
        </div>

        {{-- Sector field --}}
        <div class="input-group mb-3">
            <select name="sector_id" class="form-control @error('sector_id') is-invalid @enderror">
                <option value="">-- Pilih Sektor Perusahaan --</option>
                @if(isset($sectors))
                    @foreach($sectors as $sector)
                        <option value="{{ $sector->id }}" {{ old('sector_id') == $sector->id ? 'selected' : '' }}>
                            {{ $sector->name }}
                        </option>
                    @endforeach
                @endif
            </select>
            <div class="input-group-append">
                <div class="input-group-text"><span class="fas fa-briefcase"></span></div>
            </div>
            @error('sector_id') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
        </div>

        {{-- Admin Name field --}}
        <div class="input-group mb-3">
            <input type="text" name="admin_name" class="form-control @error('admin_name') is-invalid @enderror"
                   value="{{ old('admin_name') }}" placeholder="Nama Lengkap Anda">
            <div class="input-group-append">
                <div class="input-group-text"><span class="fas fa-user"></span></div>
            </div>
            @error('admin_name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
        </div>

        {{-- Email field --}}
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" placeholder="Email">
            <div class="input-group-append">
                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
            </div>
            @error('email') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
        </div>

        {{-- Password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                   placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text"><span class="fas fa-lock"></span></div>
            </div>
            @error('password') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
        </div>

        {{-- Confirm password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi Password">
            <div class="input-group-append">
                <div class="input-group-text"><span class="fas fa-lock"></span></div>
            </div>
        </div>

        {{-- Register button --}}
        <button type="submit" class="btn btn-block btn-primary">
            Daftarkan Perusahaan
        </button>
    </form>
@stop