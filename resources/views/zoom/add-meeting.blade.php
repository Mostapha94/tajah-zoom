<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Create meeting</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  </head>

  <body class="gray-background rtl">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well well-sm">
                    <form class="form-horizontal" method="post" action="{{route('meeting.store')}}">
                        @csrf
                        <fieldset>
                            <legend class="text-center header">Create meeting</legend>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <label>Topic</label>
                                    <input id="fname" name="topic" type="text" placeholder="Topic" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                <label>Start time</label><br>
                                <input type="timedate" id="birthdaytime" name="start_time"> <br>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <div class="row responsive-table">
            <div class="col-12 col-m-12">
                <table  class="table striped bordered" id="section">
                    <thead>
                        <tr class="primary-bg">
                            <th>{{__('Topic')}}</th>
                            <th>{{__('Join link')}}</th>
                            <th>{{__('Start time')}}</th>
                            <th>{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($meetings as $i=>$meeting)
                    <tr>
                        <td>{{$meeting->topic}}</td>
                        <td>{{$meeting->join_url}}</td>
                        <td>{{$meeting->start_time}}</td>
                        <td>
                        <form action="{{ route('meetings.delete',['id'=>$meeting->id]) }}" method="post">
                        @csrf
                        <button type="submit">Delete</button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>   
        </div>
    </div>
  </body>
</html>
