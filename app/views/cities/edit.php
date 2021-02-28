<?php
partial('header');
partial('navbar'); ?>

<div class="w-1/4 p-6 m-8 bg-blue-100 rounded-lg">

    <form action="./" method="POST">

        <input type="hidden" name="method" value="PUT">
        <input type="hidden" name="id" value="<?= $city->id ?>">

        <div class="flex flex-col">
            <label for="name">City name:</label>
            <input type="text"
                   name="name"
                   id="name"
                   value="<?= $city->name ?>"
                   class="p-2 mt-2">
            <?= isset($errors) && array_key_exists('name', $errors)
                ? '<p class="text-sm text-red-500">' . $errors['name'] . '</p>'
                : '' ?>
            <div class="flex justify-end">
                <button class="w-1/3 py-2 mt-4 bg-blue-400 rounded-full text-white hover:bg-blue-300">Submit</button>
            </div>
        </div>
    </form>
</div>

<?php
partial('footer'); ?>
