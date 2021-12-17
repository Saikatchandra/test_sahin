<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>




    <div>
        <form style="margin: 250px;">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" id="division">
                    <option selected>Select division</option>
                    @foreach ($division as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <select class="form-select district" aria-label="Default select example" id="district">
                    <option selected>Select district</option>

                </select>
            </div>
            <div class="mb-3">
                <select class="form-select area" aria-label="Default select example" id="area">
                    <option selected>Select area</option>

                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    -->

    <script>
        $('#division').on('change', function() {
            // alert( this.value );
            var getdivision = this.value;
            console.log(getdivision);
            $.ajax({
                url: "{{ route('getdistrict') }}",
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    getdivision: getdivision,
                },
                success: function(data) {
                    console.log(data.district);
                    $.each(data.district, function(key, item) {
                        // console.log('sd', item);
                        $(".district").append("<option value='" + item.id + "'>" + item.name +
                            "</option>");
                    });

                    $('#district').on('change', function() {
                        // alert( this.value );
                        var getdistrict = this.value;
                        console.log(getdistrict);
                        $.ajax({
                            url: "{{ route('getArea') }}",
                            method: 'POST',
                            data: {
                                _token: "{{ csrf_token() }}",
                                getdistrict: getdistrict,
                            },
                            success: function(data) {
                                console.log(data.area);
                                $(".area").empty();
                                $.each(data.area, function(key, item) {
                                    console.log('item', item);
                                    $(".area").append("<option value='" +
                                        item.id + "'>" + item
                                        .area_name + "</option>");
                                });

                            }
                        });
                    });



                }
            });
        });
    </script>
</body>

</html>
