<x-admin-layout>
    <x-slot name="title">
        Halaman Detail konsultasi
    </x-slot>
    <div class="container-fluid border-0 shadow-sm bg-white py-4">
        <div class="row">
            <div class="col-12">
                <div class="h6">konsultasi <span class="text-primary">{{ $konsultasi->nama }}</span></div>
                <div class="py-2 px-3 mt-3" style="background-color: rgba(231, 228, 228, 0.1)">
                    <ul class="list-group list-group-flush">
                        @foreach ($konsultasi->konsultasiKriteriaLahan as $kkl)
                            <li class="list-group-item bg-transparent">{{ $kkl->kriteriaLahan->kd }} -
                                {{ $kkl->kriteriaLahan->nama }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid border-0 shadow-sm bg-white py-4 mt-2">
        <div class="row">
            <div class="col-12">
                <div class="py-2 px-3 mt-2" style="background-color: rgba(189, 184, 184,0.1)">
                    <div class="row gap-0 justify-content-center">
                        @forelse ($ruleTerpilih as $rt)
                            <a href="{{ route('sayuran.show', [$rt->sayuran->kd]) }}" class="alert alert-primary mr-2"
                                role="alert">
                                {{ $rt->sayuran->nama }}
                            </a>
                        @empty
                            <div class="alert alert-primary mr-2" role="alert">
                                Tidak ada sayuran yang bisa ditanam
                            </div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
