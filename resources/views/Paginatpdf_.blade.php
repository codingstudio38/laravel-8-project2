<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
    <style type="text/css">
        body {
            font-family: Arial;
            font-size: 10pt;
        }

        table {
            border: 1px solid #ccc;
            border-collapse: collapse;
        }

        table th {
            background-color: #F7F7F7;
            color: #333;
            font-weight: bold;
        }

        table th,
        table td {
            padding: 5px;
            border: 1px solid #ccc;
        }

    </style>


</head>
<body>
    <table border="0" width="100%" class="table table-striped table-dark">
        <thead>
            <tr>
                <th colspan="9" style="height:18px;">
              
                </th>
            </tr>
            <tr>
                <th>Sl No</th>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>address</th>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>address</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($collection as $item)
            <tr>
                <td align="center">{{$i++}}</td>
                <td align="center">{{$item['id']}}</td>
                <td align="center">{{$item['name']}}</td>
                <td align="center">{{$item['email']}}</td>
                <td align="center">{{$item['address']}}</td>
                <td align="center">{{$item['id']}}</td>
                <td align="center">{{$item['name']}}</td>
                <td align="center">{{$item['email']}}</td>
                <td align="center">{{$item['address']}}</td>

            </tr>
            @endforeach






        </tbody>
        <tfoot>

        </tfoot>
    </table>
</body>

</html>
