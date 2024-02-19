<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="/client/index.php"></a>
<a href="/provider/index.php"></a>


<script type="module">
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/10.8.0/firebase-app.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.8.0/firebase-analytics.js";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyB8W3UxVTdAhk8sGU2BvmgtHlw5x1P712A",
        authDomain: "tp-2-45bca.firebaseapp.com",
        projectId: "tp-2-45bca",
        storageBucket: "tp-2-45bca.appspot.com",
        messagingSenderId: "1003809199077",
        appId: "1:1003809199077:web:e9a5f63c204f7ccd50150c",
        measurementId: "G-TP6TFMNB7H"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);
</script>

</body>
</html>