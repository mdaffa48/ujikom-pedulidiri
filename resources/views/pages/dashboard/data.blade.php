@extends('pages.dashboard.dashboard')

@section('title', 'Peduli Diri - Daftar Data Perjalanan')

@section('halaman')
    <h1>Daftar Perjalanan</h1>
@endsection

@section('body')
    @php
    $no = 1;
    @endphp

    <div class="card">
        <div class="card-body">
            <form class="form-inline mr-auto" method="GET" action="/cari_data" id="cari_data">
                @csrf

                <div class="row">

                    <div class="col-auto">
                        <select onchange="searchType(this);" class="form-control" name="tipe_data" form="cari_data">
                            <option value="tanggal" selected>Tanggal</option>
                            <option value="lokasi">Lokasi</option>
                            <option value="suhu">Suhu</option>
                        </select>
                    </div>

                    <div class="col">
                        {{-- Pencarian Tanggal --}}
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" type="date" name="tanggal" id="cari_tanggal"
                                    placeholder="Masukkan Tanggal">
                                <button id="btn_cari_tanggal" type="submit" class="btn-success btn-sm"
                                    style="margin-left: 20px;"><i class="fas fa-search"></i> Cari</button>
                            </div>
                        </div>
                        {{-- End of Pencarian Tanggal --}}

                        {{-- Pencarian Lokasi --}}
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" type="text" name="lokasi" id="cari_lokasi"
                                    placeholder="Masukkan Lokasi" style="display: none;">
                                <button id="btn_cari_lokasi" type="submit" class="btn-success btn-sm"
                                    style="margin-left: 20px; display: none;"><i class="fas fa-search"></i> Cari</button>
                            </div>
                        </div>
                        {{-- End of Pencarian Lokasi --}}

                        {{-- Pencarian Suhu --}}
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" type="number" name="suhu" id="cari_suhu"
                                    placeholder="Masukkan Suhu" style="display: none;">
                                <button id="btn_cari_suhu" type="submit" class="btn-success btn-sm"
                                    style="margin-left: 20px; display: none;"><i class="fas fa-search"></i> Cari</button>
                            </div>
                        </div>
                        {{-- End of Pencarian Suhu --}}


                    </div>

                </div>

            </form>
        </div>
    </div>

    @if (count($data) > 0)
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="tabel-data">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tanggal
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-outline-primary dropdown-toggle float-right text-sm"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                    <form action="/sort" method="GET">
                                                        @csrf
                                                        <input type="hidden" name="sort_item" value="tanggal">
                                                        <input type="hidden" name="sort_type" value="desc">

                                                        <button class="dropdown-item" type="submit">Terbaru</button>
                                                    </form>
                                                    
                                                    <form action="/sort" method="GET">
                                                        @csrf
                                                        <input type="hidden" name="sort_item" value="tanggal">
                                                        <input type="hidden" name="sort_type" value="asc">

                                                        <button class="dropdown-item" type="submit">Terlama</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </th>
                                        <th scope="col">Jam
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-outline-primary dropdown-toggle float-right text-sm"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                    <form action="/sort" method="GET">
                                                        @csrf
                                                        <input type="hidden" name="sort_item" value="jam">
                                                        <input type="hidden" name="sort_type" value="desc">

                                                        <button class="dropdown-item" type="submit">Tertinggi</button>
                                                    </form>
                                                    
                                                    <form action="/sort" method="GET">
                                                        @csrf
                                                        <input type="hidden" name="sort_item" value="jam">
                                                        <input type="hidden" name="sort_type" value="asc">

                                                        <button class="dropdown-item" type="submit">Terendah</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </th>
                                        <th scope="col">Lokasi</th>
                                        <th scope="col">Suhu
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-outline-primary dropdown-toggle float-right text-sm"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                    <form action="/sort" method="GET">
                                                        @csrf
                                                        <input type="hidden" name="sort_item" value="suhu">
                                                        <input type="hidden" name="sort_type" value="desc">

                                                        <button class="dropdown-item" type="submit">Tertinggi</button>
                                                    </form>
                                                    
                                                    <form action="/sort" method="GET">
                                                        @csrf
                                                        <input type="hidden" name="sort_item" value="suhu">
                                                        <input type="hidden" name="sort_type" value="asc">

                                                        <button class="dropdown-item" type="submit">Terendah</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $diri)
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>
                                            <td>{{ $diri->tanggal }}</td>
                                            <td>{{ $diri->jam }}</td>
                                            <td>{{ $diri->lokasi }}</td>
                                            <td>{{ $diri->suhu }}</td>
                                            <td>
                                                <!-- TODO: Add confirmation menu -->
                                                <form method="POST" action="/hapusPerjalanan" class="needs-validation"
                                                    novalidate="">
                                                    @csrf

                                                    <input id="id" type="hidden" class="form-control" name="id"
                                                        value="{{ $diri->id }}" required>

                                                    <button type="submit" class="btn btn-danger btn-lg btn-icon icon-right"
                                                        tabindex="4">
                                                        Delete
                                                    </button>

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            {{ $data->links('pagination::bootstrap-4') }}
        </div>
    @else
        <div class="alert alert-warning alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
                <div class="alert-title">Tidak ada data perjalanan</div>
                Tidak ada data perjalanan yang ditemukan, silahkan masukkan data pada halaman input data perjalanan.
            </div>
        </div>
    @endif

    <!-- Logout Success Modal -->
    @if (session('dataDeleted'))
        <div class="modal fade" id="dataDeletedModal" tabindex="-1" role="dialog"
            aria-labelledby="dataDeletedModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="dataDeletedModalLongTitle">Data Terhapus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Data telah sukses terhapus!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $("#dataDeletedModal").modal();
            });
        </script>
    @endif

    <script>
        function searchType(type) {
            let tanggal = "none";
            let lokasi = "none";
            let suhu = "none";

            if (type.value == "tanggal") {
                tanggal = "block";
            }

            if (type.value == "lokasi") {
                lokasi = "block";
            }

            if (type.value == "suhu") {
                suhu = "block";
            }

            document.getElementById("cari_tanggal").style.display = tanggal;
            document.getElementById("btn_cari_tanggal").style.display = tanggal;

            document.getElementById("cari_lokasi").style.display = lokasi;
            document.getElementById("btn_cari_lokasi").style.display = lokasi;

            document.getElementById("cari_suhu").style.display = suhu;
            document.getElementById("btn_cari_suhu").style.display = suhu;
        }
    </script>

@endsection
