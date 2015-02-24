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
        <td class="col-md-2" rowspan="2" style="padding-bottom: 4px;padding-top:4px;text-align: center">
            <img src="{{ URL::asset('img/logo_bw.png') }}" alt="" height="100">
        </td>
        <td class="col-md-6 text-center" style="font-size: 12pt"><strong>DOKUMEN PELAKSANA
                ANGGARAN<br/>{{strtoupper($organisasi['desa'])}}</strong>
        </td>
        <td class="col-md-1 text-center" colspan="5" style="padding-bottom: 0px;padding-top: 0px;"><strong>NOMOR DPA
                DESA</strong>
        </td>
        <td class="col-md-2 text-center" rowspan="2" style="padding-bottom: 0px;padding-top: 0px;"><strong>Formulir 1
                <br/> DPA DESA</strong></td>
    </tr>
    <tr>
        <td class="text-center" style="padding-bottom: 0px;padding-top: 0px;font-size: 11pt"><strong>PROVINSI
                {{strtoupper($organisasi['prov']).' / '.' KABUPATEN '.strtoupper($organisasi['kab'])}}</strong><br/>Tahun
            Anggaran
            : {{date('Y')}}
        </td>
        <td class="text-center">1</td>
        <td class="text-center">1.2</td>
        <td class="text-center">00</td>
        <td class="text-center">00</td>
        <td class="text-center">1</td>
    </tr>
    <table class="table-list" style="border-top: none !important;">
        <tr>
            <td class="col-md-2 no-border-right">Kecamatan</td>
            <td class="col-md-2 no-border-right">: &nbsp;{{$organisasi['kode_kab'].'.'.$organisasi['kode_kec']}}</td>
            <td class="col-md-7">
                {{$organisasi['kec']}}
            </td>
        </tr>
        <tr>
            <td class="col-md-2 no-border-right">Organisasi</td>
            <td class="col-md-2 no-border-right">:
                &nbsp;{{$organisasi['kode_kab'].'.'.$organisasi['kode_kec'].'.'.$organisasi['kode_desa']}}</td>
            <td class="col-md-7">
                {{$organisasi['desa']}}
            </td>
        </tr>
    </table>
    <tr>
        <table class="table-list">
            <tr>
                <td class="text-center" colspan="6"><strong>Rincian Dokumen Pelaksana Anggaran Pendapatan Desa</strong>
                </td>
            </tr>
            <tr>
                <td class="col-md-2" rowspan="2" style="text-align: center"><strong>Kode Rekening</strong></td>
                <td class="col-md-4" rowspan="2" style="text-align: center"><strong>Uraian</strong></td>
                <td class="col-md-4" colspan="3" style="text-align: center"><strong>Rincian Perhitungan</strong></td>
                <td class="col-md-2" rowspan="2" style="text-align: center"><strong>Jumlah</strong></td>
            </tr>

            <tr>
                <td class="col-md-1 text-center"><strong>Volume</strong></td>
                <td class="col-md-1 text-center"><strong>Satuan</strong></td>
                <td class="col-md-2 text-center"><strong>Harga Satuan</strong></td>
            </tr>

            <tr>
                <td class="" style="text-align: center"><strong>1</strong></td>
                <td class="" style="text-align: center"><strong>2</strong></td>
                <td class="" style="text-align: center"><strong>3</strong></td>
                <td class="" style="text-align: center"><strong>4</strong></td>
                <td class="" style="text-align: center"><strong>5</strong></td>
                <td class="" style="text-align: center"><strong>6</strong></td>
            </tr>
            @if(count($pendapatan) == 0)
            @else
                <tr>
                    <td class=""><strong>1</strong></td>
                    <td class=""><strong>Pendapatan</strong></td>
                    <td class="" style="text-align: right" colspan="4">
                        <strong>{{number_format($jumlah_pendapatan, 2, ',', '.')}}</strong>
                    </td>
                </tr>
            @endif
            @foreach($pendapatan as $data)
                <tr>
                    <td class="">
                        {{$data->kode_rekening}}
                    </td>
                    <td class="">
                        {{$data->pendapatan}}
                    </td>
                    <td class="" style="text-align: center">
                        @if(!$data->volume3 == '')
                            {{$data->volume1 .'/'. $data->volume2.'/'. $data->volume3}}
                        @elseif(!$data->volume2 == '')
                            {{$data->volume1 .'/'. $data->volume2}}
                        @elseif(!$data->volume1 == '')
                            {{$data->volume1}}
                        @endif
                    </td>
                    <td class="">
                        @if(!$data->satuan3 == '')
                            {{$data->satuan1 .'/'. $data->satuan2.'/'. $data->satuan3}}
                        @elseif(!$data->satuan2 == '')
                            {{$data->satuan1 .'/'. $data->satuan2}}
                        @elseif(!$data->satuan1 == '')
                            {{$data->satuan1}}
                        @endif
                    </td>
                    <td class="" style="text-align: right">
                        {{number_format($data->satuan_harga, 2, ',', '.')}}
                    </td>
                    <td class="" style="text-align: right">{{number_format($data->jumlah, 2, ',', '.')}}</td>
                </tr>
            @endforeach
            <tr>
                <td class="" colspan="2" style="text-align: right"><strong>Jumlah keseluruhan Pendapatan</strong></td>
                <td class="" style="text-align: right" colspan="4">
                    <strong>{{number_format($total, 2, ',', '.')}}</strong></td>
            </tr>
        </table>
    </tr>
</table>
<table class="table-list">
    <tr>
        <td colspan="5" style="padding-left: 20px;">Rencana Pendapatan per Triwulan</td>
    </tr>
    <tr>
        <td class="col-md-2 no-border-right" style="padding-left: 20px;">
            <p>Triwulan I</p>

            <p>Triwulan II</p>

            <p>Triwulan III</p>

            <p>Triwulan IV</p>

            <p>Jumlah</p>
            <br/>
            <br/>
        </td>
        <td class="text-right col-md-1 no-border-right">
            <p>Rp.</p>

            <p>Rp.</p>

            <p>Rp.</p>

            <p>Rp.</p>

            <p>Rp.</p>
            <br/>
            <br/>
        </td>
        <td class="col-md-2 no-border-right" style="text-align: right">
            <p>{{number_format($bagi_pendapatan, 2, ',','.')}}</p>

            <p>{{number_format($bagi_pendapatan, 2, ',','.')}}</p>

            <p>{{number_format($bagi_pendapatan, 2, ',','.')}}</p>

            <p><u>{{number_format($bagi_pendapatan, 2, ',','.')}}</u></p>

            <p><strong><u>{{number_format($jumlah_pendapatan, 2, ',',
                        '.')}}</u></strong></p>
            <br/>
            <br/>
        </td>
        <td class="col-md-2">&nbsp;</td>
        <td class="col-md-5 text-center">
            {{$organisasi['kab']}}, {{$tgl}}<br/>
            Menyetujui<br/>
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