<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
  @include('admin.layouts.head')

</head>

<body>

<div class="wrapper">

    <!--=================================
     preloader -->

  @include('admin.layouts.loader')

    <!--=================================
     preloader -->

    <!--=================================
    login-->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="height-100vh d-flex align-items-center page-section-ptb login" style="background-image: url(images/login-bg.jpg);" >
        <div class="container">
            <div class="row justify-content-center no-gutters vertical-align">
                <div class="col-lg-4 col-md-6 login-fancy-bg bg" style="background-image: url(images/login-inner-bg.jpg);">
                    <div class="login-fancy">
                        <h2 class="text-white mb-20">Hello world!</h2>
                        <p class="mb-20 text-white">Create tailor-cut websites with the exclusive multi-purpose responsive template along with powerful features.</p>
                        <ul class="list-unstyled  pos-bot pb-30">
                            <li class="list-inline-item"><a class="text-white" href="#"> Terms of Use</a> </li>
                            <li class="list-inline-item"><a class="text-white" href="#"> Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 bg-white">
                    <div class="login-fancy pb-40 clearfix">
                        <h3 class="mb-30">Sign In To Admin</h3>
                        <form action="{{route('CheckLogin')}}" method="post">
                            @csrf
                            <div class="section-field mb-20">
                                <label class="mb-10" for="name">Email* </label>
                                <input id="name"  class="web form-control" type="email"  name="email">
                            </div>
                            <div class="section-field mb-20">
                                <label class="mb-10" for="Password">Password* </label>
                                <input id="Password" class="Password form-control" type="password" placeholder="Password" name="password">
                            </div>


                            <button class="button">Log in</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
     login-->

</div>



@include('admin.layouts.footerjs')
</body>
</html>
