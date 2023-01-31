
<div class="center">
    <h1>Admin Login Page</h1>
    <form method="POST" action="/authenticate">
        <?php if (!empty($_SESSION) && isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
            <div class='alert alert-danger mb-3' role='alert'>
                <?= $_SESSION['error'] ?>
            </div>
        <?php
            $_SESSION['error'] = null;
        endif; ?>
        <div class="txt_field">
            <input type="text" name="username" id="admin-username" required>
            <span></span>
            <label>Username</label>
        </div>
        <div class="txt_field">
            <input type="password" name="password" id="admin-password" required>
            <span></span>
            <label>Password</label>
        </div>
        <input type="submit" value="Login">
        <div class="mb-3 form-check mt-3">
            <input type="checkbox" class="form-check-input" id="remember-me" name="remember_me">
            <label class="form-check-label" for="remember-me">Remember Me</label>
        </div>
    </form>
</div>














<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&family=Poppins:wght@400;500;600&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body {
        margin: 0;
        padding: 0;
        background-image: url('/resources/assets/log-img.jpg');
        background-position: center;
        background-size: 1200px;
        background-repeat: no-repeat;

        height: 100vh;
        overflow: hidden;
    }

    .center {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 400px;
        background: white;
        border-radius: 10px;
        box-shadow: 10px 10px 15px rgba(0, 0, 0, 1);
        opacity: 80%;
    }

    .center h1 {
        text-align: center;
        padding: 20px 0;
        border-bottom: 1px solid silver;
    }

    .center form {
        padding: 0 40px;
        box-sizing: border-box;
    }

    form .txt_field {
        position: relative;
        border-bottom: 2px solid #adadad;
        margin: 30px 0;
    }

    .txt_field input {
        width: 100%;
        padding: 0 5px;
        height: 40px;
        font-size: 16px;
        border: none;
        background: none;
        outline: none;
    }

    .txt_field label {
        position: absolute;
        top: 50%;
        left: 5px;
        color: #adadad;
        transform: translateY(-50%);
        font-size: 16px;
        pointer-events: none;
        transition: .5s;
    }

    .txt_field span::before {
        content: '';
        position: absolute;
        top: 40px;
        left: 0;
        width: 0%;
        height: 2px;
        background: #2691d9;
        transition: .5s;
    }

    .txt_field input:focus~label,
    .txt_field input:valid~label {
        top: -5px;
        color: #2691d9;
    }

    .txt_field input:focus~span::before,
    .txt_field input:valid~span::before {
        width: 100%;
    }

    .pass {
        margin: -5px 0 20px 5px;
        color: #a6a6a6;
        cursor: pointer;
    }

    .pass:hover {
        text-decoration: underline;
    }

    input[type="submit"] {
        width: 100%;
        height: 50px;
        border: 1px solid;
        background: #2691d9;
        border-radius: 25px;
        font-size: 18px;
        color: #e9f4fb;
        font-weight: 700;
        cursor: pointer;
        outline: none;

    }

    input[type="submit"]:hover {
        border-color: #2691d9;
        transition: .5s;
    }

    /* Styles for screens wider than 1024px (laptops and larger) */
@media (min-width: 1024px) {
  form {
    /* width: 500px; */
    font-size: 18px;
  }
  input[type="text"], input[type="password"] {
    width: 60%;
  }
  input[type="submit"] {
    width: 100%;
  }
}

/* Styles for screens between 768px and 1023px (tablets) */
@media (min-width: 768px) and (max-width: 1023px) {
  form {
    width: 80%;
    font-size: 16px;
  }
  input[type="text"], input[type="password"] {
    width: 70%;
  }
  input[type="submit"] {
    width: 25%;
  }
}

/* Styles for screens smaller than 768px (phones) */
@media (max-width: 767px) {
  form {
    width: 90%;
    font-size: 14px;
  }
  input[type="text"], input[type="password"] {
    width: 80%;
  }
  input[type="submit"] {
    width: 30%;
  }
}

</style>
