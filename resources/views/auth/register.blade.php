
<div class="form-box Register">
    <h2 class="animation" style="--li:17; --S:0">Register</h2>
    <form action="{{route('register')}}" method="post">
        @csrf
        <div class="input-box animation" style="--li:18; --S:1">
            <input type="text" name="name" required>
            <label for="">Username</label>
            <box-icon type='solid' name='user'></box-icon>
        </div>

        <div class="input-box animation" style="--li:19; --S:2">
            <input type="email" name="email" required>
            <label for="">Email</label>
            <box-icon name='envelope' type='solid'></box-icon>
        </div>

        <div class="input-box animation" style="--li:19; --S:3">
            <input name="password" type="password" required>
            <label for="">Password</label>
            <box-icon name='lock-alt' type='solid'></box-icon>
        </div>

        <div class="input-box animation" style="--li:20; --S:4">
            <button class="btn" type="submit">Register</button>
        </div>

        <div class="regi-link animation" style="--li:21; --S:5">
            <p>Don't have an account? <br> <a href="#" class="SignInLink">Sign In</a></p>
        </div>
    </form>
</div>
<div class="info-content Register">
    <h2 class="animation" style="--li:17; --S:0">WELCOME!</h2>
    <p class="animation" style="--li:18; --S:1">QuickBill Pro</p>
</div>