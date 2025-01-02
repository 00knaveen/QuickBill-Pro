


<div class="curved-shape"></div>
<div class="curved-shape2"></div>
<div class="form-box Login">
    <h2 class="animation" style="--D:0; --S:21">Login</h2>
    <form action="{{route('login')}}" method="post">
         @csrf
        <div class="input-box animation" style="--D:1; --S:22">
            <input name="email" type="email" required>
            <label for="">Email</label>
            <box-icon type='solid' name='user'></box-icon>
        </div>

        <div class="input-box animation" style="--D:2; --S:23">
            <input passwrod="password" type="password" name="password" required>
            <label for="">Password</label>
            <box-icon name='lock-alt' type='solid'></box-icon>
        </div>

        <div class="input-box animation" style="--D:3; --S:24">
            <button class="btn" type="submit">Login</button>
        </div>

        <div class="regi-link animation" style="--D:4; --S:25">
            <p>Don't have an account? <br> <a href="#" class="SignUpLink">Sign Up</a></p>
        </div>
    </form>
</div>
