<div>Поиск по номеру класса</div>
<form class="row mb-4" method="get" action="/classes/one">
    <div class="row mt-2">
        <div class="col-md-2">
            <label for="numberClass" class="form-label">Номер класса</label>
            <input type="number" class="form-control" id="numberClass" name="number">
            <button type="submit" class="btn btn-primary mt-2">Найти</button>
        </div>
    </div>
</form>
<a class="btn btn-primary mb-4" href="/classes/create">Добавить класс</a><br/>
<a class="btn btn-primary" href="/classes/table-output">Посмотреть все классы</a>