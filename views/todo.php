<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="/add-task" method="post">
    <input type="text" name="title">
    <button>Добавить</button>
</form>
<hr>
<?php if(!empty($tasks)): ?>
    <form action="" method="post">
        <select name="action">
            <option value="">-- Выберите действие --</option>
            <option value="delete">Удалить</option>
        </select>
        <ul>
            <?php /** @var \Model\Todo[] $tasks */ ?>
            <?php foreach($tasks as $task): ?>
                <li>
                    <input <?= $task->getComplete() ? 'checked' : '' ?> type="checkbox" value="<?= $task->getId() ?>" >
                    <?= $task->getTitle() ?>
                </li>
            <?php endforeach; ?>
        </ul>

        <button>клац</button>
    </form>
<?php endif; ?>
</body>
</html>