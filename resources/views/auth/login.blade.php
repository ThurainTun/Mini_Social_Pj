<x-authlayout>
    <div class="container mt-5" id="container">
        <!-- sign in page -->
        <div class="form-container sign-in-container">
            <form method="post" action="{{route('login-post')}}" class="form" id="login">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                @endif
                @csrf
                <h1 class="form__title">Login</h1>
                <div class="form__input-group">
                    <input type="email" class="form__input" name="email" id="username" placeholder="Email" maxlength="20" required>                
                </div>
                <div class="form__input-group">
                    <input type="password" class="form__input" name="password" id="pass" placeholder="Password" maxlength="20" required>                   
                </div>
                <div class="form__input-group">
                    <button type="submit" class="form__button mt-3">Submit</button>
                </div>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <a href="{{ route('register') }}">
                        <button class="ghost" id="signUp">Sign Up</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-authlayout>
