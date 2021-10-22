<?php


?>
<div class="bg-img-university bg-size-cover bg-repeat-no-repeat bg-position-center mmw-100vw mmh-100vh">
    <div class="bg-dark-tint-50 mmw-100vw mmh-100vh d-flex align-items-center">
        <div class="container-sm my-3 bg-white login-container rounded bx-shadow-0-0-lg overflow-y-scroll custom-scrollbar-01">
            <div class="row">
                <div class="col m-0 p-0">
                    <div class="m-3 p-3 rounded bg-light">
                        <h1 class="fw-bold mb-3">Welcome.</h1>
                        <h4 class="text-center">Create your account</h4>
                        <?php WidgetFactory::bannerMessage($bannerMessage ?? null); ?>
                        <form action="/?c=0&a=register" method="POST">
                            <label for="firstName">First Name</label>
                            <div class="mb-3">
                                <input type="text" placeholder="First Name" name="firstName" id="firstName" class="form-control">
                                <?php if (!empty($error_firstName)) : ?>
                                    <p class="mt-0 mb-0 mx-0 p-0 text-danger fw-bold"><?php echo $error_firstName; ?></p>
                                <?php endif; ?>
                            </div>
                            <label for="lastName">Last Name</label>
                            <div class="mb-3">
                                <input type="text" placeholder="Last Name" name="lastName" id="lastName" class="form-control">
                                <?php if (!empty($error_lastName)) : ?>
                                    <p class="mt-0 mb-0 mx-0 p-0 text-danger fw-bold"><?php echo $error_lastName; ?></p>
                                <?php endif; ?>
                            </div>
                            <label for="email-address">Email Address</label>
                            <div class="mb-3">
                                <input type="text" placeholder="Email Address" name="email-address" id="email-address" class="form-control">
                                <?php if (!empty($error_email_address)) : ?>
                                    <p class="mt-0 mb-0 mx-0 p-0 text-danger fw-bold"><?php echo $error_email_address; ?></p>
                                <?php endif; ?>
                            </div>
                            <label for="username">Username</label>
                            <div class="mb-3">
                                <input type="text" placeholder="Username" name="username" id="username" class="form-control">
                                <?php if (!empty($error_username)) : ?>
                                    <p class="mt-0 mb-0 mx-0 p-0 text-danger fw-bold"><?php echo $error_username; ?></p>
                                <?php endif; ?>
                            </div>
                            <label for="password">Password</label>
                            <div class="mb-3">
                                <input type="password" placeholder="Password" name="password" id="password" class="form-control">
                                <?php if (!empty($error_password)) : ?>
                                    <p class="mt-0 mb-0 mx-0 p-0 text-danger fw-bold"><?php echo $error_password; ?></p>
                                <?php endif; ?>
                            </div>
                            <label for="password-validation">Validate Password</label>
                            <div class="mb-3">
                                <input type="password" placeholder="Password" name="password-validation" id="password-validation" class="form-control">
                                <?php if (!empty($error_password_validation)) : ?>
                                    <p class="mt-0 mb-0 mx-0 p-0 text-danger fw-bold"><?php echo $error_password_validation; ?></p>
                                <?php endif; ?>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <label for="role">User Role</label>
                                <select id="role" name="role" class="form-select">
                                    <option value="" disabled selected>Select Role</option>
                                    <option value="student">Student</option>
                                    <option value="faculty">Faculty</option>
                                    <option value="administrator">Administrator</option>
                                </select>
                                <?php if (!empty($error_role)) : ?>
                                    <p class="mt-0 mb-0 mx-0 p-0 text-danger fw-bold"><?php echo $error_role; ?></p>
                                <?php endif; ?>
                            </div>
                            <input type="submit" class="w-100 btn btn-success" value="Register">
                            <p class="text-center m-2 p-0"><a href="/?c=0&a=login">Return to Login</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
