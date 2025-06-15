@include('panel.static.Auth.AuthHeader')
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

.form-control {
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
            <!-- forgot password start -->
            <section class="row flexbox-container">
                <div class="col-xl-7 col-md-9 col-10  px-0">
                    <div class="card bg-authentication mb-0">
                        <div class="row m-0">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
                            <!-- left section-forgot password -->
                            <div class="col-md-6 col-12 px-0">
                                <div class="card disable-rounded-right mb-0 p-2">
                                    <div class="card-header pb-1">
                                        <div class="card-title">
                                            <h4 class="text-center mb-2">هل نسيت كلمة المرور 😮؟</h4>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex justify-content-between align-items-center mb-2"
                                        claa="btn-submit">
                                        <div class="text-left">
                                            <div class="ml-3 ml-md-2 mr-1">
                                                <a href="{{ route('login') }}"
                                                    class="card-link btn btn-outline-primary text-nowrap">تسجيل
                                                    الدخول</a>
                                            </div>
                                        </div>
                                        <div class="mr-3">
                                            <a href="./" class="card-link btn btn-outline-primary text-nowrap">العودة
                                                للرئيسية</a>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="text-muted text-center mb-2"><small>حسناً لا تقلق فنحن سوف
                                                    نساعدك بالحصول على واحدة جديدة فوراً
                                                    <br />فقط أدخل بريدك الإلكتروني
                                                    😎</small></div>
                                            <form class="mb-2" method="POST" action="{{ route('password.email') }}">
                                                <div class="form-group mb-2">
                                                    <label class="text-bold-600" for="exampleInputEmailPhone1">بريدك
                                                        الإلكتروني</label>
                                                    <input class="form-control" type="text" class="form-control"
                                                        id="exampleInputEmailPhone1"
                                                        placeholder="بريدك الإلكتروني أكتبه هنا" required
                                                        autocomplete="email" autofocus>
                                                </div>
                                                <button type="submit" class="btn-submit"
                                                    class="btn btn-primary glow position-relative w-100">إعادة تعيين
                                                    كلمة المرور<i id="icon-arrow"
                                                        class="bx bx-right-arrow-alt"></i></button>
                                            </form>
                                            <div class="text-center mb-2"><a href="{{ route('login') }}"><small
                                                        class="text-muted">I
                                                        أوه لقد تذكرت كلمة المرور 🤩</small></a></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- right section image -->
                            <div class="col-md-6 d-md-block d-none text-center align-self-center">
                                <img class="img-fluid" src="{{ asset('app-assets/images/pages/lock-screen.png') }}"
                                    alt="branding logo" width="300">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- forgot password ends -->
        </div>
    </div>
</div>
<!-- END: Content-->

@include('panel.static.Auth.AuthFooter')