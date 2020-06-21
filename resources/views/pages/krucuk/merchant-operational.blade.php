@extends('layouts.krucuk')
@section('content')
<div class="container">
    @if ($merchant->status == 0)
        @include('pages.krucuk.TheAlert')
    @endif
    <div class="row">
        @include('pages.krucuk.merchant-navbar')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Operational Hour</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('merchant-operational-update')}}" method="POST">
                        @csrf
                        <div class="form-group row mb-4">
                            <label class="col-form-label col-md-2 col-12 col-sm-12">Senin</label>
                            <div class="col-md-4 col-6 col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                        </div>
                                        <input type="time" class="form-control" name="monday_open"
                                            value="{{(isset($monday[0]))?$monday[0]:''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                        </div>
                                        <input type="time" class="form-control timepicker" name="monday_close"
                                            value="{{(isset($monday[1]))?$monday[1]:''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="checkbox" value="close" name="monday"
                                    {{(isset($monday[1]) && $monday == 'close')?'checked':''}}
                                    onchange="checkbox('monday')"> Tutup
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label col-md-2 col-12 col-sm-12">Selasa</label>
                            <div class="col-md-4 col-6 col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                        </div>
                                        <input type="time" class="form-control" name="tuesday_open"
                                            value="{{(isset($tuesday[0]))?$tuesday[0]:''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                        </div>
                                        <input type="time" class="form-control timepicker" name="tuesday_close"
                                            value="{{(isset($tuesday[1]))?$tuesday[1]:''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="checkbox" value="close" name="tuesday"
                                    {{(isset($tuesday[1]) && $tuesday == 'close')?'checked':''}}
                                    onchange="checkbox('tuesday')"> Tutup
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label col-md-2 col-12 col-sm-12">Rabu</label>
                            <div class="col-md-4 col-6 col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                        </div>
                                        <input type="time" class="form-control" name="wednesday_open"
                                            value="{{(isset($wednesday[0]))?$wednesday[0]:''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                        </div>
                                        <input type="time" class="form-control timepicker" name="wednesday_close"
                                            value="{{(isset($wednesday[1]))?$wednesday[1]:''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="checkbox" value="close" name="wednesday"
                                    {{(isset($wednesday[1]) && $wednesday == 'close')?'checked':''}}
                                    onchange="checkbox('wednesday')"> Tutup
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label col-md-2 col-12 col-sm-12">Kamis</label>
                            <div class="col-md-4 col-6 col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                        </div>
                                        <input type="time" class="form-control" name="thursday_open"
                                            value="{{(isset($thursday[0]))?$thursday[0]:''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                        </div>
                                        <input type="time" class="form-control timepicker" name="thursday_close"
                                            value="{{(isset($thursday[1]))?$thursday[1]:''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="checkbox" value="close" name="thursday"
                                    {{(isset($thursday[1]) && $thursday == 'close')?'checked':''}}
                                    onchange="checkbox('thursday')"> Tutup
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label col-md-2 col-12 col-sm-12">Jumat</label>
                            <div class="col-md-4 col-6 col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                        </div>
                                        <input type="time" class="form-control" name="friday_open"
                                            value="{{(isset($friday[0]))?$friday[0]:''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                        </div>
                                        <input type="time" class="form-control timepicker" name="friday_close"
                                            value="{{(isset($friday[1]))?$friday[1]:''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="checkbox" value="close" name="friday"
                                    {{(isset($friday[1]) && $friday == 'close')?'checked':''}}
                                    onchange="checkbox('friday')"> Tutup
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label col-md-2 col-12 col-sm-12">Sabtu</label>
                            <div class="col-md-4 col-6 col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                        </div>
                                        <input type="time" class="form-control" name="saturday_open"
                                            value="{{(isset($saturday[0]))?$saturday[0]:''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                        </div>
                                        <input type="time" class="form-control timepicker" name="saturday_close"
                                            value="{{(isset($saturday[1]))?$saturday[1]:''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="checkbox" value="close" name="saturday"
                                    {{(isset($saturday[1]) && $saturday == 'close')?'checked':''}}
                                    onchange="checkbox('saturday')"> Tutup
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label col-md-2 col-12 col-sm-12">Minggu</label>
                            <div class="col-md-4 col-6 col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                        </div>
                                        <input type="time" class="form-control" name="sunday_open"
                                            value="{{(isset($sunday[0]))?$sunday[0]:''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                        </div>
                                        <input type="time" class="form-control timepicker" name="sunday_close"
                                            value="{{(isset($sunday[1]))?$sunday[1]:''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="checkbox" value="close" name="sunday"
                                    {{(isset($sunday[1]) && $sunday == 'close')?'checked':''}}
                                    onchange="checkbox('sunday')"> Tutup
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success float-right">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('post-script')
<script src="{{url('jquery-3.5.1.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {

        var hari = ["sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday"];
        var i = 0;
        for (; i < hari.length; i++) {
            var close = hari[i] + "_close";
            var open = hari[i] + "_open";
            var value = $('input[name="' + hari[i] + '"]:checked');
            console.log(value)
            if (value.length == 1) {
                $('input[name="' + close + '"]').prop('disabled', true);
                $('input[name="' + open + '"]').prop('disabled', true);
                $('input[name="' + close + '"]').val("00:00");
                $('input[name="' + open + '"]').val("00:00");
                $('input[name="' + hari[i] + '"]').val("close");
            } else {
                console.log('unchecked')
                $('input[name="' + close + '"]').prop('disabled', false);
                $('input[name="' + open + '"]').prop('disabled', false);
                $('input[name="' + hari[i] + '"]').val("open");
            }
        }
    });

    function checkbox(hari) {
        var close = hari + "_close";
        var open = hari + "_open";
        var value = $('input[name="' + hari + '"]').val();
        if (value == "open") {
            $('input[name="' + close + '"]').prop('disabled', true);
            $('input[name="' + open + '"]').prop('disabled', true);
            $('input[name="' + close + '"]').val("00:00");
            $('input[name="' + open + '"]').val("00:00");
            $('input[name="' + hari + '"]').val("close");
        } else {
            $('input[name="' + close + '"]').prop('disabled', false);
            $('input[name="' + open + '"]').prop('disabled', false);
            $('input[name="' + close + '"]').val("00:00");
            $('input[name="' + open + '"]').val("00:00");
            $('input[name="' + hari + '"]').val("open");
        }
    }

</script>

@endpush
