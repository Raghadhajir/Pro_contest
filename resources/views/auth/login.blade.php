@include('panel.static.Auth.AuthHeader')

<!-- BEGIN: Body-->
<style>
.problem-form-wrapper .form-container {
    background-color: #fff;
    padding: 40px;
    border-radius: 100%;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 500px;

}

.content-warrper {
    border: 10px solid #1b3b63;
    /* إطار كحلي داكن */
    border-radius: 80px 0 80px 0;
    padding: 30px;
    margin: 40px auto;
    max-width: 1000px;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.3);
}



.problem-form-wrapper h3 {
    text-align: left;
    font-weight: bold;
    margin-bottom: 30px;
}

.problem-form-wrapper .form-group label {
    font-weight: bold;
    margin-bottom: 8px;
}

.problem-form-wrapper .form-control {
    background-color: #e6e6e6;
    border: 2px solid #1c3d5a;
    border-radius: 10px;
    padding: 12px;
    font-size: 16px;
    box-shadow: #7d9bb3 3px 4px;


}

.problem-form-wrapper textarea.form-control {
    resize: vertical;
}

.problem-form-wrapper .custom-file-input {
    display: none;
}

.problem-form-wrapper .file-upload-label {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 150px;
    height: 150px;
    background-color: #7d9bb3;
    border-radius: 20px;
    cursor: pointer;
    margin: 0 auto 20px auto;
    transition: background-color 0.3s;
}

.problem-form-wrapper .file-upload-label:hover {
    background-color: #5c7b97;
}

.problem-form-wrapper .file-upload-label img {
    width: 80px;
}

.btn-submit {
    background-color: #1c3d5a;
    color: white;
    font-weight: bold;
    padding: 12px;
    width: 100%;
    border-radius: 10px;
    border: none;
    letter-spacing: 2px;
    transition: background-color 0.3s;

}

.problem-form-wrapper .btn-submit:hover {
    background-color: rgb(72, 140, 243);
}
</style>

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- login page start -->
            <div class="problem-form-wrapper">
                <section id="auth-login" class="row flexbox-container">
                    <div class="col-xl-8 col-11">
                        <div class="card bg-authentication mb-0">
                            <div class="row m-0">
                                <!-- left section-login -->
                                <div class="col-md-6 col-12 px-0">
                                    <div
                                        class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="text-center mb-2">مرحباً بك من جديد 😊</h4>
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                                {{--  <div class="d-flex flex-md-row flex-column justify-content-around">
                                                        <a href="#" class="btn btn-social btn-google btn-block font-small-3 mr-md-1 mb-md-0 mb-1">
                                                                <i class="bx bxl-google font-medium-3"></i><span class="pl-50 d-block text-center">Google</span></a>
                                                        <a href="#" class="btn btn-social btn-block mt-0 btn-facebook font-small-3">
                                                                <i class="bx bxl-facebook-square font-medium-3"></i><span class="pl-50 d-block text-center">Facebook</span></a>
                                                </div>--}}
                                                <div class="divider">
                                                    <div class="divider-text text-uppercase text-muted">
                                                        <small>دائماً نسعد بكونك معنا واستخدام خدماتنا</small>
                                                    </div>
                                                </div>
                                                <form method="post" action="{{ route('login') }}">
                                                    {{ csrf_field() }}
                                                    <div class="form-group mb-50">
                                                        <label class="text-bold-600" for="exampleInputEmail1">بريدك
                                                            الإلكتروني</label>
                                                        <input type="text" class="form-control" name="UserMail"
                                                            id="exampleInputEmail1" value="{{ old('email') }}"
                                                            placeholder="البريد الإلكتروني الخاص بك" required
                                                            autocomplete="email" autofocus>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="text-bold-600" for="exampleInputPassword1">كلمة
                                                            المرور:</label>
                                                        <input type="password" class="form-control" minlength="7"
                                                            id="exampleInputPassword1"
                                                            placeholder="كلمة المرور الخاصة بك" name="password" required
                                                            autocomplete="current-password">
                                                    </div>
                                                    <div
                                                        class="form-group d-flex flex-md-row flex-column justify-content-between align-items-center">
                                                        <div class="text-left">
                                                            <div class="checkbox checkbox-sm">
                                                                <input checked type="checkbox" name="remember"
                                                                    class="form-check-input" id="exampleCheck1">
                                                                <label class="checkboxsmall" for="exampleCheck1">
                                                                    تذكرني ( إبقاء الجلسة نشطة لوقت أطول )
                                                                </label>
                                                            </div>
                                                        </div>
                                                        @if (Route::has('password.request'))
                                                        <div class="text-right">
                                                            <a href="{{ route('password.request') }}"
                                                                class="card-link"><small> هل نسيت كلمة المرور
                                                                </small></a>
                                                        </div>
                                                        @endif

                                                    </div>
                                                    <button type="submit" class="btn-submit"
                                                        class="btn btn-primary glow w-100 position-relative"> تسجيل
                                                        الدخول<i id="icon-arrow"
                                                            class="bx bx-right-arrow-alt"></i></button>
                                                </form>
                                                <hr>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- right section image -->
                                <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                                    <div class="card-content">
                                        <img class="img-fluid" src="{{ asset('app-assets/images/pages/login.jpg') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- login page ends -->
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->