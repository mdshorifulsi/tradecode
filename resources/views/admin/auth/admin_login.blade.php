<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>T-code Login</title>
    <link href="{{ asset('assets/backend/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>


    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h4 class="font-weight-light text-uppercase">Sign In</h4>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ url('admin/login') }}">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputEmail" name="email" type="email"
                                        placeholder="name@example.com" required/>
                                    <label for="inputEmail">Email address</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputPassword" name="password" type="password"
                                         placeholder="Password" required/>
                                    <label for="inputPassword">Password</label>
                                </div>

                                    <button type="submit" id="loginbtn" class="text-center ">Next</button>




                            </form>
                            <!-- <button class="btn btn-danger">Click</button> -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('assets/backend/js/scripts.js') }}"></script>
</body>

</html>
