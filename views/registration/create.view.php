<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<?php require basePath('views/partials/head.php') ?>

<body class="h-full">
    <div class="min-h-full">
        <?php require basePath('views/partials/nav.php') ?>

        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <p>register</p>

                <p><?= $errors['userExists'] ?? '' ?></p>

                <form action="/register" method="post">

                    <div>
                        <label for="">email</label>
                        <input type="text" name="email" id="">
                        <p class="text-red-500 text-xs mt-2"><?= $errors['email'] ?? '' ?></p>
                    </div>

                    <div>
                        <label for="">password</label>
                        <input type="text" name="password" id="">
                        <p class="text-red-500 text-xs mt-2"><?= $errors['password'] ?? '' ?></p>
                    </div>

                    <button type="submit">register</button>
                </form>
            </div>
        </main>

        <?php require basePath('views/partials/footer.php') ?>
    </div>
</body>

</html>