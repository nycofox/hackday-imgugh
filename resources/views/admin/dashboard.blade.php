@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin backend</div>
                    <div class="card-body">
                        <div id="main" style="width: 600px;height:400px;"></div>
                        <script type="text/javascript">
                            // based on prepared DOM, initialize echarts instance
                            var myChart = echarts.init(document.getElementById('main'));

                            // specify chart configuration item and data
                            var option = {!! json_encode($graph) !!}

                            // use configuration item and data specified to show chart
                            myChart.setOption(option);
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('header_scripts')
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.0.1/dist/echarts.min.js"></script>
@endpush
