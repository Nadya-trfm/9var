<form class="row g-3" method="post" action="/teachers/edit?id=<?=$teacherId?>" >
    <div class="col-md-6">
        <label for="teacherName" class="form-label">ФИО учителя</label>
        <input class="form-control" id="teacherName" name="teacherName" value="<?=$teacherName?>">
    </div>
    <div class="col-md-4">
        <button type="submit" class="btn btn-primary">Обновить</button>
    </div>
</form>

