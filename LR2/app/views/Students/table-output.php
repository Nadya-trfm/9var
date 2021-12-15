<ul class="list-group">
    <? foreach ($objectsStudent as $student) { ?>
        <li class="list-group-item">
            <div>Имя: <?=$student['student']['name']?></div>
            <div>Фото<br/><img src="<?=$student['student']['photo']?>"></div>
            <div>Дата рождения: <?=$student['student']['date_bithday']?></div>
            <div>Учитель: <?=$student['teacher']['name']?></div>
            <div><a class="btn btn-primary" href="/classes/edit?id=<?=$student['student']['id']?>">Изменить</a> <a class="btn btn-danger" href="/classes/drop?id=<?=$student['student']['id']?>">Удалить</a></div>
        </li>
    <? } ?>
</ul>