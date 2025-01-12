<div class="w-px-400 mx-auto">
    <!-- Logo -->
    <!-- /Logo -->
    <h3 class="fw-bold text-center">Welcome to {{ config('app.name') }}!</h3>

    <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">
                <i class="fas fa-user me-1"></i> Username
            </label>
            <input wire:model="name" required type="text" class="form-control" id="email" name="name"
                   placeholder="Username" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <div class="d-flex justify-content-between">
                <label class="form-label" for="password">
                    <i class="fas fa-lock me-1"></i> Password
                </label>
            </div>
            <div class="input-group input-group-merge form-password-toggle">
                <input wire:model="password" type="{{ $password_type }}" id="password" class="form-control" name="password"
                       placeholder="Password"
                       aria-describedby="password"/>
                <span class="input-group-text cursor-pointer" wire:click="changePasswordType">
                    @if($password_type == 'password')
                        <i class="ti ti-eye-off"></i>
                    @else
                        <i class="ti ti-eye"></i>
                    @endif
                </span>
            </div>
            @error('password')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember"
                       id="remember-me" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember-me">
                   Remember me
                </label>
            </div>
        </div>

        <button class="btn btn-primary d-grid w-100" type="submit">
           Login
        </button>
    </form>
    <div class="divider my-5">
        <div class="divider-text">or</div>
    </div>

    <div class="d-flex justify-content-center gap-2">
        <a href="javascript:;" class="btn btn-icon rounded-circle btn-text-facebook">
            <i class="tf-icons fab fa-facebook"></i>
        </a>

        <a href="javascript:;" class="btn btn-icon rounded-circle btn-text-twitter">
            <i class="tf-icons fab fa-twitter"></i>
        </a>

        <a href="javascript:;" class="btn btn-icon rounded-circle btn-text-github">
            <i class="tf-icons fab fa-github"></i>
        </a>

        <a href="javascript:;" class="btn btn-icon rounded-circle btn-text-google-plus">
            <i class="tf-icons fab fa-google"></i>
        </a>
    </div>

</div>
