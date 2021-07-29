<table border="1" cellpadding="0px" cellspacing="0px" width="100%">
    <tr style="text-align: center;"><th colspan="6">LAPORAN KEUANGAN CABANG AXIC CHAPTER METROSTAR</th></tr>
    <tr>
        <th rowspan="2">No</th>
        <th colspan="5">Laporan</th>
    </tr>
    <thead>
        <tr>
            <th>Keterangan</th>
            <th>Jumlah (Rp)</th>
            <th>Status</th>
            <th>Tanggal</th>
            <th>Saldo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($laporan as $index=> $data)
            <tr>
                <td>{{ $index+1 }}</td>
                <td>{{ $data->keterangan }}</td>
                <td><?php echo "Rp. ". number_format($data->jumlah_uang,2,',','.'); ?></td>
                <td>
                    @if($data->status == 1)
                      <span class="badge bg-primary">Pemasukan</span>
                    @else
                      <span class="badge bg-danger">Pengeluaran</span>
                    @endif
                </td>
                <td>{{date("d M Y", strtotime($data->created_at))}}</td>
                <td><?php echo "Rp. ". number_format($data->saldo,2,',','.'); ?></td>
            </tr>
        @endforeach
        <tr></tr>
        <tr>
            <td></td>
            <td colspan="4">TOTAL SALDO SAAT INI</td>
            <td colspan="1">Rp {{number_format($saldo->saldo,2,',','.')}}</td>
        </tr>
    </tbody>
</table>