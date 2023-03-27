<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Survey Submit Mail</title>
</head>

<body>

  <h1>Your "{{ $mailData['survey']->name }}" got answer!!</h1>

  <h3>Dear {{ $mailData['owner']->name }}, </h3>

  <h5>Someone answered your survey. Go checkout now..</h5>

  <p>Thank You.</p>

</body>

</html>