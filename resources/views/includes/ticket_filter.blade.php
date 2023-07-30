<form method="GET" action="{{asset('tickets')}}">
    <div class="py-4">
        <p>Event date</p>
        <input type="date" name="from" id="">
        <input type="date" name="to" id="">
    </div>
    <div class="">
        <select class="form-select" id="countries" name="country">
            <option value="0">countries</option>
            @foreach($countries as $country)
            <option value={{$country->id}}>{{$country->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-check py-4">
        <input type="radio" name="online" value="on">
        <label class="form-check-label" for="flexCheckDefault">
          online
        </label>
    </div>
    <div class="form-check">
        <input type="radio" name="online" value="off">
        <label class="form-check-label" for="flexCheckDefault">
          not onlain
        </label>
    </div>
    <div class="py-4">
        <button type="submit" class="btn btn-primary">Show tickets</button>
        <button type="reset" for="submit" class="btn btn-primary">Reset</button>
    </div>
</form>
