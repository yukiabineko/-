@if (Agent::isMobile())
  @include('mobile-footer')  
@else
  @include('pc-footer')
@endif


