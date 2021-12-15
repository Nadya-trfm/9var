<ul class="list-group">
    <? foreach ($teacherSchool as $teacher) { ?>
        <li class="list-group-item">
            <div>Учитель: <?=$teacher['nameTeacher']?></div>
            <div><a class="btn btn-primary" href="/teachers/edit?id=<?=$teacher['teacherId']?>">Изменить</a> <a class="btn btn-danger" href="/teachers/drop?id=<?=$teacher['teacherId']?>">Удалить</a></div>
        </li>
    <? } ?>
</ul>
