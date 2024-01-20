<x-admin-layout>
    <x-slot name="title">
        Halaman Detail sayuran
    </x-slot>
    <div class="container-fluid border-0 shadow-sm bg-white py-4">
        <div class="row">
            <div class="col-12">
                <div class="h6">sayuran <span class="text-primary">{{ $sayuran->nama }}</span></div>
                <div class="py-2 px-3 mt-3" style="background-color: rgba(189, 184, 184,0.1)">
                    {!! $sayuran->deskripsi !!}
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid border-0 shadow-sm bg-white py-4 mt-2">
        <div class="row">
            <div class="col-12">
                <div class="py-2 px-3 mt-2" style="background-color: rgba(189, 184, 184,0.1)">
                    <div class="row gap-0 justify-content-start">
                        <img style="max-height: 200px;object-fit: contain" class="w-100 img-fluid img-foto foto"
                            src="{{ asset('storage') . '/' . $sayuran->foto }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="row container-fluid border-0 shadow-sm bg-white py-4">
            <div class="col-12">
                <div class="h6">Kriteria Sayuran</div>
                <div class="py-2 px-3 mt-3" style="background-color: rgba(231, 228, 228, 0.1)">
                    @foreach ($sayuran->rules as $sr)
                        <span class="text-primary py-2">Rule {{ $sr->kd }}</span>
                        <ul class="list-group list-group-flush">
                            @foreach ($sr->sayuranKriteria as $sk)
                                <li class="list-group-item bg-transparent">
                                    {{ $sk->kriteria->nama ?? '-' }}</li>
                            @endforeach
                        </ul>
                    @endforeach


                </div>
            </div>
        </div>

    </div>

</x-admin-layout>
