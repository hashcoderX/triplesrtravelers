<!DOCTYPE html>
<html>
<head>
    <title>New Appointment Request</title>
</head>
<body>
    <h2>New Appointment Request</h2>
    <p><strong>Name:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
    <p><strong>Service Type:</strong> {{ $data['service'] }}</p>
    <p><strong>Message:</strong> {{ $data['message'] }}</p>
</body>
</html>