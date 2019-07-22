<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <header>
          <div class="bg-dark" id="navbarHeader">
            <div class="container">
              <div class="row">
                <div class="col-sm-12 col-md-7 py-4">
                  <h4 class="text-white">Miinto Blog - skeleton application: PROXY</h4>
                </div>
              </div>
            </div>
          </div>
        </header>
        <main role="main">
         <section class="jumbotron text-center">
            {{ content() }}
        </section>
        </main>
        <footer class="text-muted">
          <div class="container">
            Copyright by Miinto Tech 2019
          </div>
        </footer>
    </body>
</html>