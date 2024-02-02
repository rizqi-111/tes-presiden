<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.2.4/dist/tailwind.min.css" rel="stylesheet">

        <style>
            table, th, td {
                border:1px solid black;
            }
            td {
                padding-left: 10px;
                padding-right: 10px;
            }
        </style>
    </head>
    <body class="antialiased">

        <div class="ml-4 mt-4">
            <table>
                @for ($i = 0; $i <= 2; $i++)
                    <tr>
                        <td>{{ $capres[$i]['nomor_urut'] }}</td>
                        <td>
                            <p>{{ $capres[$i]['nama_lengkap'] }}</p>
                            <p>{{ $capres[$i]['tempat_tanggal_lahir'] }}</p>
                            <p><strong>Karir : </strong></p>
                            @foreach($capres[$i]['karir'] as $karir)
                                <p>{{ $karir }}</p>
                            @endforeach
                        </td>
                        <td>
                            <p>{{ $cawapres[$i]['nama_lengkap'] }}</p>
                            <p>{{ $cawapres[$i]['tempat_tanggal_lahir'] }}</p>
                            <p><strong>Karir : </strong></p>
                            @foreach($cawapres[$i]['karir'] as $karir)
                                <p>{{ $karir }}</p>
                            @endforeach
                        </td>
                    </tr>
                @endfor
            </table>
        </div>
    </body>
</html>
