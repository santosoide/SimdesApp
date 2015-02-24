<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>{{ 'Cetak Dokumen DRK - DESA ' .strtoupper($organisasi['desa'])}}</title>
    {{ HTML::style('css/pdf-style.css') }}
</head>
<body>
<table class="table-list">
    <tr>
        <td class="col-md-2" rowspan="2" style="padding-bottom: 4px;padding-top: 4px;text-align: center">
            <img src="{{ URL::asset('img/logo_bw.png') }}" alt="" height="100">
        </td>
        <td class="col-md-7 text-center" style="font-size: 11pt;">
            <strong>DOKUMEN RINCIAN KEGIATAN<br/>{{strtoupper($organisasi['desa'])}}</strong></td>
        <td class="col-md-2 text-center" rowspan="2" style="padding-bottom: 0px;padding-top: 0px;"><strong>Formulir
                <br/> DRK DESA</strong></td>
    </tr>
    <tr>
        <td class="text-center" style="padding-bottom: 4px;padding-top: 4px;"><strong>KABUPATEN
                {{strtoupper($organisasi['kab'])}}</strong><br/>Tahun Anggaran
            : {{date('Y')}}</td>
    </tr>
    <table class="table-list" style="border-top: none !important;">
        <tr>
            <td class="col-md-2 no-border-right">Kewenangan</td>
            <td class="col-md-2 no-border-right">: &nbsp;1</td>
            <td class="col-md-7">
                Kewenangan berdasarkan hak asal-usul
            </td>
        </tr>
        <tr>
            <td class="col-md-2 no-border-right">Bidang Kewenangan</td>
            <td class="col-md-2 no-border-right">: &nbsp;1.1</td>
            <td class="col-md-7">
                Penyelenggaraan Pemerintahan Desa
            </td>
        </tr>
        <tr>
            <td class="col-md-2 no-border-right">Kecamatan</td>
            <td class="col-md-2 no-border-right">: &nbsp;{{$organisasi['kode_kec']}}</td>
            <td class="col-md-7">
                {{$organisasi['kec']}}
            </td>
        </tr>
        <tr>
            <td class="col-md-2 no-border-right">Organisasi</td>
            <td class="col-md-2 no-border-right">: &nbsp;{{$organisasi['kode_desa']}}</td>
            <td class="col-md-7">
                {{$organisasi['desa']}}
            </td>
        </tr>
    </table>
    <tr>
        <table class="table-list">
            <tr>
                <td class="col-md-2" style="text-align: center"><strong>Kode Rekening</strong></td>
                <td class="col-md-7" style="text-align: center"><strong>Uraian</strong></td>
                <td class="col-md-3" style="text-align: center"><strong>Jumlah</strong></td>
            </tr>

            <tr>
                <td class="" style="text-align: center"><strong>1</strong></td>
                <td class="" style="text-align: center"><strong>2</strong></td>
                <td class="" style="text-align: center"><strong>3</strong></td>
            </tr>
            @if(count($pendapatan) == 0)
            @else
                <tr>
                    <td class=""><strong>1</strong></td>
                    <td class=""><strong>Pendapatan</strong></td>
                    <td class="" style="text-align: right">
                        <strong>{{number_format($jumlah_pendapatan, 2, ',', '.')}}</strong>
                    </td>
                </tr>
            @endif
            @foreach ($pendapatan as $data)
                <tr>
                    <td class="">
                        {{$data->kode_rekening}}
                    </td>
                    <td class="">
                        {{$data->pendapatan}}
                    </td>
                    <td class="" style="text-align: right">{{number_format($data->jumlah, 2, ',', '.')}}</td>
                </tr>
            @endforeach

            @if(count($belanja) == 0)
            @else
                <tr>
                    <td class=""><strong>2</strong></td>
                    <td class=""><strong>Belanja</strong></td>
                    <td class="" style="text-align: right">
                        <strong>{{number_format($jumlah_belanja, 2, ',', '.')}}</strong>
                    </td>
                </tr>
            @endif
            @foreach ($belanja as $data)
                <tr>
                    <td class="">
                        {{$data->kode_rekening}}
                    </td>
                    <td class="">
                        {{$data->belanja}}
                    </td>
                    <td class="" style="text-align: right">{{number_format($data->jumlah, 2, ',', '.')}}</td>
                </tr>
            @endforeach

            @if(count($pembiayaan) == 0)
            @else
                <tr>
                    <td class=""><strong>3</strong></td>
                    <td class=""><strong>Pembiayaan</strong></td>
                    <td class="" style="text-align: right">
                        <strong>{{number_format($jumlah_pembiayaan, 2, ',', '.')}}</strong>
                    </td>
                </tr>
            @endif
            @foreach ($pembiayaan as $data)
                <tr>
                    <td class="">
                        {{$data->kode_rekening}}
                    </td>
                    <td class="">
                        {{$data->pembiayaan}}
                    </td>
                    <td class="" style="text-align: right">{{number_format($data->jumlah, 2, ',', '.')}}</td>
                </tr>
            @endforeach
            <tr>
                <td class="" colspan="2" style="text-align: right"><strong>Surplus/(Defisit)</strong></td>
                <td class="" style="text-align: right"><strong>{{number_format($total, 2, ',', '.')}}</strong></td>
            </tr>
        </table>
    </tr>
