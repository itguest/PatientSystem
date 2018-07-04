@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <h2 class="center">Patient Appointment</h2>
        <div class="col-md-12">
            <form method="POST" action="">

                    <!-- {{csrf_field()}} -->
                        @csrf
                    
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="number">Patient Number</label>
                                <input type="text" name="number"  class="form-control" id="number">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Patient Name</label>
                                <input type="text" name="name"  class="form-control" id="name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mobile">Mobile Name</label>
                                <input type="text" name="mobile"  class="form-control" id="mobile">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <input type="text" name="gender"  class="form-control" id="gender">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" name="status"  class="form-control" id="status">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="clinic">Clinic</label>
                                <input type="text" name="clinic"  class="form-control" id="clinic">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="date">Appointment Date:</label>
                                <input type="date" name="date"  class="form-control" id="date">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="start_time">Appointment Starts at:</label>
                                <input type="time" name="start_time"  class="form-control" id="start_time">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="end_time">Appointment Ends at:</label>
                                <input type="time" name="end_time"  class="form-control" id="end_time">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cost">Estimated Cost:</label>
                                <input type="text" name="cost"  class="form-control" id="cost">EGP
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="comment">Comments</label>
                                <textarea name="comment" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    

                    <div class="col-md-4">
                            <div class="form-group">
                                  <button type="submit" class="btn btn-primary" onclick='this.form.action="/app/store";'>Create</button>
                            </div>
                    </div>
                    <div class="col-md-4">
                            <div class="form-group">
                                  <button type="submit" class="btn btn-primary" onclick='this.form.action="/app/update";'>Save</button>
                            </div>
                    </div>
                    <div class="col-md-4">
                            <div class="form-group">
                                  <button type="button" class="btn btn-primary" onclick='this.form.reset();'>Reset</button>
                            </div>
                    </div>

                    </div>


                   
                   
                    
                    
            </form>
                 @include('errors.fomrs_error')
        </div>
    </div>
</div>
@endsection