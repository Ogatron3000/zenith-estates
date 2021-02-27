<?php
partial('header'); ?>

<form action="./" method="POST" class="p-4">
    <input type="hidden" name="method" value="PUT">
    <input type="hidden" name="id" value="<?= $city->id ?>">

    <div class="flex flex-col w-60">
        <label for="name">City name:</label>
        <input type="text"
               name="name"
               id="name"
               class="p-1 border border-black"
               value="<?= $city->name ?>">
        <?= isset($errors) && array_key_exists('name', $errors) ? '<p class="text-sm text-red-500">' . $errors['name'] . '</p>' : '' ?>
    </div>

    <button class="border border-black p-3 mt-4">Submit</button>

</form>

<?php
partial('footer'); ?>
