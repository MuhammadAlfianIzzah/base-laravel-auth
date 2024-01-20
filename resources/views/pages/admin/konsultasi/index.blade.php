<x-admin-layout>
    <x-slot name="title">
        Halaman konsultasi
    </x-slot>
    <div class="container-fluid bg-white mb-2">
        <div class="row d-flex align-items-center py-3 bg-white">
            <div class="col-8">
                <form class="d-none d-sm-inline-block form-inline w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" name="cari" class="form-control bg-white small" placeholder="cari..."
                            aria-label="cari" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-4">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary w-100" data-toggle="modal"
                    data-target="#tambahkonsultasi">
                    Konsultasi
                </button>

            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="tambahkonsultasi" tabindex="-1" aria-labelledby="tambahkonsultasi" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" class="modal-content" action="{{ route('konsultasi.store') }}">
                @method('POST')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahkonsultasi">Tambah Data konsultasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama konsultasi</label>
                        <input type="text" name="nama" class="form-control" id="nama"
                            value="{{ old('nama') ?? '' }}">
                        @error('nama')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kriteria_lahan_kd">Kriteria Lahan</label>
                        <select multiple name="kriteria_lahan_kd[]" id="kriteria_lahan_kd" class="custom-select">
                            @foreach ($kriteriaLahan as $kl)
                                <option value="{{ $kl->kd }}">{{ $kl->kd }}:{{ $kl->nama }}</option>
                            @endforeach
                        </select>
                        @error('kriteria_lahan_kd')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <div class="container-fluid bg-white">
        <div class="row">
            <div class="col-12 py-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($konsultasis as $key => $kl)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $kl->nama }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <form action="{{ route('konsultasi.destroy', [$kl->kd]) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('anda yakin menghapus data ini?')">Hapus</button>
                                        </form>
                                        <a class="btn btn-dark"
                                            href="{{ route('konsultasi.show', [$kl->kd]) }}">Hasil</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>Data Kosong</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                {{ $konsultasis->links() }}
            </div>
        </div>
    </div>
    @if ($errors->any())
        @push('script')
            <script>
                var myModal = new bootstrap.Modal(document.getElementById('tambahkonsultasi'), {
                    keyboard: false
                });
                myModal.show();
            </script>
        @endpush
    @endif
</x-admin-layout>
