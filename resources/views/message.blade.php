@extends('layouts.app')


@section('content')
	
	<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Отправить сообщение </div>
	                <div align="center" class="panel-body">
	                    <form action="" method="POST">
	                    	<div class="row">
                                <div class="col-md-2  col-md-offset-1">

    	                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
    		                    	
                                    <select name="for_user" style="text-align: center;overflow-y: auto;width: 150px;" multiple>
                        		      	@foreach ($users as $user)
                                            @if((auth()->user()->name) != ($user->name) )
                        		      		<option>{{$user->name}}</option>
                                            @endif
                        		      	@endforeach
                                    </select>

    	                    	<input type="submit" name="sendMessage" class="btn btn-success" style="width: 150px; height: 60px; margin-top: 10px;">
    	                    	</div>
		                    <div class="col-md-8">
		                      <textarea style= "resize: none; width: 600px; height: 150px; " name="txt_message"> </textarea><br>
                            </div>
                        </div>

                    </form>
	                </div>

            </div>
            <!-- ОШИБКИ -->
            @if( $errors->any())

                <ul  class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
            <!-- ПОДВЕРЖДЕНИЕ ЧТО СООБЩЕНИЕ ПРИШЛО -->
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    
                    {{Session::get('flash_message')}}
                </div>
                 <script type="text/javascript">
                    
                    // $('div.alert').delay(3000).slideUp(300);
                    $(function run() {
                        $('div.alert-success').delay(1000).slideUp(600);
                    });

               </script>

            @endif

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-2">
                            Мои сообщения
                        </div>
                        <div align="right" class="col-md-3 col-md-offset-7">
                            <a  class="btn btn-danger" onclick=" return confirm('Вы уверены что хотите удалить все сообщения?') " href="removeall">Удалить все сообщения</a>
                        </div>
                    </div>
                </div>
                <!-- ОТОБРОЖЕНИЕ ВСЕ СООБЩЕНИЙ КОТОРЫЙ ПРИШЛИ К ПОЛЬЗОВАТЕЛЮ -->
                <div style="overflow-y: auto; height: 350px;" class="panel-body">
            		@foreach ($messages as $message)
            			@if(Auth::user()->name == $message->for_user)
                        	<div class="row">
                                <div class="col-md-4">
                                    Имя: {{$message->from_user}}<br>        
                                    Сообщение: {{$message->txt_message}}<br>
                                </div>
                                <div align="right" class="col-md-2 col-md-offset-6" >
                                    <a  class="btn btn-danger" onclick=" return confirm('Вы уверены?') " href="delete/{{$message->id}}">Удалить</a>
                                </div>
                                
                            </div>
                              <hr>
                    	@endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop