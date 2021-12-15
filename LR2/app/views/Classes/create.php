<form class="row g-3" method="post">
    <div class="col-md-6">
        <label for="numberClass" class="form-label">Номер класса</label>
        <input type="number" class="form-control" id="numberClass" name="numberClass">
    </div>
    <div class="col-md-4">
        <label for="teachers" class="form-label">Учителя</label>
        <select id="teachers" class="form-select" name="teacherId">
            <? foreach ($teachers as $teacher)  {?>
            <option value="<?=$teacher['id']?>"><?=$teacher['name']?></option>
            <? } ?>
        </select>
    </div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-primary">Создать класс</button>
    </div>
</form>

