@extends('layouts.bowner')

@section('content')
<body class="align-content-center">
<h2 class="font-weight-bold"><font size="7">Menu Input Performances</font></h2>
    <font size="4">Select One:</font>
    <ul class="list-inline">
    <li>
    @if (Auth::user()->isOutlet()) 
    <form action="/outlet/tampstaff" method=" " class=" ">
    @endif

    @if (Auth::user()->isHRD())
    <form action="/HRD/calculator/tampstaff" method=" " class=" "> 
    @endif  
    <button type="submit" class="btn btn-primary btn-lg" name="multiplication" value="*">Input Staff Performance</button>
    </form>
    </li>

    <li>
    @if (Auth::user()->isOutlet())
    <form action="/outlet/tampdrive" method=" " class=" ">
    @endif

    @if (Auth::user()->isHRD())
    <form action="/HRD/calculator/tampdrive" method=" " class=" "> 
     @endif  
    <button type="submit" class="btn btn-primary btn-lg" name="multiplication" value="*">Input Driver/Helper Performance</button>
    </form>
    </li>

    <li>
    @if (Auth::user()->isOutlet())
    <form action="/outlet/tamp" method=" " class=" ">
    @endif

    @if (Auth::user()->isHRD())
    <form action="/HRD/calculator/tamp" method=" " class=" ">  
    @endif 

    <button type="submit" class="btn btn-primary btn-lg" name="multiplication" value="*">Input Head Division/Office Performance</button>
    </form>
    </li>
    </ul>

</body>

@endsection