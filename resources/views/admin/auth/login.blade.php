<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Elbruz</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
  <div class="row">
    <div class="col col-md-4 offset-4 mt-4">
      <form action="{{ route('post.login') }}" method="post">
        @csrf
        <div class="card">
          <div class="card-header">Login</div>
          <div class="card-body">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
            <input type="password" name="password" id="password" class="form-control mt-2" placeholder="Password" required>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-success btn-sm">Login</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
</html>