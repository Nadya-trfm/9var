<ul class="list-group">
    <? foreach ($classSchool as $class) { ?>
        <li class="list-group-item">
            <div>Номер класса: <?=$class['numberClass']?></div>
            <div>Учитель: <?=$class['teacher']['name']?></div>
            <div><a class="btn btn-primary" href="/classes/edit?id=<?=$class['classId']?>">Изменить</a> <a class="btn btn-danger" href="/classes/drop?id=<?=$class['classId']?>">Удалить</a></div>
        </li>
    <? } ?>
</ul>