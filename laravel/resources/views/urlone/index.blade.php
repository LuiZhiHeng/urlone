@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <br/>
        <h3 align="center">Self-Destructing URL Data</h3>
        <br/><hr>
            @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
            @endif
        <div align="right">
            <a href="{{route('urlone.create')}}" class="btn btn-primary">Go to Website</a>
            <br/><br/>
        </div>
        <table class="table table-bordered table-striped">
            <tr>
                <th style="text-align: center">Link</th>
                <th style="text-align: center">Content</th>
                <th style="text-align: center">Valid</th>
                <th style="text-align: center">View Left</th>
                <th style="text-align: center">IP</th>
                <th style="text-align: center">created time</th>
            </tr>
            @foreach($sdurl as $row)
            <tr>
                <td>{{$row['link']}}</td>
                <td>{{$row['content']}}</td>
                @if($row['valid'] == 0)
                    <td style="text-align: center; color: #ff0000">{{'No'}}</td>
                @elseif($row['valid'] == 1)
                    <td style="text-align: center; color: #339933">{{'Yes'}}</td>
                @endif
                <td style="text-align: center">{{$row['viewleft']}}</td>
                <td>{{$row['ip']}}</td>
                <td>{{date("Ymj H:i:s (D)",strtotime($row['created_at']))}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection