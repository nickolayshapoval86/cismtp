<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Contact</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>

<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-lg-10 col-md-12">

    <form method="post" action="/contact/send_email">
        <div class="form-group">
            <label for="recipientEmail">Recipient Email Address</label>
            <input type="email" name="to_email" class="form-control" id="recipientEmail" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="emailSubject">Email Subject</label>
            <input type="input" name="subject" class="form-control" id="emailSubject" placeholder="Enter subject">
        </div>
        <div class="form-group">
            <label for="emailBody">Email Message Body</label>
            <textarea name="body" class="form-control" id="emailBody" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>

        </div>
    </div>
</div>

</body>
</html>

