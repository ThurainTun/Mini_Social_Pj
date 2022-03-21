<x-authlayout>
    <div class="container mt-5" id="container">
        <div class="form-container sign-in-container">
            <form class="form" action="{{ route('register-post') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <h1 class="form__title">Sign Up</h1>
                <div class="form__input-group">
                    <input type="text" class="form__input" name="username" id="username" placeholder="User Name"
                    value="{{old('username')}}"    maxlength="20" required>
                </div>
                <div class="form__input-group">
                    <input type="email" class="form__input" name="email" id="email" placeholder="Email" maxlength="20"
                    value="{{old('email')}}"    required>
                </div>
                <div class="form__input-group">
                    <input type="password" class="form__input" name="password" id="pass" placeholder="Password"
                    value="{{old('password')}}"    maxlength="20" required>
                </div>
                <div class="form__input-group">

                    <input type="password" class="form__input" name="password_confirmation" id="pass"
                        placeholder="Re-tpye Password" maxlength="20" required>
                </div>
                <div class="form__input-group">
                    <input value="{{old('image')}}" type="file" class="form__input" name="image" id="pass" maxlength="20" required>
                </div>
                <div class="form__input-group mt-2 mb-2">
                    <a href="">
                        <button type="submit" class="form__button">Sin Up</button>
                    </a>
                </div>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Welcome Back!</h1>
                    <p>Please login with your personal info</p>
                    <a href="{{ route('login') }}">

                        <button class="ghost" id="signIn">Sign In</button>
                    </a>
                </div>
                <div class="overlay-panel overlay-left">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>

                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
</x-authlayout>
