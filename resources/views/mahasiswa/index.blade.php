@extends('mahasiswa.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>
                    JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG
                </h2>
            </div>  

            {{-- search
            <form action="" method="GET">
                <label for="inputPassword5" class="form-label"><b>Search Data Here</b></label>
                <input type="search" name="search" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock">
            
            </form> --}}

            {{-- Search here --}}
            <form action="" method="get">
                <div class="my-3">
                    <label for="search" class="form-label">Search Mahasiswa Here</label>
                    <input type="text" class="form-control" id="search" name="search">
                </div>
            </form

            <div class="float-right my-2">
                <a class="btn btn-success" href="{{ route('mahasiswa.create') }}">
                Input Mahasiswa
                </a>
            </div>
            
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>

    
@endif

<table class="table table-bordered justify-center" >
    <tr>
        <th>Nim</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>No_Handphone</th>
        <th>Email</th>
        <th>Tanggal Lahir</th>
        <th>Action</th>
    </tr>
    @foreach ($paginate as $Mahasiswa)
        <tr>
            <td>{{ $Mahasiswa->Nim }}</td>
            <td>{{ $Mahasiswa->Nama }}</td>
            {{-- <td>{{ $Mahasiswa->kelas->nama_kelas }}</td>
            <td>{{ optional($Mahasiswa->kelas)->nama_kelas }}</td> --}}
            <td>{{ $Mahasiswa->kelas ? $Mahasiswa->kelas->nama_kelas : 'TI 2A'}}</td>
            <td>{{ $Mahasiswa->Jurusan }}</td>
            <td>{{ $Mahasiswa->No_Handphone }}</td>
            <td>{{ $Mahasiswa->Email }}</td>
            <td>{{ $Mahasiswa->Tanggal_Lahir }}</td>
            <td>

                
            <form action="{{ route('mahasiswa.destroy', $Mahasiswa->id) }}" method="POST">
                <a type="button" class="btn btn-info" href="{{ route('mahasiswa.show', $Mahasiswa->id) }}">Show</a>
                <a type="button" class="btn btn-primary" href="{{ route('mahasiswa.edit', $Mahasiswa->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                <a type="button" class="btn btn-warning" href="{{ route('mahasiswa.krs' , $Mahasiswa->id) }}">Nilai</a>
             </form>
            </td>
        </tr>
    @endforeach

</table>
{{ $paginate->links() }}
@endsection