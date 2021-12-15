<div>Поиск по ФИО учителя</div>
<form class="row mb-4" method="get" action="/teachers/one">
    <div class="row mt-2">
        <div class="col-md-2">
            <label for="teacherName" class="form-label">ФИО учителя</label>
            <input class="form-control" id="teacherName" name="name">
            <button type="submit" class="btn btn-primary mt-2">Найти</button>
        </div>
    </div>
</form>
<a class="btn btn-primary mb-4" href="/teachers/create">Добавить учителя</a><br/>
<a class="btn btn-primary" href="/teachers/table-output">Посмотреть всех учителей</a>
