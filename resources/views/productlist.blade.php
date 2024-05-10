<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product List</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <center>
        <h1>Filter Products </h1>
    </center>
    <div class="container">
        <div class="list" style="margin:40px 0px 100px 0px;display:flex;justify-content:center;align-items:center;">
            <select class="form-select" style="width: 160px; margin-right:80px;" name="category" id="category">
                <option value=''>Select Category</option>
                @foreach ($category as $data)
                <option value="{{ $data->id }}">{{ $data->name }}</option>
            @endforeach
            </select>
            <a href="{{ route('product.add') }}" class="btn btn-primary " role="button">Add Products</a>
        </div>


        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">S.No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Descriptions</th>
                    <th scope="col">Price</th>

                </tr>
            </thead >
            <tbody id="tbody">

                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product['description'] }}</td>
                        <td>{{ $product->price }}</td>

                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
    <script>

    $(document).ready(function(){
        $('#category').on('change',function(){
            var category = $(this).val();
            $.ajax({
                url:"{{ route('product.list') }}",
                type:"GET",
                data:{'category':category},
                success:function(data){
                    var products = data.products;
                    var html = '';
                    if(products.length>0){
                        for(let i=0;i<products.length;i++){
                            html +='<tr>\
                                <td>'+products[i]['id']+'</td>\
                                <td>'+products[i]['name']+'</td>\
                                <td>'+products[i]['description']+'</td>\
                                <td>'+products[i]['price']+'</td>\
                                </tr>'
                        }

                    }else{
                        html +='<tr>\
                            <td>Data Not Found </td>\
                            </tr>'

                    }
                    $('#tbody').html(html);

                }
            });

        });


     });
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
