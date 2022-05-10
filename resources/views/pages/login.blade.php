<!DOCTYPE html>
<html lang="en">

<head>
    @include('essentials.css')

    <title>Peduli Diri &mdash; Login</title>
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-4 m-3">
                        <img src="{{ asset('assets/img/stisla-fill.svg') }}" alt="logo" width="80"
                            class="shadow-light rounded-circle mb-5 mt-2">
                        <h4 class="text-dark font-weight-normal"><span class="font-weight-bold">Peduli Diri</span>
                        </h4>
                        <p class="text-muted">Sebelum memulai, kamu harus login atau <a href="/register">register</a>
                            jika belum mempunyai akun</p>
                        <form method="POST" action="/postLogin" class="needs-validation" novalidate="">
                            @csrf

                            <div class="form-group">
                                <label for="email">NIK</label>
                                <input id="email" type="text" class="form-control" name="email" tabindex="1" required
                                    autofocus>
                                <input id="password" type="hidden" class="form-control" name="password" required>
                                <div class="invalid-feedback">
                                    Kolom NIK tidak boleh kosong
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="name" class="control-label">Nama Lengkap</label>
                                </div>
                                <input id="name" type="text" class="form-control" name="name" tabindex="2" required>
                                <div class="invalid-feedback">
                                     Kolom nama lengkap tidak boleh kosong
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                                    Login
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-lg-8 order-lg-2 order-1 min-vh-100" style="background-color: rgb(68, 66, 66);">

                </div>
            </div>
        </section>
    </div>

    @include('essentials.js')

    <script>
        window.onload = function() {
            var src = document.getElementById("email"),
                dst = document.getElementById("password");
            src.addEventListener('input', function() {
                dst.value = src.value;
            });
        }
    </script>

    <!-- Login Failed Modal -->
    @if (session('loginFailed'))
        <div class="modal fade" id="loginFailedModal" tabindex="-1" role="dialog"
            aria-labelledby="loginFailedModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginFailedModalLongTitle">Login Gagal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        NIK atau Nama Lengkap yang anda masukan salah!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $("#loginFailedModal").modal();
            });
        </script>
    @endif

    <!-- Logout Success Modal -->
    @if (session('logoutSuccess'))
        <div class="modal fade" id="logoutSuccessModal" tabindex="-1" role="dialog"
            aria-labelledby="logoutSuccessModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoutSuccessModalLongTitle">Logout Berhasil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Anda telah berhasil logout!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $("#logoutSuccessModal").modal();
            });
        </script>
    @endif

    <!-- Register Success Modal -->
    @if (session('registerSuccess'))
        <div class="modal fade" id="registerSuccessModal" tabindex="-1" role="dialog"
            aria-labelledby="registerSuccessModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registerSuccessModalLongTitle">Register Berhasil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Anda telah berhasil untuk register, silahkan login untuk melanjutkan ke halaman utama.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $("#registerSuccessModal").modal();
            });
        </script>
    @endif

</body>

</html>
