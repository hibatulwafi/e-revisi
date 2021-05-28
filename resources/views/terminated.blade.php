<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" >
        <link href="{{ asset('/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('/css/style.css')}}" rel="stylesheet" type="text/css">
    	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>Masuk - Revline</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 36px;
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title">
                  
                <div class="card col-12">
                <div class="row">


                  <div class="col-12">
	    			  <br/>

	                  <img width="350px" src="{{ asset('adminassets') }}/assets/images/logos.png" alt="Card image cap">
	                  <br/> <br/>
	                  <div class="col-12">
	                   <h4> Mau Masuk? </h4>
	                  </div>

	                  <div class="col-12">
	    			    <h5> Ups Maaf, {{ $name }} </h5>
	                  </div>

	                  <div class="col-12">
	    			   <a href="{{route('login')}}" class="btn btn-lg btn-danger waves-effect waves-light "> <i class="fas fa-home"></i> Login</a>
	    			   <br/>
	    			   <br/>
					  </div>

                  </div>
				</div>

                </div>
            </div>
        </div>
    </body>
</html>
