<html>
<head>
    <title>Phone Number Authentication using Firebase In Laravel 8</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Js only -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <div class="jumbotron">
        <div class="container text-center">
            <p>Phone Number Authentication using Firebase In Laravel 8</p>
        </div>
    </div>

    <div class="alert alert-danger" id="error" style="display: none;"></div>
    <div class="card">
        <div class="card-header">
            Enter Phone Number
        </div>
        <div class="card-body">
            <div class="alert alert-success" id="sentSuccess" style="display: none;"></div>
            <form>
                <label>Phone Number:</label>
                <input type="text" id="phone_code" class="form-control" placeholder="+91********">
                <input type="text" id="phone" class="form-control" placeholder="+91********">
                <div id="recaptcha-container"></div>
                <button type="button" class="btn btn-success" onclick="phoneSendAuth();">SendCode</button>
            </form>
        </div>
    </div>
    <div class="card" style="margin-top: 10px">
        <div class="card-header">
            Enter Verification code
        </div>
        <div class="card-body">
            <div class="alert alert-success" id="successRegsiter" style="display: none;"></div>
            <form>
                <input type="text" id="verificationCode" class="form-control" placeholder="Enter verification code">
                <button type="button" class="btn btn-success" onclick="codeverify();">Verify code</button>
            </form>
        </div>
    </div>
</div>
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
{{--<script>--}}
{{--    var firebaseConfig = {--}}
{{--        apiKey: "AIzaSyBg5ff6XTsIxW0KkiipBSeHXbjGYUUnmBk",--}}
{{--        authDomain: "test-e434b.firebaseapp.com",--}}
{{--        databaseURL: "https://test-e434b.firebaseapp.com",--}}
{{--        projectId: "famous-84fc0",--}}
{{--        storageBucket: "test-e434b.appspot.com",--}}
{{--        messagingSenderId: "108177260",--}}
{{--        appId: "1:877984876176:web:da91cdd947d2d27889fa15",--}}
{{--        measurementId: "p266654231222"--}}
{{--    };--}}

{{--    firebase.initializeApp(firebaseConfig);--}}
{{--</script>--}}
<script>
    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    var firebaseConfig = {
        apiKey: "AIzaSyA-gj4Cje-NjRUtysAFaNZDdR7VKfdkLL0",
        authDomain: "famous-5f5fc.firebaseapp.com",
        projectId: "famous-5f5fc",
        storageBucket: "famous-5f5fc.appspot.com",
        messagingSenderId: "1084986292087",
        appId: "1:1084986292087:web:ed81a7aae062168bd81372",
        measurementId: "G-6D6NPKZ5Z6"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    // firebase.analytics();
</script>
<script type="text/javascript">
    window.onload=function () {
        render();
    };

    function render() {
        window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');
        recaptchaVerifier.render();
    }

    function phoneSendAuth() {

        var number = '+'+$("#phone_code").val()+$("#phone").val();
        alert(number)

        firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then(function (confirmationResult) {

            window.confirmationResult=confirmationResult;
            coderesult=confirmationResult;
            // alert(coderesult);

            $("#sentSuccess").text("Message Sent Successfully.");
            $("#sentSuccess").show();

        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });

    }

    function codeverify() {

        var code = $("#verificationCode").val();

        coderesult.confirm(code).then(function (result) {
            var user=result.user;

            $("#successRegsiter").text("you are register Successfully.");
            $("#successRegsiter").show();

        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });
    }
</script>
</body>
</html>
