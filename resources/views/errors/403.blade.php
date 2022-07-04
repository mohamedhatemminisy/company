<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>403 Error Page | CodingNepal</title>
    <link rel="stylesheet" href="{{asset('assets/front/css/errors.css')}}">
</head>

<body>
    <div id="error-page">
        <div class="content">
            <h2 class="header" data-text="403">
                403 </h2>
            <h4 data-text="Opps! You are not authorized to access this page">
                Opps! You are not authorized to access this page
            </h4>
            <p>
                You are not authorized to access this page </p>
            <div class="btns">
                <a href="{{route('home')}}">return home</a>
            </div>
        </div>
    </div>
</body>

</html>