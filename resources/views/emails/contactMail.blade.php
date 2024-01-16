<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-posta Şablonu</title>
</head>
<body>
<table>
    <tr>
        <td>Name:</td>
        <td>{{$contactMail->name}}</td>
    </tr>
    <tr>
        <td>Mail:</td>
        <td>{{$contactMail->mail}}</td>
    </tr>
    <tr>
        <td>Subject:</td>
        <td>{{$contactMail->subject}}</td>
    </tr>
    <tr>
        <td>Comments:</td>
        <td>{{$contactMail->comments}}</td>
    </tr>
</table>
</body>
</html>
