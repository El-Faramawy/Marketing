<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>

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

        var number = '+20'+$("#phone").val();
        // var number = '+1'+$("#phone").val();
        // alert(number)

        firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then(function (confirmationResult) {

            window.confirmationResult=confirmationResult;
            coderesult=confirmationResult;
            // alert(coderesult);

            // $("#sentSuccess").text("Message Sent Successfully.");
            // $("#sentSuccess").show();
            toaster.success("code sent successfully")
            modal
        }).catch(function (error) {
            // $("#error").text(error.message);
            // $("#error").show();
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
