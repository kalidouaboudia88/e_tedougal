<div>
   <select name="category_id" id="category_id" class="form-control">
      < <option value=""></option>
       @foreach($categories as $key => $value)
           <option value="{{$key}}" {{ $key == $product->category_id ? 'selected="selected"':''}}>{{$value}}</option>
       @endforeach
   </select>
</div>
