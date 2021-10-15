<?php


?>
<div class="bg-img-university bg-size-cover bg-repeat-no-repeat bg-position-center mmw-100vw mmh-100vh">
    <div class="bg-dark-tint-50 mmw-100vw mmh-100vh d-flex align-items-center">
        <div class="container-sm bg-white login-container rounded bx-shadow-0-0-lg">
            <div class="row">
                <div class="col m-0 p-0">
                    <div class="m-3 p-3 rounded bg-light">
                        <h1 class="fw-bold mb-3">Welcome.</h1>
                        <h4 class="text-center">Enter your credentials</h4>
                        <?php WidgetFactory::bannerMessage($bannerMessage ?? null); ?>
                        <form action="/?c=0&a=authenticate" method="POST">
                            <label for="current-username">Username</label>
                            <div class="mb-3">
                                <input type="text" placeholder="Username" name="current-username" id="current-username" class="form-control">
                                <?php if (!empty($error_current_username)) : ?>
                                    <p class="mt-0 mb-0 mx-0 p-0 text-danger fw-bold"><?php echo $error_current_username; ?></p>
                                <?php endif; ?>
                            </div>
                            <label for="current-password">Password</label>
                            <div class="mb-3">
                                <input type="password" placeholder="Password" name="current-password" id="current-password" class="form-control">
                                <?php if (!empty($error_current_password)) : ?>
                                    <p class="mt-0 mb-0 mx-0 p-0 text-danger fw-bold"><?php echo $error_current_password; ?></p>
                                <?php endif; ?>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <label for="current-role">User Role</label>
                                <select id="current-role" name="current-role" class="form-select">
                                    <option value="" disabled selected>Select Role</option>
                                    <option value="student">Student</option>
                                    <option value="faculty">Faculty</option>
                                    <option value="administrator">Administrator</option>
                                </select>
                                <?php if (!empty($error_current_role)) : ?>
                                    <p class="mt-0 mb-0 mx-0 p-0 text-danger fw-bold"><?php echo $error_current_role; ?></p>
                                <?php endif; ?>
                            </div>
                            <input type="submit" class="w-100 btn btn-success" value="Login">
                            <p class="text-center m-2 p-0"><a href="/?c=0&a=register">Register</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
