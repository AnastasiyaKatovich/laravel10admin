<select name="subcatalog" id="subcatalog">
    @foreach ($subcatalogs as $subcatalog)
    <option value="{{$subcatalog->id}}">{{$subcatalog->name}}</option>
    @endforeach
</select>
