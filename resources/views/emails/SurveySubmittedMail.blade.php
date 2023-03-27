<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Survey Submit Mail</title>
</head>

<body>

  <h3>Dear {{ $mailData['owner']->name }}, </h3>

  <h4>Someone answered your survey. Checkout now..</h4>
  @foreach ($mailData['answers'] as $a)
  <p class="mt-1 text-sm leading-6 text-gray-600">{{ $a->question->question}} - {{ $a->answer }}</p>
  @endforeach


  <p>--------</p>
  <p>Thank You.</p>

</body>

</html>