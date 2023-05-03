<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 7 PDF Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <style>

        body {
            margin: 0; padding: 50px;
            font-family: Helvetica, Arial;
        }

        h1,h3,h4 {
            font-weight: normal;
            padding-top: 20px;
            margin-bottom: 50px;
        }

        #logo {
            position: absolute;
            top: 0px; right: 0px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-bottom: 2px solid #555;
            margin-bottom: 30px;
        }

        th, td {
            padding: 8px 3px;
        }

        th {
            text-align: left;
            border-bottom: 2px solid #555;
        }

        td {
            border-bottom: 1px solid #ccc;
        }

        .numeric {
            text-align: right;
        }

        tfoot td, tfoot th {
            border-top: 2px solid #555;
            background: #eee;
        }

        tfoot th {
            text-align: right;
        }
        </style>
</head>

<body>
<div class="container mt-5">

    <h1 >Expense Report </h1>
    <hr>
    <h3>generated on {{$now}} </h3>
    <div>contains data about deliveries between selected dates</div>

    <table>
        <thead>
        <tr>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Expenses</th>
        </tr>
        </thead>
        <tbody>
        xxx
        <tr>
            <td>{{$sdate}}</td>
            <td>{{$edate}}</td>
            <td>{{$string}}</td>

        </tr>
        </tbody>

        <tfoot>
        <tr>
            <th colspan="2">Total sum: </th>
            <td>{{$s }}</td>
        </tr>
        </tfoot>
    </table>

</div>

<p><em>Generated at {{$now2}} for admin</em></p>

<script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>

