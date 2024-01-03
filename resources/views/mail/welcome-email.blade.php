<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Signup Request</title>
</head>
<body>
   <h1>Welcome {{$companyDetail["name"]}}</h1>
   <p>Your signup request is on porcess will need to be approved before they can list jobs on the app</p>
   <p>Please click to link to verify your email address <a href="{{route('verify-email', $companyDetail['token'])}}">Verify Email Address</a></p>
</body>
</html>