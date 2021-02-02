@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Employeer</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('employees.store') }}" enctype="multipart/form-data" method="POST">
    	@csrf


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Full name:</strong>
		            <input type="text" name="full_name" class="form-control" value="{{old('full_name')}}" placeholder="Full name" required>
		        </div>
		    </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Date of birth:</strong>
                     <input type="date" name="dob" class="form-control" value="{{old('dob')}}" required>
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Position:</strong>
                     <input type="text" name="position" class="form-control" placeholder="Position" value="{{old('position')}}" required>
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Phone number:</strong>
                     <input type="tel" name="phone" placeholder="79001234567" class="form-control" value="{{old('phone')}}" pattern="\7\{0,1}9[0-9]{2}{0,1}\d{3}\d{2}\d{2}" required>
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Pay:</strong>
                     <input type="number" name="pay" class="form-control" value="{{old('pay')}}" placeholder="Pay, &#8381" min="0" required>
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Education:</strong>
                     <input type="text" name="education" class="form-control" value="{{old('education')}}" placeholder="Education" required>
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Img</strong>
                     <input type="file" name="img" class="form-control-file" >
                 </div>
             </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                 <div class="form-group">
                     <strong>Work start date:</strong>
                     <input type="date" name="work_start_date" value="{{old('work_start_date')}}" class="form-control"required>
                 </div>
             </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>

@endsection
