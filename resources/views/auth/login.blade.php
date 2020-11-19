

<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Login | DPR Admin Login</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('admin-assets/css/dashlite.css?ver=2.0.0')}}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('admin-assets/css/theme.css?ver=2.0.0')}}">
</head>

<body class="nk-body bg-white npc-general pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-split nk-split-page nk-split-md">
                        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                            <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                                <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                            </div>
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <div class="brand-logo pb-5">
                                    <a href="html/index.html" class="logo-link">
                                        <img src="{{ asset('/images/login.png') }}" alt="">
                                    </a>
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">Sign-In</h5>
                                        <div class="nk-block-des">
                                            <p>Access the Holiday Air Dashboard using your email and passcode.</p>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email or Username</label>
                                            <a class="link link-primary link-sm" tabindex="-1" href="#">Need Help?</a>
                                        </div>
                                        <input  class="form-control form-control-lg"  placeholder="Enter your email address or username"
                                        id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div><!-- .foem-group -->
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Passcode</label>
                                            <a class="link link-primary link-sm" tabindex="-1" href="html/pages/auths/auth-reset.html">Forgot Code?</a>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" class="form-control form-control-lg" id="password" type="password" placeholder="Enter your passcode"
                                            class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div><!-- .foem-group -->
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-success btn-block">Sign in</button>
                                    </div>
                                </form><!-- form -->
                                <div class="form-note-s2 pt-4"> New on our platform? <a href="html/pages/auths/auth-register.html">Create an account</a>
                                </div>
                                <div class="text-center pt-4 pb-3">
                                    <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
                                </div>
                                <ul class="nav justify-center gx-4">
                                    <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Google</a></li>
                                </ul>
                            </div><!-- .nk-block -->
                            <div class="nk-block nk-auth-footer">
                                <div class="mt-3">
                                    <p>&copy; 2020 Prologics iWEB. All Rights Reserved.</p>
                                </div>
                            </div><!-- .nk-block -->
                        </div><!-- .nk-split-content -->
                        <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true" style="background-image: url({{ asset('/images/1.jpg') }});  background-size: cover;">
                            <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto" >
                                <div class="slider-init" data-slick='{"dots":true, "arrows":false}'>
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            <div class="nk-feature-img text-center center">
                                                <img class="" src="{{ asset('/images/login.png') }}" class="cover" alt="">
                                            </div>
                                            <div class="nk-feature-content py-4 p-sm-5 text-white">
                                                <h4>Prologics iWEB</h4>
                                                <p>You can start to create your products easily with its user-friendly design & most completed responsive layout.</p>
                                            </div>
                                        </div>
                                    </div><!-- .slider-item -->
                                </div>
                            </div><!-- .slider-wrap -->
                        </div><!-- .nk-split-content -->
                    </div><!-- .nk-split -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{ asset('admin-assets/js/bundle.js?ver=2.0.0')}}"></script>
    <script src="{{ asset('admin-assets/js/scripts.js?ver=2.0.0')}}./"></script>

</html>