</table>
<table class="table-list">
    <tr>
        <td colspan="7">
            <p class="text-center"><strong>RENCANA PELAKSANAAN ANGGARAN DESA</strong></p>
        </td>
    </tr>
    <tr>
        <td class="col-md-1" style="text-align: center" rowspan="2"><strong>No</strong></td>
        <td class="col-md-3" style="text-align: center" rowspan="2"><strong>Uraian</strong></td>
        <td class="col-md-6" style="text-align: center" colspan="4"><strong>Triwulan</strong></td>
        <td class="col-md-2" style="text-align: center" rowspan="2"><strong>Jumlah</strong></td>
    </tr>

    <tr>
        <td class="col-md-1" style="text-align: center"><strong>I</strong></td>
        <td class="col-md-1" style="text-align: center"><strong>II</strong></td>
        <td class="col-md-1" style="text-align: center"><strong>III</strong></td>
        <td class="col-md-1" style="text-align: center"><strong>IV</strong></td>
    </tr>

    <tr>
        <td class="" style="text-align: center"><strong>1</strong></td>
        <td class="" style="text-align: center"><strong>2</strong></td>
        <td class="" style="text-align: center"><strong>3</strong></td>
        <td class="" style="text-align: center"><strong>4</strong></td>
        <td class="" style="text-align: center"><strong>5</strong></td>
        <td class="" style="text-align: center"><strong>6</strong></td>
        <td class="" style="text-align: center"><strong>7=3+4+5+6</strong></td>
    </tr>

    <tr>
        <td class="text-center">1</td>
        <td>Pendapatan</td>
        <td class="text-right">{{number_format($bagi_pendapatan, 2, ',', '.')}}</td>
        <td class="text-right">{{number_format($bagi_pendapatan, 2, ',', '.')}}</td>
        <td class="text-right">{{number_format($bagi_pendapatan, 2, ',', '.')}}</td>
        <td class="text-right">{{number_format($bagi_pendapatan, 2, ',', '.')}}</td>
        <td class="text-right">{{number_format($jumlah_pendapatan, 2, ',', '.')}}</td>
    </tr>
    <tr>
        <td class="text-center">2</td>
        <td>Belanja</td>
        <td class="text-right">{{number_format($bagi_belanja, 2, ',', '.')}}</td>
        <td class="text-right">{{number_format($bagi_belanja, 2, ',', '.')}}</td>
        <td class="text-right">{{number_format($bagi_belanja, 2, ',', '.')}}</td>
        <td class="text-right">{{number_format($bagi_belanja, 2, ',', '.')}}</td>
        <td class="text-right">{{number_format($jumlah_belanja, 2, ',', '.')}}</td>
    </tr>
    <tr>
        <td class="text-center">3</td>
        <td>Pembiayaan</td>
        <td class="text-right">{{number_format($bagi_pembiayaan, 2, ',', '.')}}</td>
        <td class="text-right">{{number_format($bagi_pembiayaan, 2, ',', '.')}}</td>
        <td class="text-right">{{number_format($bagi_pembiayaan, 2, ',', '.')}}</td>
        <td class="text-right">{{number_format($bagi_pembiayaan, 2, ',', '.')}}</td>
        <td class="text-right">{{number_format($jumlah_pembiayaan, 2, ',', '.')}}</td>
    </tr>
</table>
<table class="table-list">
    <tr>
        <td class="col-md-8 no-border-right" style="text-align: left">

        </td>
        <td class="col-md-4 text-center">
            {{$organisasi['kab']}}, {{$tgl}}<br/>
            Kepala Desa {{$organisasi['desa']}}
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <strong><u>{{$kades}}</u></strong>
        </td>
    </tr>
</table>

</body>
</html>