@extends('layouts.admin')

@section('title','Kategori Form')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Merchant Forms</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Admin</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                         <form action="{{route('merchant.update',$item->id)}}" method="POST">
                            {{ method_field('PUT') }}
                            @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label class="d-block">Status</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="status1" value="1" {{isset($item->status)?($item->status == '1')?'checked="checked"':'':old('status')}}>
                                    <label class="form-check-label" for="status1">
                                        On
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="status2" value="0" {{isset($item->status)?($item->status == '0')?'checked="checked"':'':old('status')}}>
                                    <label class="form-check-label" for="status2">
                                        Off
                                    </label>
                                </div>
                                @error('status')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group" id="status">
                                <label class="d-block">Reason</label>
                                <input type="text" name="message" class="form-control" value="{{$item->message}}">
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('addon-script')
    <script>
        let status = $("input[type=radio][name=status]:checked").val()
        $(document).ready(function() {
            if(status == 1){
                $("#status").hide()
            }
        })

        $('input[type=radio][name=status]').change(function() {
            let status = $("input[type=radio][name=status]:checked").val()
            console.log(status)
            if(status == 1){
                $("#status").hide()
            } else {
                $("#status").show()
            }
        })
    </script>
@endpush
