<table border="1" cellpadding="0px" cellspacing="0px" width="100%">
    <tr style="text-align: center;"><th colspan="6">LAPORAN KEUANGAN CABANG AXIC CHAPTER METROSTAR</th></tr>
    <tr>
        <th rowspan="2">No</th>
        <th colspan="5">Laporan Pengeluaran</th>
    </tr>
    <thead>
        <tr>
            <th>Keterangan</th>
            <th>Status</th>
            <th>Tanggal</th>
            <th>Jumlah (Rp)</th>
        </tr>
    </thead>
    <tbody>
        <?php $total = 0; ?>
        @foreach ($laporan as $index=> $data)
            <?php $total = $total + $data->jumlah_uang; ?>
            <tr>
                <td>{{ $index+1 }}</td>
                <td>{{ $data->keterangan }}</td>
                <td>
                    @if($data->status == 1)
                      <span class="badge bg-primary">Pemasukan</span>
                    @else
                      <span class="badge bg-danger">Pengeluaran</span>
                    @endif
                </td>
                <td>{{date("d M Y", strtotime($data->created_at))}}</td>
                <td><?php echo "Rp. ". number_format($data->jumlah_uang,2,',','.'); ?></td>
            </tr>
        @endforeach
        <tr></tr>
        <tr>
            <td></td>
            <td colspan="4">TOTAL PENGELUARAN</td>
            <td colspan="1">Rp {{number_format($total,2,',','.')}}</td>
        </tr>
    </tbody>
</table>