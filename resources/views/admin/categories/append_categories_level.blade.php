<div class="form-group">
    <label for="parent_id">Select category level</label>
    <select name="parent_id" id="parent_id" class="form-control">
        <option value="0" @if (isset($category['parent_id']) && $category['parent_id']==0)selected=""
        @endif>Main category</option>
        @if (!empty($getCategories))
        @foreach ($getCategories as $maincategory)
        <option value="{{$maincategory['id']}}" @if (isset($category['parent_id']) && $category['parent_id']==$maincategory['id'])selected="" @endif>{{$maincategory['category_name']}}</option>
        @endforeach
        @endif
         @if (!empty($maincategory['subcategories']))
        @foreach ($maincategory['subcategories'] as $subcategory)
        <option value="{{$subcategory['id']}}" @if (isset($subcategory['parent_id']) && $subcategory['parent_id']==$subcategory['id'])selected="" @endif>&nbsp;&raquo;&nbsp;{{$subcategory['category_name']}}</option>
        @endforeach
        @endif
    </select>
</div>
