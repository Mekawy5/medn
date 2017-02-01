<!DOCTYPE html>
<html>
<head>
    <title>Home</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

</head>
<body>
<div class="container">
<h3>Posts : </h3><hr>

        @foreach($posts as $post)
        <div class="row"><br>
                <div class="col-md-3">
                    <img width="100" height="100" src="<?php echo asset('').$post->photo->file; ?>" alt="">
                </div>
                <div class="col-md-9">
                    <h3><?php echo $post->title;?></h3>
                        <br>
                    <h5><?php echo str_limit($post->body,25);?></h5>
                    <h5><a href="#">Continue Reading</a></h5>
                </div>
        </div>
            <hr>
        @endforeach


</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>
