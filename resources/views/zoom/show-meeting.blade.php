<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Create meeting</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
<style>
#iframe_container {
  background-color: #ffffff;
  padding: 0;
  height: 500px;;
  width: 100%;
  overflow: visible;
}

#myiframe {
  overflow: scroll;
  border: 0;
  width: 100%;
  height: 100%;
  transform: scale(1);
  -ms-transform-origin: 0 0;
  -moz-transform-origin: 0 0;
  -o-transform-origin: 0 0;
  -webkit-transform-origin: 0 0;
  transform-origin: 0 0;
}

button {
  display: inline-block;
}
</style>
  </head>

  <body class="gray-background rtl">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="well well-sm">
                    <form class="form-horizontal" method="post" action="{{route('meeting.update',['id'=>$meeting->id])}}">
                        @csrf
                        @method('put')
                        <fieldset>
                            <legend class="text-center header">Create meeting</legend>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <label>Topic</label>
                                    <input id="topic" name="topic" value ="{{$meeting->topic}}" type="text" placeholder="Topic" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                    <label>type</label>
                                    <input id="type" name="type" value ="{{$meeting->type}}" type="text" placeholder="Topic" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                <label>Start time : </label>{{$meeting->start_time}}<br>
                                <input type="text" id="dtpickerdemo" name="start_time"> <br>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                <div class="col-md-8">
                                <label></label><br>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                            <br>
                        </fieldset>
                    </form>
                    <div id="iframe_container">
                    <div class="iframe-container" style="overflow: hidden; padding-top: 56.25%; position: relative;">
                        <iframe allow="microphone; camera" style="border: 0; height: 100%; left: 0; position: absolute; top: 0; width: 100%;" src="https://success.zoom.us/wc/join/{{$meeting->id}}" frameborder="0"></iframe> </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('#dtpickerdemo').datetimepicker();
        });
    </script>
  </body>
</html>
