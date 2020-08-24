@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <br/>
        <h3 style="text-align: center"><a style="text-decoration: none" href="{{route('urlone.create')}}"> Self-Destructing URL </a></h3>
        <hr>
        <div class="form-group" style="margin-top: 5px">
            <?php
                $content = DB::table('urlonecs')->where('link', '=', $id)->value('content');
                $valid = DB::table('urlonecs')->where('link', '=', $id)->value('valid');
                $viewleft = DB::table('urlonecs')->where('link', '=', $id)->value('viewleft');
            ?>

                @if($valid == 1)
                    <div id="v1" class="form-inline" >
                        <label for="copy"><span style="color: red; font-weight: bold;">ALERT : </span> THE CONTENT CAN ONLY BE READ ONCE! <br/>CLICK THE BUTTON IF YOU UNDERSTAND THE RISK!</label>
                        <input class="btn btn-danger" style="float: right; margin-bottom: 5px" type="button" onclick="showContent()" value="SHOW CONTENT">
                    </div>
                    
                    <div id="v2" style="display: none; margin.bottom: 5px" class="form-inline">
                        <label for="copy" style="font-size: 20px">YOUR CONTENT: </label>
                        <input class="btn btn-warning" style="float: right; margin-bottom: 5px;" type="button" onclick="copyContent()" value="COPY CONTENT TO CLIPBOARD">
                    </div>

                    <div id="sh">
                        <textarea type="text" name="copy" id="copy" class="form-control" style="background: #f8f8f8; display: none" rows="3" onfocus="this.select()" placeholder="Something wrong..." readonly>{{$content}}</textarea>
                    </div>
                    <?php
                            if($viewleft >= 1) {
                                $conn = new mysqli("localhost", "root", "", "dburl");

                                $viewlefta = $viewleft - 1;
                                $conn->query("UPDATE urlonecs SET viewleft = '$viewlefta' WHERE link = '$id'");
                                if ($viewleft == 1) $conn->query("UPDATE urlonecs SET valid = '0' WHERE link = '$id'");
                            }
                    ?>

                @elseif($valid == 0)
                    <div class="alert alert-danger">
                        <ul>
                            <li>It either never existed or has already been viewed.</li>
                        </ul>
                    </div>

                @endif
                <hr>
                <a style="display: flex; justify-content: center; align-items: center; width: 180px; margin: auto; margin-top: 10px;" href="{{route('urlone.create')}}" class="btn btn-primary">Generate Another Link</a>
        </div>
    </div>
</div>
<script>
    function showContent() {
        document.getElementById("copy").style.display = "block";
        document.getElementById("v1").style.display = "none";
        document.getElementById("v2").style.display = "block";
    }

    function copyContent() {
        var contentCopy = document.getElementById("copy");
        contentCopy.select();
        contentCopy.setSelectionRange(0, 99999);
        document.execCommand("copy");
        alert("The content has been copied to your clipboard! \n Paste it to a secure location before closing this page!");
    }
</script>
@endsection