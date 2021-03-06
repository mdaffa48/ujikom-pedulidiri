<!DOCTYPE html>
<html lang="en">

<head>
    @include('essentials.css')

    <title>Peduli Diri &mdash; Register</title>
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="/simpanUser">
                                    @csrf

                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input id="nik" type="text" class="form-control" name="nik" tabindex="1"
                                            autofocus>
                                        <div class="invalid-feedback">
                                            Kolom NIK tidak boleh kosong
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="name" class="control-label">Nama Lengkap</label>
                                        </div>
                                        <input id="name" type="text" class="form-control" name="name"
                                            tabindex="2">
                                        <div class="invalid-feedback">
                                            Kolom nama lengkap tidak boleh kosong
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Register
                                        </button>
                                    </div>
                                </form>

                                <div class="mt-5 text-center">
                                    Sudah memiliki akun? <a href="/login">Login</a>
                                </div>

                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; Peduli Diri 2022
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('essentials.js')

    <!-- Register Failed Modal -->
    @if (session('registerFailed'))
        <div class="modal fade" id="registerFailedModal" tabindex="-1" role="dialog"
            aria-labelledby="registerFailedModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registerFailedModalLongTitle">Register Gagal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ??? NIK yang digunakan sudah terdaftar<br>
                        ??? NIK minimal harus memiliki 16 digit
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $("#registerFailedModal").modal();
            });
        </script>
    @endif

</body>

</html>
