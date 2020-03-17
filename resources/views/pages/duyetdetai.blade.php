@extends('layout.user.index')

@section('content')
<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">Duyệt đề tài</h1>
        <!-- Preview Image -->
        {{-- <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">
        <hr> --}}
        <!-- Post Content -->
        <table class="table">
            <thead>
                <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên đề tài</th>
                <th scope="col">Sinh viên thực hiện</th>
                <th scope="col">Mô tả</th>
                <th scope="col"></th>
                </tr>
            </thead>
            @foreach ($duyet as $dt)
                @if($dt->count() > 0)
                <form>
                    <tbody>
                    <tr>
                        <th scope="row">{{$stt++}}</th>
                        <td>{{$dt->tendetai}}</td>
                        <td>{{$dt->ho}}{{$dt->ten}}</td>
                        <td>{{$dt->mota}}</td>
                        <td><button type="submit" value="1" class="btn btn-info">Duyệt</button></td>
                    </tr>
                    </tbody>
                </form>
                @endif
                @endforeach
                @if($duyet->count() == 0)
                <tbody>
                    <tr>
                    <td>Không có đề tài đợi duyệt nào</td>
                    </tr>
                </tbody>
                @endif
            </table>
        </div>
    </div>
</div>
@endsection
