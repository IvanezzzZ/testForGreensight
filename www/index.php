<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Test Task</title>
</head>
<body>

<div class="form_container w-25 position-absolute top-50 start-50 translate-middle">
    <p id="success" class="text-success"></p>
    <p id="error" class="text-danger"></p>
    <form id="form">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input name="name" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Surname</label>
            <input name="surname" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input name="email" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input name="password" type="password" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Password confirm</label>
            <input name="passwordConfirm" type="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    $(document).ready(function () {
        $("form").on('submit', function (event) {
            event.preventDefault();
            $.post("form.php", $(this).serialize(), function (data) {
                if (data === "Регистрация нового пользователя прошла успешно")
                {
                    $('form').hide();
                    $("#error").slideToggle(0);
                    $("#success").html(data);
                } else {
                    $("#error").html(data);
                }
            });
        });
    });
</script>

</body>
</html>