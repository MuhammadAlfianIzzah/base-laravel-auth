<x-admin-layout>
    <div class="container-fluid border-0 shadow-sm bg-white py-4">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="{{ route('kriteriaLahan.update', $kriteriaLahan->kd) }}">
                    @method('PUT')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit data jenis informasi</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="kd">Kode</label>
                            <input type="text" name="kd" class="form-control" id="kd"
                                value="{{ $kriteriaLahan->kd ?? (old('kd') ?? '') }}">
                            @error('kd')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama"
                                value="{{ $kriteriaLahan->nama ?? (old('nama') ?? '') }}">
                            @error('nama')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ URL::previous() }}" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
                        <button type="submit" class="btn btn-warning">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
