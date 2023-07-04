<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Bootstrap Css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <title>Book Library | Export Excel</title>
</head>

<body class="h-100 bg-dark">

    <div class="min-vh-100">
        <table style="border: 1px solid black; border-collapse: collapse;">
            <thead>
                <tr>
                    <th colspan="9" style="text-align: center; font-weight: bold; font-size: 20px;">My Books Report</th>
                </tr>
                
                <tr>
                    <th style="border: 1px solid black; text-align: center; font-weight: bold">No</th>
                    <th style="border: 1px solid black; text-align: center; font-weight: bold">ID Book</th>
                    <th style="border: 1px solid black; text-align: center; font-weight: bold">Title</th>
                    <th style="border: 1px solid black; text-align: center; font-weight: bold">Author ID</th>
                    <th style="border: 1px solid black; text-align: center; font-weight: bold">Author Name</th>
                    <th style="border: 1px solid black; text-align: center; font-weight: bold">Publisher Name</th>
                    <th style="border: 1px solid black; text-align: center; font-weight: bold">Description</th>
                    <th style="border: 1px solid black; text-align: center; font-weight: bold">Publication Date</th>
                    <th style="border: 1px solid black; text-align: center; font-weight: bold">Pages</th>
                </tr>
            </thead>
            <tbody>
                @if ($mybooks->count())
                    @foreach($mybooks as $mybook)
                    <tr>
                        <td style="border: 1px solid black;">{{ $loop->iteration }}</td>
                        <td style="border: 1px solid black;">{{ $mybook->id }}</td>
                        <td style="border: 1px solid black;">{{ $mybook->title }}</td>
                        <td style="border: 1px solid black;">{{ $mybook->author_id }}</td>
                        <td style="border: 1px solid black;">{{ $mybook->author->name }}</td>
                        <td style="border: 1px solid black;">{{ $mybook->publisher->name }}</td>
                        <td style="border: 1px solid black;">{{ $mybook->description }}</td>
                        <td style="border: 1px solid black;">{{ $mybook->publication_date }}</td>
                        <td style="border: 1px solid black;">{{ $mybook->pages }}</td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="10" style="border: 1px solid black; text-align: center;">No Data Found</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
