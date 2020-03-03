<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 11pt;
        }
        
        th, td {
            padding: 5px;
            text-align: left;
        }

        .font{
            font-size: 12pt;
        }

        .fontjdl{
            font-size: 20pt;
        }
        
      </style>
</head>
<body>
    <table border="0">
        <tr>
            <td>
                <p align="center">
                    <b class="fontjdl"> MANIKA AESTHETIC CLINIC </b>
                </p>
                <p align="center">
                    Alamat : Jl. Tukad Irawadi No.10, Panjer, Kec. Denpasar Sel., Kota Denpasar, Bali 80113<br> 
                    No.Telpon : (0361) 245617
                </p>
            </td>
        </tr>
    </table>
    <hr>
    <br>
    <p align="center">
        <b class="font">
            Kartu Stok Transaksi Manika Aesthetic Clinic<br>
            PerTanggal {{$dari_tgl}} sampai {{$sampai_tgl}}
        </b>
    </p>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th style="text-align:center">No</th>
                <th style="text-align:center">Nama Item</th>
                <th style="text-align:center">Stok Masuk</th>
                <th style="text-align:center">Stok Keluar</th>
                <th style="text-align:center">Transaksi</th>
                <th style="text-align:center">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kartustok as $k)
                <tr>
                    <td style="text-align:center">{{ $no=$no+1 }}</td>
                    <td>{{ $k->produk_item->nama_item}}</td>
                    <td style="text-align:center">{{ $k->stok_masuk}}</td>
                    <td style="text-align:center">{{ $k->stok_keluar}}</td>
                    <td style="text-align:center">{{ $k->transaksi}}</td>
                    <td>{{ $k->keterangan}}</td>
                </tr>   
            @endforeach
        </tbody>
    </table>
</body>
</html>
