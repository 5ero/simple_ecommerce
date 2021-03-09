
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Balloon Boxes - New Enquiry</title>
<style>
    body {
        background: #eee;
    }

    .container {
        margin:0 auto;
        width:50%;
        background: #fff;
        border:1px solid #ccc;
        padding:20px;
        margin-top: 40px;
    }
</style>

</head>
<body>

<div class="container">
    <h2>Balloon Boxes</h2>
    <h3>New enquiry</h3>
    <ul>
        <li>Name: {{ $data['name'] }}</li>
        <li>Email: {{ $data['email'] }}</li>
        <li>{{ $data['subject'] }}</li>
    </ul>
    <hr>
    {{ $data['message'] }}
</div>

</body>
</html>