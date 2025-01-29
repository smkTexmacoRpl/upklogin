<div>
    @foreach ($jasas as $jasa)
        {{$jasa->id}}
    <a href="{{route('jasa.edit',$jasa->id)}}">edit</a>
    @endforeach
    <!-- An unexamined life is not worth living. - Socrates -->
</div>
