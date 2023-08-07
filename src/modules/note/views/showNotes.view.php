<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<?php require fileFromRoot('modules/shared/views/partials/head') ?>

<body class="h-full">
    <div class="min-h-full">
        <?php require fileFromRoot('modules/shared/views/partials/nav') ?>
        <?php require fileFromRoot('modules/shared/views/partials/banner') ?>

        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <?php foreach ($notes as $note) : ?>
                    <ul>
                        <li>
                            <a href="./note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
                                <?= htmlspecialchars($note['body']) ?>
                            </a>
                        </li>
                    </ul>
                <?php endforeach; ?>

                <p class="mt-6">
                    <a href="/note/create" class="text-blue-500 hover:underline">Create Note</a>
                </p>
            </div>
        </main>

        <?php require fileFromRoot('modules/shared/views/partials/footer') ?>
    </div>
</body>

</html>