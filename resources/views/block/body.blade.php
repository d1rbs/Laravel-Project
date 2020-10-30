@if(empty(Auth::user()->name))
<div class="title m-b-md">
    Hello my friend, you need to login or register to continue working!
</div>
@else
<div class="title m-b-md">
Hello, {{ Auth::user()->name }} !
</div>
@endif