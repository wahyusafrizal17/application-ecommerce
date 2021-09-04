@foreach ($costs[0]->costs as $courier_service)
    <input name="cost" value="{{ $courier_service->service}}-{{ $courier_service->cost[0]->value}}" type="radio" required onclick="add_ongkir({{$courier_service->cost[0]->value}})"> {{ $courier_service->service}} -  {{ $courier_service->cost[0]->value}}<br>
@endforeach