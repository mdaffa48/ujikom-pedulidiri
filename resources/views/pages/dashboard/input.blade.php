@extends('pages.dashboard.dashboard')

@section('title', 'Peduli Diri - Input Data Perjalanan')

@section('halaman')
    <h1>Input Data Perjalanan</h1>
@endsection

@section('body')
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data telah tersimpan!</strong> Anda bisa melihat data histori perjalanan <a
                href="{{ route('daftar-data') }}">disini</a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card-body">
        <form method="POST" action="/simpanPerjalanan">
            @csrf

            <div class="form-group">
                <label for="date">Tanggal</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                        </div>
                    </div>
                    <input type="date" class="form-control" name="date">
                </div>
            </div>

            <div class="form-group">
                <label for="jam">Jam</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                    <input type="time" class="form-control" name="jam">
                </div>
            </div>


            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                    </div>
                    <input type="text" class="form-control" name="lokasi">
                </div>
            </div>

            <div class="form-group">
                <label for="suhu">Suhu</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fas fa-temperature-low"></i>
                        </div>
                    </div>
                    <input type="number" class="form-control" name="suhu">
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block col-4">
                    Masukkan Data
                </button>
            </div>
        </form>
    </div>
@endsection
