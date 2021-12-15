<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <title>DEFAULT</title>
  </head>
  <body>
  <div class="container-fluid justify-content-center d-flex flex-row">
      <ul class="nav">
          <li class="nav-item">
              <a class="nav-link active" href="/classes/index">Классы</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="/teachers/index">Учителя</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="/students/index">Ученики</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">Школьные предметы</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">Оценки</a>
          </li>
      </ul>
  </div>
    <div class="container">
        <?= $content ?>
    </div>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
