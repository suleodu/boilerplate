@extends('layouts.app')

@section('app_content')
<section class="row component-section">
    <div class="col-md-12">
        <!-- Bootstrap button code and example --> 
        <div class="component-box">
            <!--Bootstrap button example -->
            <div class="pmd-card pmd-z-depth card-custom-view">
                <div class="pmd-card-body"> 
                    
                    <!--Primary button with a ripple effect-->
                    <a href="{{route('tams-school')}}"  class="btn btn-lg btn-primary ">School Mgt.</a>

                    <!--Success button with a ripple effect-->
                    <a href="{{route('acl-management')}}"  class="btn btn-lg btn-success"> Sub-School Mgt.  </a>

                   <!--Success button with a ripple effect-->
                    <a href="{{route('acl-management')}}"  class="btn btn-lg btn-info">College Mgt. </a>
                    
                    <!--Success button with a ripple effect-->
                    <a href="{{route('acl-management')}}"  class="btn btn-lg btn-warning"> Department Mgt.</a>
                    
                    <!--Success button with a ripple effect-->
                    <a href="{{route('acl-management')}}"  class="btn btn-lg btn-success"> Programme Mgt.</a>
                    
                    <!--Success button with a ripple effect-->
                    <a href="{{route('acl-management')}}"  class="btn btn-lg btn-primary"> Session Mgt.</a>
                    
                    <!--Success button with a ripple effect-->
                    <a href="{{route('acl-management')}}"  class="btn btn-lg btn-success"> Course Pool.</a>
                </div>
            </div> <!--Bootstrap button example end-->
        </div> <!-- Bootstrap button code and example end --> 
    </div>
</section>
@endsection

@push('style')

@endpush

@push('script')


@endpush

