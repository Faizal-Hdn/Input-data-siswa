<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>UNSIA</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
   <div class="container mt-2">
      <div class="row">
         <div class="col-lg-12 margin-tb">
            <div class="pull-right mb-2">
               <h3 class="text-uppercase mt-5 text-center">{{ __('Informasi Penerimaan Mahasiswa Baru Unversitas Siber Asia') }}</h3>
               <a class="btn btn-success btn-sm mt-3" href="{{ route('siswa.create') }}">{{ __('Input Baru') }}</a>
            </div>
         </div>
      </div>
      @if ($message = Session::get('success'))
         <div class="alert alert-success" role="alert">
            <p>{{ $message }}</p>
         </div>
      @endif
      <table class="table-bordered table">
         <thead>
            <tr>
               <th>{{ __('NO') }}</th>
               <th>{{ __('NO PEND') }}</th>
               <th>{{ __('Name') }}</th>
               <th>{{ __('BHS INDO') }}</th>
               <th>{{ __('MTK') }}</th>
               <th>{{ __('IPA') }}</th>
               <th>{{ __('TOTAL') }}</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($siswas as $no => $siswa)
               <tr>
                  <td>{{ ++$no }}</td>
                  <td>{{ $siswa->no_pendaftaran }}</td>
                  <td>{{ $siswa->nama }}</td>
                  <td>{{ $siswa->nilai_ind }}</td>
                  <td>{{ $siswa->nilai_mtk }}</td>
                  <td>{{ $siswa->nilai_ipa }}</td>
                  <td>{{ $siswa->nilai_ind + $siswa->nilai_mtk + $siswa->nilai_ipa }}</td>
                  <td>
                  <a class="btn btn-success btn-sm mt-3" href="{{ route('siswa.edit', $siswa->no_pendaftaran) }}">{{ __('Edit') }}</a>
                  </td>
               </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</body>

</html>
