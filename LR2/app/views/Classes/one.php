<ul class="list-group">
    <li class="list-group-item">
        <div>Номер класса: <?=$objectClass['numberClass']?></div>
        <div>Учитель: <?=$objectClass['teacher']['name']?></div>
        <div><a class="btn btn-primary" href="/classes/edit?id=<?=$objectClass['classId']?>">Изменить</a> <a class="btn btn-danger" href="/classes/drop?id=<?=$objectClass['classId']?>">Удалить</a></div>
    </li>
</ul>