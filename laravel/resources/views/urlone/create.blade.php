@extends('master')

@section('content')
<div class="row" style="">
    <div class="col-md-12">
    <br />
    <h3 align="center">Self-Destructing URL </h3>
    <hr>
    
    @if(count($errors) > 0)
        <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        </div>
    @endif
    
    @if(\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div>
    @endif

    <form method="post" action="{{url('urlone')}}">
        {{csrf_field()}}
        <div class="form-group">
            <textarea type="text" name="content" value="" rows="10" class="form-control" style="background: #f8f8f8" placeholder="Enter Your Content Here..." /></textarea>
        </div>

        <div class="form-inline">
            <label for="idviewLeft">Chance to view: </label>
            <input type="number" name="viewleft" id="idviewLeft" class="form-control" style="width:60px; background: #f8f8f8" min="1" max="99" value="1"/>
            <input type="submit" class="btn btn-primary" style="float: right; width: 50%;" value="Generate Link"/>
            
            <?php
                //random link
                $chr = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
                $link = '';
                for ($i = 0; $i < 7; $i++) 
                    $link .= $chr[mt_rand(0, 61)];
            ?>

            <input style="display: none" type="text" name="link" value="<?php echo $link; ?>" disable hidden />
            <input style="display: none" type="number" name="valid" value="1" disbale hidden />
        </div>
    </form>
    </div>
</div>
@endsection