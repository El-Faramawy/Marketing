<script>

  $(function() {
    $("#map3").googleMap();

      @foreach($trashes as $trash)
      // Marker 1
      $("#map3").addMarker({
          coords: [{{$trash->latitude}}, {{$trash->longitude}}],
          title:"{{$trash->code}}",
          text:"{{$trash->device_name}}",
          url:"{{route('trash_details',$trash->id)}}",
          @if($trash->system_status == 'good')
            icon:"http://maps.google.com/mapfiles/ms/icons/green-dot.png",
          @else
            icon:"http://maps.google.com/mapfiles/ms/icons/red-dot.png",
          @endif


      });
      @endforeach

  })

  {{--$(function() {--}}
  {{--  $("#map3_2").googleMap();--}}

  {{--    @foreach($fault_trashes as $trash)--}}
  {{--    // Marker 1--}}
  {{--    $("#map3_2").addMarker({--}}
  {{--        coords: [{{$trash->latitude}}, {{$trash->longitude}}],--}}
  {{--        icon:"http://maps.google.com/mapfiles/ms/icons/red-dot.png",--}}
  {{--    });--}}
  {{--    @endforeach--}}

  {{--})--}}

</script>
