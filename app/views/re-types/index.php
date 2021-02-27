<?php
partial('header'); ?>

<?php foreach ($re_types as $re_type): ?>

    <div class="p-2 border m-4">
        <span><?= $re_type->name ?></span>
        <div>
            <a href=<?= "re-types/{$re_type->id}/edit" ?>>Edit</a>
        </div>
        <form action="<?= "re-types/{$re_type->id}" ?>"
              method="POST">
            <input type="hidden" name="method" value="DELETE">
            <button>Delete</button>
        </form>
    </div>

<?php endforeach; ?>

    <form action="../re-types" method="POST" class="p-4">
        <div class="flex flex-col w-60">
            <label for="name">Add new real estate type:</label>
            <input type="text"
                   name="name"
                   id="name"
                   class="p-1 border border-black">
            <?= isset($errors) && array_key_exists('name', $errors) ? '<p class="text-sm text-red-500">' . $errors['name'] . '</p>' : '' ?>
        </div>

        <button class="border border-black p-3 mt-4">Submit</button>

    </form>

<?php
partial('footer'); ?>