@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
        <div class="col-md-12">
        
            <h2>Search Appointments</h2>
        </div>
            <div class="panel panel-default row">
                <div class="col-md-6">
                     <label for="start_date">From</label>
                     <input type="date" class="form-controller" id="start_date" name="start_date"></input>
                </div>
                <div class="col-md-6">
                    <label for="end_date">To</label>
                     <input type="date" class="form-controller" id="end_date" name="end_date"></input>
                </div>
                <div class="panel-body">
                    <div class="form-group col-md-12">
                        <label for="p_number">Patient Number</label>
                        <input type="text" class="form-controller" id="p_number" name="p_number"></input>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="clinic">Clinic</label>
                            <select id="clinic">
                                    <option value="branch1">branch1</option>
                                    <option value="branch2">branch2</option>
                                    <option value="branch3">branch3</option>
                                    <option value="branch4">branch4</option>
                            </select>
                    </div>
                
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Appoinment Date</th>
                            <th>Patient Number</th>
                            <th>Patient Name</th>
                            <th>Clinic</th>
                            <th>Cost</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    </table>
                </div>    
            </div>
        </div>
    </div>





<script type="text/javascript">
var search_app = function() {

$p_number=$('#p_number').val();
$start_date=$('#start_date').val();
$end_date=$('#end_date').val();
$clinic=$('#clinic').val();

$.ajax({
 
type : 'POST',
// url : '{{URL::to('/searching')}}',
 url: "/search/",
data:{'p_number':$p_number , 'start_date':$start_date , 'end_date':$end_date , 'clinic':$clinic},
 
success:function(data){
 console.log(data);
$('tbody').html(data);
 
}
 
});
 
 }
$('#p_number').keyup(search_app);
$('#start_date , #end_date , #clinic').change(search_app);
 
</script>
 
<script type="text/javascript">
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    }); 
</script>




    
@endsection