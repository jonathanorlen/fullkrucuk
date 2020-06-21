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
                    <h3>Setting</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('merchant-information-update')}}" method="POST">
                        @csrf
                        <label for="">Information</label>
                        <span id="info">
                            @php
                            $informations = explode('|',$informations);
                            @endphp
                            @forelse ($informations as $item)
                            <div class="form-group row">
                                <div class="col-md-11 col-9">
                                    <input placeholder="information" name="info[]" class="form-control info"
                                        value="{{$item}}" required>
                                </div>
                                <div class="col-md-1 col-3">
                                    <button class="btn btn-danger erase"><i class="fa fa-trash-o"></i></button>
                                </div>
                            </div>
                            @empty
                            <div class="form-group row">
                                <div class="col-md-11 col-9">
                                    <input placeholder="information" name="info[]" class="form-control info" required>
                                </div>
                                <div class="col-md-1 col-3">
                                    <button class="btn btn-danger erase"><i class="fa fa-trash-o"></i></button>
                                </div>
                            </div>
                            @endforelse
                        </span>
                        <div class="form-group">
                            <button class="btn btn-block btn-outline-warning add-new">Add Information</button>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('post-script')
<script>
    $(document).ready(function () {
        $(".add-new").click(function () {
            let inputs = $(".info");
            let full = 0
            for (var i = 0; i < inputs.length; i++) {
                if ($(inputs[i]).val() == '') {
                    $(inputs[i]).addClass('is-invalid');
                } else {
                    full++
                    $(inputs[i]).removeClass('is-invalid');
                }
            }
            if (full == inputs.length) {
                $("#info").append(`
                    <div class="form-group row">
                        <div class="col-md-11 col-9">
                            <input placeholder="information" name="info[]" class="form-control info" required>
                        </div>
                        <div class="col-md-1 col-3">
                            <button class="btn btn-danger erase"><i class="fa fa-trash-o"></i></button>
                        </div>
                    </div>
                `)
            }
        });
    });

    $(document).on('click', '.erase', function () {
        let index = $(this).parents('.form-group').index() + 1
        let formGroup = $('.form-group')
        $(formGroup[index]).remove()
    })

</script>
@endpush
