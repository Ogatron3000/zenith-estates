<?php partial('header'); ?>

<div class="flex justify-between items-start">

    <div class="w-7/12 m-8">
        <?php foreach ($cities as $city): ?>
            <div class="flex justify-between p-4 mb-6 border-2 border-indigo-500">
                <span><?= $city->name ?></span>
                <div class="flex justify-between  w-1/6 ">
                    <div>
                        <a href=<?= "cities/{$city->id}/edit" ?>>Edit</a>
                    </div>
                    <form action="<?= "cities/{$city->id}" ?>"
                          method="POST">
                        <input type="hidden" name="method" value="DELETE">
                        <button>Delete</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="w-1/4 p-4 m-8 border-2 border-indigo-500">
        <form action="../cities" method="POST">
            <div class="flex flex-col">
                <label for="name">Add new city:</label>
                <input type="text"
                       name="name"
                       id="name"
                       class="p-1 mt-2 border-2 border-indigo-500 outline-none">
                <?= isset($errors) && array_key_exists('name', $errors)
                    ? '<p class="text-sm text-red-500">' . $errors['name'] . '</p>'
                    : '' ?>
                <button class="p-3 mt-4 bg-indigo-500 text-white">Submit</button>
            </div>
        </form>
    </div>

</div>


<?php
partial('footer'); ?>
