<?php include "../includes/header.php"; ?>

<div class="auth-container">

    <form action="login_process.php" method="POST" class="auth-form">

        <h2>Welcome Back</h2>

        <?php if(isset($_GET['registered'])): ?>

            <p class="success-message">
                Registration successful! Please login.
            </p>

        <?php endif; ?>

        <?php if(isset($_GET['error'])): ?>

            <p class="error-message">
                Invalid email or password.
            </p>

        <?php endif; ?>

        <input
            type="email"
            name="email"
            placeholder="Email Address"
            required>

        <input
            type="password"
            name="password"
            placeholder="Password"
            required>

        <button type="submit">

            Login

        </button>

        <p class="auth-link">
            Don't have an account?
            <a href="register.php">Register here</a>
        </p>

    </form>

</div>

<?php include "../includes/footer.php"; ?>