<ul class="list-group">
    <?php foreach ($listTeacher as $teacher) { ?>
    <li class="list-group-item">
        <div>Учитель: <?=$teacher['teacherName']?></div>
        <div><a class="btn btn-primary" href="/teachers/edit?id=<?=$teacher['teacherId']?>">Изменить</a> <a class="btn btn-danger" href="/teachers/drop?id=<?=$teacher['teacherId']?>">Удалить</a></div>
    </li>
    <?php } ?>
</ul>
