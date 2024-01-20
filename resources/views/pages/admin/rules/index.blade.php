<x-admin-layout>
    <x-slot name="title">
        Halaman Rules
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
            @if ($kategoriSayuran->count() > 0)
                <div class="col-4">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#createRules">
                        Tambah
                    </button>

                </div>
            @endif

        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="createRules" tabindex="-1" aria-labelledby="createRulesLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" class="modal-content" action="{{ route('rules.store') }}"
                enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createRulesLabel">Tambah Rules</h5>
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
                        <label for="sayuran_kd">sayuran</label>
                        <select name="sayuran_kd" id="sayuran_kd" class="custom-select">
                            @foreach ($kategoriSayuran as $sayuran)
                                <option value="{{ $sayuran->kd }}">{{ $sayuran->kd }}:{{ $sayuran->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('sayuran_kd')
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
                            <th scope="col">Kode</th>
                            <th scope="col">Rules</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rules as $key => $rule)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $rule->kd }}</td>
                                <td scope="col">
                                    @foreach ($rule->sayuranKriteria as $sk)
                                        <span class="badge badge-secondary" data-toggle="tooltip" data-placement="top"
                                            title="{{ $sk->kriteria->nama }}">
                                            {{ $sk->kriteria_lahan_kd }}
                                        </span>
                                    @endforeach
                                </td>
                                <td scope="col">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <form action="{{ route('rules.destroy', [$rule->kd]) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
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
                {{ $rules->links() }}
            </div>
        </div>
    </div>
    @push('script')
        <script>
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
    @endpush
</x-admin-layout>
