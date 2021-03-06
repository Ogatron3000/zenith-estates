<?php
partial('header');
partial('navbar'); ?>

<div class="flex items-start m-8">

    <div class="w-1/2 mr-8">
        <?php foreach ($re_types as $re_type): ?>
            <div class="flex justify-between p-4 mb-6 bg-gray-100 rounded-lg">
                <span><?= $re_type->name ?></span>
                <div class="flex">
                    <div class="mr-4">
                        <a href=<?= "re-types/{$re_type->id}/edit" ?>>Edit</a>
                    </div>
                    <form action="<?= "re-types/{$re_type->id}" ?>"
                          method="POST">
                        <input type="hidden" name="method" value="DELETE">
                        <button class="text-red-500">Delete</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="w-1/4 p-6 bg-blue-100 rounded-lg">
        <form action="../re-types" method="POST">
            <div class="flex flex-col">
                <label for="name">Add new real estate type:</label>
                <input type="text"
                       name="name"
                       id="name"
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

</div>


<?php
partial('footer'); ?>
