<form class="row g-3" method="post" action="/classes/edit?id=<?=$classId?>" >
    <div class="col-md-6">
        <label for="numberClass" class="form-label">Номер класса</label>
        <input type="number" class="form-control" id="numberClass" name="numberClass" value="<?=$numberClass?>">
    </div>
    <div class="col-md-4">
        <label for="teachers" class="form-label">Учителя</label>
        <select id="teachers" class="form-select" name="teacherId">
            <? foreach ($teachers as $teacher)  {?>

                <?php
                # если id учителя в списке равен id учителя класса - делаем этот пункт выбранным
                if ($teacher['id'] === $teacherId) {?>
                    <option selected value="<?=$teacher['id']?>"><?=$teacher['name']?></option>
                    <?php } else { ?>
                <option value="<?=$teacher['id']?>"><?=$teacher['name']?></option>
                <?php } ?>
            <? } ?>
        </select>
    </div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-primary">Обновить</button>
    </div>
</form>
