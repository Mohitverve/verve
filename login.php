<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
    /* Add your custom CSS styles here */

      body {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        /* Ensure the form takes the full height of the viewport */
        margin: 0;
        /* Remove default margin to center accurately */
        background-color:black;
        /* Light grey background color */
    }

    #Mainform {
        margin: auto;
        background-color:#0d0d0d;
        /* White background color for the form */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        /* Add a subtle box shadow for depth */
    }

    h2 {
        color: #fec86a;
        /* Bootstrap primary color for the heading */
    }


    button {
        margin-top: 10px;

    }

    .btn-primary {

        --bs-btn-color: #fec86a;
        --bs-btn-bg: black;
        --bs-btn-border-color: #fec86a;
        --bs-btn-hover-color: black;
        --bs-btn-hover-bg: #fec86a;
        --bs-btn-hover-border-color: #fec86a;
        --bs-btn-focus-shadow-rgb: 49, 132, 253;
        --bs-btn-active-color: black;
        --bs-btn-active-bg: #fec86a;
        --bs-btn-active-border-color: #fec86a;
        --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
        --bs-btn-disabled-color: #000;
        --bs-btn-disabled-bg: #fec86a;
        --bs-btn-disabled-border-color: #fec86a;
    }


    /* Add more styles as needed */
</style>

<body>
    <form id="Mainform" class="m-4">

        <h2 class="mb-3">VerveIN-Login</h2>

       
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="emailInp" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>

        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="passwordInp" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>

        <button type="submit" style="float: right;" class="btn btn-primary">Login</button>
        <a href="signup.html"> <button type="button" style="float: right;" class="btn btn-primary me-2 "> Signup</button> </a>

    </form>



    <script type="module">

        import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
        import { getFirestore, doc, getDoc} from "https://www.gstatic.com/firebasejs/10.7.1/firebase-firestore.js";
        import { getAuth, signInWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-auth.js";




        const firebaseConfig = {
            apiKey: "AIzaSyAttOBNym78OvLC-sB0QTSnzER5B13YgTg",
            authDomain: "verve-1883f.firebaseapp.com",
            databaseURL: "https://verve-1883f-default-rtdb.firebaseio.com",
            projectId: "verve-1883f",
            storageBucket: "verve-1883f.appspot.com",
            messagingSenderId: "88628857972",
            appId: "1:88628857972:web:8319d4700a9aa0ec9f5521"
        };


        const app = initializeApp(firebaseConfig);
        const db = getFirestore();
        const auth = getAuth(app);


      
        let emailInp = document.getElementById('emailInp');
        let passwordInp = document.getElementById('passwordInp');
        let Mainform = document.getElementById('Mainform');


        let SignInUser = evt => {
            evt.preventDefault();

            signInWithEmailAndPassword (auth, emailInp.value, passwordInp.value)
                .then(async(credentials) => {
                    var ref = doc(db, "UserAuthList", credentials.user.uid)
                    const docSnap = await getDoc(ref);
                    
                    if (docSnap.exists()) {
                        localStorage.setItem("user-info", JSON.stringify({
                            firstname: docSnap.data().firstname,
                            lastname: docSnap.data().lastname,
                        }))
                        localStorage.setItem("user-creds", JSON.stringify(credentials));
                        window.location.href = "index.html";

                    }

                })

                .catch((error) => {
                    alert(error.message);
                    console.log(error.code);
                    console.log(error.message);
                })




        }

        Mainform.addEventListener('submit', SignInUser);
        
    </script>

</body>

</html> 
