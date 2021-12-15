<div>Поиск по ученикам</div>
<form class="row mb-4" method="get" action="/students/one">
    <div class="row mt-2">
        <div class="col-md-2">
            <label for="nameStudent" class="form-label">Ф.И.О ученика</label>
            <input type="text" class="form-control" id="nameStudent" name="number">
            <button type="submit" class="btn btn-primary mt-2">Найти</button>
        </div>
    </div>
</form>
<a class="btn btn-primary mb-4" href="/students/create">Добавить ученика</a><br/>
<a class="btn btn-primary" href="/students/table-output">Посмотреть всех учеников</a>