@extends('layouts.app') 

@section('content')

<div class="container">
    
    <div class="row justify-content-center">
        
        <div class="col-md-12">
            
            <div class="card mt-5">
                
                <div class="card-header">{{ __('Bitcoint Price Form') }}</div> 
                
                @if(session()->has('success'))
                <div class="alert alert-success"> 
                    {{ session()->get('success') }} 
                </div>
                @endif 
                
                @if(session()->has('error'))
                <div class="alert alert-danger"> 
                    {{ session()->get('error') }} 
                </div> 
                @endif
                
                <div class="card-body ">
                    
                    <form method="POST" action="{{ route('index.update') }}/" class="row"> @csrf @method('POST')
                        <div class="form-group col-md-6">
                            
                            <label>{{ __('Start Date') }}</label>
                            
                            <input type="date" name="start_date" required="required" class="form-control @error('start_date') is-invalid @enderror" value="{{$startDate}}"> 
                            
                            @error('start_date') 
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span> 
                            @enderror 
                        </div>
                        
                        <div class="form-group col-md-6">
                            
                            <label>{{ __('End Date') }}</label>
                            
                            <input type="date" name="end_date" required="required" class="form-control @error('end_date') is-invalid @enderror" value="{{$endDate}}"> 
                            
                            @error('end_date') 
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span> 
                            @enderror 
                        </div>
                        
                        <div class="col-md-12 text-center">
                            
                            <p>Please choose Date between 30 Days from Now</p>
                            
                            <button class="btn btn-primary" type="submit" name="filter">{{ __('Submit') }}</button>
                        </div>
                        
                    </form>
                </div>
                
            </div>
            
        </div>
        
    </div>
    
    <div class="row justify-content-center">
        
        <div class="col-md-12">
            
            <div class="card mt-3 mb-5">
                
                <div class="card-header">{{ __('Chart') }} <span class="float-right">  {{$startDate}} {{ __('to') }} {{$endDate}} </span></div>
                
                <div class="card-body ">
                    
                    <canvas id="myChart"></canvas>
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
    
</div> 

@endsection 

@section('scripts')

<script>
    
    var dates  = @php echo json_encode(array_keys($filterdArray));    @endphp;
    
    var prices = @php echo json_encode(array_values($filterdArray));  @endphp;
    
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line'
        , // The data for our dataset
        data: {
            labels: dates
            , datasets: [{
                label: 'Bitcoin Price'
                , backgroundColor: 'rgb(252, 204, 64)'
                , borderColor: 'rgb(252, 204, 64)'
                , data: prices
                , fill: false
                , showLine: true
                }]
        }
        , // Configuration options go here
        options: {
            tooltips: {
                enabled: true
                , mode: 'single'
                , callbacks: {
                    label: function (tooltipItems, data) {
                        return tooltipItems.yLabel + ' USD';
                    }
                }
            }
            , scales: {
                yAxes: [{
                    ticks: {
                        // Include a dollar sign in the ticks
                        callback: function (value, index, values) {
                            return '$ ' + value;
                        }
                    }
                }]
            }
        }
    });
</script> 

@endsection