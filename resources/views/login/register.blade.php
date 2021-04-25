<html>
    <head>
        <title>Talent Finder</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/global.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('css/pages/register.css') }}" rel="stylesheet" type="text/css" >
    </head>
    <body>
        <div id="div-background">
            <div id="div-content">
                @if ($errors->any() || session('password-unmatch'))
                    <div id="div-errors">
                        <div class="form-group" id="div-form-title">
                            <h2>Errors</h2>
                        </div>
                        @foreach ($errors->all() as $error)
                            <div class="form-group">
                                {{$error}}
                            </div>
                        @endforeach
                        <div class="form-group">
                            {{session('password-unmatch')}}
                        </div>
                    </div>
                @endif


                @if(isset($name))
                    {{$name}}
                @endif

                <div id="div-form">
                    <form method="POST" action="{{route('register')}}">
                        @csrf
                        <div class="form-group" id="div-form-title">
                            <h2>Register</h2>
                        </div>
                        <div class="form-group" id="div-form-title">
                            <h2>bar</h2>
                        </div>
                        <div id="tab-register" class="div-tabs">
                            <div id="tab-register-1" class="tab active">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="input" type="text" id="name" name="name" autocomplete="false">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="input" type="email" id="email" name="email" autocomplete="false">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input class="input" type="password" id="password" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="password">Confirm password</label>
                                    <input class="input" type="password" id="password" name="confirm-password">
                                </div>
                                <div class="form-group">
                                    <label for="password">Register as:</label>
                                    <div id="div-register-options">
                                        <input id="radio-talent" type="radio" name="register-type" value="1" checked>
                                        <label for="radio-talent">Talent</label>
                                        <br>
                                        <input id="radio-recruter" type="radio" name="register-type" value="2">
                                        <label for="radio-recruter">Company</label>
                                    </div>
                                </div>
                                <div class="form-group display-flex justify-content-space-between align-items-center">
                                    <a href="{{route('login')}}">Cancel</a>
                                    <button type="button" class="next-tab button button-out-purple" data-tab-target="tab-register-2" data-tab-parent="tab-register">Next</button>
                                </div>
                            </div>
                            <div id="tab-register-2" class="tab">
                                <div class="form-group display-flex justify-content-between">
                                    <button type="button" class="next-tab button button-out-purple" data-tab-target="tab-register-1" data-tab-parent="tab-register">Back</button>
                                    <button type="button" class="next-tab button button-out-purple" data-tab-target="tab-register-3" data-tab-parent="tab-register">Next</button>
                                </div>
                            </div>
                            <div id="tab-register-3" class="tab">
                                <div class="form-group">
                                    <button type="button" class="next-tab button button-out-purple" data-tab-target="tab-register-2" data-tab-parent="tab-register">Back</button>
                                    <button class="button button-purple">Finish</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="{{asset('js/tabs.js')}}"></script>
    </body>
    </html>