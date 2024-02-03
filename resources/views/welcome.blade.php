<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <style>
            table, th, td {
                border:1px solid black;
            }
            td, th {
                padding-left: 10px;
                padding-right: 10px;
            }
        </style>
    </head>
    <body class="antialiased">

        <div class="ml-4 mt-4">
            <table aria-describedby="Profil Capres-Cawapres">
                <tr>
                    <th scope="col">Nomor Urut</th>
                    <th scope="col">Calon Presiden</th>
                    <th scope="col">Calon Wakil Presiden</th>
                </tr>
                @for ($i = 0; $i <= 2; $i++)
                    <tr>
                        <td style="text-align: center">{{ $capres[$i]->nomorUrut }}</td>
                        <td>
                            <p>{{ $capres[$i]->namaLengkap }}</p>
                            <p>
                                {{ $capres[$i]->tempatLahir . ', ' . $capres[$i]->tanggalLahir->format('j F Y') }}
                            </p>
                            <p><strong>Karir : </strong></p>
                            @foreach($capres[$i]->karir as $karir)
                                <p>
                                    {{ $karir->jabatan .
                                        "(" . $karir->tahunMulai .
                                        ($karir->tahunSelesai ? "-" . $karir->tahunSelesai : "")  . ")" }}
                                </p>
                            @endforeach
                        </td>
                        <td>
                            <p>{{ $cawapres[$i]->namaLengkap }}</p>
                            <p>
                                {{ $cawapres[$i]->tempatLahir . ', ' . $cawapres[$i]->tanggalLahir->format('j F Y') }}
                            </p>
                            <p><strong>Karir : </strong></p>
                            @foreach($cawapres[$i]->karir as $karir)
                                <p>
                                    {{ $karir->jabatan .
                                        "(" . $karir->tahunMulai .
                                        ($karir->tahunSelesai ? "-" . $karir->tahunSelesai : "")  . ")" }}
                                </p>
                            @endforeach
                        </td>
                    </tr>
                @endfor
            </table>
        </div>
    </body>
</html>
