<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>{{ 'Cetak Dokumen RDK - DESA ' .strtoupper($organisasi['desa'])}}</title>
    {{ HTML::style('css/pdf-style.css') }}
</head>
<body>
<table class="table-list">
    <tr>
        <td class="col-md-1" rowspan="2" style="padding-bottom: 0px;padding-top: 0px;text-align: center">
            <img src="{{ URL::asset('img/logo_bw.png') }}" alt="" height="100">
        </td>
        <td class="col-md-7" style="padding-bottom: 0px;padding-top: 0px;"><p style="font-size: 12pt;"
                                                                              class="text-center"><strong>RANCANGAN DOKUMEN KEGIATAN<br/>{{strtoupper($organisasi['desa'])}}</strong></p></td>
        <td class="col-md-2 text-center" rowspan="2" style="padding-bottom: 0px;padding-top: 0px;"><strong>Formulir -
                1<br/> RDK DESA</strong></td>
    </tr>
    <tr>
        <td style="padding-bottom: 0px;padding-top: 0px;"><p style="font-size: 11pt" class="text-center"><strong>KABUPATEN
                    {{strtoupper($organisasi['kab'])}}</strong><BR/>Tahun Anggaran
                : {{date('Y')}}</p></td>
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
                <td colspan="3">
                    <p class="text-center"><strong>RINGKASAN ANGGARAN PENDAPATAN DAN BELANJA DESA</strong></p>
                </td>
            </tr>
            <tr>
                <td class="col-md-2" style="text-align: center">Kode Rekening</td>
                <td class="col-md-7" style="text-align: center">Uraian</td>
                <td class="col-md-3" style="text-align: center">Jumlah</td>
            </tr>

            <tr>
                <td class="" style="text-align: center">1</td>
                <td class="" style="text-align: center">2</td>
                <td class="" style="text-align: center">3</td>
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
            @foreach($pendapatan as $data)
                <tr>
                    <td class="">
                        @if(!empty($data->rincian_id))
                            {{$data->kode_rekening}}
                        @elseif(!empty($data->obyek_id))
                            {{$data->kode_rekening}}
                        @elseif(!empty($data->jenis_id))
                            {{$data->kode_rekening}}
                        @elseif(!empty($data->kelompok_id))
                            {{$data->kode_rekening}}
                        @endif
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
                        @if(!empty($data->rincian_id))
                            {{$data->kode_rekening}}
                        @elseif(!empty($data->obyek_id))
                            {{$data->kode_rekening}}
                        @elseif(!empty($data->jenis_id))
                            {{$data->kode_rekening}}
                        @elseif(!empty($data->kelompok_id))
                            {{$data->kode_rekening}}
                        @endif
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
                        @if(!empty($data->rincian_id))
                            {{$data->kode_rekening}}
                        @elseif(!empty($data->obyek_id))
                            {{$data->kode_rekening}}pembiayaan
                        @elseif(!empty($data->jenis_id))
                            {{$data->kode_rekening}}
                        @elseif(!empty($data->kelompok_id))
                            {{$data->kode_rekening}}
                        @endif
                    </td>
                    <td class="">
                        {{$data->pembiayaan}}
                    </td>
                    <td class="" style="text-align: right">{{number_format($data->jumlah, 2, ',', '.')}}</td>
                </tr>
            @endforeach

            <tr>
                <td class="" colspan="2" style="text-align: right"><strong>Jumlah keseluruhan APBDesa</strong></td>
                <td class="" style="text-align: right"><strong>{{number_format($total, 2, ',', '.')}}</strong></td>
            </tr>
        </table>
    </tr>
</table>
<table class="table-list">
    <tr>
        <td class="col-md-8" style="text-align: left">
            Keterangan :<br/>
            - Tanggal Pembahasan<br/>
            - Catatan hasil pembahasan
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
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
<table class="table-list">
    <tr>
        <td colspan="4">
            Dibahas dan ditanda tangani dalam Musyawarah Desa oleh :
        </td>
    </tr>
    <tr>
        <td class="col-md-1" style="text-align: center">No</td>
        <td class="col-md-4" style="text-align: center">Nama Lengkap</td>
        <td class="col-md-4" style="text-align: center">Jabatan</td>
        <td class="col-md-3" style="text-align: center">Tanda Tangan</td>
    </tr>
    @for ($i=1;$i < 6; $i++)
        <tr>
            <td class="text-center">&nbsp;{{$i}}</td>
            <td class="">&nbsp;</td>
            <td class="">&nbsp;</td>
            <td class="">&nbsp;</td>
        </tr>
    @endfor
</table>

</body>
</html>