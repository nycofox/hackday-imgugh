@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Upload a new image
            </div>
            <div class="card-body">

                <form enctype="multipart/form-data" action="{{ route('upload') }}" method="post">
                @csrf
                {{--                    <input type="file" name="file" class="form-control-file">--}}

                <!-- Upload image input-->
                    <div class="input-group mb-3 px-2 py-2 rounded-pill bg-light shadow-sm">
                        <input id="upload" name="file" type="file" onchange="readURL(this);"
                               class="form-control border-0">
                        <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                        <div class="input-group-append">
                            <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i
                                    class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                    class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                        </div>
                    </div>
                    <div class="image-area mt-4">
                        <img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
                    </div>
                    <button class="btn btn-success btn-lg" type="submit">Upload</button>

                    {{--                    <p class="font-italic text-white text-center">The image uploaded will be rendered inside the box--}}
                    {{--                        below.</p>--}}

                </form>

            </div>
        </div>
    </div>

    <style>
        #upload {
            opacity: 0;
        }

        #upload-label {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
        }
    </style>

    <script>
        /*  ==========================================
            SHOW UPLOADED IMAGE
        * ========================================== */
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imageResult')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $('#upload').on('change', function () {
                readURL(input);
            });
        });

        /*  ==========================================
            SHOW UPLOADED IMAGE NAME
        * ========================================== */
        var input = document.getElementById('upload');
        var infoArea = document.getElementById('upload-label');

        input.addEventListener('change', showFileName);

        function showFileName(event) {
            var input = event.srcElement;
            var fileName = input.files[0].name;
            infoArea.textContent = 'File name: ' + fileName;
        }
    </script>
@endsection
