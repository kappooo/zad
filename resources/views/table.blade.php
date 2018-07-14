<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #5d5d5d;
                font-family: 'Raleway', sans-serif;
                font-weight: 600;
                height: 100vh;
                margin: 0;
                padding: 20px;
            }
            .flex-center {
                align-items: center;

                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .form-group{margin-top: 40px;
                width: 80%;
                text-align: left;

                font-size: 1.2em;
            }
            .form-control{font-size: 1.1em;  color: #000000;
                font-weight: 500;}
            .form {
                border: 1px solid #dadada;
                padding: 20px;
                margin: 15px;
                border-radius: 3%;
            }
            .table{

                margin-bottom: 50px;
                margin-top: 10px;
                border-bottom: 1px solid #e3e3e3;
            }
            .text{
                position: relative;
                top: -20px;
                left: -100px;
            }
        </style>



    </head>
    <body>
        <div class="flex-center position-ref full-height">


            <div class="content">
                <div class="row">


                    <?php $times=1;?>
                    @foreach(array_chunk($dates,10) as $date)
                            <div class="col-md-4">
                                <span class="text">table {{$loop->index+1}}</span>
                                <table class="table table-hover table-responsive">

                                   <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Date</td>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        @foreach($date as $item)
                                        <tr>
                                            <td>{{$times++}}</td>

                                            <td>{{$item}}</td>
                                        </tr>
                                        @endforeach
                                   </tbody>

                                </table>
                            </div>
                    @endforeach

                    <a href="{{url('/')}}" class="btn btn-info" style="position: fixed; bottom: 10px;right: 20px;">Back</a>

                </div>

            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    </body>
</html>
