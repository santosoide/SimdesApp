<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    {{ HTML::style('bs3/css/style.css') }}
</head>
<body>
<table class="table-list">
    <tr>
        <td class="col-md-2" rowspan="2" style="padding-bottom: 4px;padding-top:4px;text-align: center">
            <img src="{{ URL::asset('img/logo_organisasi.png') }}" alt="" height="100">
        </td>
        <td class="col-md-6 text-center" style="font-size: 12pt"><strong>DOKUMEN PELAKSANA ANGGARAN<br/>{{strtoupper($organisasi->nama)}}</strong>
        </td>
        <td class="col-md-1 text-center" colspan="6" style="padding-bottom: 0px;padding-top: 0px;"><strong>NOMOR DPA
                DESA</strong>
        </td>
        <td class="col-md-2 text-center" rowspan="2" style="padding-bottom: 0px;padding-top: 0px;"><strong>Formulir 2.1
                <br/> DPA DESA</strong></td>
    </tr>
    <tr>
        <td class="text-center" style="padding-bottom: 0px;padding-top: 0px;font-size: 11pt"><strong>PROVINSI
                {{strtoupper($organisasi->prov).' / '.' KABUPATEN '.strtoupper($organisasi->kab)}}</strong><BR/>Tahun Anggaran
            : {{date('Y')}}
        </td>
        <td class="text-center">1</td>
        <td class="text-center">1.2</td>
        <td class="text-center">00</td>
        <td class="text-center">00</td>
        <td class="text-center">2</td>
        <td class="text-center">2</td>
    </tr>
    <table class="table-list" style="border-top: none !important;">
        <tr>
            <td class="col-md-2 no-border-right">Kecamatan</td>
            <td class="col-md-2 no-border-right">: &nbsp;{{$organisasi->kode_kec}}</td>
            <td class="col-md-7">
                {{$organisasi->kec}}
            </td>
        </tr>
        <tr>
            <td class="col-md-2 no-border-right">Organisasi</td>
            <td class="col-md-2 no-border-right">: &nbsp;{{$organisasi->kode_desa}}</td>
            <td class="col-md-7">
                {{$organisasi->desa}}
            </td>
        </tr>
    </table>
    <tr>
        <table class="table-list">
            <tr>
                <td class="text-center" colspan="6"><strong>Rincian Dokumen Pelaksana Anggaran Belanja Tidak Langsung Desa</strong>
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

            @foreach ($belanja as $data)
            @if(!empty($data->rincian_obyek_id))
            <tr>
                <td>{{$data->kelompok->kode_rekening}}</td>
                <td>{{$data->kelompok->kelompok}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>{{$data->jenis->kode_rekening}}</td>
                <td>{{$data->jenis->jenis}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>{{$data->obyek->kode_rekening}}</td>
                <td>{{$data->obyek->obyek}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>{{$data->rincianObyek->kode_rekening}}</td>
                <td>{{$data->rincianObyek->rincian_obyek}}</td>
                <td style="text-align: center">{{$data->volume_1}}{{($data->volume_2 > 0) ? '/'.$data->volume_2 : ''
                    }}{{($data->volume_3 > 0) ? '/'.$data->volume_3 : '' }}
                </td>
                <td style="text-align: center">{{$data->satuan_1}}{{(!empty($data->satuan_2)) ? '/'.$data->satuan_2 : ''
                    }}{{(!empty($data->satuan_3)) ? '/'.$data->satuan_3 : '' }}
                </td>
                <td style="text-align: right">{{number_format($data->satuan_harga, 2, ',', '.')}}</td>
                <td style="text-align: right">{{number_format($data->jumlah, 2, ',', '.')}}</td>
            </tr>
            @elseif(!empty($data->obyek_id))
            <tr>
                <td>{{$data->kelompok->kode_rekening}}</td>
                <td>{{$data->kelompok->kelompok}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>{{$data->jenis->kode_rekening}}</td>
                <td>{{$data->jenis->jenis}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>{{$data->obyek->kode_rekening}}</td>
                <td>{{$data->obyek->obyek}}</td>
                <td style="text-align: center">{{$data->volume_1}}{{($data->volume_2 > 0) ? '/'.$data->volume_2 : ''
                    }}{{($data->volume_3 > 0) ? '/'.$data->volume_3 : '' }}
                </td>
                <td style="text-align: center">{{$data->satuan_1}}{{(!empty($data->satuan_2)) ? '/'.$data->satuan_2 : ''
                    }}{{(!empty($data->satuan_3)) ? '/'.$data->satuan_3 : '' }}
                </td>
                <td style="text-align: right">{{number_format($data->satuan_harga, 2, ',', '.')}}</td>
                <td style="text-align: right">{{number_format($data->jumlah, 2, ',', '.')}}</td>
            </tr>

            @elseif(!empty($data->jenis_id))
            <tr>
                <td>{{$data->kelompok->kode_rekening}}</td>
                <td>{{$data->kelompok->kelompok}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>{{$data->jenis->kode_rekening}}</td>
                <td>{{$data->jenis->jenis}}</td>
                <td style="text-align: center">{{$data->volume_1}}{{($data->volume_2 > 0) ? '/'.$data->volume_2 : ''
                    }}{{($data->volume_3 > 0) ? '/'.$data->volume_3 : '' }}
                </td>
                <td style="text-align: center">{{$data->satuan_1}}{{(!empty($data->satuan_2)) ? '/'.$data->satuan_2 : ''
                    }}{{(!empty($data->satuan_3)) ? '/'.$data->satuan_3 : '' }}
                </td>
                <td style="text-align: right">{{number_format($data->satuan_harga, 2, ',', '.')}}</td>
                <td style="text-align: right">{{number_format($data->jumlah, 2, ',', '.')}}</td>
            </tr>
            @elseif(!empty($data->kelompok_id))
            <tr>
                <td style="text-align: left">{{$data->kelompok->kode_rekening}}</td>
                <td style="text-align: left">{{$data->kelompok->kelompok}}</td>
                <td style="text-align: center">{{$data->volume_1}}{{($data->volume_2 > 0) ? '/'.$data->volume_2 : ''
                    }}{{($data->volume_3 > 0) ? '/'.$data->volume_3 : '' }}
                </td>
                <td style="text-align: center">{{$data->satuan_1}}{{(!empty($data->satuan_2)) ? '/'.$data->satuan_2 : ''
                    }}{{(!empty($data->satuan_3)) ? '/'.$data->satuan_3 : '' }}
                </td>
                <td style="text-align: right">{{number_format($data->satuan_harga, 2, ',', '.')}}</td>
                <td style="text-align: right">{{number_format($data->jumlah, 2, ',', '.')}}</td>
            </tr>
            @endif
            @endforeach
            <tr>
                <td class="" colspan="5" style="text-align: right"><strong>Jumlah</strong></td>
                <td class="" style="text-align: right"><strong>{{number_format($jml_belanja, 2, ',', '.')}}</strong>
            </tr>
        </table>
    </tr>
</table>
<table class="table-list">
    <tr>
        <td colspan="5" style="padding-left: 20px;">Rinican Penarikan Dana per Triwulan</td>
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
            <p>{{number_format($bagi, 2, ',','.')}}</p>

            <p>{{number_format($bagi, 2, ',','.')}}</p>

            <p>{{number_format($bagi, 2, ',','.')}}</p>

            <p><u>{{number_format($bagi, 2, ',','.')}}</u></p>

            <p><strong><u>{{number_format($jml_belanja, 2, ',',
                        '.')}}</u></strong></p>
            <br/>
            <br/>
        </td>
        <td class="col-md-2">&nbsp;</td>
        <td class="col-md-5 text-center">
            {{$organisasi->kab}}, {{$tgl}}<br/>
            Menyetujui<br/>
            Camat {{$organisasi->kec}}
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <strong><u>{{isset($camat) ? $camat : '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Belum diset]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    '}}</u></strong><br/>
            <strong>NIP. {{isset($camat) ? $camat : '[Belum diset]'}}</strong>
        </td>
    </tr>
</table>

</body>
</html>