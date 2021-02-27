<?php
partial('header'); ?>

<?php foreach ($cities as $city): ?>

    <div class="p-2 border m-4">
        <span><?= $city->name ?></span>
        <div>
            <a href=<?= "cities/{$city->id}/edit" ?>>Edit</a>
        </div>
        <form action="<?= "cities/{$city->id}" ?>"
              method="POST">
            <input type="hidden" name="method" value="DELETE">
            <button>Delete</button>
        </form>
    </div>

<?php endforeach; ?>

<form action="../cities" method="POST" class="p-4">
    <div class="flex flex-col w-60">
        <label for="name">Add new city:</label>
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
