<style>
    * {
        font-size: 10px;
    }
    table {
        border-collapse: collapse;
        padding:2px;
    }


</style>


test
                        <table border="1" class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">No KTP</th>
                                <th scope="col">Nama</th>
                                <th scope="col">No HP</th>
                                <th scope="col">Email</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Tanggal dari</th>
                                <th scope="col">Tanggal Sampai</th>
                                <th scope="col">Ruangan</th>
                                <th scope="col">Keperluan</th>
                                <th scope="col">Total Bayar</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Dibuat tanggal</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($transaksis as $transaksi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaksi->noktp }}</td>
                                    <td>{{ $transaksi->namapenyewa }}</td>
                                    <td>{{ $transaksi->nohppenyewa }}</td>
                                    <td>{{ $transaksi->emailpenyewa }}</td>
                                    <td>{{ $transaksi->alamatpenyewa }}</td>
                                    <td>{{ $transaksi->tanggalpemakaiandari }}</td>
                                    <td>{{ $transaksi->tanggalpemakaiansampai }}</td>
                                    <td>{{ $transaksi->namaruangan }}</td>
                                    <td>{{ $transaksi->keperluan }}</td>
                                    <td>{{ $transaksi->totalbayar }}</td>
                                    <td>{{ $transaksi->keterangan }}</td>
                                    <td>{{ $transaksi->created_at }}</td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data  belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                        </table>
