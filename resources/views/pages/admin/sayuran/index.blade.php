<x-admin-layout>
    <x-slot name="title">
        Halaman Sayuran
    </x-slot>
    <div class="container-fluid bg-white mb-2">
        <div class="row d-flex align-items-center py-3 bg-white">
            <div class="col-8">
                <form class="d-none d-sm-inline-block form-inline w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control bg-white small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2">
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
                <button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#createSayuran">
                    Tambah
                </button>

            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="createSayuran" tabindex="-1" aria-labelledby="createSayuranLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" class="modal-content" action="{{ route('sayuran.store') }}"
                enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createSayuranLabel">Tambah sayuran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kd">Kode</label>
                        <input type="text" name="kd" class="form-control" id="kd"
                            value="{{ old('kd') }}">
                        @error('kd')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama"
                            value="{{ old('nama') ?? '' }}">
                        @error('nama')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" id="deskripsi"
                            value="{{ old('deskripsi') ?? '' }}">
                        @error('deskripsi')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto">foto</label>
                        <div class="input-group mb-3">
                            <img style="max-height: 200px;object-fit: contain"
                                class="w-100 img-fluid img-thumbnail thumbnail d-none">
                            <div class="custom-file">
                                <input data-target="thumbnail" type="file"
                                    class="custom-file-input input-show upload-img" name="foto" id="thumbnail">
                                <label class="custom-file-label" for="foto">Pilih foto</label>
                            </div>
                        </div>
                        @error('foto')
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
                            <th scope="col">Kode</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sayurans as $key => $sayuran)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $sayuran->kd }}</td>
                                <td>{{ $sayuran->nama }}</td>
                                <td>
                                    <img style="max-height: 100px;object-fit: contain" class="img-fluid img-foto foto"
                                        src="{{ asset('storage') . '/' . $sayuran->foto }}">
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <form action="{{ route('sayuran.destroy', [$sayuran->kd]) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        <a href="{{ route('sayuran.edit', [$sayuran->kd]) }}"
                                            class="btn btn-primary">Edit</a>
                                        <a href="{{ route('sayuran.show', [$sayuran->kd]) }}"
                                            class="btn btn-dark">Show</a>
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
                {{ $sayurans->links() }}
            </div>
        </div>
    </div>

</x-admin-layout>
