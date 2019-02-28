@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div  align="center" class="panel-heading">
                    Добро пожаловать {{Auth::user()->name}}! 
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
