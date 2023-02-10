<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Quiz</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    </head>
    <body>

    <div class="card text-center">
        <div class="card-header bg-secondary">

           <h3 class="card-title text-centre mt-5">Quiz App</h3>

        </div>
        <div>
            @yield("content")
        </div>
    </div>

    </body>
</html>