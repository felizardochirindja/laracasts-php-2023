<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<?php require fileFromRoot('modules/shared/views/partials/head') ?>

<body class="h-full">
    <div class="min-h-full">
        <?php require fileFromRoot('modules/shared/views/partials/nav') ?>
        <?php require fileFromRoot('modules/shared/views/partials/banner') ?>

        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <p class="mb-6"><a href="/notes" class="text-blue-500 underline">notes</a></p>
                <p><?= htmlspecialchars($note['body']) ?></p>

                <button><a href="note/edit?id=<?php echo $note['id'] ?>">edit</a></button>

                <form class="mt-6" method="post" action="/note">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="<?= $note['id'] ?>">
                    <button class="text-sm text-red-500">delete</button>
                </form>
            </div>
        </main>

        <?php require fileFromRoot('modules/shared/views/partials/footer') ?>
    </div>
</body>

</html>