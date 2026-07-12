<?php include "../includes/header.php"; ?>

<div class="auth-container">

    <form action="register_process.php" method="POST" class="auth-form">

        <h2>Create Account</h2>

        <input
            type="text"
            name="full_name"
            placeholder="Full Name"
            required>

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

        <select name="role" required>

            <option value="">Select Account Type</option>

            <option value="customer">Customer</option>

            <option value="seller">Seller</option>

        </select>

        <button type="submit">

            Register

        </button>

    </form>

</div>

<?php include "../includes/footer.php"; ?>