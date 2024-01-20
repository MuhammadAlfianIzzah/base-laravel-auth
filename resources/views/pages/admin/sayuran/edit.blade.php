<x-admin-layout>
    <div class="container-fluid border-0 shadow-sm bg-white py-4">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{ route('sayuran.update', $sayuran->kd) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit sayuran</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="kd">kode</label>
                            <input type="text" name="kd" class="form-control" id="kd"
                                value="{{ $sayuran->kd ?? (old('kd') ?? '') }}">
                            @error('kd')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama"
                                value="{{ $sayuran->nama ?? (old('nama') ?? '') }}">
                            @error('nama')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" id="deskripsi"
                                value="{{ $sayuran->deskripsi ?? (old('deskripsi') ?? '') }}">
                            @error('deskripsi')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" data-target="foto"
                                        class="custom-file-input input-show upload-img" name="foto" id="foto">
                                    <label class="custom-file-label" for="foto">Pilih foto</label>
                                    @error('foto')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <img style="max-height: 200px;object-fit: contain" class="w-100 img-fluid img-foto foto"
                                src="{{ asset('storage') . '/' . $sayuran->foto }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ URL::previous() }}" class="btn btn-secondary" data-dismiss="modal">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
