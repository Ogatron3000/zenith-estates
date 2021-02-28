<?php
partial('header'); ?>

<div class="w-1/4 p-4 m-8 border-2 border-indigo-500">

    <form action="./" method="POST">

        <input type="hidden" name="method" value="PUT">
        <input type="hidden" name="id" value="<?= $re_type->id ?>">

        <div class="flex flex-col">
            <label for="name">Real Estate Type:</label>
            <input type="text"
                   name="name"
                   id="name"
                   value="<?= $re_type->name ?>"
                   class="p-1 mt-2 border-2 border-indigo-500 outline-none">
            <?= isset($errors) && array_key_exists('name', $errors)
                ? '<p class="text-sm text-red-500">' . $errors['name'] . '</p>'
                : '' ?>
            <button class="p-3 mt-4 bg-indigo-500 text-white">Submit</button>
        </div>
    </form>
</div>

<?php
partial('footer'); ?>