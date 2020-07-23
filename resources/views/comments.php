<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <title>XSS Demo</title>
        <script type="text/javascript">
            function printMyName() {
                const currentUserName = document.getElementById('currentUserName');
                const commentUsername = document.getElementById('commentUsername');
                currentUserName.innerHTML = commentUsername.value ? ' as ' + commentUsername.value : '';

                return false;
            }
        </script>
    </head>
    <body>
        <div class="container">
            <h1>XSS Demo</h1>
            <form id="commentForm" method="POST" action="<?= route('addComment') ?>" class="card">
                <div class="card-header">
                    Add comment<span id="currentUserName"></span>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="commentUsername" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="commentUsername" name="username"
                                   value="<?= app('request')->input('username') ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="commentText" class="col-sm-2 col-form-label">Comment</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="commentText" name="text"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Send</button>
                            <button onclick="return printMyName()" class="btn btn-info">Show My Name</button>
                        </div>
                    </div>
                </div>
            </form>
            <h2>Recent comments:</h2>
            <?php foreach ($comments as $comment) : ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $comment->username ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $comment->date ?></h6>
                    <p class="card-text"><?= $comment->text ?></p>
                </div>
            </div>
            <br/>
            <?php endforeach ?>
        </div>
    </body>
</html>